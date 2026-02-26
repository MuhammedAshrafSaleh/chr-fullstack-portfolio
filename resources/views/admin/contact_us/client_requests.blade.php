@extends('admin.layouts.layout')

@section('title', 'Client Requests')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Client Requests</h1>
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

            {{-- Validation Errors --}}
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
                    <h4>All Client Requests</h4>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#createClientRequestModal">
                        <i class="fas fa-plus"></i> Add New
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                    <th>Company</th>
                                    <th>Subject</th>
                                    <th>Preferred Date</th>
                                    <th>Role</th>
                                    <th>Preferred Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($clientRequests as $clientRequest)
                                    <tr>
                                        <td>{{ $loop->iteration + ($clientRequests->currentPage() - 1) * 10 }}</td>
                                        <td>{{ $clientRequest->full_name }}</td>
                                        <td>{{ $clientRequest->email }}</td>
                                        <td>{{ $clientRequest->telephone }}</td>
                                        <td>{{ $clientRequest->company }}</td>
                                        <td>{{ $clientRequest->subject }}</td>
                                        <td>{{ $clientRequest->preferred_date }}</td>
                                        <td>{{ $clientRequest->role }}</td>
                                        <td>{{ $clientRequest->preferred_time }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                data-target="#editModal{{ $clientRequest->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#deleteModal{{ $clientRequest->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">No client requests found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- Table is fully closed here. Modals go BELOW, never inside <tbody> --}}
                    </div>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center mt-3">
                        {{ $clientRequests->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- ============================================================
     MODALS — rendered OUTSIDE the table in a dedicated loop
     ============================================================ --}}

{{-- Create Modal --}}
<div class="modal fade" id="createClientRequestModal" tabindex="-1" role="dialog"
    aria-labelledby="createClientRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
            <div class="modal-header" style="flex-shrink: 0;">
                <h5 class="modal-title" id="createClientRequestModalLabel">New Client Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.clients_requests.store') }}" method="POST"
                style="display: flex; flex-direction: column; flex: 1; overflow: hidden;">
                @csrf
                <div class="modal-body" style="overflow-y: auto; flex: 1;">

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Full Name</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="full_name" class="form-control"
                                value="{{ old('full_name') }}" required>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email') }}" required>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Telephone</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="telephone" class="form-control"
                                value="{{ old('telephone') }}" required>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Company</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="company" class="form-control"
                                value="{{ old('company') }}" required>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Subject</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" name="subject" class="form-control"
                                value="{{ old('subject') }}" required>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preferred Date</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="date" name="preferred_date" class="form-control"
                                value="{{ old('preferred_date') }}" required>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                        <div class="col-sm-12 col-md-7">
                            <select name="role" class="form-control" required>
                                <option value="">-- Select Role --</option>
                                @foreach (['Manager', 'Developer', 'Designer', 'CEO', 'Other'] as $roleOption)
                                    <option value="{{ $roleOption }}"
                                        {{ old('role') === $roleOption ? 'selected' : '' }}>
                                        {{ $roleOption }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preferred Time</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="time" name="preferred_time" class="form-control"
                                value="{{ old('preferred_time') }}" required>
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

{{-- Edit & Delete Modals — one pair per row, in a separate loop after the table --}}
@foreach ($clientRequests as $clientRequest)

    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal{{ $clientRequest->id }}" tabindex="-1" role="dialog"
        aria-labelledby="editModalLabel{{ $clientRequest->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
                <div class="modal-header" style="flex-shrink: 0;">
                    <h5 class="modal-title" id="editModalLabel{{ $clientRequest->id }}">
                        Edit Client Request
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.clients_requests.update', $clientRequest->id) }}"
                    method="POST"
                    style="display: flex; flex-direction: column; flex: 1; overflow: hidden;">
                    @csrf
                    @method('PUT')
                    <div class="modal-body" style="overflow-y: auto; flex: 1;">

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Full Name</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="full_name" class="form-control"
                                    value="{{ old('full_name', $clientRequest->full_name) }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $clientRequest->email) }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Telephone</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="telephone" class="form-control"
                                    value="{{ old('telephone', $clientRequest->telephone) }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Company</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="company" class="form-control"
                                    value="{{ old('company', $clientRequest->company) }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Subject</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="subject" class="form-control"
                                    value="{{ old('subject', $clientRequest->subject) }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preferred Date</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="date" name="preferred_date" class="form-control"
                                    value="{{ old('preferred_date', $clientRequest->preferred_date) }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                            <div class="col-sm-12 col-md-7">
                                <select name="role" class="form-control" required>
                                    @foreach (['Manager', 'Developer', 'Designer', 'CEO', 'Other'] as $roleOption)
                                        <option value="{{ $roleOption }}"
                                            {{ old('role', $clientRequest->role) === $roleOption ? 'selected' : '' }}>
                                            {{ $roleOption }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preferred Time</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="time" name="preferred_time" class="form-control"
                                    value="{{ old('preferred_time', $clientRequest->preferred_time) }}" required>
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

    {{-- Delete Modal --}}
    <div class="modal fade" id="deleteModal{{ $clientRequest->id }}" tabindex="-1" role="dialog"
        aria-labelledby="deleteModalLabel{{ $clientRequest->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $clientRequest->id }}">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete the request from
                    <strong>{{ $clientRequest->full_name }}</strong>?
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.clients_requests.destroy', $clientRequest->id) }}" method="POST">
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
<script>
    @if ($errors->any() && !old('_method'))
        $('#createClientRequestModal').modal('show');
    @endif
</script>
@endpush