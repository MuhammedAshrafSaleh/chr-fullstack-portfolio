@extends('admin.layouts.layout')

@section('title', 'Testimonials')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Testimonials</h1>
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
                <div class="card-header">
                    <h4>All Testimonials</h4>
                    <div class="card-header-action">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#createTestimonialModal">
                            <i class="fas fa-plus"></i> Add Testimonial
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Rate</th>
                                    <th>Review</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($testimonials as $testimonial)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <span class="badge badge-primary">{{ $testimonial->rate }}</span>
                                        </td>
                                        <td>{{ \Illuminate\Support\Str::limit($testimonial->review, 60) }}</td>
                                        <td>{{ $testimonial->name }}</td>
                                        <td>{{ $testimonial->title }}</td>
                                        <td>
                                            @if ($testimonial->image)
                                                <img src="{{ asset('storage/' . $testimonial->image) }}" width="50" height="50"
                                                    style="object-fit:cover; border-radius:50%;">
                                            @else
                                                <span class="text-muted">No image</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info" data-toggle="modal"
                                                data-target="#editModal{{ $testimonial->id }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#deleteModal{{ $testimonial->id }}">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">No testimonials found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center mt-3">
                        {{ $testimonials->links() }}
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- ===================== CREATE MODAL ===================== --}}
    <div class="modal fade" id="createTestimonialModal" tabindex="-1" role="dialog"
        aria-labelledby="createTestimonialModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">

                <div class="modal-header" style="flex-shrink: 0;">
                    <h5 class="modal-title" id="createTestimonialModalLabel">Add New Testimonial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data"
                    style="display: flex; flex-direction: column; flex: 1; overflow: hidden;">
                    @csrf

                    <div class="modal-body" style="overflow-y: auto; flex: 1;">

                        {{-- Rate --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Rate</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="number" name="rate" step="0.1" min="0" max="5"
                                    class="form-control @error('rate') is-invalid @enderror" value="{{ old('rate') }}"
                                    placeholder="e.g. 4.9">
                                @error('rate')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Review EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Review <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <textarea name="review[en]" rows="4"
                                    class="form-control @error('review.en') is-invalid @enderror"
                                    placeholder="Review in English">{{ old('review.en') }}</textarea>
                                @error('review.en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Review AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Review <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <textarea name="review[ar]" rows="4" dir="rtl"
                                    class="form-control @error('review.ar') is-invalid @enderror"
                                    placeholder="Review in Arabic">{{ old('review.ar') }}</textarea>
                                @error('review.ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Name EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Name <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="name[en]"
                                    class="form-control @error('name.en') is-invalid @enderror" value="{{ old('name.en') }}"
                                    placeholder="Reviewer name in English">
                                @error('name.en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Name AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Name <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="name[ar]" dir="rtl"
                                    class="form-control @error('name.ar') is-invalid @enderror" value="{{ old('name.ar') }}"
                                    placeholder="Reviewer name in Arabic">
                                @error('name.ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Title EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Job Title <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="title[en]"
                                    class="form-control @error('title.en') is-invalid @enderror"
                                    value="{{ old('title.en') }}" placeholder="Job title in English">
                                @error('title.en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Title AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Job Title <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="title[ar]" dir="rtl"
                                    class="form-control @error('title.ar') is-invalid @enderror"
                                    value="{{ old('title.ar') }}" placeholder="Job title in Arabic">
                                @error('title.ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Image --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                            <div class="col-sm-12 col-md-7">
                                <div id="image-preview-create" class="image-preview">
                                    <label for="image-upload-create" id="image-label-create">Choose File</label>
                                    <input type="file" name="image" id="image-upload-create" accept="image/*">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer bg-whitesmoke br-0" style="flex-shrink: 0;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {{-- ===================== EDIT & DELETE MODALS (per item) ===================== --}}
    @foreach ($testimonials as $testimonial)

        {{-- EDIT MODAL --}}
        <div class="modal fade" id="editModal{{ $testimonial->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editModalLabel{{ $testimonial->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">

                    <div class="modal-header" style="flex-shrink: 0;">
                        <h5 class="modal-title" id="editModalLabel{{ $testimonial->id }}">Edit Testimonial</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST"
                        enctype="multipart/form-data" style="display: flex; flex-direction: column; flex: 1; overflow: hidden;">
                        @csrf
                        @method('PUT')

                        <div class="modal-body" style="overflow-y: auto; flex: 1;">

                            {{-- Rate --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Rate</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" name="rate" step="0.1" min="0" max="5" class="form-control"
                                        value="{{ old('rate', $testimonial->rate) }}" placeholder="e.g. 4.9">
                                </div>
                            </div>

                            {{-- Review EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Review <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="review[en]" rows="4" class="form-control"
                                        placeholder="Review in English">{{ old('review.en', $testimonial->getTranslation('review', 'en')) }}</textarea>
                                </div>
                            </div>

                            {{-- Review AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Review <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="review[ar]" rows="4" dir="rtl" class="form-control"
                                        placeholder="Review in Arabic">{{ old('review.ar', $testimonial->getTranslation('review', 'ar')) }}</textarea>
                                </div>
                            </div>

                            {{-- Name EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Name <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="name[en]" class="form-control"
                                        value="{{ old('name.en', $testimonial->getTranslation('name', 'en')) }}"
                                        placeholder="Reviewer name in English">
                                </div>
                            </div>

                            {{-- Name AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Name <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="name[ar]" dir="rtl" class="form-control"
                                        value="{{ old('name.ar', $testimonial->getTranslation('name', 'ar')) }}"
                                        placeholder="Reviewer name in Arabic">
                                </div>
                            </div>

                            {{-- Title EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Job Title <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title[en]" class="form-control"
                                        value="{{ old('title.en', $testimonial->getTranslation('title', 'en')) }}"
                                        placeholder="Job title in English">
                                </div>
                            </div>

                            {{-- Title AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Job Title <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title[ar]" dir="rtl" class="form-control"
                                        value="{{ old('title.ar', $testimonial->getTranslation('title', 'ar')) }}"
                                        placeholder="Job title in Arabic">
                                </div>
                            </div>

                            {{-- Image --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview-edit{{ $testimonial->id }}" class="image-preview"
                                        @if($testimonial->image) style="background-image: url('{{ asset('storage/' . $testimonial->image) }}');
                                           background-size: cover; background-position: center;" @endif>
                                        <label for="image-upload-edit{{ $testimonial->id }}">
                                            {{ $testimonial->image ? 'Change Image' : 'Choose File' }}
                                        </label>
                                        <input type="file" name="image" id="image-upload-edit{{ $testimonial->id }}"
                                            accept="image/*">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer bg-whitesmoke br-0" style="flex-shrink: 0;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        {{-- DELETE MODAL --}}
        <div class="modal fade" id="deleteModal{{ $testimonial->id }}" tabindex="-1" role="dialog"
            aria-labelledby="deleteModalLabel{{ $testimonial->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{ $testimonial->id }}">Delete Testimonial</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <p>Are you sure you want to delete the testimonial by
                            <strong>{{ $testimonial->getTranslation('name', 'en') }}</strong>?</p>
                        <p class="text-muted small">This action cannot be undone.</p>
                    </div>

                    <div class="modal-footer bg-whitesmoke br-0">
                        <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Delete
                            </button>
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
        // ── Create modal image preview ──────────────────────────────
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

        // ── Edit modal image previews ────────────────────────────────
        @foreach ($testimonials as $testimonial)
            $('#image-upload-edit{{ $testimonial->id }}').on('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image-preview-edit{{ $testimonial->id }}').css({
                            'background-image': 'url(' + e.target.result + ')',
                            'background-size': 'cover',
                            'background-position': 'center'
                        });
                        $('#image-preview-edit{{ $testimonial->id }} label').text('Change Image');
                    };
                    reader.readAsDataURL(file);
                }
            });
        @endforeach

        // ── Re-open create modal on validation fail ─────────────────
        @if ($errors->any() && !old('_method'))
            $('#createTestimonialModal').modal('show');
        @endif
    </script>
@endpush