@extends('layouts.master', [ 'activeBreadcrumb' => 'User Management' ])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create New User</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}"
                                               class="form-control @error('name') is-invalid @enderror"/>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}"
                                               class="form-control @error('email') is-invalid @enderror"/>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" placeholder="Password"
                                               class="form-control @error('password') is-invalid @enderror"/>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="password_confirm">Confirm Password</label>
                                        <input type="password" name="password_confirm" id="password_confirm"
                                               placeholder="Password Confirm"
                                               class="form-control @error('password_confirm') is-invalid @enderror"/>
                                        @error('password_confirm')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="profile">Profile</label>
                                        <select id="profile" name="profile"
                                                class="form-control @error('profile') is-invalid @enderror">
                                            <option value="">Select Profile</option>
                                            <option value="Administrator" {{ old('profile') === 'Administrator' ? 'selected' : '' }}>Administrator</option>
                                            <option value="Seller" {{ old('profile') === 'Seller' ? 'selected' : '' }}>Seller</option>
                                            <option value="Special" {{ old('profile') === 'Special' ? 'selected' : '' }}>Special</option>
                                        </select>
                                        @error('profile')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Photo</label>
                                        <div class="custom-file">
                                            <input type="file"
                                                   class="custom-file-input @error('photo') is-invalid @enderror"
                                                   name="photo" id="photo" value="{{ old('photo') }}">
                                            <label class="custom-file-label" for="photo">Choose Photo</label>
                                            @error('photo')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success float-right">ADD</button>
                                <button type="reset" class="btn btn-dark float-left">CANCEL</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- bs-custom-file-input -->
    <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
@endsection

@section('script')
    <script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});

    </script>
@endsection