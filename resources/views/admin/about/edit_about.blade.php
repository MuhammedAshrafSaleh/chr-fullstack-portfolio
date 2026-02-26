@extends('admin.layouts.layout')

@section('title', 'Edit About Section')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>CHR About</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Edit About</div>
                </div>
            </div>

            <div class="section-body">

                {{-- Success Alert --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                {{-- Error Alert --}}
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Please fix the following errors:</strong>
                        <ul class="mb-0 mt-1">
                            @foreach($errors->all() as $error)
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
                        <h4>Edit About Section</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.chr_about.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Eyebrow EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Eyebrow <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="eyebrow[en]"
                                        class="form-control @error('eyebrow.en') is-invalid @enderror"
                                        value="{{ old('eyebrow.en', $chrAbout->getTranslation('eyebrow', 'en')) }}"
                                        placeholder="e.g. TRUE TO YOU">
                                    @error('eyebrow.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Eyebrow AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Eyebrow <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="eyebrow[ar]"
                                        class="form-control @error('eyebrow.ar') is-invalid @enderror"
                                        value="{{ old('eyebrow.ar', $chrAbout->getTranslation('eyebrow', 'ar')) }}"
                                        placeholder="مثال: صادقون معك" dir="rtl">
                                    @error('eyebrow.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Title EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Title <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title[en]"
                                        class="form-control @error('title.en') is-invalid @enderror"
                                        value="{{ old('title.en', $chrAbout->getTranslation('title', 'en')) }}"
                                        placeholder="e.g. ABOUT CHR">
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
                                        value="{{ old('title.ar', $chrAbout->getTranslation('title', 'ar')) }}"
                                        placeholder="مثال: عن CHR" dir="rtl">
                                    @error('title.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Paragraph One EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Paragraph One <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="paragraph_one[en]"
                                        class="form-control @error('paragraph_one.en') is-invalid @enderror" rows="5"
                                        placeholder="First paragraph (English)">{{ old('paragraph_one.en', $chrAbout->getTranslation('paragraph_one', 'en')) }}</textarea>
                                    @error('paragraph_one.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Paragraph One AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Paragraph One <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="paragraph_one[ar]"
                                        class="form-control @error('paragraph_one.ar') is-invalid @enderror" rows="5"
                                        dir="rtl"
                                        placeholder="الفقرة الأولى (عربي)">{{ old('paragraph_one.ar', $chrAbout->getTranslation('paragraph_one', 'ar')) }}</textarea>
                                    @error('paragraph_one.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Paragraph Two EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Paragraph Two <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="paragraph_two[en]"
                                        class="form-control @error('paragraph_two.en') is-invalid @enderror" rows="5"
                                        placeholder="Second paragraph (English) — optional">{{ old('paragraph_two.en', $chrAbout->getTranslation('paragraph_two', 'en')) }}</textarea>
                                    @error('paragraph_two.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Paragraph Two AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Paragraph Two <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="paragraph_two[ar]"
                                        class="form-control @error('paragraph_two.ar') is-invalid @enderror" rows="5"
                                        dir="rtl"
                                        placeholder="الفقرة الثانية (عربي) — اختياري">{{ old('paragraph_two.ar', $chrAbout->getTranslation('paragraph_two', 'ar')) }}</textarea>
                                    @error('paragraph_two.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Image --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Image
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview" class="image-preview" @if($chrAbout->image)
                                        style="background-image: url('{{ asset('storage/' . $chrAbout->image) }}'); background-size: cover; background-position: center;"
                                    @endif>
                                        <label for="image-upload">
                                            {{ $chrAbout->image ? 'Change Image' : 'Choose File' }}
                                        </label>
                                        <input type="file" name="image" id="image-upload" accept="image/*">
                                    </div>
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Submit --}}
                            <div class="form-group row mb-0">
                                <div class="col-md-7 offset-md-3">
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
        $('#image-upload').on('change', function () {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#image-preview').css({
                    'background-image': 'url(' + e.target.result + ')',
                    'background-size': 'cover',
                    'background-position': 'center'
                });
                $('#image-preview label').text('Change Image');
            };
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endpush