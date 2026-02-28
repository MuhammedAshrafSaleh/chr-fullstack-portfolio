@extends('admin.layouts.layout')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Project Headings</h1>
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
                    <strong>Please fix the following errors:</strong>
                    <ul class="mb-0 mt-1">
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
                    <h4>Edit Project Headings</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.project_headings.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- ===================== DETAILS SECTION ===================== --}}
                        <h6 class="text-muted text-uppercase font-weight-bold mt-4 mb-3 border-bottom pb-2">
                            Details Section
                        </h6>

                        {{-- Details Heading EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Details Heading <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="details_heading[en]"
                                       class="form-control @error('details_heading.en') is-invalid @enderror"
                                       value="{{ old('details_heading.en', $projectHeading->getTranslation('details_heading', 'en')) }}">
                                @error('details_heading.en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Details Heading AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Details Heading <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="details_heading[ar]"
                                       class="form-control @error('details_heading.ar') is-invalid @enderror"
                                       dir="rtl"
                                       value="{{ old('details_heading.ar', $projectHeading->getTranslation('details_heading', 'ar')) }}">
                                @error('details_heading.ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Details Subheading EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Details Subheading <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="details_subheading[en]"
                                       class="form-control @error('details_subheading.en') is-invalid @enderror"
                                       value="{{ old('details_subheading.en', $projectHeading->getTranslation('details_subheading', 'en')) }}">
                                @error('details_subheading.en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Details Subheading AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Details Subheading <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="details_subheading[ar]"
                                       class="form-control @error('details_subheading.ar') is-invalid @enderror"
                                       dir="rtl"
                                       value="{{ old('details_subheading.ar', $projectHeading->getTranslation('details_subheading', 'ar')) }}">
                                @error('details_subheading.ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- ===================== IMAGES SECTION ===================== --}}
                        <h6 class="text-muted text-uppercase font-weight-bold mt-4 mb-3 border-bottom pb-2">
                            Images Section
                        </h6>

                        {{-- Images Heading EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Images Heading <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="images_heading[en]"
                                       class="form-control @error('images_heading.en') is-invalid @enderror"
                                       value="{{ old('images_heading.en', $projectHeading->getTranslation('images_heading', 'en')) }}">
                                @error('images_heading.en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Images Heading AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Images Heading <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="images_heading[ar]"
                                       class="form-control @error('images_heading.ar') is-invalid @enderror"
                                       dir="rtl"
                                       value="{{ old('images_heading.ar', $projectHeading->getTranslation('images_heading', 'ar')) }}">
                                @error('images_heading.ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Images Subheading EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Images Subheading <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="images_subheading[en]"
                                       class="form-control @error('images_subheading.en') is-invalid @enderror"
                                       value="{{ old('images_subheading.en', $projectHeading->getTranslation('images_subheading', 'en')) }}">
                                @error('images_subheading.en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Images Subheading AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Images Subheading <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="images_subheading[ar]"
                                       class="form-control @error('images_subheading.ar') is-invalid @enderror"
                                       dir="rtl"
                                       value="{{ old('images_subheading.ar', $projectHeading->getTranslation('images_subheading', 'ar')) }}">
                                @error('images_subheading.ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- ===================== SERVICES SECTION ===================== --}}
                        <h6 class="text-muted text-uppercase font-weight-bold mt-4 mb-3 border-bottom pb-2">
                            Services Section
                        </h6>

                        {{-- Services Heading EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Services Heading <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="services_heading[en]"
                                       class="form-control @error('services_heading.en') is-invalid @enderror"
                                       value="{{ old('services_heading.en', $projectHeading->getTranslation('services_heading', 'en')) }}">
                                @error('services_heading.en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Services Heading AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Services Heading <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="services_heading[ar]"
                                       class="form-control @error('services_heading.ar') is-invalid @enderror"
                                       dir="rtl"
                                       value="{{ old('services_heading.ar', $projectHeading->getTranslation('services_heading', 'ar')) }}">
                                @error('services_heading.ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Services Subheading EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Services Subheading <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="services_subheading[en]"
                                       class="form-control @error('services_subheading.en') is-invalid @enderror"
                                       value="{{ old('services_subheading.en', $projectHeading->getTranslation('services_subheading', 'en')) }}">
                                @error('services_subheading.en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Services Subheading AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Services Subheading <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="services_subheading[ar]"
                                       class="form-control @error('services_subheading.ar') is-invalid @enderror"
                                       dir="rtl"
                                       value="{{ old('services_subheading.ar', $projectHeading->getTranslation('services_subheading', 'ar')) }}">
                                @error('services_subheading.ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- ===================== PLANS SECTION ===================== --}}
                        <h6 class="text-muted text-uppercase font-weight-bold mt-4 mb-3 border-bottom pb-2">
                            Plans Section
                        </h6>

                        {{-- Plans Heading EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Plans Heading <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="plans_heading[en]"
                                       class="form-control @error('plans_heading.en') is-invalid @enderror"
                                       value="{{ old('plans_heading.en', $projectHeading->getTranslation('plans_heading', 'en')) }}">
                                @error('plans_heading.en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Plans Heading AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Plans Heading <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="plans_heading[ar]"
                                       class="form-control @error('plans_heading.ar') is-invalid @enderror"
                                       dir="rtl"
                                       value="{{ old('plans_heading.ar', $projectHeading->getTranslation('plans_heading', 'ar')) }}">
                                @error('plans_heading.ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Plans Subheading EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Plans Subheading <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="plans_subheading[en]"
                                       class="form-control @error('plans_subheading.en') is-invalid @enderror"
                                       value="{{ old('plans_subheading.en', $projectHeading->getTranslation('plans_subheading', 'en')) }}">
                                @error('plans_subheading.en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Plans Subheading AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Plans Subheading <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="plans_subheading[ar]"
                                       class="form-control @error('plans_subheading.ar') is-invalid @enderror"
                                       dir="rtl"
                                       value="{{ old('plans_subheading.ar', $projectHeading->getTranslation('plans_subheading', 'ar')) }}">
                                @error('plans_subheading.ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- ===================== LOCATION SECTION ===================== --}}
                        <h6 class="text-muted text-uppercase font-weight-bold mt-4 mb-3 border-bottom pb-2">
                            Location Section
                        </h6>

                        {{-- Location Heading EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Location Heading <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="location_heading[en]"
                                       class="form-control @error('location_heading.en') is-invalid @enderror"
                                       value="{{ old('location_heading.en', $projectHeading->getTranslation('location_heading', 'en')) }}">
                                @error('location_heading.en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Location Heading AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Location Heading <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="location_heading[ar]"
                                       class="form-control @error('location_heading.ar') is-invalid @enderror"
                                       dir="rtl"
                                       value="{{ old('location_heading.ar', $projectHeading->getTranslation('location_heading', 'ar')) }}">
                                @error('location_heading.ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Location Subheading EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Location Subheading <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="location_subheading[en]"
                                       class="form-control @error('location_subheading.en') is-invalid @enderror"
                                       value="{{ old('location_subheading.en', $projectHeading->getTranslation('location_subheading', 'en')) }}">
                                @error('location_subheading.en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Location Subheading AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Location Subheading <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text"
                                       name="location_subheading[ar]"
                                       class="form-control @error('location_subheading.ar') is-invalid @enderror"
                                       dir="rtl"
                                       value="{{ old('location_subheading.ar', $projectHeading->getTranslation('location_subheading', 'ar')) }}">
                                @error('location_subheading.ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="form-group row mb-0">
                            <div class="col-sm-12 col-md-7 offset-md-3">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    Save Changes
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </section>
</div>
@endsection

@push('scripts')
{{-- No additional scripts needed --}}
@endpush