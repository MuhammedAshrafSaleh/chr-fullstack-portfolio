@extends('admin.layouts.layout')

@section('title', 'About CEO')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>About CEO</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">About CEO</div>
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

                {{-- Validation Errors --}}
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
                        <h4>Edit CEO Section</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.about_ceo.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- ===================== TITLE ===================== --}}
                            {{-- Title EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Title <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title[en]"
                                        class="form-control @error('title.en') is-invalid @enderror"
                                        value="{{ old('title.en', $aboutCeo->getTranslation('title', 'en')) }}"
                                        placeholder="e.g. OUR CEO MESSAGE">
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
                                        value="{{ old('title.ar', $aboutCeo->getTranslation('title', 'ar')) }}" dir="rtl"
                                        placeholder="مثال: رسالة الرئيس التنفيذي">
                                    @error('title.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="my-4">

                            {{-- ===================== PARAGRAPH ONE ===================== --}}
                            {{-- Paragraph One EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Paragraph One <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="paragraph_one[en]" rows="5"
                                        class="form-control @error('paragraph_one.en') is-invalid @enderror">{{ old('paragraph_one.en', $aboutCeo->getTranslation('paragraph_one', 'en')) }}</textarea>
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
                                    <textarea name="paragraph_one[ar]" rows="5" dir="rtl"
                                        class="form-control @error('paragraph_one.ar') is-invalid @enderror">{{ old('paragraph_one.ar', $aboutCeo->getTranslation('paragraph_one', 'ar')) }}</textarea>
                                    @error('paragraph_one.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="my-4">

                            {{-- ===================== PARAGRAPH TWO ===================== --}}
                            {{-- Paragraph Two EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Paragraph Two <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="paragraph_two[en]" rows="5"
                                        class="form-control @error('paragraph_two.en') is-invalid @enderror">{{ old('paragraph_two.en', $aboutCeo->getTranslation('paragraph_two', 'en')) }}</textarea>
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
                                    <textarea name="paragraph_two[ar]" rows="5" dir="rtl"
                                        class="form-control @error('paragraph_two.ar') is-invalid @enderror">{{ old('paragraph_two.ar', $aboutCeo->getTranslation('paragraph_two', 'ar')) }}</textarea>
                                    @error('paragraph_two.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="my-4">

                            {{-- ===================== PARAGRAPH THREE ===================== --}}
                            {{-- Paragraph Three EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Paragraph Three <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="paragraph_three[en]" rows="5"
                                        class="form-control @error('paragraph_three.en') is-invalid @enderror">{{ old('paragraph_three.en', $aboutCeo->getTranslation('paragraph_three', 'en')) }}</textarea>
                                    @error('paragraph_three.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Paragraph Three AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Paragraph Three <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="paragraph_three[ar]" rows="5" dir="rtl"
                                        class="form-control @error('paragraph_three.ar') is-invalid @enderror">{{ old('paragraph_three.ar', $aboutCeo->getTranslation('paragraph_three', 'ar')) }}</textarea>
                                    @error('paragraph_three.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="my-4">

                            {{-- ===================== CEO NAME ===================== --}}
                            {{-- CEO Name EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    CEO Name <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="ceo_name[en]"
                                        class="form-control @error('ceo_name.en') is-invalid @enderror"
                                        value="{{ old('ceo_name.en', $aboutCeo->getTranslation('ceo_name', 'en')) }}"
                                        placeholder="e.g. ENG. AMR SULTAN">
                                    @error('ceo_name.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- CEO Name AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    CEO Name <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="ceo_name[ar]"
                                        class="form-control @error('ceo_name.ar') is-invalid @enderror"
                                        value="{{ old('ceo_name.ar', $aboutCeo->getTranslation('ceo_name', 'ar')) }}"
                                        dir="rtl" placeholder="مثال: م. عمرو سلطان">
                                    @error('ceo_name.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="my-4">

                            {{-- ===================== CEO TITLE ===================== --}}
                            {{-- CEO Title EN --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    CEO Title <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="ceo_title[en]"
                                        class="form-control @error('ceo_title.en') is-invalid @enderror"
                                        value="{{ old('ceo_title.en', $aboutCeo->getTranslation('ceo_title', 'en')) }}"
                                        placeholder="e.g. FOUNDER & CEO">
                                    @error('ceo_title.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- CEO Title AR --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    CEO Title <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="ceo_title[ar]"
                                        class="form-control @error('ceo_title.ar') is-invalid @enderror"
                                        value="{{ old('ceo_title.ar', $aboutCeo->getTranslation('ceo_title', 'ar')) }}"
                                        dir="rtl" placeholder="مثال: المؤسس والرئيس التنفيذي">
                                    @error('ceo_title.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="my-4">

                            {{-- ===================== IMAGE ===================== --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    CEO Photo
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview" class="image-preview" @if($aboutCeo->image)
                                        style="background-image: url('{{ asset('storage/' . $aboutCeo->image) }}'); background-size: cover; background-position: center;"
                                    @endif>
                                        <label for="image-upload">
                                            {{ $aboutCeo->image ? 'Change Image' : 'Choose File' }}
                                        </label>
                                        <input type="file" name="image" id="image-upload" accept="image/*">
                                    </div>
                                    @error('image')
                                        <div class="text-danger mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- ===================== SUBMIT ===================== --}}
                            <div class="form-group row mb-0">
                                <div class="col-sm-12 col-md-7 offset-md-3">
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

@push('scripts')
    <script>
        $('#image-upload').on('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#image-preview').css({
                        'background-image': 'url(' + e.target.result + ')',
                        'background-size': 'cover',
                        'background-position': 'center'
                    });
                    $('#image-preview label').text('Change Image');
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush