@extends('admin.layouts.layout')

@section('title', 'About Numbers')

@section('content')
  <div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>About Numbers</h1>
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
                    <h4>All Records</h4>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#createAboutNumberModal">
                        <i class="fas fa-plus"></i> Add New
                    </button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Number</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($aboutNumbers as $aboutNumber)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $aboutNumber->number }}</td>
                                        <td>{{ $aboutNumber->getTranslation('title', app()->getLocale()) }}</td>
                                        <td>{{ Str::limit($aboutNumber->getTranslation('subtitle', app()->getLocale()), 60) }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning"
                                                data-toggle="modal"
                                                data-target="#editModal{{ $aboutNumber->id }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <button class="btn btn-sm btn-danger"
                                                data-toggle="modal"
                                                data-target="#deleteModal{{ $aboutNumber->id }}">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No records found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if ($aboutNumbers->hasPages())
                    <div class="card-footer">
                        {{ $aboutNumbers->links() }}
                    </div>
                @endif
            </div>

        </div>
    </section>

    {{-- ======================================================
         MODALS — outside the table to keep valid HTML
    ====================================================== --}}
    @foreach ($aboutNumbers as $aboutNumber)

        {{-- Edit Modal --}}
        <div class="modal fade" id="editModal{{ $aboutNumber->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
                    <div class="modal-header" style="flex-shrink: 0;">
                        <h5 class="modal-title">Edit About Number</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.about_numbers.update', $aboutNumber->id) }}"
                        method="POST"
                        style="display: flex; flex-direction: column; flex: 1; overflow: hidden;">
                        @csrf
                        @method('PUT')
                        <div class="modal-body" style="overflow-y: auto; flex: 1;">

                            {{-- Number --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Number</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="number" class="form-control"
                                        value="{{ old('number', $aboutNumber->number) }}"
                                        placeholder="e.g. 260+">
                                </div>
                            </div>

                            {{-- Title EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Title <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title[en]" class="form-control"
                                        value="{{ old('title.en', $aboutNumber->getTranslation('title', 'en')) }}">
                                </div>
                            </div>

                            {{-- Title AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Title <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title[ar]" class="form-control" dir="rtl"
                                        value="{{ old('title.ar', $aboutNumber->getTranslation('title', 'ar')) }}">
                                </div>
                            </div>

                            {{-- Subtitle EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Subtitle <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="subtitle[en]" class="form-control" rows="3">{{ old('subtitle.en', $aboutNumber->getTranslation('subtitle', 'en')) }}</textarea>
                                </div>
                            </div>

                            {{-- Subtitle AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Subtitle <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="subtitle[ar]" class="form-control" rows="3" dir="rtl">{{ old('subtitle.ar', $aboutNumber->getTranslation('subtitle', 'ar')) }}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer bg-whitesmoke br-0" style="flex-shrink: 0;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Delete Modal --}}
        <div class="modal fade" id="deleteModal{{ $aboutNumber->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this record?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form action="{{ route('admin.about_numbers.destroy', $aboutNumber->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endforeach

    {{-- Create Modal --}}
    <div class="modal fade" id="createAboutNumberModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
                <div class="modal-header" style="flex-shrink: 0;">
                    <h5 class="modal-title">Add About Number</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.about_numbers.store') }}" method="POST"
                    style="display: flex; flex-direction: column; flex: 1; overflow: hidden;">
                    @csrf
                    <div class="modal-body" style="overflow-y: auto; flex: 1;">

                        {{-- Number --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Number</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="number" class="form-control"
                                    value="{{ old('number') }}" placeholder="e.g. 260+">
                            </div>
                        </div>

                        {{-- Title EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Title <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="title[en]" class="form-control"
                                    value="{{ old('title.en') }}">
                            </div>
                        </div>

                        {{-- Title AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Title <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="title[ar]" class="form-control"
                                    value="{{ old('title.ar') }}" dir="rtl">
                            </div>
                        </div>

                        {{-- Subtitle EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Subtitle <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <textarea name="subtitle[en]" class="form-control" rows="3">{{ old('subtitle.en') }}</textarea>
                            </div>
                        </div>

                        {{-- Subtitle AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Subtitle <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <textarea name="subtitle[ar]" class="form-control" rows="3" dir="rtl">{{ old('subtitle.ar') }}</textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer bg-whitesmoke br-0" style="flex-shrink: 0;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

  </div>
@endsection

@push('scripts')
    @if ($errors->any() && !old('_method'))
        <script>
            $('#createAboutNumberModal').modal('show');
        </script>
    @endif
@endpush