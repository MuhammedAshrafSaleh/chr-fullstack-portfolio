@extends('admin.layouts.layout')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Fixed Links') }}</h1>
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
                <div class="card-body">
                    <form action="{{ route('admin.fixed_links.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- ===================== LOGO ===================== --}}
                        <h6 class="text-muted text-uppercase font-weight-bold mt-4 mb-3 border-bottom pb-2">
                            {{ __('Logo') }}
                        </h6>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                {{ __('Logo Image') }}
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="file" name="logo_image" class="form-control" accept="image/*">
                                @if ($fixedLink->logo_image)
                                    <img src="{{ asset('storage/' . $fixedLink->logo_image) }}"
                                         alt="Current Logo" width="80"
                                         style="margin-top:8px; border-radius:6px;">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                {{ __('Logo Link') }}
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="logo_link" class="form-control"
                                       placeholder="e.g. https://example.com"
                                       value="{{ old('logo_link', $fixedLink->logo_link) }}">
                            </div>
                        </div>

                        {{-- ===================== WHATSAPP ===================== --}}
                        <h6 class="text-muted text-uppercase font-weight-bold mt-4 mb-3 border-bottom pb-2">
                            {{ __('WhatsApp') }}
                        </h6>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                {{ __('WhatsApp Image') }}
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="file" name="whatsapp_image" class="form-control" accept="image/*">
                                @if ($fixedLink->whatsapp_image)
                                    <img src="{{ asset('storage/' . $fixedLink->whatsapp_image) }}"
                                         alt="Current WhatsApp Image" width="80"
                                         style="margin-top:8px; border-radius:6px;">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                {{ __('WhatsApp Link') }}
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="whatsapp_link" class="form-control"
                                       placeholder="e.g. https://wa.me/201234567890"
                                       value="{{ old('whatsapp_link', $fixedLink->whatsapp_link) }}">
                            </div>
                        </div>

                        {{-- ===================== LOCATION ===================== --}}
                        <h6 class="text-muted text-uppercase font-weight-bold mt-4 mb-3 border-bottom pb-2">
                            {{ __('Location') }}
                        </h6>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                {{ __('Location Image') }}
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="file" name="location_image" class="form-control" accept="image/*">
                                @if ($fixedLink->location_image)
                                    <img src="{{ asset('storage/' . $fixedLink->location_image) }}"
                                         alt="Current Location Image" width="80"
                                         style="margin-top:8px; border-radius:6px;">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                {{ __('Location Link') }}
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="location_link" class="form-control"
                                       placeholder="e.g. https://maps.google.com/..."
                                       value="{{ old('location_link', $fixedLink->location_link) }}">
                            </div>
                        </div>

                        {{-- ===================== HOTLINE ===================== --}}
                        {{-- <h6 class="text-muted text-uppercase font-weight-bold mt-4 mb-3 border-bottom pb-2">
                            {{ __('Hotline') }}
                        </h6>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                {{ __('Hotline Image') }}
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="file" name="hotline_image" class="form-control" accept="image/*">
                                @if ($fixedLink->hotline_image)
                                    <img src="{{ asset('storage/' . $fixedLink->hotline_image) }}"
                                         alt="Current Hotline Image" width="80"
                                         style="margin-top:8px; border-radius:6px;">
                                @endif
                            </div>
                        </div> --}}

                        {{-- <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                {{ __('Hotline Number') }}
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="hotline_link" class="form-control"
                                       placeholder="e.g. tel:+201234567890"
                                       value="{{ old('hotline_link', $fixedLink->hotline_link) }}">
                            </div>
                        </div> --}}

                        {{-- ===================== SUBMIT ===================== --}}
                        <div class="form-group row mb-0">
                            <div class="col-sm-12 col-md-7 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Changes') }}
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