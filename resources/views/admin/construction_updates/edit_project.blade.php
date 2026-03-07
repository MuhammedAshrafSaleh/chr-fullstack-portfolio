@extends('admin.layouts.layout')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Construction Update Projects</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Construction Update Projects</div>
            </div>
        </div>

        <div class="section-body">

            {{-- Alerts --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>All Records</h4>
                    <div class="card-header-action">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#createConstructionUpdateModal">
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
                                    <th>Construction Update</th>
                                    <th>Head</th>
                                    <th>Subhead</th>
                                    <th>Media</th>
                                    <th>YouTube</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($updates as $index => $update)
                                    <tr>
                                        <td>{{ $updates->firstItem() + $index }}</td>
                                        <td>
                                            {{ optional($update->constructionUpdate)->title ?? optional($update->constructionUpdate)->id ?? '—' }}
                                        </td>
                                        <td>{{ $update->getTranslation('head', app()->getLocale()) }}</td>
                                        <td>{{ $update->getTranslation('subhead', app()->getLocale()) }}</td>
                                        <td>
                                            @if ($update->media)
                                                @php $ext = pathinfo($update->media, PATHINFO_EXTENSION); @endphp
                                                @if (in_array($ext, ['mp4', 'mov', 'avi']))
                                                    <video src="{{ asset('storage/' . $update->media) }}"
                                                        width="80" height="50"
                                                        style="object-fit:cover; border-radius:4px;"
                                                        muted></video>
                                                @else
                                                    <img src="{{ asset('storage/' . $update->media) }}"
                                                        width="50" height="50"
                                                        style="object-fit:cover; border-radius:4px;">
                                                @endif
                                            @else
                                                <span class="text-muted">No media</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($update->youtube_link)
                                                <a href="{{ $update->youtube_link }}" target="_blank" class="btn btn-sm btn-outline-danger">
                                                    <i class="fab fa-youtube"></i> Watch
                                                </a>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-warning"
                                                data-toggle="modal"
                                                data-target="#editModal{{ $update->id }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <button class="btn btn-sm btn-danger"
                                                data-toggle="modal"
                                                data-target="#deleteModal{{ $update->id }}">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">No records found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $updates->links() }}
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- ===================== CREATE MODAL ===================== --}}
    <div class="modal fade" id="createConstructionUpdateModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="max-height:90vh; display:flex; flex-direction:column;">
                <div class="modal-header" style="flex-shrink:0;">
                    <h5 class="modal-title">Add Construction Update Project</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('admin.construction-update-project.store') }}"
                      method="POST"
                      enctype="multipart/form-data"
                      style="display:flex; flex-direction:column; flex:1; overflow:hidden;">
                    @csrf
                    <div class="modal-body" style="overflow-y:auto; flex:1;">

                        {{-- Construction Update --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Construction Update
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <select name="construction_update_id" class="form-control">
                                    <option value="">-- Select --</option>
                                    @foreach ($constructionUpdates as $cu)
                                        <option value="{{ $cu->id }}"
                                            {{ old('construction_update_id') == $cu->id ? 'selected' : '' }}>
                                            {{ $cu->title ?? $cu->id }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Head EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Head <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="head[en]" class="form-control"
                                    value="{{ old('head.en') }}" placeholder="Head (English)">
                            </div>
                        </div>

                        {{-- Head AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Head <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="head[ar]" class="form-control"
                                    value="{{ old('head.ar') }}" placeholder="Head (Arabic)" dir="rtl">
                            </div>
                        </div>

                        {{-- Subhead EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Subhead <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="subhead[en]" class="form-control"
                                    value="{{ old('subhead.en') }}" placeholder="Subhead (English)">
                            </div>
                        </div>

                        {{-- Subhead AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Subhead <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="subhead[ar]" class="form-control"
                                    value="{{ old('subhead.ar') }}" placeholder="Subhead (Arabic)" dir="rtl">
                            </div>
                        </div>

                        {{-- YouTube Link --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                <i class="fab fa-youtube text-danger"></i> YouTube Link
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="url" name="youtube_link"
                                    class="form-control @error('youtube_link') is-invalid @enderror"
                                    value="{{ old('youtube_link') }}"
                                    placeholder="e.g. https://www.youtube.com/watch?v=xxxxx">
                                @error('youtube_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Media --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Media
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <div id="image-preview-create" class="image-preview">
                                    <label for="media-upload-create" class="image-preview__default-text">
                                        Choose File
                                    </label>
                                    <input type="file" name="media" id="media-upload-create"
                                        accept="image/*,video/*">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer bg-whitesmoke br-0" style="flex-shrink:0;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ===================== EDIT & DELETE MODALS ===================== --}}
    @foreach ($updates as $update)

        {{-- EDIT MODAL --}}
        <div class="modal fade" id="editModal{{ $update->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="max-height:90vh; display:flex; flex-direction:column;">
                    <div class="modal-header" style="flex-shrink:0;">
                        <h5 class="modal-title">Edit Record #{{ $update->id }}</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="{{ route('admin.construction-update-project.update', $update->id) }}"
                          method="POST"
                          enctype="multipart/form-data"
                          style="display:flex; flex-direction:column; flex:1; overflow:hidden;">
                        @csrf
                        @method('PUT')
                        <div class="modal-body" style="overflow-y:auto; flex:1;">

                            {{-- Construction Update --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Construction Update
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="construction_update_id" class="form-control">
                                        <option value="">-- Select --</option>
                                        @foreach ($constructionUpdates as $cu)
                                            <option value="{{ $cu->id }}"
                                                {{ old('construction_update_id', $update->construction_update_id) == $cu->id ? 'selected' : '' }}>
                                                {{ $cu->title ?? $cu->id }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Head EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Head <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="head[en]" class="form-control"
                                        value="{{ old('head.en', $update->getTranslation('head', 'en')) }}">
                                </div>
                            </div>

                            {{-- Head AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Head <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="head[ar]" class="form-control" dir="rtl"
                                        value="{{ old('head.ar', $update->getTranslation('head', 'ar')) }}">
                                </div>
                            </div>

                            {{-- Subhead EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Subhead <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="subhead[en]" class="form-control"
                                        value="{{ old('subhead.en', $update->getTranslation('subhead', 'en')) }}">
                                </div>
                            </div>

                            {{-- Subhead AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Subhead <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="subhead[ar]" class="form-control" dir="rtl"
                                        value="{{ old('subhead.ar', $update->getTranslation('subhead', 'ar')) }}">
                                </div>
                            </div>

                            {{-- YouTube Link --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    <i class="fab fa-youtube text-danger"></i> YouTube Link
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="url" name="youtube_link"
                                        class="form-control @error('youtube_link') is-invalid @enderror"
                                        value="{{ old('youtube_link', $update->youtube_link) }}"
                                        placeholder="e.g. https://www.youtube.com/watch?v=xxxxx">
                                    @error('youtube_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Media --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Media
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview-edit{{ $update->id }}"
                                        class="image-preview"
                                        @if ($update->media && !in_array(pathinfo($update->media, PATHINFO_EXTENSION), ['mp4','mov','avi']))
                                            style="background-image: url('{{ asset('storage/' . $update->media) }}'); background-size:cover; background-position:center;"
                                        @endif>
                                        <label for="media-upload-edit{{ $update->id }}">
                                            {{ $update->media ? 'Change Media' : 'Choose File' }}
                                        </label>
                                        <input type="file"
                                            name="media"
                                            id="media-upload-edit{{ $update->id }}"
                                            accept="image/*,video/*">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer bg-whitesmoke br-0" style="flex-shrink:0;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- DELETE MODAL --}}
        <div class="modal fade" id="deleteModal{{ $update->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this record?
                    </div>
                    <div class="modal-footer bg-whitesmoke br-0">
                        <form action="{{ route('admin.construction-update-project.destroy', $update->id) }}"
                              method="POST">
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

</div>
@endsection

@push('scripts')
<script>
    {{-- Create modal: media preview --}}
    $('#media-upload-create').on('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#image-preview-create').css({
                    'background-image': 'url(' + e.target.result + ')',
                    'background-size': 'cover',
                    'background-position': 'center'
                });
                $('#image-preview-create label').text('Change Media');
            };
            reader.readAsDataURL(file);
        }
    });

    {{-- Edit modals: media preview --}}
    @foreach ($updates as $update)
    $('#media-upload-edit{{ $update->id }}').on('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#image-preview-edit{{ $update->id }}').css({
                    'background-image': 'url(' + e.target.result + ')',
                    'background-size': 'cover',
                    'background-position': 'center'
                });
                $('#image-preview-edit{{ $update->id }} label').text('Change Media');
            };
            reader.readAsDataURL(file);
        }
    });
    @endforeach

    {{-- Re-open create modal on validation fail --}}
    @if ($errors->any() && !old('_method'))
        $('#createConstructionUpdateModal').modal('show');
    @endif
</script>
@endpush