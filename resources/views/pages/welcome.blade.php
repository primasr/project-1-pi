@extends('layouts.app')

@section('title', 'Github Commits Counter')

@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
            <h1>Github Commits Counter</h1>
            <h2>Awesome app that can count your total commits, total day of commits, and manymore!</h2>
            <div class="d-lg-flex">
            <a href="#team" class="btn-get-started scrollto">Get Started</a>
            {{-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true"> Watch Video <i class="icofont-play-alt-2"></i></a> --}}
            </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
            <img src="{{ asset('Arsha/assets/img/Octocat.png') }}" class="img-fluid animated" alt="">
        </div>
        </div>
    </div>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">
    
            <div class="section-title">
                <h2>Features</h2>
                {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
            </div>
    
            <div class="row">
    
                <div class="col-lg-6">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                    <div class="pic">
                        <a href="/project/public">
                           <img src="{{ asset('Arsha/assets/img/team/GitHub-black2.png') }}" class="img-fluid" alt=""> 
                        </a>                        
                    </div>
                    <div class="member-info">
                    <a href="/project/public">
                        <h4>Public Repository</h4>
                    </a>
                    <span>Free Pass</span>
                    <p>See your repository status without any authentication.</p>
                    <p>But, you can only use this for public repository and <b>limited to 30 usage per hour</b></p>
                    </div>
                </div>
                </div>
    
                <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
                    <div class="pic">
                        <a href="/project/private">
                            <img src="{{ asset('Arsha/assets/img/team/GitHub-red2.png') }}" class="img-fluid" alt="">
                        </a>                        
                    </div>
                    <div class="member-info">
                    <a href="/project/private">
                        <h4>Private Repository</h4>
                    </a>
                    <span>Require Authentication</span>
                    <p>Authentication makes you look cool. So, you can usage this features <b>as long as you want</b></p>
                    <p>Not limited at Private Repo, you can also use this at Public Repo</p>
                    </div>
                </div>
                </div>        

            </div>

            <div class="row justify-content-center">
                <div class="col-lg-6 mt-4 justify-content-center">
                    <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
                        <div class="pic">
                            <a href="/project/main">
                                <img src="{{ asset('Arsha/assets/img/team/PI.jpg') }}" class="img-fluid" alt="">
                            </a>                            
                        </div>
                        <div class="member-info">
                        <a href="/project/main">
                            <h4>Integrative Programming Score</h4>
                        </a>
                        <span>Count Score</span>
                        <p>Lemme count your Integrative Programming score from your repository status</p>
                        <p>Sst... the calculation is secret</p>
                        </div>
                    </div>
                    </div>
            </div>

                {{-- <div class="col-lg-6 mt-4">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
                    <div class="pic"><img src="{{ asset('Arsha/assets/img/team/team-4.jpg') }}" class="img-fluid" alt=""></div>
                    <div class="member-info">
                    <h4>Amanda Jepson</h4>
                    <span>Accountant</span>
                    <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                    <div class="social">
                        <a href=""><i class="ri-twitter-fill"></i></a>
                        <a href=""><i class="ri-facebook-fill"></i></a>
                        <a href=""><i class="ri-instagram-fill"></i></a>
                        <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                    </div>
                    </div>
                </div>
                </div> --}}
    
            </div>
        </section><!-- End Team Section -->

    </main><!-- End #main -->
@endsection