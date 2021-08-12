@extends('layouts.app')

@section('title', 'Add Neew Ebook')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
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
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Quick Example</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('ebook.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title_ebook">Title Ebook</label>
                                        <input type="text" class="form-control" id="title_ebook" name="title_ebook"
                                            placeholder="Enter Title Ebook">
                                    </div>
                                    <div class="form-group">
                                        <label>Select</label>
                                        <select class="form-control" id="category_id" name="category_id">
                                            <option selected>Chouse One</option>
                                            @foreach ($ebookCategory as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="link_download">Link Download</label>
                                        <input type="text" class="form-control" id="link_download" name="link_download"
                                            placeholder="Enter Link Download">
                                    </div>
                                    <div class="form-group">
                                        <label for="hashtag">Hashtag</label>
                                        <input type="text" class="form-control" id="hashtag" name="hashtag"
                                            placeholder="Enter Hashtag">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea type="text" rows="3" class="form-control" id="description"
                                            name="description" name="description" placeholder="Description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image Ebook</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="imgInp" name="image">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card text-center" style="width: 20rem;">
                                        <img class="card-img-top" id="previewimg">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="{{ route('ebook.list') }}" class="btn btn-primary">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div>
@endsection

@section('script')
    <script src="{{ asset('') }}plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewimg').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imgInp").change(function() {
            readURL(this);
        });
        bsCustomFileInput.init();
    </script>
@endsection
