{{-- resources/views/dashboard/contact_locations/edit.blade.php --}}

@extends('admin.layouts.layout')

@section('title', 'Contact Locations')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Contact Locations</h1>
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
                    <div class="card-body">
                        <form action="{{ route('admin.contact_locations.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- ============================================================ --}}
                            {{-- LOCATION ONE --}}
                            {{-- ============================================================ --}}
                            <p class="font-weight-bold text-uppercase mb-3">Location One (Headquarter)</p>

                            {{-- Location One Title EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Location One Title <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="location_one_title[en]"
                                        class="form-control @error('location_one_title.en') is-invalid @enderror"
                                        value="{{ old('location_one_title.en', $contactLocations->getTranslation('location_one_title', 'en')) }}">
                                    @error('location_one_title.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Location One Title AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Location One Title <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="location_one_title[ar]"
                                        class="form-control @error('location_one_title.ar') is-invalid @enderror" dir="rtl"
                                        value="{{ old('location_one_title.ar', $contactLocations->getTranslation('location_one_title', 'ar')) }}">
                                    @error('location_one_title.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Location One Address Line 1 EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Address Line 1 <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="location_one_address_one[en]"
                                        class="form-control @error('location_one_address_one.en') is-invalid @enderror"
                                        value="{{ old('location_one_address_one.en', $contactLocations->getTranslation('location_one_address_one', 'en')) }}">
                                    @error('location_one_address_one.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Location One Address Line 1 AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Address Line 1 <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="location_one_address_one[ar]"
                                        class="form-control @error('location_one_address_one.ar') is-invalid @enderror"
                                        dir="rtl"
                                        value="{{ old('location_one_address_one.ar', $contactLocations->getTranslation('location_one_address_one', 'ar')) }}">
                                    @error('location_one_address_one.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Location One Address Line 2 EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Address Line 2 <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="location_one_address_two[en]"
                                        class="form-control @error('location_one_address_two.en') is-invalid @enderror"
                                        value="{{ old('location_one_address_two.en', $contactLocations->getTranslation('location_one_address_two', 'en')) }}">
                                    @error('location_one_address_two.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Location One Address Line 2 AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Address Line 2 <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="location_one_address_two[ar]"
                                        class="form-control @error('location_one_address_two.ar') is-invalid @enderror"
                                        dir="rtl"
                                        value="{{ old('location_one_address_two.ar', $contactLocations->getTranslation('location_one_address_two', 'ar')) }}">
                                    @error('location_one_address_two.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Location One Address Line 3 EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Address Line 3 <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="location_one_address_three[en]"
                                        class="form-control @error('location_one_address_three.en') is-invalid @enderror"
                                        value="{{ old('location_one_address_three.en', $contactLocations->getTranslation('location_one_address_three', 'en')) }}">
                                    @error('location_one_address_three.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Location One Address Line 3 AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Address Line 3 <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="location_one_address_three[ar]"
                                        class="form-control @error('location_one_address_three.ar') is-invalid @enderror"
                                        dir="rtl"
                                        value="{{ old('location_one_address_three.ar', $contactLocations->getTranslation('location_one_address_three', 'ar')) }}">
                                    @error('location_one_address_three.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Location One Navigate URL --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Navigate URL
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="location_one_navigate_url"
                                        class="form-control @error('location_one_navigate_url') is-invalid @enderror"
                                        value="{{ old('location_one_navigate_url', $contactLocations->location_one_navigate_url) }}">
                                    @error('location_one_navigate_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                            {{-- ============================================================ --}}
                            {{-- LOCATION TWO --}}
                            {{-- ============================================================ --}}
                            <p class="font-weight-bold text-uppercase mb-3">Location Two (Sheikh Zayed)</p>

                            {{-- Location Two Title EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Location Two Title <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="location_two_title[en]"
                                        class="form-control @error('location_two_title.en') is-invalid @enderror"
                                        value="{{ old('location_two_title.en', $contactLocations->getTranslation('location_two_title', 'en')) }}">
                                    @error('location_two_title.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Location Two Title AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Location Two Title <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="location_two_title[ar]"
                                        class="form-control @error('location_two_title.ar') is-invalid @enderror" dir="rtl"
                                        value="{{ old('location_two_title.ar', $contactLocations->getTranslation('location_two_title', 'ar')) }}">
                                    @error('location_two_title.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Location Two Address Line 1 EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Address Line 1 <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="location_two_address_one[en]"
                                        class="form-control @error('location_two_address_one.en') is-invalid @enderror"
                                        value="{{ old('location_two_address_one.en', $contactLocations->getTranslation('location_two_address_one', 'en')) }}">
                                    @error('location_two_address_one.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Location Two Address Line 1 AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Address Line 1 <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="location_two_address_one[ar]"
                                        class="form-control @error('location_two_address_one.ar') is-invalid @enderror"
                                        dir="rtl"
                                        value="{{ old('location_two_address_one.ar', $contactLocations->getTranslation('location_two_address_one', 'ar')) }}">
                                    @error('location_two_address_one.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Location Two Address Line 2 EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Address Line 2 <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="location_two_address_two[en]"
                                        class="form-control @error('location_two_address_two.en') is-invalid @enderror"
                                        value="{{ old('location_two_address_two.en', $contactLocations->getTranslation('location_two_address_two', 'en')) }}">
                                    @error('location_two_address_two.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Location Two Address Line 2 AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Address Line 2 <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="location_two_address_two[ar]"
                                        class="form-control @error('location_two_address_two.ar') is-invalid @enderror"
                                        dir="rtl"
                                        value="{{ old('location_two_address_two.ar', $contactLocations->getTranslation('location_two_address_two', 'ar')) }}">
                                    @error('location_two_address_two.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Location Two Address Line 3 EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Address Line 3 <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="location_two_address_three[en]"
                                        class="form-control @error('location_two_address_three.en') is-invalid @enderror"
                                        value="{{ old('location_two_address_three.en', $contactLocations->getTranslation('location_two_address_three', 'en')) }}">
                                    @error('location_two_address_three.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Location Two Address Line 3 AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Address Line 3 <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="location_two_address_three[ar]"
                                        class="form-control @error('location_two_address_three.ar') is-invalid @enderror"
                                        dir="rtl"
                                        value="{{ old('location_two_address_three.ar', $contactLocations->getTranslation('location_two_address_three', 'ar')) }}">
                                    @error('location_two_address_three.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Location Two Navigate URL --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Navigate URL
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="location_two_navigate_url"
                                        class="form-control @error('location_two_navigate_url') is-invalid @enderror"
                                        value="{{ old('location_two_navigate_url', $contactLocations->location_two_navigate_url) }}">
                                    @error('location_two_navigate_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                            {{-- ============================================================ --}}
                            {{-- PHONE --}}
                            {{-- ============================================================ --}}
                            <p class="font-weight-bold text-uppercase mb-3">Phone</p>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Phone
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone', $contactLocations->phone) }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <div class="col-sm-12 col-md-7 offset-md-3">
                                    <button type="submit" class="btn btn-primary">
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