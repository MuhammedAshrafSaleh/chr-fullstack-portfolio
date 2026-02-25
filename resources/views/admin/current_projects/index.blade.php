@extends('admin.layouts.layout')

@section('title', 'Current Projects')

@section('content')
    <div class="main-content">
        <div class="section-body">
            {{-- ══════ ALERTS ══════ --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
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
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                </div>
            @endif

            {{-- ══════ TABLE CARD ══════ --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">All Current Projects</h4>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                                <i class="fas fa-plus mr-1"></i> Add New
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Subtitle</th>
                                            <th>Location</th>
                                            <th>Size</th>
                                            <th>Status</th>
                                            <th>Project</th>
                                            <th>Image</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($currentProjects as $currentProject)
                                            <tr>
                                                <td>{{ $currentProject->id }}</td>
                                                <td>{{ $currentProject->getTranslation('title', app()->getLocale()) }}</td>
                                                <td>{{ $currentProject->getTranslation('subtitle', app()->getLocale()) }}</td>
                                                <td>{{ $currentProject->getTranslation('location', app()->getLocale()) }}</td>
                                                <td>{{ $currentProject->getTranslation('size', app()->getLocale()) }}</td>
                                                <td>
                                                    <span class="badge badge-primary">
                                                        {{ $currentProject->getTranslation('status', app()->getLocale()) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if ($currentProject->project)
                                                        {{ $currentProject->project->getTranslation('title', app()->getLocale()) }}
                                                    @else
                                                        <span class="text-muted">—</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($currentProject->image)
                                                        <img src="{{ asset('storage/' . $currentProject->image) }}" alt="Image"
                                                            width="60" height="60" style="object-fit:cover; border-radius:4px;">
                                                    @else
                                                        <span class="text-muted">No image</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                        data-target="#editModal{{ $currentProject->id }}" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#deleteModal{{ $currentProject->id }}" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            {{-- ════ EDIT MODAL ════ --}}
                                            <div class="modal fade" id="editModal{{ $currentProject->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content"
                                                        style="max-height:90vh;display:flex;flex-direction:column;">

                                                        <div class="modal-header" style="flex-shrink:0;">
                                                            <h5 class="modal-title">
                                                                <i class="fas fa-edit mr-1"></i> Edit Current Project —
                                                                #{{ $currentProject->id }}
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span>&times;</span>
                                                            </button>
                                                        </div>

                                                        <form
                                                            action="{{ route('admin.current_projects.update', $currentProject->id) }}"
                                                            method="POST" enctype="multipart/form-data"
                                                            style="display:flex;flex-direction:column;flex:1;overflow:hidden;">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="modal-body" style="overflow-y:auto;flex:1;">

                                                                {{-- Title EN --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Title <span class="badge badge-success">EN</span>
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <input type="text" name="title[en]"
                                                                            class="form-control @error('title.en') is-invalid @enderror"
                                                                            value="{{ old('title.en', $currentProject->getTranslation('title', 'en')) }}"
                                                                            placeholder="Title in English" required>
                                                                        @error('title.en')<div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>@enderror
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
                                                                            value="{{ old('title.ar', $currentProject->getTranslation('title', 'ar')) }}"
                                                                            placeholder="العنوان بالعربية" dir="rtl" required>
                                                                        @error('title.ar')<div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>@enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Subtitle EN --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Subtitle <span class="badge badge-success">EN</span>
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <input type="text" name="subtitle[en]"
                                                                            class="form-control @error('subtitle.en') is-invalid @enderror"
                                                                            value="{{ old('subtitle.en', $currentProject->getTranslation('subtitle', 'en')) }}"
                                                                            placeholder="Subtitle in English">
                                                                        @error('subtitle.en')<div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>@enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Subtitle AR --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Subtitle <span class="badge badge-warning">AR</span>
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <input type="text" name="subtitle[ar]"
                                                                            class="form-control @error('subtitle.ar') is-invalid @enderror"
                                                                            value="{{ old('subtitle.ar', $currentProject->getTranslation('subtitle', 'ar')) }}"
                                                                            placeholder="العنوان الفرعي بالعربية" dir="rtl">
                                                                        @error('subtitle.ar')<div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>@enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Description EN --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Description <span class="badge badge-success">EN</span>
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <textarea name="description[en]"
                                                                            class="form-control @error('description.en') is-invalid @enderror"
                                                                            rows="4" placeholder="Description in English"
                                                                            required>{{ old('description.en', $currentProject->getTranslation('description', 'en')) }}</textarea>
                                                                        @error('description.en')<div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>@enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Description AR --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Description <span class="badge badge-warning">AR</span>
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <textarea name="description[ar]"
                                                                            class="form-control @error('description.ar') is-invalid @enderror"
                                                                            rows="4" placeholder="الوصف بالعربية" dir="rtl"
                                                                            required>{{ old('description.ar', $currentProject->getTranslation('description', 'ar')) }}</textarea>
                                                                        @error('description.ar')<div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>@enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Location EN --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Location <span class="badge badge-success">EN</span>
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <input type="text" name="location[en]"
                                                                            class="form-control @error('location.en') is-invalid @enderror"
                                                                            value="{{ old('location.en', $currentProject->getTranslation('location', 'en')) }}"
                                                                            placeholder="Location in English" required>
                                                                        @error('location.en')<div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>@enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Location AR --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Location <span class="badge badge-warning">AR</span>
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <input type="text" name="location[ar]"
                                                                            class="form-control @error('location.ar') is-invalid @enderror"
                                                                            value="{{ old('location.ar', $currentProject->getTranslation('location', 'ar')) }}"
                                                                            placeholder="الموقع بالعربية" dir="rtl" required>
                                                                        @error('location.ar')<div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>@enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Size EN --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Size <span class="badge badge-success">EN</span>
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <input type="text" name="size[en]"
                                                                            class="form-control @error('size.en') is-invalid @enderror"
                                                                            value="{{ old('size.en', $currentProject->getTranslation('size', 'en')) }}"
                                                                            placeholder="e.g. 500 sqm" required>
                                                                        @error('size.en')<div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>@enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Size AR --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Size <span class="badge badge-warning">AR</span>
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <input type="text" name="size[ar]"
                                                                            class="form-control @error('size.ar') is-invalid @enderror"
                                                                            value="{{ old('size.ar', $currentProject->getTranslation('size', 'ar')) }}"
                                                                            placeholder="مثال: ٥٠٠ متر مربع" dir="rtl" required>
                                                                        @error('size.ar')<div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>@enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Status EN --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Status <span class="badge badge-success">EN</span>
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <input type="text" name="status[en]"
                                                                            class="form-control @error('status.en') is-invalid @enderror"
                                                                            value="{{ old('status.en', $currentProject->getTranslation('status', 'en')) }}"
                                                                            placeholder="e.g. In Progress" required>
                                                                        @error('status.en')<div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>@enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Status AR --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Status <span class="badge badge-warning">AR</span>
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <input type="text" name="status[ar]"
                                                                            class="form-control @error('status.ar') is-invalid @enderror"
                                                                            value="{{ old('status.ar', $currentProject->getTranslation('status', 'ar')) }}"
                                                                            placeholder="مثال: قيد التنفيذ" dir="rtl" required>
                                                                        @error('status.ar')<div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>@enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Project Dropdown --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Project
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <select name="project_id"
                                                                            class="form-control @error('project_id') is-invalid @enderror"
                                                                            required>
                                                                            <option value="">-- Select Project --</option>
                                                                            @foreach ($projects as $project)
                                                                                <option value="{{ $project->id }}" {{ old('project_id', $currentProject->project_id) == $project->id ? 'selected' : '' }}>
                                                                                    {{ $project->getTranslation('title', 'rn') }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('project_id')<div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>@enderror
                                                                    </div>
                                                                </div>

                                                                {{-- Image Upload --}}
                                                                <div class="form-group row mb-4">
                                                                    <label
                                                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                                                        Project Image
                                                                    </label>
                                                                    <div class="col-sm-12 col-md-7">
                                                                        <div id="image-preview-edit{{ $currentProject->id }}"
                                                                            class="image-preview" @if ($currentProject->image)
                                                                                style="background-image: url('{{ asset('storage/' . $currentProject->image) }}'); background-size: cover; background-position: center;"
                                                                            @endif>
                                                                            <label
                                                                                for="image-upload-edit{{ $currentProject->id }}">
                                                                                {{ $currentProject->image ? 'Change Image' : 'Choose File' }}
                                                                            </label>
                                                                            <input type="file" name="image"
                                                                                id="image-upload-edit{{ $currentProject->id }}"
                                                                                accept="image/*">
                                                                        </div>
                                                                        @error('image')<small
                                                                        class="text-danger">{{ $message }}</small>@enderror
                                                                    </div>
                                                                </div>

                                                            </div>{{-- end modal-body --}}

                                                            <div class="modal-footer bg-whitesmoke br-0" style="flex-shrink:0;">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="fas fa-save mr-1"></i> Update
                                                                </button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- ════ DELETE MODAL ════ --}}
                                            <div class="modal fade" id="deleteModal{{ $currentProject->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                <i class="fas fa-trash mr-1 text-danger"></i> Delete Current
                                                                Project
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete:</p>
                                                            <p class="font-weight-bold text-dark">
                                                                "{{ $currentProject->getTranslation('title', 'en') }}"
                                                            </p>
                                                            <p class="text-muted small">This action <strong>cannot</strong> be
                                                                undone.</p>
                                                        </div>
                                                        <div class="modal-footer bg-whitesmoke br-0">
                                                            <form
                                                                action="{{ route('admin.current_projects.destroy', $currentProject->id) }}"
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
                                {{ $currentProjects->links() }}
                            </div>

                        </div>{{-- end card-body --}}
                    </div>{{-- end card --}}
                </div>
            </div>

        </div>{{-- end section-body --}}

        {{-- ══════ CREATE MODAL ══════ --}}
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-hidden="true">
            {{-- @dd($projects) --}}
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="max-height:90vh;display:flex;flex-direction:column;">

                    <div class="modal-header" style="flex-shrink:0;">
                        <h5 class="modal-title">
                            <i class="fas fa-plus mr-1"></i> Add New Current Project
                        </h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>

                    <form action="{{ route('admin.current_projects.store') }}" method="POST" enctype="multipart/form-data"
                        style="display:flex;flex-direction:column;flex:1;overflow:hidden;">
                        @csrf

                        <div class="modal-body" style="overflow-y:auto;flex:1;">

                            {{-- Title EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Title <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title[en]"
                                        class="form-control @error('title.en') is-invalid @enderror"
                                        value="{{ old('title.en') }}" placeholder="Title in English" required>
                                    @error('title.en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            {{-- Title AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Title <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title[ar]"
                                        class="form-control @error('title.ar') is-invalid @enderror"
                                        value="{{ old('title.ar') }}" placeholder="العنوان بالعربية" dir="rtl" required>
                                    @error('title.ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            {{-- Subtitle EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Subtitle <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="subtitle[en]"
                                        class="form-control @error('subtitle.en') is-invalid @enderror"
                                        value="{{ old('subtitle.en') }}" placeholder="Subtitle in English">
                                    @error('subtitle.en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            {{-- Subtitle AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Subtitle <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="subtitle[ar]"
                                        class="form-control @error('subtitle.ar') is-invalid @enderror"
                                        value="{{ old('subtitle.ar') }}" placeholder="العنوان الفرعي بالعربية" dir="rtl">
                                    @error('subtitle.ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            {{-- Description EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Description <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="description[en]"
                                        class="form-control @error('description.en') is-invalid @enderror" rows="4"
                                        placeholder="Description in English" required>{{ old('description.en') }}</textarea>
                                    @error('description.en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            {{-- Description AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Description <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="description[ar]"
                                        class="form-control @error('description.ar') is-invalid @enderror" rows="4"
                                        placeholder="الوصف بالعربية" dir="rtl"
                                        required>{{ old('description.ar') }}</textarea>
                                    @error('description.ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            {{-- Location EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Location <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="location[en]"
                                        class="form-control @error('location.en') is-invalid @enderror"
                                        value="{{ old('location.en') }}" placeholder="Location in English" required>
                                    @error('location.en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            {{-- Location AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Location <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="location[ar]"
                                        class="form-control @error('location.ar') is-invalid @enderror"
                                        value="{{ old('location.ar') }}" placeholder="الموقع بالعربية" dir="rtl" required>
                                    @error('location.ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            {{-- Size EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Size <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="size[en]"
                                        class="form-control @error('size.en') is-invalid @enderror"
                                        value="{{ old('size.en') }}" placeholder="e.g. 500 sqm" required>
                                    @error('size.en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            {{-- Size AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Size <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="size[ar]"
                                        class="form-control @error('size.ar') is-invalid @enderror"
                                        value="{{ old('size.ar') }}" placeholder="مثال: ٥٠٠ متر مربع" dir="rtl" required>
                                    @error('size.ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            {{-- Status EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Status <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="status[en]"
                                        class="form-control @error('status.en') is-invalid @enderror"
                                        value="{{ old('status.en') }}" placeholder="e.g. In Progress" required>
                                    @error('status.en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            {{-- Status AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Status <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="status[ar]"
                                        class="form-control @error('status.ar') is-invalid @enderror"
                                        value="{{ old('status.ar') }}" placeholder="مثال: قيد التنفيذ" dir="rtl" required>
                                    @error('status.ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            {{-- Project Dropdown --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Project
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="project_id" class="form-control @error('project_id') is-invalid @enderror" data-plugin="selectric"
                                        required>
                                        <option value="">-- Select Project --</option>
                                        @foreach ($projects as $project)

                                            <option value="{{ $project->id }}">
                                                {{ $project->getTranslation('title', 'en') }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('project_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            {{-- Image Upload --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Project Image
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview-create" class="image-preview">
                                        <label for="image-upload-create">Choose File</label>
                                        <input type="file" name="image" id="image-upload-create" accept="image/*">
                                    </div>
                                    @error('image')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>
                            </div>

                        </div>{{-- end modal-body --}}

                        <div class="modal-footer bg-whitesmoke br-0" style="flex-shrink:0;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-plus mr-1"></i> Create
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

            // Image preview — CREATE
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

            // Image preview — EDIT (each modal)
            @foreach ($currentProjects as $currentProject)
                $('#image-upload-edit{{ $currentProject->id }}').on('change', function () {
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            $('#image-preview-edit{{ $currentProject->id }}').css({
                                'background-image': 'url(' + e.target.result + ')',
                                'background-size': 'cover',
                                'background-position': 'center'
                            });
                            $('#image-preview-edit{{ $currentProject->id }} label').text('Change Image');
                        };
                        reader.readAsDataURL(file);
                    }
                });
            @endforeach

            // Re-open create modal on validation fail
            @if ($errors->any() && !old('_method'))
                $('#createModal').modal('show');
            @endif
 });
    </script>
@endpush