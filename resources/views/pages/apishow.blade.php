@php

    class DateObject
    {
        public $date;
        public $number;
        public $message;
        public $commiter;
        public $avatar;
    }
    
    $array_date = array();
    $array_date_unique = array();
    $array_date_object = array();
    
    // $array_date_total = array();

    foreach ($responseBody as $response_nth) {
        $number = 1;
        foreach ($response_nth as $response) {

            //Create new DateObject
                $dateObject = new DateObject();

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
                    
                $dateObject->date = $local_date;
                $dateObject->number = $number;
                $number++;

                $dateObject->message = $response->commit->message;
                $dateObject->commiter = $response->committer->login;
                $dateObject->avatar = $response->committer->avatar_url;

                array_push($array_date, $local_date);
                array_push($array_date_object, $dateObject);
                                                       
                
        }        
    }

    $array_count_values = array();
    $array_count_values = array_count_values($array_date);
    // print_r($array_count_values);

    $xxx = 1;
    for ($i=0; $i < count($array_date) ; $i++) {         
        if(!in_array($array_date[$i], $array_date_unique))
        {
            $array_date_unique[$xxx] = $array_date[$i];
            
            $xxx++;
        }
    }

    $total_date = count($array_date_unique);
    
@endphp

@extends('layouts.app-inner')

@section('content')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="/">Home</a></li>
        <li><a href="./">Public Repo</a></li>
        <li>Result</li>
      </ol>
      <h2>Result</h2>

    </div>
  </section><!-- End Breadcrumbs -->

<div class="container">
    <div class="row">
        <div class="col-12 pt-2">            
            {{-- <p>{{ $total_commit }}</p>
            <p>{{ $responseBody[0][0]->author->login }}</p>
            <p>{{ $responseBody[0][0]->author->html_url }}</p>
            <img style="height: 25px; width: 25px" src="{{ $responseBody[0][0]->author->avatar_url }}" alt="{{ $responseBody[0][0]->author->login }} picture"> --}}

            @for($j = 1; $j <= $total_date; $j++)

                <button class="accordion">{{ $array_date_unique[$j] }}</button>
                    <div class="panel">
                        
                        {{-- $array_date_object --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>                                                            
                                    <th>Message</th>
                                    <th>Committer</th>                         
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < $array_count_values[$array_date_unique[$j]]; $i++)
                                    <tr>                                        
                                        <td>{{ $array_date_object[$i]->number }}</td>                                    
                                        <td>{{ $array_date_object[$i]->message }}</td>                            
                                        <td>
                                            {{ $array_date_object[$i]->commiter }}
                                            <img style="height: 25px; width: 25px" src="{{ $array_date_object[$i]->avatar }}" alt="{{ $array_date_object[$i]->commiter }} picture">
                                        </td>                                        
                                    </tr>
                                @endfor                                              
                            </tbody>                
                        </table>                         

                    </div> 
            @endfor
                        
        </div>
    </div>
</div>

@endsection
