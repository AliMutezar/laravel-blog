@extends('template.dashboard.layouts.main')
@section('container')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-10 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-inline-flex">
                        <div class="flex-shrink-0 align-self-center">
                            <img src="/img/person.jpg" class="profile-img" style="height: 45px; 
                            width: 50px;
                            border-radius: 50%;" alt="person">
                        </div>
                        <div class="flex-grow-1 ms-3">
                                <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none text-warning fw-semibold"> {{ $post->author->name }} </a>
                                <p class="small text-poppins text-secondary text-medium mt-1"> 
                                    {{ $post->created_at->diffForHumans() }} <i class="ms-2 bi bi-star fst-normal">{!! "&nbsp;" !!} 23 likes</i>
                                    <i class="ms-2 bi bi-share-fill fst-normal">{!! "&nbsp;" !!} share</i>
                                </p>
                        </div>
                    </div>

                    <div class="my-4 d-flex gap-5">
                        <a href="/dashboard/posts"
                            class="text-decoration-none btn text-success d-flex align-items-center gap-1">
                            <i class="mdi mdi-arrow-left menu-icon"></i>Back to my posts
                        </a>
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="text-decoration-none btn text-warning d-flex align-items-center gap-1">
                            <i class="mdi mdi mdi-pencil menu-icon"></i>Edit post
                        </a>
                        <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
        
                            <button class="btn text-danger d-flex align-items-center gap-1" onclick="return confirm('Are you sure to delete this post ?')">
                                <i class="mdi mdi-delete-variant"></i> Delete post
                            </button>
                        </form>
                    </div>
        
                    <h3 class="mt-4 fw-bold">{{ $post->title }}</h3>
                    <p class="text-poppins">Category <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-yellow">{{ $post->category->name }}</a></p>
        
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid"
                            alt="{{ $post->category->name }}">
                    @else
                        <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" class="img-fluid"
                            alt="{{ $post->category->name }}">
                    @endif
        
                    <article class="my-3 text-poppins lh-lg my-5" style="text-align: justify;
                    text-justify: inter-word;">
                        {!! $post->body !!}
                    </article>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection