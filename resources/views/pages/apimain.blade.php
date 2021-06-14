<?php
$array_total_day = array();
$array_score = array();

foreach ($array_response as $responseBody) {
    $array_date = array();
    $array_date_unique = array();
    $array_day_commit = array();

// $start_date_ctrl =====> from controller
// $end_date_ctrl =====> from controller

    $start_date = date_create($start_date_ctrl);
    $end_date = date_create($end_date_ctrl);   

    $diff_date = date_diff($start_date,$end_date);
    $diff_date = $diff_date->format("%a");
    $diff_date++;

    $minimal_commit = ceil($diff_date/3);
    $temp_min_commit = $minimal_commit;
    $minimal_commit_2 = ceil($minimal_commit/2);

//Variable for Score
    $max_A_score = 0;
    $max_B_score = 0;
    $max_total_score = 0;
    $my_A_score = 0;
    $my_B_score = 0;
    $my_total_score = 0;
    $final_score = 0;

    $x = 0;
    for($j = $diff_date; $j >= 1; $j--)
    {
        $array_day_commit[$j] = 0;

        if ($temp_min_commit)
        {
            //Get max A Score
            $temp = $j;
            $max_A_score += $temp;

            //Get max B Score
            $x++;
            $max_B_score += $x;

            $temp_min_commit--;        
        }

    }

//Total Max Score
    $max_total_score = ($max_A_score + $max_B_score) / $minimal_commit;

    // responseBody => n-data input
    // response_nth => accessing nth repo from input
    // response => commit 
    foreach ($responseBody as $response_nth) {
        foreach ($response_nth as $response) {
            // Convert date format from ISO8061 to mySQL
                $date = $response->commit->committer->date;
                $fixed_date = date('Y-m-d H:i:s', strtotime($date));

            //Convert date to local date
                // create a $dt object with the UTC timezone
                $dt = new DateTime($fixed_date, new DateTimeZone('UTC'));

                // change the timezone of the object without changing it's time
                $dt->setTimezone(new DateTimeZone('Asia/Jakarta'));

                // format the datetime
                $local_date = $dt->format('Y-m-d');
            
            // Insert to array for count
                $temp_date = date_create($local_date);
                $diff = date_diff($temp_date,$end_date);
                $diff_format = $diff->format("%a");
                $diff_format_sign = $diff->format("%R");

                if ($diff_format >= 0 && $diff_format < $diff_date && $diff_format_sign == "+")
                {                                        
                    array_push($array_date, $local_date);
                }
        }
    }

    // Make $array_date become unique
    $xxx = 1;
    for ($i=0; $i < count($array_date) ; $i++) {         
        if(!in_array($array_date[$i], $array_date_unique))
        {
            $array_date_unique[$xxx] = $array_date[$i];
            $xxx++;
        }
    }    

    // Looking for difference between commit date to deadline date
    // and save it in the array which have the same index
    foreach ($array_date_unique as $key => $value) {
        $local_date = date_create($array_date_unique[$key]);
        $diff = date_diff($local_date,$end_date);
        $diff_format = $diff->format("%a");
        $diff_format++;

        $array_day_commit[$diff_format] = $diff_format;  
    }

    // Get my score
    // if == 0, it means that index has no value
    $x = 1;
    for($j = 1; $j <= $diff_date; $j++) 
    {        

        if ($array_day_commit[$j] != 0)
        {
            $my_A_score += $array_day_commit[$j];
            $my_B_score += $x;
            $x++;
            // max bonus is same as minimal_commit
            if ($x >= $minimal_commit)
            {
                $x = $minimal_commit;
            }
        } else 
        {
            $x = 1;
        }
    }

    // Total my score
    $my_commit = count($array_date_unique);
    $final_score = 0;

    if ($my_commit)
    {        
        if ($my_commit <= $minimal_commit_2)
        {
            $my_commit = $minimal_commit_2;
        }

        $my_total_score = ($my_A_score + $my_B_score) / $my_commit;

        // Final Score
        $final_score = round(($my_total_score*100)/$max_total_score, 5);
    }

    array_push($array_total_day, count($array_date_unique));
    array_push($array_score, $final_score);
}
?>

@extends('layouts.app-inner-main')

@section('title', 'Result | PI Score')

@section('content')

    @php
        $name_of_file = "apimain";
    @endphp

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

        <ol>
            <li><a href="/">Home</a></li>
            <li><a href="/project/main">PI Score</a></li>
            <li>Result</li>
        </ol>
        <h2>Result</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 pt-2">

                <div class="form-group"> 	
                    <!--		Show Numbers Of Rows 		-->
                    <select class ="form-control" name="state" id="maxRows">
                        <option value="5000">Show ALL Rows</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="70">70</option>
                        <option value="100">100</option>
                       </select>                    
                </div>

                <table id="table-id" class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            {{-- <th width="5%" style="text-align: center">No</th> --}}
                            <th width="30%">Repo Name</th>
                            <th width="20%">Total Commits</th>
                            <th width="20%">Day of Commits</th>
                            <th width="25%">Score</th>
                        </tr>
                    </thead>
                    <tbody>                        
                        @for ($i = 0; $i < count($array_repos_name); $i++)
                            <tr>
                                <?php
                                $pembagi_nilai_commit = 5;
                                $bonus_score_commit = $array_total_commit[$i]/$pembagi_nilai_commit;
                                $score_final = $array_score[$i] + $bonus_score_commit;
                                if ($score_final > 100)
                                {
                                    $score_final = 100;
                                }
                                $temp = $i;                                
                                ?>                                
                                {{-- <td style="text-align: center">{{ ++$temp }}</td> --}}
                                <td>{{ $array_repos_name[$i] }}</td>
                                <td>{{ $array_total_commit[$i] }}</td>
                                <td>{{ $array_total_day[$i] }} of {{ $diff_date }}</td>
                                <td>
                                    <!-- Trigger the modal with a button -->
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal{{ $temp }}">{{ $score_final }}</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal{{ $temp }}" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Score details</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>                                                    
                                                </div>
                                                <div class="modal-body">
                                                    <b><p>{{ $array_repos_name[$i] }}</p></b>
                                                    <p>Raw Score = {{ $array_score[$i] }}</p>
                                                    <p>Bonus Score = {{ $bonus_score_commit }}</p>
                                                    {{-- <p>Total Score     = {{ $array_score[$i] + $bonus_score_commit }}</p> --}}
                                                    <hr>
                                                    <p>Final Score = {{ $score_final }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   

                                </td>
                            </tr>
                        @endfor

                    </tbody>
                </table>

            <!--		Start Pagination -->
			<div class='pagination-container' >
				<nav>
				  <ul class="pagination">
            
                    {{-- <li data-page="prev" >
						<span> < <span class="sr-only">(current)</span></span>
					</li> --}}
                    <li class="page-item" data-page="prev">
                        <a class="page-link" href="#">Previous <span class="sr-only">(current)</span></a>
                    </li>

				    <!--	Here the JS Function Will Add the Rows -->

                    {{-- <li data-page="next" id="prev">
						<span> > <span class="sr-only">(current)</span></span>
					</li> --}}
                    <li class="page-item" data-page="next" id="prev">
                        <a class="page-link" href="#">Next <span class="sr-only">(current)</span> </a>
                    </li>

				  </ul>
				</nav>
			</div>

            </div>
        </div>
    </div>
@endsection