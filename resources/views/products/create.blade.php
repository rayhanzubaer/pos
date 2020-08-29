@extends('layouts.master', [ 'activeBreadcrumb' => 'Product Management' ])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create New Product</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="code">Code</label>
                                        <input type="text" name="code" id="code" placeholder="Code" value="{{ old('code') }}"
                                               class="form-control @error('code') is-invalid @enderror"/>
                                        @error('code')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input type="text" name="description" id="description" placeholder="Description" value="{{ old('description') }}"
                                               class="form-control @error('description') is-invalid @enderror"/>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="stock">Stock</label>
                                        <input type="number" name="stock" id="stock" placeholder="Stock"
                                               class="form-control @error('stock') is-invalid @enderror"/>
                                        @error('stock')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="buying_price">Buying Price</label>
                                        <input type="number" name="buying_price" id="buying_price"
                                               placeholder="Buying Price"
                                               class="form-control @error('buying_price') is-invalid @enderror"/>
                                        @error('buying_price')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="selling_price">Selling Price</label>
                                        <input type="number" name="selling_price" id="selling_price"
                                               placeholder="Selling Price"
                                               class="form-control @error('selling_price') is-invalid @enderror"/>
                                        @error('selling_price')
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
                                        <label for="category">Category</label>
                                        <select id="category" name="category"
                                                class="form-control @error('category') is-invalid @enderror">
                                            <option value="">Select Category</option>
                                            @foreach(App\Category::all() as $category)
                                                <option value="{{ $category->id }}" {{ old('category') === $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="custom-file">
                                            <input type="file"
                                                   class="custom-file-input @error('image') is-invalid @enderror"
                                                   name="image" id="image" value="{{ old('image') }}">
                                            <label class="custom-file-label" for="image">Choose Image</label>
                                            @error('image')
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
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection