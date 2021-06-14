@extends('layouts.app-inner')

@section('title', 'PI Score')

@section('content')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
          <div class="container">
    
            <ol>
              <li><a href="/">Home</a></li>
              <li>PI Score</li>
            </ol>
            <h2>PI Score</h2>
    
          </div>
        </section><!-- End Breadcrumbs -->
    
        <section class="inner-page">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-md-8 col-lg-6 pb-5">                    
                
                <form action="/project/main/apimain" method="post">
                @csrf
                    <div class="card border-primary rounded-0">
                        <div class="card-header p-0">
                            <div class="bg-info text-white text-center py-2">
                                <h3><i class="fa fa-github"></i>Github Commits Counter</h3>
                                <p class="m-0">Integrative Programming Score</p>
                            </div>
                        </div>
                        <div class="card-body p-3">

                            <!--Body-->
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-key text-info"></i></div>
                                    </div>
                                    <input type="password" class="form-control" id="token" name="token" placeholder="Personal Access Token" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-calendar text-info"></i></div>
                                    </div>
                                    {{-- <input type="date" class="form-control" id="nombre" name="start_date" placeholder="MM/DD/YYYY" onfocus="(this.type='date')" required> --}}
                                    <input placeholder="Start Date" class="form-control" type="text" onfocus="(this.type='date')" id="start_date" name="start_date" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-calendar text-info"></i></div>
                                    </div>
                                    {{-- <input type="date" class="form-control" id="nombre" name="end_date" placeholder="MM/DD/YYYY" onfocus="(this.type='date')" required> --}}
                                    <input placeholder="End Date" class="form-control" type="text" onfocus="(this.type='date')" id="end_date" name="end_date" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-user-plus text-info"></i></div>
                                    </div>
                                    <textarea class="form-control" name="repos_name" placeholder="Repository name (more than one)" required></textarea>
                                </div>
                            </div>

                            <div style="text-align: center">
                                <a href="https://docs.github.com/en/github/authenticating-to-github/creating-a-personal-access-token" target="_blank">
                                    <i>How to get your Token</i>
                                </a>
                            </div>

                            <br>
                            <div class="text-center">
                                <input type="submit" value="Submit" class="btn btn-info btn-block rounded-0 py-2" data-toggle="modal" data-target="#exampleModalCenter">
                            </div>
                            <br>
                        </div>

                    </div>
                </form>                          
          
                </div>
            </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Please Wait...</h5>
                            {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> --}}
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <div class="spinner-border text-primary" style="width: 10rem; height: 10rem;" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>                        
                                </div>
                            </div>
                            <div class="modal-footer" style="text-align: center">
                            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>                 --}}                                
                                If error occure, try again with less input                                                    
                            </div>
                        </div>
                    </div>
                </div>
          </div>
        </section>
    
    </main><!-- End #main -->        
@endsection