@extends('admin.layouts.layout')

@push('styles')
    {{-- FontAwesome 5 Free --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    {{-- DataTables Bootstrap 4 --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
@endpush

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Project Services</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Project Services</div>
            </div>
        </div>

        <div class="section-body">

            {{-- ── Alerts ─────────────────────────────────────────────── --}}
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
                    <strong>Please fix the following errors:</strong>
                    <ul class="mb-0 mt-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            {{-- ── Card ────────────────────────────────────────────────── --}}
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>All Project Services</h4>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#createProjectServiceModal">
                        <i class="fas fa-plus mr-1"></i> Add New
                    </button>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="projectServicesTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project</th>
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projectServices as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->project?->getTranslation('title', app()->getLocale()) }}</td>
                                        <td>
                                            <i class="{{ $item->icon }}"
                                                style="font-size: 1.4rem; margin-right: 6px;"></i>
                                            <small class="text-muted">{{ $item->icon }}</small>
                                        </td>
                                        <td>{{ $item->getTranslation('title', app()->getLocale()) }}</td>
                                        <td>
                                            <div class="text-nowrap">
                                                {{-- Edit --}}
                                                <button type="button" class="btn btn-sm btn-warning"
                                                    data-toggle="modal" data-target="#editModal{{ $item->id }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                {{-- Delete --}}
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
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
            </div>{{-- /.card --}}

        </div>{{-- /.section-body --}}
    </section>
</div>{{-- /.main-content --}}

{{-- ══════════════════════════════════════════════════════════
     CREATE MODAL
══════════════════════════════════════════════════════════ --}}
<div class="modal fade" id="createProjectServiceModal" tabindex="-1" role="dialog"
    aria-labelledby="createProjectServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">

            <div class="modal-header" style="flex-shrink: 0;">
                <h5 class="modal-title" id="createProjectServiceModalLabel">
                    Add New Project Service
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('admin.project_services.store') }}" method="POST"
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

                    {{-- Icon --}}
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                            Icon
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="icon" id="createIconInput" class="form-control"
                                placeholder="e.g. fas fa-check" value="{{ old('icon') }}">
                            <div class="mt-2">
                                <span class="text-muted" style="font-size: 0.85rem;">Preview:</span>
                                <i id="createIconPreview" class="{{ old('icon', 'fas fa-star') }}"
                                    style="font-size: 1.6rem; margin-left: 8px; color: #6777ef;"></i>
                            </div>
                            <small class="text-muted">
                                Enter any <a href="https://fontawesome.com/v5/search" target="_blank"
                                    rel="noopener noreferrer">FontAwesome 5</a> class, e.g. <code>fas fa-rocket</code>
                            </small>
                        </div>
                    </div>

                    {{-- Title EN --}}
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                            Title <span class="badge badge-success">EN</span>
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="title[en]" class="form-control"
                                placeholder="Service title in English" value="{{ old('title.en') }}">
                        </div>
                    </div>

                    {{-- Title AR --}}
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                            Title <span class="badge badge-warning">AR</span>
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="title[ar]" class="form-control"
                                placeholder="عنوان الخدمة بالعربية" dir="rtl" value="{{ old('title.ar') }}">
                        </div>
                    </div>

                </div>{{-- /.modal-body --}}

                <div class="modal-footer bg-whitesmoke br-0" style="flex-shrink: 0;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> Save
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>


{{-- ══════════════════════════════════════════════════════════
     EDIT & DELETE MODALS  (looped, placed OUTSIDE the table)
══════════════════════════════════════════════════════════ --}}
@foreach ($projectServices as $item)
    {{-- ── Edit Modal ───────────────────────────────────────── --}}
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog"
        aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">

                <div class="modal-header" style="flex-shrink: 0;">
                    <h5 class="modal-title" id="editModalLabel{{ $item->id }}">
                        Edit Project Service
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('admin.project_services.update', $item->id) }}" method="POST"
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

                        {{-- Icon --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Icon
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="icon" id="editIconInput{{ $item->id }}"
                                    class="form-control edit-icon-input"
                                    data-preview="editIconPreview{{ $item->id }}"
                                    value="{{ old('icon', $item->icon) }}">
                                <div class="mt-2">
                                    <span class="text-muted" style="font-size: 0.85rem;">Preview:</span>
                                    <i id="editIconPreview{{ $item->id }}"
                                        class="{{ old('icon', $item->icon) }}"
                                        style="font-size: 1.6rem; margin-left: 8px; color: #6777ef;"></i>
                                </div>
                                <small class="text-muted">
                                    Enter any <a href="https://fontawesome.com/v5/search" target="_blank"
                                        rel="noopener noreferrer">FontAwesome 5</a> class, e.g. <code>fas
                                        fa-rocket</code>
                                </small>
                            </div>
                        </div>

                        {{-- Title EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Title <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="title[en]" class="form-control"
                                    placeholder="Service title in English"
                                    value="{{ old('title.en', $item->getTranslation('title', 'en')) }}">
                            </div>
                        </div>

                        {{-- Title AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Title <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="title[ar]" class="form-control"
                                    placeholder="عنوان الخدمة بالعربية" dir="rtl"
                                    value="{{ old('title.ar', $item->getTranslation('title', 'ar')) }}">
                            </div>
                        </div>

                    </div>{{-- /.modal-body --}}

                    <div class="modal-footer bg-whitesmoke br-0" style="flex-shrink: 0;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-1"></i> Update
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    {{-- ── Delete Modal ──────────────────────────────────────── --}}
    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog"
        aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">
                        Confirm Delete
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Are you sure you want to delete the service
                        <strong>{{ $item->getTranslation('title', 'en') }}</strong>?
                    </p>
                    <p class="text-muted mb-0">This action cannot be undone.</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cancel
                    </button>
                    <form action="{{ route('admin.project_services.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash mr-1"></i> Delete
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endforeach


{{-- ══════════════════════════════════════════════════════════
     SCRIPTS
══════════════════════════════════════════════════════════ --}}
@push('scripts')
    {{-- DataTables JS --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {

            // ── DataTables init ────────────────────────────────────
            $('#projectServicesTable').DataTable({
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

            // ── Icon live preview — Create modal ───────────────────
            $('#createIconInput').on('input', function() {
                var val = $(this).val().trim();
                $('#createIconPreview').attr('class', val || 'fas fa-star');
            });

            // ── Icon live preview — Edit modals (delegated) ────────
            $(document).on('input', '.edit-icon-input', function() {
                var previewId = $(this).data('preview');
                var val = $(this).val().trim();
                $('#' + previewId).attr('class', val || 'fas fa-star');
            });

            // ── Re-open create modal on validation fail ────────────
            @if ($errors->any() && !old('_method'))
                $('#createProjectServiceModal').modal('show');
            @endif

            // ── Re-open edit modal on validation fail ──────────────
            @if ($errors->any() && old('_method') === 'PUT')
                $('#editModal{{ old('id') }}').modal('show');
            @endif

        });
    </script>
@endpush
