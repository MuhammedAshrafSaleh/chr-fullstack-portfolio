@extends('admin.layouts.layout')

@section('title', 'Team')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Team</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Team</div>
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
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Team Members</h4>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#createTeamModal">
                            <i class="fas fa-plus"></i> Add Member
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($team as $member)
                                        <tr>
                                            <td>{{ $loop->iteration + ($team->currentPage() - 1) * 10 }}</td>
                                            <td>{{ $member->title }}</td>
                                            <td>{{ $member->subtitle }}</td>
                                            <td>
                                                @if ($member->image)
                                                    <img src="{{ asset('storage/' . $member->image) }}" width="50" height="50"
                                                        style="object-fit:cover; border-radius:50%;">
                                                @else
                                                    <span class="text-muted">No image</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                    data-target="#editModal{{ $member->id }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#deleteModal{{ $member->id }}">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-4">No team members found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if ($team->hasPages())
                        <div class="card-footer">
                            {{ $team->links() }}
                        </div>
                    @endif
                </div>

            </div>
        </section>

        {{-- ===================== CREATE MODAL ===================== --}}
        <div class="modal fade" id="createTeamModal" tabindex="-1" role="dialog" aria-labelledby="createTeamModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
                    <div class="modal-header" style="flex-shrink: 0;">
                        <h5 class="modal-title" id="createTeamModalLabel">Add Team Member</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data"
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
                                        value="{{ old('title.en') }}" placeholder="e.g. Robert Chen">
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
                                        value="{{ old('title.ar') }}" dir="rtl" placeholder="مثال: روبرت تشن">
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
                                        value="{{ old('subtitle.en') }}" placeholder="e.g. Senior Developer">
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
                                        value="{{ old('subtitle.ar') }}" dir="rtl" placeholder="مثال: مطور أول">
                                    @error('subtitle.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer bg-whitesmoke br-0" style="flex-shrink: 0;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Member</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- ===================== EDIT & DELETE MODALS ===================== --}}
        @foreach ($team as $member)

            {{-- EDIT MODAL --}}
            <div class="modal fade" id="editModal{{ $member->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
                        <div class="modal-header" style="flex-shrink: 0;">
                            <h5 class="modal-title">Edit Team Member</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('admin.team.update', $member->id) }}" method="POST" enctype="multipart/form-data"
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
                                            value="{{ old('title.en', $member->getTranslation('title', 'en')) }}">
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
                                        <input type="text" name="title[ar]" dir="rtl"
                                            class="form-control @error('title.ar') is-invalid @enderror"
                                            value="{{ old('title.ar', $member->getTranslation('title', 'ar')) }}">
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
                                            value="{{ old('subtitle.en', $member->getTranslation('subtitle', 'en')) }}">
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
                                        <input type="text" name="subtitle[ar]" dir="rtl"
                                            class="form-control @error('subtitle.ar') is-invalid @enderror"
                                            value="{{ old('subtitle.ar', $member->getTranslation('subtitle', 'ar')) }}">
                                        @error('subtitle.ar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Image --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview-edit{{ $member->id }}" class="image-preview" @if($member->image)
                                            style="background-image: url('{{ asset('storage/' . $member->image) }}');
                                        background-size: cover; background-position: center;" @endif>
                                            <label for="image-upload-edit{{ $member->id }}">
                                                {{ $member->image ? 'Change Image' : 'Choose File' }}
                                            </label>
                                            <input type="file" name="image" id="image-upload-edit{{ $member->id }}"
                                                accept="image/*">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer bg-whitesmoke br-0" style="flex-shrink: 0;">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Update Member</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- DELETE MODAL --}}
            <div class="modal fade" id="deleteModal{{ $member->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Team Member</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete <strong>{{ $member->getTranslation('title', 'en') }}</strong>?
                            </p>
                            <p class="text-muted small">This action cannot be undone.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
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
        { { --Image preview — Create modal-- } }
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

        { { --Image preview — Edit modals-- } }
        @foreach ($team as $member)
            $('#image-upload-edit{{ $member->id }}').on('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image-preview-edit{{ $member->id }}').css({
                            'background-image': 'url(' + e.target.result + ')',
                            'background-size': 'cover',
                            'background-position': 'center'
                        });
                        $('#image-preview-edit{{ $member->id }} label').text('Change Image');
                    };
                    reader.readAsDataURL(file);
                }
            });
        @endforeach

        @if ($errors->any() && !old('_method'))
            $('#createTeamModal').modal('show');
        @endif
        </sc ript>
@endpush