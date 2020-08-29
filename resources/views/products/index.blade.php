@extends('layouts.master', [ 'activeBreadcrumb' => 'Product Management' ])

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Products</h3>
                        <a href="{{ route('products.create') }}" class="btn btn-primary float-right">
                            <i class="fas fa-plus"></i>
                            Add Product
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Code</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Stock</th>
                                <th>Buying Price</th>
                                <th>Selling Price</th>
                                <th>Date Added</th>
                                <th>Last Modified</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $count = 0 @endphp
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ ++$count }}</td>
                                    <td>
                                        <img src="{{ asset($product->image) }}" width="40" alt="Product Image" />
                                    </td>
                                    <td>{{ $product->code }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->category_id }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->buying_price }}</td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>{{ $product->created_at->diffForHumans() }}</td>
                                    <td>{{ $product->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu" style="">
                                            <div class="dropdown-item text-center">
                                                <a class="btn btn-outline-warning text-bold" title="Edit"
                                                   href="{{ route('products.edit', ['product' => $product]) }}">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="dropdown-item text-center">
                                                <form action="{{ route('products.destroy', ['product' => $product]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" title="Delete" class="btn btn-outline-danger text-bold">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Code</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Stock</th>
                                <th>Buying Price</th>
                                <th>Selling Price</th>
                                <th>Date Added</th>
                                <th>Last Modified</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection

@section('js')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
@endsection

@section('script')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
                language: {
                    searchPlaceholder: "Search records"
                },
            });
        });

        @if(session('status'))
            toastr.success('{{ session('status') }}')
        @endif
    </script>
@endsection