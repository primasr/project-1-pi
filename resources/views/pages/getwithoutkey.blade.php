@extends('layouts.app-inner')

@section('title', 'Public Repo')

@section('content')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
          <div class="container">
    
            <ol>
              <li><a href="/">Home</a></li>
              <li>Public Repo</li>
            </ol>
            <h2>Public Repo</h2>
    
          </div>
        </section><!-- End Breadcrumbs -->
    
        <section class="inner-page">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-md-8 col-lg-6 pb-5">                    
                
                <form action="/project/public/apiwithoutkey" method="post">
                @csrf
                    <div class="card border-primary rounded-0">
                        <div class="card-header p-0">
                            <div class="bg-info text-white text-center py-2">
                                <h3><i class="fa fa-github"></i>Github Commits Counter</h3>
                                <p class="m-0">Public Repository</p>
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
                                        <div class="input-group-text"><i class="fa fa-wrench text-info"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="repo_name" name="repo_name" placeholder="Repository name" required>
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                    </div>
                                    <textarea class="form-control" placeholder="Envianos tu Mensaje" required></textarea>
                                </div>
                            </div> --}}

                            <br>
                            <div class="text-center">
                                <input type="submit" value="Submit" class="btn btn-info btn-block rounded-0 py-2">
                            </div>
                            <br>
                        </div>

                    </div>
                </form>                          
          
                </div>
            </div>
          </div>
        </section>
    
    </main><!-- End #main -->        
@endsection