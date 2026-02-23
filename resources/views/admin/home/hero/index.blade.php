@extends('admin.layouts.layout')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    {{-- Updated link to go back to index --}}
                    <a href="{{ route('admin.hero.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Hero Section</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ isset($hero) ? 'Update Hero Section' : 'Create Hero Section' }}</h4>
                            </div>
                            <div class="card-body">
                                {{-- Dynamic Action: Uses update if $hero exists, otherwise store --}}
                                <form action="{{ route('admin.hero.update', 1) }}" method="POST">
                                    @method('PUT')
                                    @csrf

                                    {{-- Title EN --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title (EN)</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="title[en]"
                                                class="form-control @error('title.en') is-invalid @enderror"
                                                value="{{ old('title.en', isset($hero) ? $hero->getTranslation('title', 'en') : '') }}">
                                            @error('title.en')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Title AR --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title (AR)</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="title[ar]"
                                                class="form-control @error('title.ar') is-invalid @enderror"
                                                value="{{ old('title.ar', isset($hero) ? $hero->getTranslation('title', 'ar') : '') }}"
                                                dir="rtl">
                                            @error('title.ar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Subtitle EN --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Subtitle (EN)</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="subtitle[en]"
                                                class="form-control @error('subtitle.en') is-invalid @enderror"
                                                value="{{ old('subtitle.en', isset($hero) ? $hero->getTranslation('subtitle', 'en') : '') }}">
                                        </div>
                                    </div>

                                    {{-- Subtitle AR --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Subtitle (AR)</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="subtitle[ar]"
                                                class="form-control @error('subtitle.ar') is-invalid @enderror"
                                                value="{{ old('subtitle.ar', isset($hero) ? $hero->getTranslation('subtitle', 'ar') : '') }}"
                                                dir="rtl">
                                        </div>
                                    </div>

                                    {{-- Button Name EN --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Button Text (EN)</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="button_name[en]" class="form-control"
                                                value="{{ old('button_name.en', isset($hero) ? $hero->getTranslation('button_name', 'en') : '') }}">
                                        </div>
                                    </div>

                                    {{-- Button Name AR --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Button Text (AR)</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="button_name[ar]" class="form-control"
                                                value="{{ old('button_name.ar', isset($hero) ? $hero->getTranslation('button_name', 'ar') : '') }}"
                                                dir="rtl">
                                        </div>
                                    </div>

                                    {{-- Button URL --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Button URL</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="url" name="button_url" class="form-control"
                                                value="{{ old('button_url', $hero->button_url ?? '') }}">
                                        </div>
                                    </div>

                                    {{-- Video URL --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Video URL</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="url" name="video_url" class="form-control"
                                                value="{{ old('video_url', $hero->video_url ?? '') }}">
                                        </div>
                                    </div>

                                    {{-- Status --}}
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select name="status" class="form-control selectric">
                                                <option value="1" {{ old('status', $hero->status ?? 1) == 1 ? 'selected' : '' }}>Publish</option>
                                                <option value="0" {{ old('status', $hero->status ?? 1) == 0 ? 'selected' : '' }}>Draft</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary">Update Hero</button>
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