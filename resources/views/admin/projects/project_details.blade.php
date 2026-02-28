@extends('admin.layouts.layout')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Project Details</h1>
        </div>

        <div class="section-body">

            {{-- Success Alert --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            {{-- Error Alert --}}
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
                    <h4>All Project Details</h4>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#createProjectDetailModal">
                        <i class="fas fa-plus"></i> Add New
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="projectDetailsTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project Name</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projectDetails as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            {{ $item->project?->getTranslation('title', app()->getLocale()) }}
                                        </td>
                                        <td>{{ $item->getTranslation('title', app()->getLocale()) }}</td>
                                        <td>{{ $item->getTranslation('subtitle', app()->getLocale()) }}</td>
                                        <td>
                                            <div class="text-nowrap">
                                                <button
                                                    class="btn btn-sm btn-warning"
                                                    data-toggle="modal"
                                                    data-target="#editModal{{ $item->id }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button
                                                    class="btn btn-sm btn-danger"
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

{{-- ============================================================ --}}
{{-- CREATE MODAL --}}
{{-- ============================================================ --}}
<div class="modal fade" id="createProjectDetailModal" tabindex="-1" role="dialog" aria-labelledby="createProjectDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
            <div class="modal-header" style="flex-shrink: 0;">
                <h5 class="modal-title" id="createProjectDetailModalLabel">Add New Project Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.project_details.store') }}" method="POST"
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

                    {{-- Title EN --}}
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                            Title <span class="badge badge-success">EN</span>
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="title[en]" class="form-control"
                                   value="{{ old('title.en') }}">
                        </div>
                    </div>

                    {{-- Title AR --}}
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                            Title <span class="badge badge-warning">AR</span>
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="title[ar]" class="form-control" dir="rtl"
                                   value="{{ old('title.ar') }}">
                        </div>
                    </div>

                    {{-- Subtitle EN --}}
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                            Subtitle <span class="badge badge-success">EN</span>
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="subtitle[en]" class="form-control"
                                   value="{{ old('subtitle.en') }}">
                        </div>
                    </div>

                    {{-- Subtitle AR --}}
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                            Subtitle <span class="badge badge-warning">AR</span>
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="subtitle[ar]" class="form-control" dir="rtl"
                                   value="{{ old('subtitle.ar') }}">
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

{{-- ============================================================ --}}
{{-- EDIT & DELETE MODALS (looped, outside table) --}}
{{-- ============================================================ --}}
@foreach ($projectDetails as $item)

    {{-- EDIT MODAL --}}
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
                <div class="modal-header" style="flex-shrink: 0;">
                    <h5 class="modal-title">Edit Project Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.project_details.update', $item->id) }}" method="POST"
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

                        {{-- Title EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Title <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="title[en]" class="form-control"
                                       value="{{ old('title.en', $item->getTranslation('title', 'en')) }}">
                            </div>
                        </div>

                        {{-- Title AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Title <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="title[ar]" class="form-control" dir="rtl"
                                       value="{{ old('title.ar', $item->getTranslation('title', 'ar')) }}">
                            </div>
                        </div>

                        {{-- Subtitle EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Subtitle <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="subtitle[en]" class="form-control"
                                       value="{{ old('subtitle.en', $item->getTranslation('subtitle', 'en')) }}">
                            </div>
                        </div>

                        {{-- Subtitle AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Subtitle <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="subtitle[ar]" class="form-control" dir="rtl"
                                       value="{{ old('subtitle.ar', $item->getTranslation('subtitle', 'ar')) }}">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer bg-whitesmoke br-0" style="flex-shrink: 0;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
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
                    <h5 class="modal-title">Delete Project Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete
                    <strong>{{ $item->getTranslation('title', app()->getLocale()) }}</strong>?
                    This action cannot be undone.
                </div>
                <div class="modal-footer bg-whitesmoke br-0">
                    <form action="{{ route('admin.project_details.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
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
            $('#projectDetailsTable').DataTable({
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

            {{-- Re-open create modal on validation fail --}}
            @if ($errors->any() && !old('_method'))
                $('#createProjectDetailModal').modal('show');
            @endif

            {{-- Re-open edit modal on validation fail --}}
            @if ($errors->any() && old('_method') === 'PUT')
                $('#editModal{{ old('id') }}').modal('show');
            @endif
        });
    </script>
@endpush