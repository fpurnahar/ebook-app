@extends('layouts.app')

@section('title', 'List Ebook Category')

@section('style')
    @include('layouts.components.style-table')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <ul>
                                {{ $error }}
                            </ul>
                        @endforeach
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@yield('title')</h3>
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                            data-target="#modal-default">
                            <i class="fas fa-plus"></i> {{ __('Add New Ebook') }}
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Num.</th>
                                    <th>Name</th>
                                    <th>Acction</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataEbookCatagory as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <form action="{{ route('ebook.category.destroy', $item) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" type="submit"><i
                                                        class="fas fa-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
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

    <!-- Modal -->
    <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('ebook.category.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add News Category Ebook</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="">Name Category</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="close" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Sumbit</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('script')
    @include('layouts.components.script-table')
@endsection
