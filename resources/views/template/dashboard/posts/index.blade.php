@extends('template.dashboard.layouts.main')
@section('container')
    <div class="content-wrapper">
      <div class="row">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert"> 
                    <i class="menu-icon mdi mdi-check-circle"></i>
                    <strong>{{ session('success') }}</strong> Thank you for your contribution
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="col-lg-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Posts</h4>
                  <a type="button" class="btn btn-primary btn-icon-text mt-3" href="/dashboard/posts/create">
                    <i class="menu-icon mdi mdi-library-plus text-decoration-none fst-normal">
                      <span class="ms-2">Add new post</span>
                    </i>
                  </a>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($posts as $post) 
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>
                                <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-inverse-primary btn-sm btn-fw">Show</a>
                                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-inverse-warning btn-sm btn-fw mx-2">Edit</a>
                                <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                                  @method('delete')
                                  @csrf
              
                                  <button class="btn btn-inverse-danger btn-sm btn-fw" onclick="return confirm('Are you sure to delete this post ?')">
                                    Delete
                                  </button>
                                </form>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection