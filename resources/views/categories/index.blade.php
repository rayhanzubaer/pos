@extends('layouts.master', ['activeBreadcrumb' => 'Manage Categories'])

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
                        <h3 class="card-title">All Categories</h3>
                        <a href="{{ route('categories.create') }}" class="btn btn-primary float-right">
                            <i class="fas fa-plus"></i>
                            Add Category
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Update At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $count = 0 @endphp
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ ++$count }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at->diffForHumans() }}</td>
                                    <td>{{ $category->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu" style="">
                                            <div class="dropdown-item text-center">
                                                <a class="btn btn-outline-warning text-bold" title="Edit" href="{{ route('categories.edit', ['category' => $category]) }}">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="dropdown-item text-center">
                                                <form action="{{ route('categories.destroy', ['category' => $category]) }}" method="POST">
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
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
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