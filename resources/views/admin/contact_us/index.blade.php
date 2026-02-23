@extends('admin.layouts.layout')


@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ url()->previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Map Coordinates</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Update Contact Map Coordinates</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.coordinates.update', $coordinate->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    {{-- Latitude Input --}}
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Latitude</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="lat"
                                                class="form-control @error('lat') is-invalid @enderror"
                                                value="{{ old('lat', $coordinate->lat) }}" placeholder="e.g. 30.0074">
                                            @error('lat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Longitude Input --}}
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Longitude</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="lang"
                                                class="form-control @error('lang') is-invalid @enderror"
                                                value="{{ old('lang', $coordinate->lang) }}" placeholder="e.g. 31.4913">
                                            @error('lang')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Submit Button --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button type="submit" class="btn btn-primary">Update Coordinates</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
