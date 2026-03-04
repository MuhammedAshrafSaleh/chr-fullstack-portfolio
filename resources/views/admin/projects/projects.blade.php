@extends('admin.layouts.layout')

@section('title', 'Projects')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Projects</h1>
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
                        <h4>All Projects</h4>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#createProjectModal">
                            <i class="fas fa-plus"></i> Add Project
                        </button>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Current Project</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($projects as $index => $project)
                                        <tr>
                                            <td>{{ $projects->firstItem() + $index }}</td>
                                            <td>
                                                {{ $project->currentProject?->getTranslation('title', app()->getLocale()) ?? '—' }}
                                            </td>
                                            <td>{{ $project->getTranslation('title', app()->getLocale()) }}</td>
                                            <td>{{ $project->getTranslation('subtitle', app()->getLocale()) }}</td>
                                            <td><code>{{ $project->latitude }}</code></td>
                                            <td><code>{{ $project->longitude }}</code></td>
                                            <td>
                                                <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                    data-target="#editModal{{ $project->id }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#deleteModal{{ $project->id }}">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted py-4">No projects found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @if ($projects->hasPages())
                        <div class="card-footer">
                            {{ $projects->links() }}
                        </div>
                    @endif

                </div>{{-- /.card --}}
            </div>{{-- /.section-body --}}
        </section>
    </div>
    {{-- ===================== EDIT & DELETE MODALS ===================== --}}
    @foreach ($projects as $project)
        {{-- ===== EDIT MODAL ===== --}}
        <div class="modal fade" id="editModal{{ $project->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editModalLabel{{ $project->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
                    <div class="modal-header" style="flex-shrink: 0;">
                        <h5 class="modal-title" id="editModalLabel{{ $project->id }}">
                            Edit Project — {{ $project->getTranslation('title', app()->getLocale()) }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST"
                        style="display: flex; flex-direction: column; flex: 1; overflow: hidden;">
                        @csrf
                        @method('PUT')
                        <div class="modal-body" style="overflow-y: auto; flex: 1;">

                            {{-- Current Project --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Current Project <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="current_project_id" class="form-control" required>
                                        <option value="" disabled>— Select Current Project —</option>
                                        @foreach ($currentProjects as $cp)
                                            <option value="{{ $cp->id }}"
                                                {{ old('current_project_id', $project->current_project_id) == $cp->id ? 'selected' : '' }}>
                                                {{ $cp->getTranslation('title', app()->getLocale()) }}
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
                                        value="{{ old('title.en', $project->getTranslation('title', 'en')) }}" required>
                                </div>
                            </div>

                            {{-- Title AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Title <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title[ar]" class="form-control" dir="rtl"
                                        value="{{ old('title.ar', $project->getTranslation('title', 'ar')) }}" required>
                                </div>
                            </div>

                            {{-- Subtitle EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Subtitle <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="subtitle[en]" class="form-control"
                                        value="{{ old('subtitle.en', $project->getTranslation('subtitle', 'en')) }}"
                                        required>
                                </div>
                            </div>

                            {{-- Subtitle AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Subtitle <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="subtitle[ar]" class="form-control" dir="rtl"
                                        value="{{ old('subtitle.ar', $project->getTranslation('subtitle', 'ar')) }}"
                                        required>
                                </div>
                            </div>

                            {{-- Latitude --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Latitude
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" name="latitude" class="form-control" step="any"
                                        value="{{ old('latitude', $project->latitude) }}" required>
                                </div>
                            </div>
                            {{-- Longitude --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Longitude
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" name="longitude" class="form-control" step="any"
                                        value="{{ old('longitude', $project->longitude) }}" required>
                                </div>
                            </div>

                        </div>{{-- /.modal-body --}}
                        <div class="modal-footer bg-whitesmoke br-0" style="flex-shrink: 0;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-warning">Update Project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- ===== END EDIT MODAL ===== --}}

        {{-- ===== DELETE MODAL ===== --}}
        <div class="modal fade" id="deleteModal{{ $project->id }}" tabindex="-1" role="dialog"
            aria-labelledby="deleteModalLabel{{ $project->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{ $project->id }}">Delete Project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete the project
                            <strong>{{ $project->getTranslation('title', app()->getLocale()) }}</strong>?
                        </p>
                        <p class="text-danger"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- ===== END DELETE MODAL ===== --}}
    @endforeach
    {{-- ===================== END MODALS ===================== --}}

    {{-- ===================== CREATE MODAL ===================== --}}
    <div class="modal fade" id="createProjectModal" tabindex="-1" role="dialog"
        aria-labelledby="createProjectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
                <div class="modal-header" style="flex-shrink: 0;">
                    <h5 class="modal-title" id="createProjectModalLabel">Add New Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.projects.store') }}" method="POST"
                    style="display: flex; flex-direction: column; flex: 1; overflow: hidden;">
                    @csrf
                    <div class="modal-body" style="overflow-y: auto; flex: 1;">

                        {{-- Current Project --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Current Project <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <select name="current_project_id" class="form-control" required>
                                    <option value="" disabled selected>— Select Current Project —</option>
                                    @foreach ($currentProjects as $cp)
                                        <option value="{{ $cp->id }}"
                                            {{ old('current_project_id') == $cp->id ? 'selected' : '' }}>
                                            {{ $cp->getTranslation('title', app()->getLocale()) }}
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
                                    value="{{ old('title.en') }}" placeholder="e.g. Green Tower Complex" required>
                            </div>
                        </div>

                        {{-- Title AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Title <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="title[ar]" class="form-control" dir="rtl"
                                    value="{{ old('title.ar') }}" placeholder="مثال: برج الخضراء" required>
                            </div>
                        </div>

                        {{-- Subtitle EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Subtitle <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="subtitle[en]" class="form-control"
                                    value="{{ old('subtitle.en') }}" placeholder="e.g. Residential skyscraper in Cairo"
                                    required>
                            </div>
                        </div>

                        {{-- Subtitle AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Subtitle <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="subtitle[ar]" class="form-control" dir="rtl"
                                    value="{{ old('subtitle.ar') }}" placeholder="مثال: ناطحة سحاب سكنية في القاهرة"
                                    required>
                            </div>
                        </div>

                        {{-- Latitude --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Latitude
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="number" name="latitude" class="form-control" step="any"
                                    value="{{ old('latitude') }}" placeholder="e.g. 30.12345678" required>
                            </div>
                        </div>
                        {{-- Longitude --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Longitude
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="number" name="longitude" class="form-control" step="any"
                                    value="{{ old('longitude') }}" placeholder="e.g. 31.23456789" required>
                            </div>
                        </div>

                    </div>{{-- /.modal-body --}}
                    <div class="modal-footer bg-whitesmoke br-0" style="flex-shrink: 0;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- ===================== END CREATE MODAL ===================== --}}
@endsection

@push('scripts')
    <script>
        {{-- Re-open create modal on validation failure (not an edit) --}}
        @if ($errors->any() && !old('_method'))
            $('#createProjectModal').modal('show');
        @endif
    </script>
@endpush
