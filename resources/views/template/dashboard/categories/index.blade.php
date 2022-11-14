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
                    <h4 class="card-title">All Categories</h4>
                    <a type="button" class="btn btn-primary btn-icon-text mt-3" href="/dashboard/categories/create">
                        <i class="menu-icon mdi mdi-library-plus text-decoration-none fst-normal">
                            <span class="">Add new category</span>
                        </i>
                    </a>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Category Name</th>
                            <th>Category Slug</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                        
                                    <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-inverse-warning btn-sm btn-fw me-2">Edit</a>
                                    <form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                    
                                        <button class="btn btn-inverse-danger btn-sm btn-fw" onclick="return confirm('Are you sure to delete this category ?')">
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