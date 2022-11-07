@extends('layouts.main')

{{-- Hero --}}
<div class="context text-center">
    <h1 class="text-black fw-semibold">Stay Curious.</h1>
    <h3 class="text-poppins mb-5 mt-3 sub-title">Discover stories, thinking, and expertise <br /> from writers on any topic</h3>
    <a class="btn-black rounded-pill px-5 py-2 text-poppins text-decoration-none" role="button" href="#target-read">Start Reading</a>
</div>

<div class="area" >
    <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
    </ul>
</div >

@section('container')

    <div class="row mt-5 justify-content-center">
        <div class="col-lg-8 sticky mb-3" id="target-read">
            <p class="small fw-semibold">DISCOVER MORE OF WHAT MATTERS TO YOU</p>
            {{-- Search --}}
    
            <form action="/posts" method="get">
    
                {{-- Nyisipin value category ke URL --}}
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}" />
                @endif

                {{-- Nyisipin value author ke URL --}}
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}" />
                @endif

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Post Title" name="search" value="{{ request('search') }}">
                    <button class="btn btn-black" type="submit">Search</button>
                </div>
            </form>

            <div class="text-poppins">
                @foreach ($categories as $category)
                    <a href="/posts?category={{ $category->slug }}" role="button" class="btn btn-light my-2 me-2 border">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

            <div class="text-center mt-5">
                @if ($title)
                    <p class="mb-3">{{ $title }}</p>
                @else
                    <p></p>
                @endif
            </div>
            
            @if ($posts->count())
                @foreach ($posts as $post)  
                    <div class="row border-dark mt-4">
                        {{-- Profile --}}
                        <div class="col">
                            <div class="d-inline-flex">
                                <div class="flex-shrink-0 align-self-center">
                                    <img src="/img/person.jpg" class="profile-img" alt="person">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none text-yellow fw-semibold"> {{ $post->author->name }} </a>
                                    
                                    {{-- <span>
                                            in<a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-yellow d-none d-sm-block"> {{$post->category->name }}</a>
                                    </span> --}}
                                    <p class="small text-poppins text-secondary text-medium mt-1"> 
                                        {{ $post->created_at->diffForHumans() }} <i class="ms-2 bi bi-star fst-normal">{!! "&nbsp;" !!} 23 <span class="d-none d-sm-block d-md-inline">likes</span></i>
                                        <i class="ms-2 bi bi-share-fill fst-normal d-none d-sm-block d-md-inline">{!! "&nbsp;" !!} share</i>
                                    </p>
                                </div>
                            </div>

                            <div class="mb-5">
                                <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-black">
                                    <h5 class="fw-bold title-moile mt-3">{{ $post->title }}</h5>
                                </a>
                                <p class="text-secondary text-poppins mt-3 d-none d-sm-block text-medium">{{ $post->excerpt }}</p>
                                <p class="text-poppins text-secondary text-medium">
                                    <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-yellow fw-semibold">Read More <i class="ms-2 bi bi-arrow-right"></i> </a>
                                </p>
                            </div>
                        </div>
    
                        {{-- Spill Posting --}}
                        <div class="col-5 mb-5 d-flex justify-content-end">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid thumbnail shadow-lg"
                                    alt="{{ $post->category->name }}">
                            @else
                                <img src="https://source.unsplash.com/400x200/?{{ $post->category->name }}" class="img-fluid thumbnail shadow-lg" alt="{{ $post->category->name }}">
                            @endif
                        </div>
                    </div>

                @endforeach
            @else
                <p class="text-center fs-4">Post Not Found</p>
            @endif
        </div>


    </div>
    
    {{-- Pagination --}}
    <div class="d-flex justify-content-center text-poppins my-5">
        {{ $posts->links() }}
    </div>
    
@endsection