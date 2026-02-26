@extends('admin.layouts.layout')

@section('title', 'Current Projects')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Current Projects</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Current Projects</div>
                </div>
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
                    <div class="card-header">
                        <h4>All Projects</h4>
                        <div class="card-header-action">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#createCurrentProjectModal">
                                <i class="fas fa-plus"></i> Add Project
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Location</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($currentProjects as $project)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $project->getTranslation('title', app()->getLocale()) }}</td>
                                            <td>{{ $project->getTranslation('subtitle', app()->getLocale()) ?: '—' }}</td>
                                            <td>{{ $project->getTranslation('location', app()->getLocale()) }}</td>
                                            <td>{{ $project->getTranslation('status', app()->getLocale()) }}</td>
                                            <td>
                                                @if ($project->image)
                                                    <img src="{{ asset('storage/' . $project->image) }}" width="50" height="50"
                                                        style="object-fit:cover; border-radius:6px;">
                                                @else
                                                    <span class="text-muted">No image</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-info" data-toggle="modal"
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
                                            <td colspan="7" class="text-center text-muted">No projects found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $currentProjects->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
    {{-- ===================== CREATE MODAL ===================== --}}
    <div class="modal fade" id="createCurrentProjectModal" tabindex="-1" role="dialog"
        aria-labelledby="createCurrentProjectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
                <div class="modal-header" style="flex-shrink: 0;">
                    <h5 class="modal-title" id="createCurrentProjectModalLabel">Add New Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.current_projects.store') }}" method="POST" enctype="multipart/form-data"
                    style="display: flex; flex-direction: column; flex: 1; overflow: hidden;">
                    @csrf
                    <div class="modal-body" style="overflow-y: auto; flex: 1;">

                        {{-- Title EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Title <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="title[en]"
                                    class="form-control @error('title.en') is-invalid @enderror"
                                    value="{{ old('title.en') }}" placeholder="e.g. Skyline Tower">
                                @error('title.en') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                                    value="{{ old('title.ar') }}" dir="rtl">
                                @error('title.ar') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                                    value="{{ old('subtitle.en') }}" placeholder="e.g. Luxury Residences">
                                @error('subtitle.en') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                                    value="{{ old('subtitle.ar') }}" dir="rtl">
                                @error('subtitle.ar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        {{-- Description EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Description <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <textarea name="description[en]" rows="4"
                                    class="form-control @error('description.en') is-invalid @enderror">{{ old('description.en') }}</textarea>
                                @error('description.en') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        {{-- Description AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Description <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <textarea name="description[ar]" rows="4" dir="rtl"
                                    class="form-control @error('description.ar') is-invalid @enderror">{{ old('description.ar') }}</textarea>
                                @error('description.ar') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                                    value="{{ old('location.en') }}" placeholder="e.g. New Cairo, Egypt">
                                @error('location.en') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                                    value="{{ old('location.ar') }}" dir="rtl">
                                @error('location.ar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        {{-- Size EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Size <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="size[en]"
                                    class="form-control @error('size.en') is-invalid @enderror" value="{{ old('size.en') }}"
                                    placeholder="e.g. 120,000 sqm">
                                @error('size.en') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        {{-- Size AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Size <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="size[ar]"
                                    class="form-control @error('size.ar') is-invalid @enderror" value="{{ old('size.ar') }}"
                                    dir="rtl">
                                @error('size.ar') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                                    value="{{ old('status.en') }}" placeholder="e.g. Under Construction">
                                @error('status.en') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                                    value="{{ old('status.ar') }}" dir="rtl">
                                @error('status.ar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        {{-- Image --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                            <div class="col-sm-12 col-md-7">
                                <div id="image-preview-create" class="image-preview">
                                    <label for="image-upload-create">Choose File</label>
                                    <input type="file" name="image" id="image-upload-create" accept="image/*">
                                </div>
                                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                    </div>{{-- /.modal-body --}}
                    <div class="modal-footer bg-whitesmoke br-0" style="flex-shrink: 0;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- ===================== /CREATE MODAL ===================== --}}


    {{-- ===================== EDIT & DELETE MODALS (inside loop) ===================== --}}
    @foreach ($currentProjects as $project)

        {{-- EDIT MODAL --}}
        <div class="modal fade" id="editModal{{ $project->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editModalLabel{{ $project->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
                    <div class="modal-header" style="flex-shrink: 0;">
                        <h5 class="modal-title" id="editModalLabel{{ $project->id }}">
                            Edit Project: {{ $project->getTranslation('title', 'en') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.current_projects.update', $project->id) }}" method="POST"
                        enctype="multipart/form-data" style="display: flex; flex-direction: column; flex: 1; overflow: hidden;">
                        @csrf
                        @method('PUT')
                        <div class="modal-body" style="overflow-y: auto; flex: 1;">

                            {{-- Title EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Title <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title[en]"
                                        class="form-control @error('title.en') is-invalid @enderror"
                                        value="{{ old('title.en', $project->getTranslation('title', 'en')) }}">
                                    @error('title.en') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            {{-- Title AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Title <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title[ar]" dir="rtl"
                                        class="form-control @error('title.ar') is-invalid @enderror"
                                        value="{{ old('title.ar', $project->getTranslation('title', 'ar')) }}">
                                    @error('title.ar') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                                        value="{{ old('subtitle.en', $project->getTranslation('subtitle', 'en')) }}">
                                    @error('subtitle.en') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            {{-- Subtitle AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Subtitle <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="subtitle[ar]" dir="rtl"
                                        class="form-control @error('subtitle.ar') is-invalid @enderror"
                                        value="{{ old('subtitle.ar', $project->getTranslation('subtitle', 'ar')) }}">
                                    @error('subtitle.ar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            {{-- Description EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Description <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="description[en]" rows="4"
                                        class="form-control @error('description.en') is-invalid @enderror">{{ old('description.en', $project->getTranslation('description', 'en')) }}</textarea>
                                    @error('description.en') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            {{-- Description AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Description <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="description[ar]" rows="4" dir="rtl"
                                        class="form-control @error('description.ar') is-invalid @enderror">{{ old('description.ar', $project->getTranslation('description', 'ar')) }}</textarea>
                                    @error('description.ar') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                                        value="{{ old('location.en', $project->getTranslation('location', 'en')) }}">
                                    @error('location.en') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            {{-- Location AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Location <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="location[ar]" dir="rtl"
                                        class="form-control @error('location.ar') is-invalid @enderror"
                                        value="{{ old('location.ar', $project->getTranslation('location', 'ar')) }}">
                                    @error('location.ar') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                                        value="{{ old('size.en', $project->getTranslation('size', 'en')) }}">
                                    @error('size.en') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            {{-- Size AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Size <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="size[ar]" dir="rtl"
                                        class="form-control @error('size.ar') is-invalid @enderror"
                                        value="{{ old('size.ar', $project->getTranslation('size', 'ar')) }}">
                                    @error('size.ar') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                                        value="{{ old('status.en', $project->getTranslation('status', 'en')) }}">
                                    @error('status.en') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            {{-- Status AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Status <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="status[ar]" dir="rtl"
                                        class="form-control @error('status.ar') is-invalid @enderror"
                                        value="{{ old('status.ar', $project->getTranslation('status', 'ar')) }}">
                                    @error('status.ar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            {{-- Image --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview-edit{{ $project->id }}" class="image-preview" @if($project->image)
                                        style="background-image: url('{{ asset('storage/' . $project->image) }}');
                                    background-size: cover; background-position: center;" @endif>
                                        <label for="image-upload-edit{{ $project->id }}">
                                            {{ $project->image ? 'Change Image' : 'Choose File' }}
                                        </label>
                                        <input type="file" name="image" id="image-upload-edit{{ $project->id }}"
                                            accept="image/*">
                                    </div>
                                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>

                        </div>{{-- /.modal-body --}}
                        <div class="modal-footer bg-whitesmoke br-0" style="flex-shrink: 0;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- /EDIT MODAL --}}

        {{-- DELETE MODAL --}}
        <div class="modal fade" id="deleteModal{{ $project->id }}" tabindex="-1" role="dialog"
            aria-labelledby="deleteModalLabel{{ $project->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{ $project->id }}">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete
                        <strong>{{ $project->getTranslation('title', 'en') }}</strong>?
                        This action cannot be undone.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form action="{{ route('admin.current_projects.destroy', $project->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- /DELETE MODAL --}}

    @endforeach
    {{-- ===================== /EDIT & DELETE MODALS ===================== --}}

@endsection

@push('scripts')
    <script>
        // Image preview — Create modal
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

        // Image preview — Edit modals
        @foreach ($currentProjects as $project)
            $('#image-upload-edit{{ $project->id }}').on('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image-preview-edit{{ $project->id }}').css({
                            'background-image': 'url(' + e.target.result + ')',
                            'background-size': 'cover',
                            'background-position': 'center'
                        });
                        $('#image-preview-edit{{ $project->id }} label').text('Change Image');
                    };
                    reader.readAsDataURL(file);
                }
            });
        @endforeach

        // Re-open create modal on validation fail
        @if ($errors->any() && !old('_method'))
            $('#createCurrentProjectModal').modal('show');
        @endif
    </script>
@endpush