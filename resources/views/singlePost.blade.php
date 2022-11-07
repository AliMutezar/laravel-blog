@extends('layouts.main')

@section('container')
    <div class="mt-6 row justify-content-center">
        <div class="col-md-8">
            <div class="d-inline-flex">
                <div class="flex-shrink-0 align-self-center">
                    <img src="/img/person.jpg" class="profile-img" alt="person">
                </div>
                <div class="flex-grow-1 ms-3">
                        <a href="/posts?author={{ $postingan->author->username }}" class="text-decoration-none text-yellow fw-semibold"> {{ $postingan->author->name }} </a>
                        <p class="small text-poppins text-secondary text-medium mt-1"> 
                            {{ $postingan->created_at->diffForHumans() }} <i class="ms-2 bi bi-star fst-normal">{!! "&nbsp;" !!} 23 likes</i>
                            <i class="ms-2 bi bi-share-fill fst-normal">{!! "&nbsp;" !!} share</i>
                        </p>
                </div>
            </div>

            <h3 class="mt-4 fw-bold">{{ $postingan->title }}</h3>
            <p class="text-poppins">Category <a href="/posts?category={{ $postingan->category->slug }}" class="text-decoration-none text-yellow">{{ $postingan->category->name }}</a></p>

            @if ($postingan->image)
                <img src="{{ asset('storage/' . $postingan->image) }}" class="img-fluid"
                    alt="{{ $postingan->category->name }}">
            @else
                <img src="https://source.unsplash.com/1200x400/?{{ $postingan->category->name }}" class="img-fluid"
                    alt="{{ $postingan->category->name }}">
            @endif

            <article class="my-3 text-poppins lh-lg my-5" style="text-align: justify;
            text-justify: inter-word;">
                {!! $postingan->body !!}
            </article>

            <div class="d-grid gap-2 text-poppins my-4">
                <a class="btn btn-yellow" href="/posts" role="button">Back to other posts</a>
            </div>
        </div>
    </div>
@endsection