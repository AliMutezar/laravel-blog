@extends('template.dashboard.layouts.main')
@section('container')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create new categories</h4>

                        <form action="/dashboard/categories" class="forms-sample" method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="title" placeholder="Category Name" value="{{ old('title') }}">

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly value="{{ old('slug') }}">
                  
                                @error('slug')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex">
                                <button type="submit" class="btn btn-primary me-2 d-flex align-item-center">
                                    <i class="menu-icon mdi mdi-message-plus"></i>
                                    <span class="ms-2"></span> Create Category
                                </button>
                                <a href="/dashboard/categories" class="btn btn-light">Back to list</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection