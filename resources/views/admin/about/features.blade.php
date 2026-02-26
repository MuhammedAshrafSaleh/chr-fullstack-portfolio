@extends('admin.layouts.layout')

@section('title', 'Features')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Features</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Features</div>
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
                        <h4>All Features</h4>
                        <div class="card-header-action">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#createFeatureModal">
                                <i class="fas fa-plus"></i> Add Feature
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($features as $feature)
                                        <tr>
                                            <td>{{ $loop->iteration + ($features->currentPage() - 1) * 10 }}</td>
                                            <td>{{ $feature->title }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($feature->desc, 60) }}</td>
                                            <td>
                                                @if ($feature->image)
                                                    <img src="{{ asset('storage/' . $feature->image) }}" width="50" height="50"
                                                        style="object-fit:cover; border-radius:4px;">
                                                @else
                                                    <span class="text-muted">No image</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                    data-target="#editModal{{ $feature->id }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#deleteModal{{ $feature->id }}">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-4">No features found.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if ($features->hasPages())
                            <div class="card-footer">
                                {{ $features->links() }}
                            </div>
                        @endif
                    </div>

                </div>
            </section>

            {{-- ===================== EDIT & DELETE MODALS (outside the table) ===================== --}}
            @foreach ($features as $feature)

                {{-- Edit Modal --}}
                <div class="modal fade" id="editModal{{ $feature->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
                            <div class="modal-header" style="flex-shrink: 0;">
                                <h5 class="modal-title">Edit Feature</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('admin.features.update', $feature->id) }}" method="POST"
                                enctype="multipart/form-data"
                                style="display: flex; flex-direction: column; flex: 1; overflow: hidden;">
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
                                                value="{{ old('title.en', $feature->getTranslation('title', 'en')) }}">
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
                                                value="{{ old('title.ar', $feature->getTranslation('title', 'ar')) }}"
                                                dir="rtl">
                                            @error('title.ar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Desc EN --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                            Description <span class="badge badge-success">EN</span>
                                        </label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea name="desc[en]" rows="4"
                                                class="form-control @error('desc.en') is-invalid @enderror">{{ old('desc.en', $feature->getTranslation('desc', 'en')) }}</textarea>
                                            @error('desc.en')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Desc AR --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                            Description <span class="badge badge-warning">AR</span>
                                        </label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea name="desc[ar]" rows="4" dir="rtl"
                                                class="form-control @error('desc.ar') is-invalid @enderror">{{ old('desc.ar', $feature->getTranslation('desc', 'ar')) }}</textarea>
                                            @error('desc.ar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Image --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                            Image
                                        </label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview-edit{{ $feature->id }}" class="image-preview"
                                                @if ($feature->image)
                                                    style="background-image: url('{{ asset('storage/' . $feature->image) }}'); background-size: cover; background-position: center;"
                                                @endif>
                                                <label for="image-upload-edit{{ $feature->id }}">
                                                    {{ $feature->image ? 'Change Image' : 'Choose File' }}
                                                </label>
                                                <input type="file" name="image"
                                                    id="image-upload-edit{{ $feature->id }}"
                                                    accept="image/*">
                                            </div>
                                            @error('image')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer bg-whitesmoke br-0" style="flex-shrink: 0;">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Delete Modal --}}
                <div class="modal fade" id="deleteModal{{ $feature->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Feature</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete
                                <strong>{{ $feature->getTranslation('title', 'en') }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('admin.features.destroy', $feature->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

            {{-- ===================== CREATE MODAL ===================== --}}
            <div class="modal fade" id="createFeatureModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
                        <div class="modal-header" style="flex-shrink: 0;">
                            <h5 class="modal-title">Add New Feature</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('admin.features.store') }}" method="POST" enctype="multipart/form-data"
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
                                            value="{{ old('title.en') }}">
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
                                            value="{{ old('title.ar') }}" dir="rtl">
                                        @error('title.ar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Desc EN --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Description <span class="badge badge-success">EN</span>
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="desc[en]" rows="4"
                                            class="form-control @error('desc.en') is-invalid @enderror">{{ old('desc.en') }}</textarea>
                                        @error('desc.en')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Desc AR --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Description <span class="badge badge-warning">AR</span>
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="desc[ar]" rows="4" dir="rtl"
                                            class="form-control @error('desc.ar') is-invalid @enderror">{{ old('desc.ar') }}</textarea>
                                        @error('desc.ar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Image --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Image
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

                            </div>
                            <div class="modal-footer bg-whitesmoke br-0" style="flex-shrink: 0;">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
@endsection

@push('scripts')
    <script>
        // Image preview – Create
        $('#image-upload-create').on('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
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

        // Image preview – Edit (per row)
        @foreach ($features as $feature)
            $('#image-upload-edit{{ $feature->id }}').on('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image-preview-edit{{ $feature->id }}').css({
                            'background-image': 'url(' + e.target.result + ')',
                            'background-size': 'cover',
                            'background-position': 'center'
                        });
                        $('#image-preview-edit{{ $feature->id }} label').text('Change Image');
                    };
                    reader.readAsDataURL(file);
                }
            });
        @endforeach

        // Re-open create modal on validation failure
        @if ($errors->any() && !old('_method'))
            $('#createFeatureModal').modal('show');
        @endif
    </script>
@endpush