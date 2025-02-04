@extends("admin.layouts.layout")

@section("content")
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, {{old('name', $user->name) }}!</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Profile information</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.update') }}" method="post">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name"
                                               value="{{old('name', $user->name) }}" required="">
                                        @if($errors->has('name'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                        <div class="invalid-feedback">
                                            Please fill in the first name
                                        </div>
                                    </div>


                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email"
                                               value="{{ old('email',$user->email) }}" required="">
                                        @if($errors->has('email'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                        <div class="invalid-feedback">
                                            Please fill in the first name
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Password</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('password.update') }}" method="post">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="form-group  col-12">
                                        <label>Current Password</label>
                                        <input type="password" class="form-control" name="current_password"
                                               autocomplete="current-password">
                                        <code>
                                            @if ($errors->has('current_password'))
                                                <code>{{ $errors->first('current_password') }}</code>
                                            @endif
                                        </code>
                                        <div class="invalid-feedback">
                                            Please fill in the first name
                                        </div>
                                    </div>

                                    <div class="form-group  col-12">
                                        <label>New Password</label>
                                        <input type="password" class="form-control" name="password"
                                               autocomplete="new-password">
                                        <code>
                                            @if ($errors->has('password'))
                                                <code>{{ $errors->first('password') }}</code>
                                            @endif
                                        </code>
                                        <div class="invalid-feedback">
                                            Please fill in the first name
                                        </div>
                                    </div>

                                    <div class="form-group  col-12">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                               autocomplete="new-password">
                                        <code>
                                            @if($errors->updatePassword->has('password_confirmation'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('password_confirmation') }}
                                                </div>
                                            @endif
                                        </code>
                                        <div class="invalid-feedback">
                                            Please fill in the first name
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
        </div>
    </section>
@endsection
