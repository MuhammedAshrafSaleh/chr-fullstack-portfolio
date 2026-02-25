@extends('admin.layouts.layout')

@section('title', 'Blogs')

@section('content')
    <div class="main-content">

        <div class="section-body">

            {{-- ══════════════════════════════════════
            ALERTS
            ══════════════════════════════════════ --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Please fix the following errors:</strong>
                    <ul class="mb-0 mt-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            {{-- ══════════════════════════════════════
            TABLE CARD
            ══════════════════════════════════════ --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">All Blog Posts</h4>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#createBlogModal">
                                <i class="fas fa-plus mr-1"></i> Add New Post
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Excerpt</th>
                                            <th>Author</th>
                                            <th>Published At</th>
                                            <th>Image</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $blog)
                                            <tr>
                                                <td>{{ $blog->id }}</td>
                                                <td>{{ $blog->getTranslation('title', app()->getLocale()) }}</td>
                                                <td>{{ $blog->getTranslation('slug', app()->getLocale()) }}</td>
                                                <td>{{ Str::limit($blog->getTranslation('excerpt', app()->getLocale()), 60) }}
                                                </td>
                                                <td>{{ $blog->getTranslation('author_name', app()->getLocale()) }}</td>
                                                <td>
                                                    @if ($blog->published_at)
                                                        <span class="badge badge-success">
                                                            {{ $blog->published_at->format('Y-m-d H:i') }}
                                                        </span>
                                                    @else
                                                        <span class="badge badge-secondary">Draft</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($blog->image)
                                                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image"
                                                            width="60" height="60" style="object-fit:cover; border-radius:4px;">
                                                    @else
                                                        <span class="text-muted">No image</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                        data-target="#editModal{{ $blog->id }}" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#deleteModal{{ $blog->id }}" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            {{-- ════════════════════════
                                            EDIT MODAL
                                            ════════════════════════ --}}
                                            <div class="modal fade" id="editModal{{ $blog->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="editModalLabel{{ $blog->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content"
                                                        style="max-height: 90vh; display: flex; flex-direction: column;">

                                                        <div class="modal-header" style="flex-shrink: 0;">
                                                            <h5 class="modal-title" id="editModalLabel{{ $blog->id }}">
                                                                <i class="fas fa-edit mr-1"></i> Edit Blog Post —
                                                                #{{ $blog->id }}
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span>&times;</span>
                                                            </button>
                                                        </div>

                                                        <form action="{{ route('admin.blogs.update', $blog->id) }}"
                                                            method="POST" enctype="multipart/form-data"
                                                            style="display: flex; flex-direction: column; flex: 1; overflow: hidden;">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="modal-body" style="overflow-y: auto; flex: 1;">

                                                                {{-- Title EN --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Title <span class="badge badge-success">EN</span>
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <input type="text" name="title[en]"
                                                                            class="form-control @error('title.en') is-invalid @enderror"
                                                                            value="{{ old('title.en', $blog->getTranslation('title', 'en')) }}"
                                                                            placeholder="Title in English" required>
                                                                        @error('title.en')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Title AR --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Title <span class="badge badge-warning">AR</span>
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <input type="text" name="title[ar]"
                                                                            class="form-control @error('title.ar') is-invalid @enderror"
                                                                            value="{{ old('title.ar', $blog->getTranslation('title', 'ar')) }}"
                                                                            placeholder="العنوان بالعربية" dir="rtl" required>
                                                                        @error('title.ar')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Slug EN --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Slug <span class="badge badge-success">EN</span>
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <input type="text" name="slug[en]"
                                                                            id="slug-en-edit{{ $blog->id }}"
                                                                            class="form-control @error('slug.en') is-invalid @enderror"
                                                                            value="{{ old('slug.en', $blog->getTranslation('slug', 'en')) }}"
                                                                            placeholder="slug-in-english" required>
                                                                        @error('slug.en')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Slug AR --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Slug <span class="badge badge-warning">AR</span>
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <input type="text" name="slug[ar]"
                                                                            id="slug-ar-edit{{ $blog->id }}"
                                                                            class="form-control @error('slug.ar') is-invalid @enderror"
                                                                            value="{{ old('slug.ar', $blog->getTranslation('slug', 'ar')) }}"
                                                                            placeholder="الرابط-بالعربية" dir="rtl" required>
                                                                        @error('slug.ar')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Excerpt EN --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Excerpt <span class="badge badge-success">EN</span>
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <textarea name="excerpt[en]" rows="3"
                                                                            class="form-control @error('excerpt.en') is-invalid @enderror"
                                                                            placeholder="Short summary in English"
                                                                            required>{{ old('excerpt.en', $blog->getTranslation('excerpt', 'en')) }}</textarea>
                                                                        @error('excerpt.en')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Excerpt AR --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Excerpt <span class="badge badge-warning">AR</span>
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <textarea name="excerpt[ar]" rows="3" dir="rtl"
                                                                            class="form-control @error('excerpt.ar') is-invalid @enderror"
                                                                            placeholder="ملخص قصير بالعربية"
                                                                            required>{{ old('excerpt.ar', $blog->getTranslation('excerpt', 'ar')) }}</textarea>
                                                                        @error('excerpt.ar')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Content EN (Summernote) --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Content <span class="badge badge-success">EN</span>
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <textarea name="content[en]"
                                                                            class="summernote-en-edit{{ $blog->id }} @error('content.en') is-invalid @enderror">{{ old('content.en', $blog->getTranslation('content', 'en')) }}</textarea>
                                                                        @error('content.en')
                                                                            <div class="invalid-feedback d-block">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Content AR (Summernote RTL) --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Content <span class="badge badge-warning">AR</span>
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <textarea name="content[ar]" dir="rtl"
                                                                            class="summernote-ar-edit{{ $blog->id }} @error('content.ar') is-invalid @enderror">{{ old('content.ar', $blog->getTranslation('content', 'ar')) }}</textarea>
                                                                        @error('content.ar')
                                                                            <div class="invalid-feedback d-block">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Author Name EN --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Author Name <span class="badge badge-success">EN</span>
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <input type="text" name="author_name[en]"
                                                                            class="form-control @error('author_name.en') is-invalid @enderror"
                                                                            value="{{ old('author_name.en', $blog->getTranslation('author_name', 'en')) }}"
                                                                            placeholder="Author name in English">
                                                                        @error('author_name.en')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Author Name AR --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Author Name <span class="badge badge-warning">AR</span>
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <input type="text" name="author_name[ar]"
                                                                            class="form-control @error('author_name.ar') is-invalid @enderror"
                                                                            value="{{ old('author_name.ar', $blog->getTranslation('author_name', 'ar')) }}"
                                                                            placeholder="اسم الكاتب بالعربية" dir="rtl">
                                                                        @error('author_name.ar')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Published At --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Published At
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <input type="datetime-local" name="published_at"
                                                                            class="form-control @error('published_at') is-invalid @enderror"
                                                                            value="{{ old('published_at', optional($blog->published_at)->format('Y-m-d\TH:i')) }}">
                                                                        @error('published_at')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Image Upload --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Blog Image
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <div id="image-preview-edit{{ $blog->id }}"
                                                                            class="image-preview" @if ($blog->image)
                                                                                style="background-image: url('{{ asset('storage/' . $blog->image) }}'); background-size: cover; background-position: center;"
                                                                            @endif>
                                                                            <label for="image-upload-edit{{ $blog->id }}">
                                                                                {{ $blog->image ? 'Change Image' : 'Choose File' }}
                                                                            </label>
                                                                            <input type="file" name="image"
                                                                                id="image-upload-edit{{ $blog->id }}"
                                                                                accept="image/*">
                                                                        </div>
                                                                        @error('image')
                                                                            <small class="text-danger">{{ $message }}</small>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                            </div>{{-- end modal-body --}}

                                                            <div class="modal-footer bg-whitesmoke br-0"
                                                                style="flex-shrink: 0;">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="fas fa-save mr-1"></i> Update Post
                                                                </button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- ════════════════════════
                                            DELETE MODAL
                                            ════════════════════════ --}}
                                            <div class="modal fade" id="deleteModal{{ $blog->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="deleteModalLabel{{ $blog->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel{{ $blog->id }}">
                                                                <i class="fas fa-trash mr-1 text-danger"></i> Delete Blog
                                                                Post
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span>&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete:</p>
                                                            <p class="font-weight-bold text-dark">
                                                                "{{ $blog->getTranslation('title', 'en') }}"
                                                            </p>
                                                            <p class="text-muted small">This action
                                                                <strong>cannot</strong> be undone.
                                                            </p>
                                                        </div>

                                                        <div class="modal-footer bg-whitesmoke br-0">
                                                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger">
                                                                    <i class="fas fa-trash mr-1"></i> Yes, Delete
                                                                </button>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>{{-- end table-responsive --}}

                            <div class="d-flex justify-content-end mt-3">
                                {{ $blogs->links() }}
                            </div>

                        </div>{{-- end card-body --}}
                    </div>{{-- end card --}}
                </div>
            </div>

        </div>{{-- end section-body --}}

        {{-- ══════════════════════════════════════════
        CREATE MODAL
        ══════════════════════════════════════════ --}}
        <div class="modal fade" id="createBlogModal" tabindex="-1" role="dialog" aria-labelledby="createBlogModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">

                    <div class="modal-header" style="flex-shrink: 0;">
                        <h5 class="modal-title" id="createBlogModalLabel">
                            <i class="fas fa-plus mr-1"></i> Add New Blog Post
                        </h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data"
                        style="display: flex; flex-direction: column; flex: 1; overflow: hidden;">
                        @csrf

                        <div class="modal-body" style="overflow-y: auto; flex: 1;">

                            {{-- Title EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Title <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title[en]" id="title-en-create"
                                        class="form-control @error('title.en') is-invalid @enderror"
                                        value="{{ old('title.en') }}" placeholder="Title in English" required>
                                    @error('title.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Title AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Title <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title[ar]" id="title-ar-create"
                                        class="form-control @error('title.ar') is-invalid @enderror"
                                        value="{{ old('title.ar') }}" placeholder="العنوان بالعربية" dir="rtl" required>
                                    @error('title.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Slug EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Slug <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="slug[en]" id="slug-en-create"
                                        class="form-control @error('slug.en') is-invalid @enderror"
                                        value="{{ old('slug.en') }}" placeholder="slug-in-english" required>
                                    @error('slug.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Slug AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Slug <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="slug[ar]" id="slug-ar-create"
                                        class="form-control @error('slug.ar') is-invalid @enderror"
                                        value="{{ old('slug.ar') }}" placeholder="الرابط-بالعربية" dir="rtl" required>
                                    @error('slug.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Excerpt EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Excerpt <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="excerpt[en]" rows="3"
                                        class="form-control @error('excerpt.en') is-invalid @enderror"
                                        placeholder="Short summary in English" required>{{ old('excerpt.en') }}</textarea>
                                    @error('excerpt.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Excerpt AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Excerpt <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="excerpt[ar]" rows="3" dir="rtl"
                                        class="form-control @error('excerpt.ar') is-invalid @enderror"
                                        placeholder="ملخص قصير بالعربية" required>{{ old('excerpt.ar') }}</textarea>
                                    @error('excerpt.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Content EN (Summernote) --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Content <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="content[en]"
                                        class="summernote-en @error('content.en') is-invalid @enderror">{{ old('content.en') }}</textarea>
                                    @error('content.en')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Content AR (Summernote RTL) --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Content <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="content[ar]" dir="rtl"
                                        class="summernote-ar @error('content.ar') is-invalid @enderror">{{ old('content.ar') }}</textarea>
                                    @error('content.ar')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Author Name EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Author Name <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="author_name[en]"
                                        class="form-control @error('author_name.en') is-invalid @enderror"
                                        value="{{ old('author_name.en') }}" placeholder="Author name in English">
                                    @error('author_name.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Author Name AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Author Name <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="author_name[ar]"
                                        class="form-control @error('author_name.ar') is-invalid @enderror"
                                        value="{{ old('author_name.ar') }}" placeholder="اسم الكاتب بالعربية" dir="rtl">
                                    @error('author_name.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Published At --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Published At
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="datetime-local" name="published_at"
                                        class="form-control @error('published_at') is-invalid @enderror"
                                        value="{{ old('published_at') }}">
                                    @error('published_at')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Image Upload --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Blog Image
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview-create" class="image-preview">
                                        <label for="image-upload-create">Choose File</label>
                                        <input type="file" name="image" id="image-upload-create" accept="image/*">
                                    </div>
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>{{-- end modal-body --}}

                        <div class="modal-footer bg-whitesmoke br-0" style="flex-shrink: 0;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-plus mr-1"></i> Create Post
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>{{-- end main-content --}}
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {

            // ── Summernote Init — CREATE modal ──────────────────────────────
            $('#createBlogModal').on('shown.bs.modal', function () {
                $('.summernote-en').summernote('destroy');
                $('.summernote-en').summernote({
                    height: 300,
                    dialogsInBody: true,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['link', 'picture']],
                        ['view', ['fullscreen', 'codeview']],
                    ]
                });

                $('.summernote-ar').summernote('destroy');
                $('.summernote-ar').summernote({
                    height: 300,
                    direction: 'rtl',
                    dialogsInBody: true,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['link', 'picture']],
                        ['view', ['fullscreen', 'codeview']],
                    ]
                });
            });


            // ── Summernote Init — EDIT modals ────────────────────────────────
            @foreach ($blogs as $blog)
                $('#editModal{{ $blog->id }}').on('shown.bs.modal', function () {
                    $('.summernote-en-edit{{ $blog->id }}').summernote('destroy');
                    $('.summernote-en-edit{{ $blog->id }}').summernote({
                        height: 300,
                        dialogsInBody: true,
                        toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'italic', 'underline']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['insert', ['link', 'picture']],
                            ['view', ['fullscreen', 'codeview']],
                        ]
                    });

                    $('.summernote-ar-edit{{ $blog->id }}').summernote('destroy');
                    $('.summernote-ar-edit{{ $blog->id }}').summernote({
                        height: 300,
                        direction: 'rtl',
                        dialogsInBody: true,
                        toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'italic', 'underline']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['insert', ['link', 'picture']],
                            ['view', ['fullscreen', 'codeview']],
                        ]
                    });
                });
            @endforeach

            // ── Slug auto-generate — CREATE (EN) ────────────────────────────
            $('#title-en-create').on('input', function () {
                const slug = $(this).val()
                    .toLowerCase()
                    .trim()
                    .replace(/\s+/g, '-')
                    .replace(/[^\w\-]+/g, '')
                    .replace(/\-\-+/g, '-');
                $('#slug-en-create').val(slug);
            });

            // ── Slug auto-generate — CREATE (AR) ────────────────────────────
            $('#title-ar-create').on('input', function () {
                const slug = $(this).val()
                    .trim()
                    .replace(/\s+/g, '-')
                    .replace(/[^\u0600-\u06FF\w\-]+/g, '')
                    .replace(/\-\-+/g, '-');
                $('#slug-ar-create').val(slug);
            });

            // ── Image preview — CREATE ───────────────────────────────────────
            $('#image-upload-create').on('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image-preview-create').css({
                            'background-image': 'url(' + e.target.result + ')',
                            'background-size': 'cover',
                            'background-position': 'center'
                        });
                        $('#image-preview-create label').text('Change Image');
                    };
                    reader.readAsDataURL(file);
                }
            });

            // ── Image preview — EDIT modals ──────────────────────────────────
            @foreach ($blogs as $blog)
                $('#image-upload-edit{{ $blog->id }}').on('change', function () {
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            $('#image-preview-edit{{ $blog->id }}').css({
                                'background-image': 'url(' + e.target.result + ')',
                                'background-size': 'cover',
                                'background-position': 'center'
                            });
                            $('#image-preview-edit{{ $blog->id }} label').text('Change Image');
                        };
                        reader.readAsDataURL(file);
                    }
                });
            @endforeach

            // ── Re-open create modal on validation fail ──────────────────────
            @if ($errors->any() && !old('_method'))
                $('#createBlogModal').modal('show');
            @endif

                                                        });
    </script>
@endpush