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
                        <form action="{{ route('users.update', ['user' => $user]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" placeholder="Name" value="{{ $user->name }}"
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
                                        <input type="email" name="email" id="email" placeholder="Email" value="{{ $user->email }}"
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
                                        <label for="profile">Profile</label>
                                        <select id="profile" name="profile"
                                                class="form-control @error('profile') is-invalid @enderror">
                                            <option value="">Select Profile</option>
                                            <option value="Administrator" {{ $user->profile === 'Administrator' ? 'selected' : '' }}>Administrator</option>
                                            <option value="Seller" {{ $user->profile === 'Seller' ? 'selected' : '' }}>Seller</option>
                                            <option value="Special" {{ $user->profile === 'Special' ? 'selected' : '' }}>Special</option>
                                        </select>
                                        @error('profile')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Photo</label>
                                        <div class="custom-file">
                                            <input type="file"
                                                   class="custom-file-input @error('photo') is-invalid @enderror"
                                                   name="photo" id="photo" value="{{ $user->photo }}">
                                            <label class="custom-file-label" for="photo">Choose Photo</label>
                                            @error('photo')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <img src="{{ asset($user->photo) }}" width="100%" alt="image">
                                    <p class="text-center"><small>Current Photo</small></p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success float-right">UPDATE</button>
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
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection