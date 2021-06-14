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
        
        <div class="col-4 pt-2">
            <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
            </div>
        </div>
        <div class="col-8 pt-2">
            <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">Hallo</div>
            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">Apa kabs</div>
            <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://avatars.githubusercontent.com/u/73151849?s=400&u=ded5034c9e8a9495a57d159ac2132d0eb3db91a0&v=4" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
            </div>
        </div>     
                        
        <i class="programming lang-javascript" style="width: 30px; height: 30px"></i>
        <i class="programming lang-cpp"></i>
        <i class="programming lang-typescript"></i>
        <i class="programming lang-python"></i>
        <i class="programming lang-kotlyn"></i>
        
        <div class="col-6 pt-2">
            <a href="../" class="btn btn-outline-primary btn-sm">Go back</a>
            <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                <h1 class="display-4">Create a New Post</h1>
                <p>Fill and submit this form to create a post</p>

                <hr>

                <form action="tes/hmm" method="POST">
                    @csrf
                    <div class="row">
                        <div class="control-group col-12 mt-2">
                            <label for="repos_name">Post Repos Name</label>
                            <textarea id="repos_name" class="form-control" name="repos_name" placeholder="Enter Post Repos Name"
                                      rows="" required></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="control-group col-6 text-center">
                            <button id="btn-submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                Create Post
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Please Wait</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="spinner-border text-primary" style="width: 10rem; height: 10rem;" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>                        
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>                
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection