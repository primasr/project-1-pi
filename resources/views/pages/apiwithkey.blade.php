@php

    class DateObject
    {
        public $date;        
        public $message;
        public $commiter;
        public $avatar;
    }
    
    $array_date = array();
    $array_date_unique = array();
    $array_date_object = array();
    
    //for profile
    $author_name = $responseBody_author->owner->login;
    $author_avatar = $responseBody_author->owner->avatar_url;
    $author_github_url = $responseBody_author->owner->html_url;

    $author_repo_url = $responseBody_author->html_url;
    $author_repo_desc = $responseBody_author->description;
    $author_repo_lang = $responseBody_author->language;
    $author_updated_at = $responseBody_author->updated_at;

        // get updated at with local date
        $author_fixed_date = date('Y-m-d H:i:s', strtotime($author_updated_at));
        $author_dt = new DateTime($author_fixed_date, new DateTimeZone('UTC'));
        $author_dt->setTimezone(new DateTimeZone('Asia/Jakarta'));
        $author_local_date = $author_dt->format('jS F Y');                            

    foreach ($responseBody as $response_nth) {        
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

@section('title', 'Result | Private Repo')

@section('content')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="/">Home</a></li>
        <li><a href="/project/private">Private Repo</a></li>
        <li>Result</li>
      </ol>
      <h2>Result</h2>

    </div>
  </section><!-- End Breadcrumbs -->

<div class="container">
    <div class="row">  

        <div class="col-4 pt-2">
            <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Profile</a>
            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Commit Status</a>
            <a class="list-group-item list-group-item-action disabled" id="list-messages-list" data-toggle="list" href="#" role="tab" aria-controls="messages">
                Total Commits<span class="badge badge-primary badge-pill" style="float: right">{{ $total_commit }}</span>
            </a>
            <a class="list-group-item list-group-item-action disabled" id="list-settings-list" data-toggle="list" href="#" role="tab" aria-controls="settings">
                Total Day of Commits<span class="badge badge-primary badge-pill" style="float: right">{{ $total_date }}</span>
            </a>
            </div>                
        </div>
        
        <div class="col-8 pt-2">
            <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">

                <div class="row">                                        
                    <div class="col-sm-6">
                        <div class="card" style="width: 18rem; margin-bottom: 20px">
                            <h5 class="card-header" style="background-color: #5489c2; color: white">Owner Profile</h5>
                            <div class="card-body">
                                <img class="card-img-top" src="{{ $author_avatar }}" alt="{{ $author_name }}">
                                <div class="card-body">
                                    <h5 class="card-title" style="text-align: center">{{ $author_name }}</h5> 
                                    <br>
                                    <div style="text-align: center">                                        
                                        <a href="{{ $author_github_url }}" target="_blank" class="btn btn-dark">
                                            <img src="{{ asset('Arsha/assets/img/GitHub-Mark-Light-32px.png') }}" alt="Github logo">
                                            <span style="margin-left: 7px"> Your GitHub</span>                                            
                                        </a>
                                    </div>                                                           
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="card" style="margin-bottom: 20px">
                        <h5 class="card-header" style="background-color: #5489c2; color: white">Repository Profile</h5>
                        <div class="card-body">
                            <h5 class="card-title">{{ $repo_name }}</h5>
                            <p class="card-text">{{ $author_repo_desc }}</p>
                            {{-- <p class="card-text">{{ $author_repo_lang }}</p>   --}}
                            @php
                                $lang = strtolower($author_repo_lang);
                                if ($lang == "c++")
                                {
                                    $lang = "cpp";
                                }
                            @endphp

                            @if($lang != null)
                                <p class="card-text" style="margin-top: 10px; margin-bottom: 0px;">
                                    <small class="text-muted">
                                        Build with <i class="programming lang-{{ $lang }}" style="width: 32px; height: 32px; margin-left: 5px"></i>
                                    </small>                            
                                </p>                                   
                            @endif
                         
                            <p class="card-text" style="margin-top: 10px"><small class="text-muted">Last updated {{ $author_local_date }}</small></p>

                        </div>
                      </div>
                    </div>
                </div>

            </div>

            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">

                @php
                    $index_object = 0;    
                @endphp                

                {{-- Table luar --}}
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th width="5%" style="text-align: center">No</th>
                            <th width="95%">Date</th>
                        </tr>
                    </thead>
                    <tbody>                        

                        @for($j = 1; $j <= $total_date; $j++)
                            @php
                                $date_display = new DateTime($array_date_unique[$j]);
                                $date_display = $date_display->format("jS F Y");
                            @endphp

                                    {{-- tr dan td nya table luar --}}
                                    <tr>
                                        <td style="text-align: center">{{ $j }}</td>
                                        <td>
                                            <button class="accordion">{{ $date_display }}</button>
                                            <div class="panel">
                                                                     
                                                {{-- Table dalam --}}
                                                <table class="table table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%" style="text-align: center">No</th>                                                            
                                                            <th width="70%">Message</th>
                                                            <th width="25%">Committer</th>                         
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for ($i = 1; $i <= $array_count_values[$array_date_unique[$j]]; $i++)
                                                            @php
                                                                $array_message = array();
                                                                $tok = strtok($array_date_object[$index_object]->message, "\n");
                                                                while ($tok !== false) {            
                                                                    array_push($array_message, $tok);
                                                                    $tok = strtok("\n");
                                                                }           
                                                                $index_message = 0;                             
                                                            @endphp
                                                            <tr>                                        
                                                                <td style="text-align: center">{{ $i }}</td>
                                                                <td>
                                                                    @foreach ($array_message as $message)
                                                                        @if ($index_message != 0)
                                                                            <i><small>{{ $message }}</small></i>
                                                                        @else
                                                                            {{ $message }}
                                                                            @php
                                                                                $index_message = 1;
                                                                            @endphp
                                                                        @endif
                                                                        <br>
                                                                    @endforeach
                                                                </td>                            
                                                                <td>
                                                                    {{ $array_date_object[$index_object]->commiter }}
                                                                    <img style="height: 25px; width: 25px;" class="rounded-circle" src="{{ $array_date_object[$index_object]->avatar }}" alt="{{ $array_date_object[$index_object]->commiter }} picture">
                                                                </td>                                        
                                                            </tr>
                                                            @php
                                                                $index_object++;    
                                                            @endphp
                                                        @endfor                                              
                                                    </tbody>                
                                                </table>                         

                                            </div>                                    
                                        </td>
                                    </tr>
        
                        @endfor
                    </tbody>
                </table>                        

                <br>
                
            </div>
            
            </div>
        </div>  
                                            
    </div>
</div>

@endsection
