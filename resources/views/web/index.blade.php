@extends('web.layouts.main')

@section('title', 'Home')

@section('content')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($ebookPublic as $item)
            <div class="col">
                <div class="card shadow-sm">
                    {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef"
                            dy=".3em">Thumbnail</text>
                    </svg> --}}
                    <img src="{{ $item->image }}" alt="" width="100%" height="225" role="img">

                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-4">
        <h2 style="text-align: initial">Random Post</h2>
    </div>
    <div class="mt-4">
        <div class="row">
            @foreach ($ebookPublicRand as $randPost)
                <div class="col-sm-3">
                    <div class="card">
                        <img src="{{ $randPost->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $randPost->title_ebook }}</h5>
                            <p class="card-text">{{ $randPost->description }}.</p>
                            <div class="text-center">

                                <a href="{{ $randPost->link_download }}" target="_blank" class="btn btn-success"><i
                                        class="fas fa-download"></i> {{ __('Download') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
