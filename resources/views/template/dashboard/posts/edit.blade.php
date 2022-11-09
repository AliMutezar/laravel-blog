@extends('template.dashboard.layouts.main')
@section('container')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit new post</h4>

                    {{-- karena pake route resource, form method post ini akan otomatis mengarah ke method store di DashboardPostController --}}
                    <form class="forms-sample" method="POST" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Post Title" value="{{ old('title', $post->title) }}" required>

                            @error('title')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly value="{{ old(('slug'), $post->slug) }}" required>
              
                            @error('slug')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
              
                        <div class="form-group">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" name="category_id">
                                @foreach ($categories as $category)
                                    @if (old('category_id', $post->category_id) == $category->id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="formFile" class="form-label">Post Image</label>
                            <input type="hidden" name="oldImage" value="{{ $post->image }}">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" style="max-height: 200px; overflow:hidden;" class="img-preview img-fluid d-block mb-3"
                                    alt="{{ $post->category->name }}">
                            @else
                                <img class="img-preview img-fluid mb-3 col-sm-4">
                            @endif

                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">

                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                
                        <div class="form-group">
                            <label for="body" class="form-label">Body</label>
                            <input id="body" type="hidden" name="body" value="{{ old(('body'), $post->body) }}">
                            <trix-editor input="body"></trix-editor>
                            @error('body')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary me-2 d-flex align-item-center">
                                <i class="menu-icon mdi mdi-message-plus"></i>
                                <span class="ms-2"></span> Update Post
                            </button>
                            <a href="/dashboard/posts" class="btn btn-light">Back to posts</a>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");

        title.addEventListener("change", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g,"-");
            slug.value = preslug.toLowerCase();
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });


        // preview Image
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview')

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result
            }
        }

    </script>
@endsection