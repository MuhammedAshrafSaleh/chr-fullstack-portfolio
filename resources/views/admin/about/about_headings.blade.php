@extends('admin.layouts.layout')

@section('title', 'About Headings')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>About Headings</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">About Headings</div>
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
                        <h4>Edit About Headings</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.about_headings.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- ======================== --}}
                            {{-- Group 1: About Numbers --}}
                            {{-- ======================== --}}
                            <h6 class="text-muted mb-4">About Numbers</h6>

                            {{-- about_numbers_title EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Numbers Title <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="about_numbers_title[en]"
                                        class="form-control @error('about_numbers_title.en') is-invalid @enderror"
                                        value="{{ old('about_numbers_title.en', $aboutHeading->getTranslation('about_numbers_title', 'en')) }}">
                                    @error('about_numbers_title.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- about_numbers_title AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Numbers Title <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="about_numbers_title[ar]"
                                        class="form-control @error('about_numbers_title.ar') is-invalid @enderror"
                                        value="{{ old('about_numbers_title.ar', $aboutHeading->getTranslation('about_numbers_title', 'ar')) }}"
                                        dir="rtl">
                                    @error('about_numbers_title.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- about_numbers_subtitle EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Numbers Subtitle <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="about_numbers_subtitle[en]"
                                        class="form-control @error('about_numbers_subtitle.en') is-invalid @enderror"
                                        value="{{ old('about_numbers_subtitle.en', $aboutHeading->getTranslation('about_numbers_subtitle', 'en')) }}">
                                    @error('about_numbers_subtitle.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- about_numbers_subtitle AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Numbers Subtitle <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="about_numbers_subtitle[ar]"
                                        class="form-control @error('about_numbers_subtitle.ar') is-invalid @enderror"
                                        value="{{ old('about_numbers_subtitle.ar', $aboutHeading->getTranslation('about_numbers_subtitle', 'ar')) }}"
                                        dir="rtl">
                                    @error('about_numbers_subtitle.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                            {{-- ======================== --}}
                            {{-- Group 2: Testimonials --}}
                            {{-- ======================== --}}
                            <h6 class="text-muted mb-4">Testimonials</h6>

                            {{-- testimonials_title EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Testimonials Title <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="testimonials_title[en]"
                                        class="form-control @error('testimonials_title.en') is-invalid @enderror"
                                        value="{{ old('testimonials_title.en', $aboutHeading->getTranslation('testimonials_title', 'en')) }}">
                                    @error('testimonials_title.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- testimonials_title AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Testimonials Title <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="testimonials_title[ar]"
                                        class="form-control @error('testimonials_title.ar') is-invalid @enderror"
                                        value="{{ old('testimonials_title.ar', $aboutHeading->getTranslation('testimonials_title', 'ar')) }}"
                                        dir="rtl">
                                    @error('testimonials_title.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- testimonials_subtitle EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Testimonials Subtitle <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="testimonials_subtitle[en]"
                                        class="form-control @error('testimonials_subtitle.en') is-invalid @enderror"
                                        value="{{ old('testimonials_subtitle.en', $aboutHeading->getTranslation('testimonials_subtitle', 'en')) }}">
                                    @error('testimonials_subtitle.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- testimonials_subtitle AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Testimonials Subtitle <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="testimonials_subtitle[ar]"
                                        class="form-control @error('testimonials_subtitle.ar') is-invalid @enderror"
                                        value="{{ old('testimonials_subtitle.ar', $aboutHeading->getTranslation('testimonials_subtitle', 'ar')) }}"
                                        dir="rtl">
                                    @error('testimonials_subtitle.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                            {{-- ======================== --}}
                            {{-- Group 3: About CEO --}}
                            {{-- ======================== --}}
                            {{-- <h6 class="text-muted mb-4">About CEO</h6> --}}

                            {{-- about_ceo_title EN --}}
                            {{-- <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    CEO Title <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="about_ceo_title[en]"
                                        class="form-control @error('about_ceo_title.en') is-invalid @enderror"
                                        value="{{ old('about_ceo_title.en', $aboutHeading->getTranslation('about_ceo_title', 'en')) }}">
                                    @error('about_ceo_title.en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}

                            {{-- about_ceo_title AR --}}
                            {{-- <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    CEO Title <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="about_ceo_title[ar]"
                                        class="form-control @error('about_ceo_title.ar') is-invalid @enderror"
                                        value="{{ old('about_ceo_title.ar', $aboutHeading->getTranslation('about_ceo_title', 'ar')) }}"
                                        dir="rtl">
                                    @error('about_ceo_title.ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}

                            {{-- about_ceo_subtitle EN --}}
                            {{-- <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    CEO Subtitle <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="about_ceo_subtitle[en]"
                                        class="form-control @error('about_ceo_subtitle.en') is-invalid @enderror"
                                        value="{{ old('about_ceo_subtitle.en', $aboutHeading->getTranslation('about_ceo_subtitle', 'en')) }}">
                                    @error('about_ceo_subtitle.en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}

                            {{-- about_ceo_subtitle AR --}}
                            {{-- <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    CEO Subtitle <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="about_ceo_subtitle[ar]"
                                        class="form-control @error('about_ceo_subtitle.ar') is-invalid @enderror"
                                        value="{{ old('about_ceo_subtitle.ar', $aboutHeading->getTranslation('about_ceo_subtitle', 'ar')) }}"
                                        dir="rtl">
                                    @error('about_ceo_subtitle.ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}

                            {{--
                            <hr> --}}

                            {{-- ======================== --}}
                            {{-- Group 4: Features --}}
                            {{-- ======================== --}}
                            <h6 class="text-muted mb-4">Features</h6>

                            {{-- features_title EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Features Title <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="features_title[en]"
                                        class="form-control @error('features_title.en') is-invalid @enderror"
                                        value="{{ old('features_title.en', $aboutHeading->getTranslation('features_title', 'en')) }}">
                                    @error('features_title.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- features_title AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Features Title <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="features_title[ar]"
                                        class="form-control @error('features_title.ar') is-invalid @enderror"
                                        value="{{ old('features_title.ar', $aboutHeading->getTranslation('features_title', 'ar')) }}"
                                        dir="rtl">
                                    @error('features_title.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- features_subtitle EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Features Subtitle <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="features_subtitle[en]"
                                        class="form-control @error('features_subtitle.en') is-invalid @enderror"
                                        value="{{ old('features_subtitle.en', $aboutHeading->getTranslation('features_subtitle', 'en')) }}">
                                    @error('features_subtitle.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- features_subtitle AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Features Subtitle <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="features_subtitle[ar]"
                                        class="form-control @error('features_subtitle.ar') is-invalid @enderror"
                                        value="{{ old('features_subtitle.ar', $aboutHeading->getTranslation('features_subtitle', 'ar')) }}"
                                        dir="rtl">
                                    @error('features_subtitle.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                            {{-- ======================== --}}
                            {{-- Group 5: Team --}}
                            {{-- ======================== --}}
                            <h6 class="text-muted mb-4">Team</h6>

                            {{-- team_title EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Team Title <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="team_title[en]"
                                        class="form-control @error('team_title.en') is-invalid @enderror"
                                        value="{{ old('team_title.en', $aboutHeading->getTranslation('team_title', 'en')) }}">
                                    @error('team_title.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- team_title AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Team Title <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="team_title[ar]"
                                        class="form-control @error('team_title.ar') is-invalid @enderror"
                                        value="{{ old('team_title.ar', $aboutHeading->getTranslation('team_title', 'ar')) }}"
                                        dir="rtl">
                                    @error('team_title.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- team_subtitle EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Team Subtitle <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="team_subtitle[en]"
                                        class="form-control @error('team_subtitle.en') is-invalid @enderror"
                                        value="{{ old('team_subtitle.en', $aboutHeading->getTranslation('team_subtitle', 'en')) }}">
                                    @error('team_subtitle.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- team_subtitle AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Team Subtitle <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="team_subtitle[ar]"
                                        class="form-control @error('team_subtitle.ar') is-invalid @enderror"
                                        value="{{ old('team_subtitle.ar', $aboutHeading->getTranslation('team_subtitle', 'ar')) }}"
                                        dir="rtl">
                                    @error('team_subtitle.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Submit --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-save mr-1"></i> Save Changes
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