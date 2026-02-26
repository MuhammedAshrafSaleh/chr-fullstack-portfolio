@extends('admin.layouts.layout')

@section('title', 'Construction Updates')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Construction Updates</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Construction Updates</div>
                </div>
            </div>

            <div class="section-body">

                {{-- Success Alert --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                {{-- Error Alert --}}
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>All Construction Updates</h4>
                        <div class="card-header-action">
                            <button class="btn btn-primary" data-toggle="modal"
                                data-target="#createConstructionUpdateModal">
                                <i class="fas fa-plus"></i> Add New
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
                                        <th>Video</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($constructionUpdates as $index => $update)
                                        <tr>
                                            <td>{{ $constructionUpdates->firstItem() + $index }}</td>
                                            <td>{{ $update->getTranslation('title', app()->getLocale()) }}</td>
                                            <td>{{ $update->getTranslation('subtitle', app()->getLocale()) }}</td>
                                            <td>
                                                @if ($update->video)
                                                    <video width="80" height="50" controls style="border-radius:4px;">
                                                        <source src="{{ asset('storage/' . $update->video) }}" type="video/mp4">
                                                    </video>
                                                @else
                                                    <span class="text-muted">No video</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-info" data-toggle="modal"
                                                    data-target="#editModal{{ $update->id }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#deleteModal{{ $update->id }}">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">No construction updates found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $constructionUpdates->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
    {{-- ============================================================ --}}
    {{-- CREATE MODAL (outside table, outside loop) --}}
    {{-- ============================================================ --}}
    <div class="modal fade" id="createConstructionUpdateModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
                <div class="modal-header" style="flex-shrink: 0;">
                    <h5 class="modal-title">Add Construction Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.construction_updates.store') }}" method="POST" enctype="multipart/form-data"
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
                                    value="{{ old('title.en') }}" placeholder="Title (English)">
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
                                <input type="text" name="title[ar]"
                                    class="form-control @error('title.ar') is-invalid @enderror"
                                    value="{{ old('title.ar') }}" placeholder="العنوان (عربي)" dir="rtl">
                                @error('title.ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                    value="{{ old('subtitle.en') }}" placeholder="Subtitle (English)">
                                @error('subtitle.en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                    value="{{ old('subtitle.ar') }}" placeholder="العنوان الفرعي (عربي)" dir="rtl">
                                @error('subtitle.ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Video --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Video</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="custom-file">
                                    <input type="file" name="video" id="video-upload-create"
                                        class="custom-file-input @error('video') is-invalid @enderror" accept="video/*">
                                    <label class="custom-file-label" for="video-upload-create">Choose file</label>
                                </div>
                                <small id="video-name-create" class="form-text text-muted mt-1"></small>
                                @error('video')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
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
    {{-- EDIT & DELETE MODALS (inside loop, outside table) --}}
    {{-- ============================================================ --}}
    @foreach ($constructionUpdates as $update)

        {{-- EDIT MODAL --}}
        <div class="modal fade" id="editModal{{ $update->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
                    <div class="modal-header" style="flex-shrink: 0;">
                        <h5 class="modal-title">Edit Construction Update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.construction_updates.update', $update->id) }}" method="POST"
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
                                    <input type="text" name="title[en]" class="form-control"
                                        value="{{ old('title.en', $update->getTranslation('title', 'en')) }}"
                                        placeholder="Title (English)">
                                </div>
                            </div>

                            {{-- Title AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Title <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title[ar]" class="form-control"
                                        value="{{ old('title.ar', $update->getTranslation('title', 'ar')) }}"
                                        placeholder="العنوان (عربي)" dir="rtl">
                                </div>
                            </div>

                            {{-- Subtitle EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Subtitle <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="subtitle[en]" class="form-control"
                                        value="{{ old('subtitle.en', $update->getTranslation('subtitle', 'en')) }}"
                                        placeholder="Subtitle (English)">
                                </div>
                            </div>

                            {{-- Subtitle AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Subtitle <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="subtitle[ar]" class="form-control"
                                        value="{{ old('subtitle.ar', $update->getTranslation('subtitle', 'ar')) }}"
                                        placeholder="العنوان الفرعي (عربي)" dir="rtl">
                                </div>
                            </div>

                            {{-- Video --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Video</label>
                                <div class="col-sm-12 col-md-7">
                                    @if ($update->video)
                                        <video controls class="mb-2 w-100" style="border-radius:4px; max-height:360px;">
                                            <source src="{{ asset('storage/' . $update->video) }}" type="video/mp4">
                                        </video>
                                    @endif
                                    <div class="custom-file">
                                        <input type="file" name="video" id="video-upload-edit{{ $update->id }}"
                                            class="custom-file-input" accept="video/*">
                                        <label class="custom-file-label" for="video-upload-edit{{ $update->id }}">
                                            {{ $update->video ? 'Change video' : 'Choose file' }}
                                        </label>
                                    </div>
                                    <small id="video-name-edit{{ $update->id }}" class="form-text text-muted mt-1"></small>
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
        <div class="modal fade" id="deleteModal{{ $update->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Construction Update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete <strong>{{ $update->getTranslation('title', 'en') }}</strong>?</p>
                        <p class="text-danger small">This action cannot be undone. The video file will also be deleted.</p>
                    </div>
                    <div class="modal-footer bg-whitesmoke br-0">
                        <form action="{{ route('admin.construction_updates.destroy', $update->id) }}" method="POST">
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
    <script>
        // Create modal — video filename display
        $('#video-upload-create').on('change', function () {
            const file = this.files[0];
            if (file) {
                $(this).next('.custom-file-label').text(file.name);
                $('#video-name-create').text('Selected: ' + file.name);
            }
        });

        // Edit modals — video filename display
        @foreach ($constructionUpdates as $update)
            $('#video-upload-edit{{ $update->id }}').on('change', function () {
                const file = this.files[0];
                if (file) {
                    $(this).next('.custom-file-label').text(file.name);
                    $('#video-name-edit{{ $update->id }}').text('Selected: ' + file.name);
                }
            });
        @endforeach

        // Re-open create modal on validation fail
        @if ($errors->any() && !old('_method'))
            $('#createConstructionUpdateModal').modal('show');
        @endif
    </script>
@endpush