@extends('layouts.app')

@section('title', 'List Ebook')

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
                        <h3 class="card-title">DataTable with default features</h3>
                        <a class="btn btn-primary float-right" href="{{ route('ebook.create') }}"> <i
                                class="fas fa-plus"></i> {{ __('Add New
                            Ebook') }}</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="float-right mb-3">
                                    <form>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" id="search" name="search">
                                            <span class="input-group-append">
                                                <i class="btn btn-info btn-flat">Go!</i>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-12">
                                <table id="example2" class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>Num.</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Discription</th>
                                            <th>Link Download</th>
                                            <th>Hashtag</th>
                                            <th>Acction</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataEbook as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->title_ebook }}</td>
                                                <td>
                                                    <div class="card">
                                                        <img class="img-thumbnail" src="{{ $row->image }}" alt="">
                                                    </div>
                                                </td>
                                                <td>{{ $row->description }}</td>
                                                <td>{{ $row->link_download }}</td>
                                                <td>{{ $row->hashtag }}</td>
                                                <td>
                                                    <form action="{{ route('ebook.destroy', $row) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="{{ route('ebook.edit', $row) }}"
                                                                class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <div class="text float-left">
                                        Showing 1 To 10 Of {{ $dataEbook->total() }} Entries This Page
                                        {{ $dataEbook->currentPage() }}
                                    </div>
                                    <ul class="pagination justify-content-end">
                                        {{ $dataEbook->links('pagination::bootstrap-4') }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

@endsection

@section('script')
    @include('layouts.components.script-table')

    <script type="text/javascript">
        $('#search').on('keyup', function() {

            $value = $(this).val();

            $.ajax({

                type: 'get',

                url: '{{ route('ebook.search') }}',

                data: {
                    'search': $value
                },

                success: function(data) {
                    // console.log(data);
                    var trHTML = '';

                    data.data.forEach(function(item, index) {
                        index++;
                        trHTML +=
                            `<tr>
                                <td>` + index + `</td>
                                <td>` + item.title_ebook + `</td>
                                <td><img class="img-thumbnail" src="` + item.image + `" alt=""></td>
                                <td>` + item.description + `</td>
                                <td>` + item.link_download + `</td>
                                <td>` + item.hashtag + `</td>
                                <td>
                                    <form action="delete/` + item.id + `" method="POST">
                                        @csrf
                                        @method('DELETE')
                                            <div class="btn-group btn-group-sm">
                                                <a href="edit/` + item.id + `"class="btn btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i> </button>
                                            </div>
                                    </form>
                                </td>
                            </tr>`;

                    });

                    $('tbody').html(trHTML);

                }

            });
        })
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script>

@endsection
