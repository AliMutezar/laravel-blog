@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h3 class="mb-3">{{ $post->title }}</h3>

            <div class="mb-3 d-flex gap-5">
                <a href="/dashboard/posts"
                    class="text-decoration-none btn text-success d-flex align-items-center gap-1">
                    <span data-feather="arrow-left"></span>Back to my posts
                </a>
                <a href="" class="text-decoration-none btn text-warning d-flex align-items-center gap-1">
                    <span data-feather="edit"></span>Edit post
                </a>
                <a href="" class="text-decoration-none btn text-danger d-flex align-items-center gap-1">
                    <span data-feather="trash"></span> Delete post
                </a>
            </div>

            <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" class="img-fluid"
                alt="{{ $post->category->name }}">

            <article class="my-3">
                {!! $post->body !!}
            </article>
            <a href="/posts" class="d-block mt-3">Back to Post</a>
        </div>
    </div>
</div>
@endsection