@extends('layouts.main')

@section('container')

    {{-- Search --}}
    <div class="container">
        <h1 class="mb-3 text-center">{{ $title }}</h1>
        <div class="row mb-3 justify-content-center">
            <div class="col-md-6">
                <form action="/posts" method="get">

                    {{-- Nyisipin value category ke URL --}}
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}" />
                    @endif

                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}" />
                    @endif

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                        <button class="btn btn-danger" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    
    {{-- First Post --}}
    @if ($posts->count())
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card mb-3">

                        @if ($posts[0]->image)
                            <img src="{{ asset('storage/' . $posts[0]->image) }}" style="max-height: 400px; overflow:hidden;" class="img-fluid"
                                alt="{{ $posts[0]->category->name }}">
                        @else
                            <img src="https://source.unsplash.com/800x200/?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title"> 
                                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">
                                    {{ $posts[0]->title }}
                                </a>
                            </h5>
                            <p>
                                <small>
                                    By <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a>  - <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> 
                                    <span class="text-muted">{{ $posts[0]->created_at->diffForHumans() }}</span>
                                </small>
                            </p>
                            <p class="card-text">{{ $posts[0]->excerpt }}</p>
                            <a href="/posts/{{ $posts[0]->slug }}" class="text-capitalize text-decoration-none btn btn-sm btn-primary">read more</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="position-absolute px-3 py-2" style="background-color:rgba(0, 0, 0, 0.7)">
                                <a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a>
                            </div>

                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" style="max-height: 400px; overflow:hidden;" class="img-fluid"
                                    alt="{{ $post->category->name }}">
                            @else
                                <img src="https://source.unsplash.com/400x200/?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                            @endif
                            
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p>
                                    <small>
                                        By <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> 
                                        <span class="text-muted">{{ $post->created_at->diffForHumans() }}</span>
                                    </small>
                                </p>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="/posts/{{ $post->slug }}" class="btn btn-primary text-capitalize">read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
    @else
        <p class="text-center fs-4">Post Not Found Nih</p>
    @endif

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
    
@endsection