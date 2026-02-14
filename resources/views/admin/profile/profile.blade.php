@extends('admin.layouts.layout')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Hi, {{ $user->name }}</h2>
                <p class="section-lead">
                    Change information about yourself on this page.
                </p>

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form method="post" class="needs-validation" novalidate=""
                                action="{{ route('profile.update') }}">
                                @csrf
                                @method('patch')
                                <div class="card-header">
                                    <h4>Profile Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-12 col-md-12 col-lg-12">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                value="{{ old('name', $user->name) }}" required="">
                                            @if ($errors->has('name'))
                                                <code>{{ $errors->first('name') }}</code>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12 col-md-12 col-lg-12">
                                            <label for="email">Email</label>
                                            <input id="email" name="email" type="email" class="form-control"
                                                value="{{ old('email', $user->email) }}" required autocomplete="username" />
                                            @if ($errors->has('email'))
                                                <code>{{ $errors->first('email') }}</code>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form method="post" action="{{ route('password.update') }}" class="needs-validation">
                                @csrf
                                @method('put')
                                <div class="card-header">
                                    <h4>Update Password</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-12 col-md-12 col-lg-12">
                                            <label for="update_password_current_password">Current Password</label>
                                            <input type="password" name="current_password"
                                                id="update_password_current_password" class="form-control"
                                                autocomplete="current-password" />
                                            @if ($errors->updatePassword->has('current_password'))
                                                <code>{{ $errors->updatePassword->first('current_password') }}</code>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-12 col-md-12 col-lg-12">
                                            <label for="update_password_password">New Password</label>
                                            <input type="password" name="password" id="update_password_password"
                                                class="form-control" autocomplete="new-password" />
                                            @if ($errors->updatePassword->has('password'))
                                                <code>{{ $errors->updatePassword->first('password') }}</code>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-12 col-md-12 col-lg-12">
                                            <label for="update_password_password_confirmation">Confirm Password</label>
                                            <input type="password" name="password_confirmation"
                                                id="update_password_password_confirmation" class="form-control"
                                                autocomplete="current-password" />
                                            @if ($errors->updatePassword->has('password_confirmation'))
                                                <code>{{ $errors->updatePassword->first('password_confirmation') }}</code>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
