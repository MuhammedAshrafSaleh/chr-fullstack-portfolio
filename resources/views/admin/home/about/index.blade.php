@extends('admin.layouts.layout')

@section('title', 'About Home — Edit')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>About Home</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">About Home</div>
                    <div class="breadcrumb-item">Edit</div>
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
                        <h4>Edit About Home Section</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.about_home.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- ===================== --}}
                            {{-- Section Label EN / AR --}}
                            {{-- ===================== --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Section Label <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="section_label[en]"
                                        class="form-control @error('section_label.en') is-invalid @enderror"
                                        value="{{ old('section_label.en', $aboutHome->getTranslation('section_label', 'en')) }}">
                                    @error('section_label.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Section Label <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="section_label[ar]"
                                        class="form-control @error('section_label.ar') is-invalid @enderror"
                                        value="{{ old('section_label.ar', $aboutHome->getTranslation('section_label', 'ar')) }}"
                                        dir="rtl">
                                    @error('section_label.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- =========== --}}
                            {{-- Title EN / AR --}}
                            {{-- =========== --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Title <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title[en]"
                                        class="form-control @error('title.en') is-invalid @enderror"
                                        value="{{ old('title.en', $aboutHome->getTranslation('title', 'en')) }}">
                                    @error('title.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Title <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title[ar]"
                                        class="form-control @error('title.ar') is-invalid @enderror"
                                        value="{{ old('title.ar', $aboutHome->getTranslation('title', 'ar')) }}" dir="rtl">
                                    @error('title.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- ================= --}}
                            {{-- Description EN / AR --}}
                            {{-- ================= --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Description <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="description[en]" rows="4"
                                        class="form-control @error('description.en') is-invalid @enderror">{{ old('description.en', $aboutHome->getTranslation('description', 'en')) }}</textarea>
                                    @error('description.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Description <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea name="description[ar]" rows="4"
                                        class="form-control @error('description.ar') is-invalid @enderror"
                                        dir="rtl">{{ old('description.ar', $aboutHome->getTranslation('description', 'ar')) }}</textarea>
                                    @error('description.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                            {{-- =========== --}}
                            {{-- Years Count --}}
                            {{-- =========== --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Years Count
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" name="years_count"
                                        class="form-control @error('years_count') is-invalid @enderror"
                                        value="{{ old('years_count', $aboutHome->years_count) }}" min="0">
                                    @error('years_count')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- ================ --}}
                            {{-- Years Label EN / AR --}}
                            {{-- ================ --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Years Label <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="years_label[en]"
                                        class="form-control @error('years_label.en') is-invalid @enderror"
                                        value="{{ old('years_label.en', $aboutHome->getTranslation('years_label', 'en')) }}">
                                    @error('years_label.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Years Label <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="years_label[ar]"
                                        class="form-control @error('years_label.ar') is-invalid @enderror"
                                        value="{{ old('years_label.ar', $aboutHome->getTranslation('years_label', 'ar')) }}"
                                        dir="rtl">
                                    @error('years_label.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                            {{-- ============== --}}
                            {{-- Projects Count --}}
                            {{-- ============== --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Projects Count
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" name="projects_count"
                                        class="form-control @error('projects_count') is-invalid @enderror"
                                        value="{{ old('projects_count', $aboutHome->projects_count) }}" min="0">
                                    @error('projects_count')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- ================== --}}
                            {{-- Projects Label EN / AR --}}
                            {{-- ================== --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Projects Label <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="projects_label[en]"
                                        class="form-control @error('projects_label.en') is-invalid @enderror"
                                        value="{{ old('projects_label.en', $aboutHome->getTranslation('projects_label', 'en')) }}">
                                    @error('projects_label.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Projects Label <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="projects_label[ar]"
                                        class="form-control @error('projects_label.ar') is-invalid @enderror"
                                        value="{{ old('projects_label.ar', $aboutHome->getTranslation('projects_label', 'ar')) }}"
                                        dir="rtl">
                                    @error('projects_label.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                            {{-- ============= --}}
                            {{-- Workers Count --}}
                            {{-- ============= --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Workers Count
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" name="workers_count"
                                        class="form-control @error('workers_count') is-invalid @enderror"
                                        value="{{ old('workers_count', $aboutHome->workers_count) }}" min="0">
                                    @error('workers_count')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- ================= --}}
                            {{-- Workers Label EN / AR --}}
                            {{-- ================= --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Workers Label <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="workers_label[en]"
                                        class="form-control @error('workers_label.en') is-invalid @enderror"
                                        value="{{ old('workers_label.en', $aboutHome->getTranslation('workers_label', 'en')) }}">
                                    @error('workers_label.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Workers Label <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="workers_label[ar]"
                                        class="form-control @error('workers_label.ar') is-invalid @enderror"
                                        value="{{ old('workers_label.ar', $aboutHome->getTranslation('workers_label', 'ar')) }}"
                                        dir="rtl">
                                    @error('workers_label.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                            {{-- ================ --}}
                            {{-- Feature One EN / AR --}}
                            {{-- ================ --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Feature One <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="feature_one[en]"
                                        class="form-control @error('feature_one.en') is-invalid @enderror"
                                        value="{{ old('feature_one.en', $aboutHome->getTranslation('feature_one', 'en')) }}">
                                    @error('feature_one.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Feature One <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="feature_one[ar]"
                                        class="form-control @error('feature_one.ar') is-invalid @enderror"
                                        value="{{ old('feature_one.ar', $aboutHome->getTranslation('feature_one', 'ar')) }}"
                                        dir="rtl">
                                    @error('feature_one.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- ================ --}}
                            {{-- Feature Two EN / AR --}}
                            {{-- ================ --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Feature Two <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="feature_two[en]"
                                        class="form-control @error('feature_two.en') is-invalid @enderror"
                                        value="{{ old('feature_two.en', $aboutHome->getTranslation('feature_two', 'en')) }}">
                                    @error('feature_two.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Feature Two <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="feature_two[ar]"
                                        class="form-control @error('feature_two.ar') is-invalid @enderror"
                                        value="{{ old('feature_two.ar', $aboutHome->getTranslation('feature_two', 'ar')) }}"
                                        dir="rtl">
                                    @error('feature_two.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- ================== --}}
                            {{-- Feature Three EN / AR --}}
                            {{-- ================== --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Feature Three <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="feature_three[en]"
                                        class="form-control @error('feature_three.en') is-invalid @enderror"
                                        value="{{ old('feature_three.en', $aboutHome->getTranslation('feature_three', 'en')) }}">
                                    @error('feature_three.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Feature Three <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="feature_three[ar]"
                                        class="form-control @error('feature_three.ar') is-invalid @enderror"
                                        value="{{ old('feature_three.ar', $aboutHome->getTranslation('feature_three', 'ar')) }}"
                                        dir="rtl">
                                    @error('feature_three.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- ================= --}}
                            {{-- Feature Four EN / AR --}}
                            {{-- ================= --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Feature Four <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="feature_four[en]"
                                        class="form-control @error('feature_four.en') is-invalid @enderror"
                                        value="{{ old('feature_four.en', $aboutHome->getTranslation('feature_four', 'en')) }}">
                                    @error('feature_four.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Feature Four <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="feature_four[ar]"
                                        class="form-control @error('feature_four.ar') is-invalid @enderror"
                                        value="{{ old('feature_four.ar', $aboutHome->getTranslation('feature_four', 'ar')) }}"
                                        dir="rtl">
                                    @error('feature_four.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- ================= --}}
                            {{-- Feature Five EN / AR --}}
                            {{-- ================= --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Feature Five <span class="badge badge-success">EN</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="feature_five[en]"
                                        class="form-control @error('feature_five.en') is-invalid @enderror"
                                        value="{{ old('feature_five.en', $aboutHome->getTranslation('feature_five', 'en')) }}">
                                    @error('feature_five.en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Feature Five <span class="badge badge-warning">AR</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="feature_five[ar]"
                                        class="form-control @error('feature_five.ar') is-invalid @enderror"
                                        value="{{ old('feature_five.ar', $aboutHome->getTranslation('feature_five', 'ar')) }}"
                                        dir="rtl">
                                    @error('feature_five.ar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                            {{-- =========== --}}
                            {{-- Image Right --}}
                            {{-- =========== --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Image Right
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-right-preview" class="image-preview" @if($aboutHome->image_right)
                                        style="background-image: url('{{ asset('storage/' . $aboutHome->image_right) }}'); background-size: cover; background-position: center;"
                                    @endif>
                                        <label for="image-right-upload">
                                            {{ $aboutHome->image_right ? 'Change Image' : 'Choose File' }}
                                        </label>
                                        <input type="file" name="image_right" id="image-right-upload" accept="image/*">
                                    </div>
                                    @error('image_right')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- ========== --}}
                            {{-- Image Left --}}
                            {{-- ========== --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Image Left
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-left-preview" class="image-preview" @if($aboutHome->image_left)
                                        style="background-image: url('{{ asset('storage/' . $aboutHome->image_left) }}'); background-size: cover; background-position: center;"
                                    @endif>
                                        <label for="image-left-upload">
                                            {{ $aboutHome->image_left ? 'Change Image' : 'Choose File' }}
                                        </label>
                                        <input type="file" name="image_left" id="image-left-upload" accept="image/*">
                                    </div>
                                    @error('image_left')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- ============= --}}
                            {{-- Submit Button --}}
                            {{-- ============= --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button type="submit" class="btn btn-primary">
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
        // Image Right Preview
        $('#image-right-upload').on('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#image-right-preview').css({
                        'background-image': 'url(' + e.target.result + ')',
                        'background-size': 'cover',
                        'background-position': 'center'
                    });
                    $('#image-right-preview label').text('Change Image');
                };
                reader.readAsDataURL(file);
            }
        });

        // Image Left Preview
        $('#image-left-upload').on('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#image-left-preview').css({
                        'background-image': 'url(' + e.target.result + ')',
                        'background-size': 'cover',
                        'background-position': 'center'
                    });
                    $('#image-left-preview label').text('Change Image');
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush