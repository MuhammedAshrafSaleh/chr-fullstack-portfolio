@extends('admin.layouts.layout')

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Project Images</h1>
        </div>

        <div class="section-body">

            {{-- Alerts --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>All Project Images</h4>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#createProjectImageModal">
                        <i class="fas fa-plus"></i> Add New
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="projectImagesTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projectImages as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->project?->getTranslation('title', app()->getLocale()) }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                 alt="project image"
                                                 width="60" height="60"
                                                 style="object-fit: cover; border-radius: 6px;">
                                        </td>
                                        <td>{{ $item->getTranslation('title', app()->getLocale()) }}</td>
                                        <td>
                                            <div class="text-nowrap">
                                                <button class="btn btn-sm btn-warning"
                                                        data-toggle="modal"
                                                        data-target="#editModal{{ $item->id }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button class="btn btn-sm btn-danger"
                                                        data-toggle="modal"
                                                        data-target="#deleteModal{{ $item->id }}">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

{{-- ===================== CREATE MODAL ===================== --}}
<div class="modal fade" id="createProjectImageModal" tabindex="-1" role="dialog" aria-labelledby="createProjectImageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
            <div class="modal-header" style="flex-shrink: 0;">
                <h5 class="modal-title" id="createProjectImageModalLabel">Add Project Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.project_images.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  style="display: flex; flex-direction: column; flex: 1; overflow: hidden;">
                @csrf
                <div class="modal-body" style="overflow-y: auto; flex: 1;">

                    {{-- Project --}}
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                            Project
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <select name="project_id" class="form-control">
                                <option value="">-- Select Project --</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}"
                                        {{ old('project_id') == $project->id ? 'selected' : '' }}>
                                        {{ $project->getTranslation('title', app()->getLocale()) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Image --}}
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                            Image
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input type="file" name="image" class="form-control-file">
                        </div>
                    </div>

                    {{-- Title EN --}}
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                            Title <span class="badge badge-success">EN</span>
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text"
                                   name="title[en]"
                                   class="form-control"
                                   value="{{ old('title.en') }}"
                                   placeholder="Title in English">
                        </div>
                    </div>

                    {{-- Title AR --}}
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                            Title <span class="badge badge-warning">AR</span>
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text"
                                   name="title[ar]"
                                   class="form-control"
                                   value="{{ old('title.ar') }}"
                                   placeholder="العنوان بالعربية"
                                   dir="rtl">
                        </div>
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br-0" style="flex-shrink: 0;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ===================== EDIT & DELETE MODALS ===================== --}}
@foreach ($projectImages as $item)

    {{-- EDIT MODAL --}}
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
                <div class="modal-header" style="flex-shrink: 0;">
                    <h5 class="modal-title">Edit Project Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.project_images.update', $item->id) }}"
                      method="POST"
                      enctype="multipart/form-data"
                      style="display: flex; flex-direction: column; flex: 1; overflow: hidden;">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <div class="modal-body" style="overflow-y: auto; flex: 1;">

                        {{-- Project --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Project
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <select name="project_id" class="form-control">
                                    <option value="">-- Select Project --</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}"
                                            {{ old('project_id', $item->project_id) == $project->id ? 'selected' : '' }}>
                                            {{ $project->getTranslation('title', app()->getLocale()) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Image --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Image
                            </label>
                            <div class="col-sm-12 col-md-7">
                                @if ($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}"
                                         alt="current image"
                                         width="80" height="80"
                                         style="object-fit: cover; border-radius: 6px; margin-bottom: 8px; display: block;">
                                @endif
                                <input type="file" name="image" class="form-control-file">
                                <small class="text-muted">Leave empty to keep current image.</small>
                            </div>
                        </div>

                        {{-- Title EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Title <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="title[en]"
                                       class="form-control"
                                       value="{{ old('title.en', $item->getTranslation('title', 'en')) }}"
                                       placeholder="Title in English">
                            </div>
                        </div>

                        {{-- Title AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Title <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="title[ar]"
                                       class="form-control"
                                       value="{{ old('title.ar', $item->getTranslation('title', 'ar')) }}"
                                       placeholder="العنوان بالعربية"
                                       dir="rtl">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer bg-whitesmoke br-0" style="flex-shrink: 0;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- DELETE MODAL --}}
    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Project Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete the image
                        <strong>{{ $item->getTranslation('title', app()->getLocale()) }}</strong>?
                        This action cannot be undone.
                    </p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.project_images.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endforeach

@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#projectImagesTable').DataTable({
                pageLength: 10,
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    paginate: {
                        previous: "Previous",
                        next: "Next"
                    }
                }
            });

            @if ($errors->any() && !old('_method'))
                $('#createProjectImageModal').modal('show');
            @endif

            @if ($errors->any() && old('_method') === 'PUT')
                $('#editModal{{ old('id') }}').modal('show');
            @endif
        });
    </script>
@endpush