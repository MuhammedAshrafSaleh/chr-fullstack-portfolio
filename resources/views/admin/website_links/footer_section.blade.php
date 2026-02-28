@extends('admin.layouts.layout')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Footer Section</h1>
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
                    <h4>Edit Footer Section</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.footer_section.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- =============================== --}}
                        {{-- GENERAL --}}
                        {{-- =============================== --}}
                        <h6 class="text-muted text-uppercase font-weight-bold mt-2 mb-3 border-bottom pb-2">
                            General
                        </h6>

                        {{-- Message EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Message <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <textarea name="message[en]" rows="3"
                                    class="form-control @error('message.en') is-invalid @enderror">{{ old('message.en', $footerSection->getTranslation('message', 'en')) }}</textarea>
                                @error('message.en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Message AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Message <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <textarea name="message[ar]" rows="3" dir="rtl"
                                    class="form-control @error('message.ar') is-invalid @enderror">{{ old('message.ar', $footerSection->getTranslation('message', 'ar')) }}</textarea>
                                @error('message.ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Rights EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Rights <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="rights[en]"
                                    class="form-control @error('rights.en') is-invalid @enderror"
                                    value="{{ old('rights.en', $footerSection->getTranslation('rights', 'en')) }}">
                                @error('rights.en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Rights AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Rights <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="rights[ar]" dir="rtl"
                                    class="form-control @error('rights.ar') is-invalid @enderror"
                                    value="{{ old('rights.ar', $footerSection->getTranslation('rights', 'ar')) }}">
                                @error('rights.ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- =============================== --}}
                        {{-- PRIVACY POLICY --}}
                        {{-- =============================== --}}
                        <h6 class="text-muted text-uppercase font-weight-bold mt-4 mb-3 border-bottom pb-2">
                            Privacy Policy
                        </h6>

                        {{-- Policy Title EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Policy Title <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="policy_title[en]"
                                    class="form-control @error('policy_title.en') is-invalid @enderror"
                                    value="{{ old('policy_title.en', $footerSection->getTranslation('policy_title', 'en')) }}">
                                @error('policy_title.en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Policy Title AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Policy Title <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="policy_title[ar]" dir="rtl"
                                    class="form-control @error('policy_title.ar') is-invalid @enderror"
                                    value="{{ old('policy_title.ar', $footerSection->getTranslation('policy_title', 'ar')) }}">
                                @error('policy_title.ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Policy Link --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Policy Link
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="policy_link"
                                    class="form-control @error('policy_link') is-invalid @enderror"
                                    placeholder="e.g. /privacy-policy"
                                    value="{{ old('policy_link', $footerSection->policy_link) }}">
                                @error('policy_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- =============================== --}}
                        {{-- TERMS & CONDITIONS --}}
                        {{-- =============================== --}}
                        <h6 class="text-muted text-uppercase font-weight-bold mt-4 mb-3 border-bottom pb-2">
                            Terms &amp; Conditions
                        </h6>

                        {{-- Terms Title EN --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Terms Title <span class="badge badge-success">EN</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="terms_title[en]"
                                    class="form-control @error('terms_title.en') is-invalid @enderror"
                                    value="{{ old('terms_title.en', $footerSection->getTranslation('terms_title', 'en')) }}">
                                @error('terms_title.en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Terms Title AR --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Terms Title <span class="badge badge-warning">AR</span>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="terms_title[ar]" dir="rtl"
                                    class="form-control @error('terms_title.ar') is-invalid @enderror"
                                    value="{{ old('terms_title.ar', $footerSection->getTranslation('terms_title', 'ar')) }}">
                                @error('terms_title.ar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Terms Link --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                Terms Link
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="terms_link"
                                    class="form-control @error('terms_link') is-invalid @enderror"
                                    placeholder="e.g. /terms"
                                    value="{{ old('terms_link', $footerSection->terms_link) }}">
                                @error('terms_link')
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