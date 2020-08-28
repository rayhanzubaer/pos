@extends('layouts.master', [ 'activeBreadcrumb' => 'Manage Categories' ])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create New Category</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.update', ['category' => $category]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" placeholder="Name" value="{{ $category->name }}"
                                               class="form-control @error('name') is-invalid @enderror"/>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div>
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