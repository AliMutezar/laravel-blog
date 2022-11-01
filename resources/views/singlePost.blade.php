@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="mb-3">{{ $postingan->title }}</h3>
                <p>By <a href="/posts?author={{ $postingan->author->username }}" class="text-decoration-none">{{ $postingan->author->name }}</a> - <a href="/posts?category={{ $postingan->category->slug }}" class="text-decoration-none">{{ $postingan->category->name }}</a></p>

                @if ($postingan->image)
                    <img src="{{ asset('storage/' . $postingan->image) }}" style="max-height: 400px; overflow:hidden;" class="img-fluid"
                        alt="{{ $postingan->category->name }}">
                @else
                    <img src="https://source.unsplash.com/1200x400/?{{ $postingan->category->name }}" class="img-fluid"
                        alt="{{ $postingan->category->name }}">
                @endif
    
                <article class="my-3">
                    {!! $postingan->body !!}
                </article>
                <a href="/posts"
                    class="text-decoration-none btn text-success d-flex align-items-center gap-1">
                    <i class="bi bi-arrow-left-short fs-5"></i>Back to other posts
                </a>
            </div>
        </div>
    </div>
@endsection