@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-12 pb-5">
            <div class="container">

                <div class="img__block mb-5">
                    <img src="{{ Storage::url($page->main_image) }}" style="width: 100%; height: 400px">
                </div>

                <h2 class="text-center">{{ $page->title }}</h2>

                <p class="mt-5" style="color: black; line-height:1.4;">
                    {{ $page->content }}
                </p>


                <div class="row mt-5 pt-5">
                    @foreach ($pageImages as $pageImage)
                        <div class="col-3">
                            <img src="{{ $pageImage->path }}" style="width: 100%;height:450px">
                        </div>
                    @endforeach
                </div>

                <div class="d-flex mt-5">
                    <a href="#">
                        <img src="{{ asset('frontAssets/image/google-play-badge.png') }}" alt="" width="250px">
                    </a>

                    <a href="#">
                        <img src="{{ asset('frontAssets/image/store.png') }}" alt="" width="250px">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
