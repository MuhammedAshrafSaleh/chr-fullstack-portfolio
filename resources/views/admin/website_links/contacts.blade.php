@extends('admin.layouts.layout')

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Contacts</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Contacts</div>
                </div>
            </div>

            <div class="section-body">

                {{-- Alerts --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
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
                        <h4>All Contacts</h4>
                        <div class="card-header-action">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#createContactModal">
                                <i class="fas fa-plus"></i> Add Contact
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="contactsTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Link</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->getTranslation('title', app()->getLocale()) }}</td>
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
                </div>

            </div>
        </section>
    </div>

    {{-- ===================== CREATE MODAL ===================== --}}
    <div class="modal fade" id="createContactModal" tabindex="-1" role="dialog" aria-labelledby="createContactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
                <div class="modal-header" style="flex-shrink: 0;">
                    <h5 class="modal-title" id="createContactModalLabel">Add Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.contacts.store') }}" method="POST"
                      style="display: flex; flex-direction: column; flex: 1; overflow: hidden;">
                    @csrf
                    <div class="modal-body" style="overflow-y: auto; flex: 1;">

                        {{-- Title EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Title <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="title[en]"
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
                                <input type="text"
                                       name="title[ar]"
                                       class="form-control @error('title.ar') is-invalid @enderror"
                                       value="{{ old('title.ar') }}"
                                       dir="rtl">
                                @error('title.ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                       class="form-control @error('link') is-invalid @enderror"
                                       value="{{ old('link') }}"
                                       placeholder="e.g. +20 123 456 7890 or mailto:info@example.com">
                                @error('link')
                                    <div class="invalid-feedback">{{ $message }}</div>
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

    {{-- ===================== EDIT & DELETE MODALS ===================== --}}
    @foreach ($contacts as $item)

        {{-- EDIT MODAL --}}
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
                    <div class="modal-header" style="flex-shrink: 0;">
                        <h5 class="modal-title">Edit Contact</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.contacts.update', $item->id) }}" method="POST"
                          style="display: flex; flex-direction: column; flex: 1; overflow: hidden;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="modal-body" style="overflow-y: auto; flex: 1;">

                            {{-- Title EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Title <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text"
                                           name="title[en]"
                                           class="form-control @error('title.en') is-invalid @enderror"
                                           value="{{ old('title.en', $item->getTranslation('title', 'en')) }}">
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
                                    <input type="text"
                                           name="title[ar]"
                                           class="form-control @error('title.ar') is-invalid @enderror"
                                           value="{{ old('title.ar', $item->getTranslation('title', 'ar')) }}"
                                           dir="rtl">
                                    @error('title.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
                                           class="form-control @error('link') is-invalid @enderror"
                                           value="{{ old('link', $item->link) }}"
                                           placeholder="e.g. +20 123 456 7890 or mailto:info@example.com">
                                    @error('link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
                        <h5 class="modal-title">Delete Contact</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete
                        <strong>{{ $item->getTranslation('title', 'en') }}</strong>?
                        This action cannot be undone.
                    </div>
                    <div class="modal-footer bg-whitesmoke br-0">
                        <form action="{{ route('admin.contacts.destroy', $item->id) }}" method="POST">
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
            $('#contactsTable').DataTable({
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
                $('#createContactModal').modal('show');
            @endif

            @if ($errors->any() && old('_method') === 'PUT')
                $('#editModal{{ old('id') }}').modal('show');
            @endif
        });
    </script>
@endpush