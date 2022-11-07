@extends('layouts.main')

@section('container')
    <div class="row py-5 border-dark border-bottom justify-content-center mt-5">
        <div class="col-lg-3">
            <lottie-player src="/lottie/book.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
        </div>
        <div class="col-lg-6 text-center">
            <h1 class="fs-1">Stay Curious.</h1>
            <h4 class="mt-4 text-poppins">Discover stories, thinking, and expertise <br /> from writers on any topic</h4>
            <button class="btn-get-started rounded-pill px-5 py-1 mt-5 text-poppins">Start Reading</button>
        </div>
        <div class="col-lg-3">
            <lottie-player src="/lottie/book.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
        </div>
    </div>

    <div class="row mt-5 justify-content-center">
        <div class="col-lg-8 sticky mb-5">
            <p class="small fw-semibold">DISCOVER MORE OF WHAT MATTERS TO YOU</p>
            <div class="text-poppins">
                <a href="" role="button" class="btn btn-light my-2 me-2 border">Architecture</a>
                <a href="" role="button" class="btn btn-light my-2 me-2 border">Web Design</a>
                <a href="" role="button" class="btn btn-light my-2 me-2 border">Personal</a>
                <a href="" role="button" class="btn btn-light my-2 me-2 border">Artificial Intelligence</a>
                <a href="" role="button" class="btn btn-light my-2 me-2 border">Technology</a>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="col d-flex align-item-center">
                <img src="/img/person.jpg" class="img-fluid person rounded-pill" alt="person">
                <div class="row text-poppins">
                    <p class="ms-3">Ali Mutezar in Web Design</p>
                </div>
            </div>
            <div class="col d-flex mb-5">
                <div class="row">
                    <div class="col-8">
                        <h5 class="fw-semibold">Blejarar Laravel Sampai Mahir</h5>
                        <p class="text-secondary text-poppins">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem officiis quo totam!</p>
                        <span class="small text-poppins text-secondary"> 
                            29 Oct <i class="bi bi-dot"></i> 
                            <span class="read-more">Lanjutin bacanya <i class="bi bi-arrow-right"></i> </span> 
                        </span>
                    </div>
                    <div class="col-4 me-auto">
                        <img src="/img/hero-book.jpg" class="img-fluid thumbnail rounded" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection