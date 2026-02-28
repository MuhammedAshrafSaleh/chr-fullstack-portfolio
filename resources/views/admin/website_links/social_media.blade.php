{{-- resources/views/dashboard/social_media/index.blade.php --}}

@extends('admin.layouts.layout')

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Social Media</h1>
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
                    <h4>All Social Media</h4>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#createSocialMediaModal">
                        <i class="fas fa-plus"></i> Add New
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="socialMediaTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Link</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($socialMedias as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $item->image) }}"
                                             alt="{{ $item->title }}"
                                             width="60" height="60"
                                             style="object-fit: cover; border-radius: 6px;">
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->link }}</td>
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
            </div>{{-- end card --}}

        </div>
    </section>
</div>{{-- end main-content --}}


{{-- ==================== CREATE MODAL ==================== --}}
<div class="modal fade" id="createSocialMediaModal" tabindex="-1" role="dialog" aria-labelledby="createSocialMediaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
            <div class="modal-header" style="flex-shrink: 0;">
                <h5 class="modal-title" id="createSocialMediaModalLabel">Add Social Media</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.social_media.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  style="display: flex; flex-direction: column; flex: 1; overflow: hidden;">
                @csrf
                <div class="modal-body" style="overflow-y: auto; flex: 1;">

                    {{-- Image --}}
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                            Image
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input type="file" name="image" class="form-control" accept="image/*" required>
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
                                   placeholder="e.g. Facebook">
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
                                   placeholder="e.g. فيسبوك"
                                   dir="rtl">
                        </div>
                    </div>

                    {{-- Link --}}
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                            Link
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text"
                                   name="link"
                                   class="form-control"
                                   value="{{ old('link') }}"
                                   placeholder="e.g. https://facebook.com/yourpage">
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


{{-- ==================== EDIT & DELETE MODALS (looped, outside table) ==================== --}}
@foreach ($socialMedias as $item)

    {{-- EDIT MODAL --}}
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
                <div class="modal-header" style="flex-shrink: 0;">
                    <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Social Media</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.social_media.update', $item->id) }}"
                      method="POST"
                      enctype="multipart/form-data"
                      style="display: flex; flex-direction: column; flex: 1; overflow: hidden;">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <div class="modal-body" style="overflow-y: auto; flex: 1;">

                        {{-- Image --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Image
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="file" name="image" class="form-control" accept="image/*">
                                <img src="{{ asset('storage/' . $item->image) }}"
                                     alt="Current Image"
                                     width="80"
                                     style="margin-top:8px; border-radius:6px;">
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
                                       value="{{ old('title.en', $item->getTranslation('title', 'en')) }}">
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
                                       dir="rtl">
                            </div>
                        </div>

                        {{-- Link --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Link
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="link"
                                       class="form-control"
                                       value="{{ old('link', $item->link) }}"
                                       placeholder="e.g. https://facebook.com/yourpage">
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
    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Delete Social Media</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete <strong>{{ $item->title }}</strong>? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.social_media.destroy', $item->id) }}" method="POST">
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
        $('#socialMediaTable').DataTable({
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
            $('#createSocialMediaModal').modal('show');
        @endif

        @if ($errors->any() && old('_method') === 'PUT')
            $('#editModal{{ old('id') }}').modal('show');
        @endif
    });
</script>
@endpush