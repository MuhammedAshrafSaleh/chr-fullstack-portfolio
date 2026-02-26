{{-- resources/views/dashboard/hero/edit.blade.php --}}

@extends('admin.layouts.layout')

@section('title', 'Hero Section')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Hero Section</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Hero</div>
                </div>
            </div>

            <div class="section-body">

                {{-- Alerts --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Edit Hero Section</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Title EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Title <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title[en]"
                                        class="form-control @error('title.en') is-invalid @enderror"
                                        value="{{ old('title.en', $hero->getTranslation('title', 'en')) }}"
                                        placeholder="Enter title in English">
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
                                    <input type="text" name="title[ar]"
                                        class="form-control @error('title.ar') is-invalid @enderror"
                                        value="{{ old('title.ar', $hero->getTranslation('title', 'ar')) }}"
                                        placeholder="أدخل العنوان بالعربية" dir="rtl">
                                    @error('title.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Description EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Description <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="description[en]" rows="4"
                                        class="form-control @error('description.en') is-invalid @enderror"
                                        placeholder="Enter description in English">{{ old('description.en', $hero->getTranslation('description', 'en')) }}</textarea>
                                    @error('description.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Description AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Description <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="description[ar]" rows="4"
                                        class="form-control @error('description.ar') is-invalid @enderror"
                                        placeholder="أدخل الوصف بالعربية"
                                        dir="rtl">{{ old('description.ar', $hero->getTranslation('description', 'ar')) }}</textarea>
                                    @error('description.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Background Video --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Background Video
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    @if($hero->video)
                                        <div class="mb-2">
                                            <video width="100%" height="200" controls style="border-radius:6px;">
                                                <source src="{{ asset('storage/' . $hero->video) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    @endif
                                    <div class="custom-file">
                                        <input type="file" name="video"
                                            class="custom-file-input @error('video') is-invalid @enderror" id="videoUpload"
                                            accept="video/*">
                                        <label class="custom-file-label" for="videoUpload">
                                            {{ $hero->video ? 'Change Video' : 'Choose Video File' }}
                                        </label>
                                        @error('video')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <small class="text-muted">Accepted formats: mp4, webm, ogg. Max size: 50MB.</small>
                                </div>
                            </div>

                            {{-- Submit --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Save Changes
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
    <script>
        $('#videoUpload').on('change', function () {
            const fileName = this.files[0] ? this.files[0].name : 'Choose Video File';
            $(this).next('.custom-file-label').text(fileName);
        });
    </script>
@endpush