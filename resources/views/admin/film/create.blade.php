@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row ">
                    <div class="col-12 mt-5">
                        {{-- Форма --}}
                        <form action="{{ route('admin.film.store') }}" method="POST" enctype="multipart/form-data" class="ml-4 mb-3">
                            @csrf
                            {{-- Поле для названия --}}
                            <div class="form-group w-25">
                                <label>Название фильма</label>
                                <input type="text" class="form-control" name="title" placeholder="Название фильма">
                            </div>
                            @error('title')
                                <div class="text-danger">Это поле необходимо для заполнения</div>
                            @enderror

                            {{-- Поле для описания --}}
                            <div class="form-group w-75">
                                <label>Описание фильма</label>
                                <textarea class="form-control" placeholder="Описание фильма" name="content"
                                    style="resize: none; height:150px">{{ old('content') }}</textarea>
                            </div>
                            @error('content')
                                <div class="text-danger">Это поле необходимо для заполнения</div>
                            @enderror

                            {{-- Поле для главной картинки --}}
                            <div class="form-group mt-5">
                                <div class=" d-flex">
                                    <label >Главная картинка</label>

                                    <div class="form-element ml-5 mb-5">
                                        <input type="file" id="img-main" accept="image/*" name="main_image">
                                        <label for="img-main" id="img-main-preview">
                                            <img src="https://bit.ly/3ubuq5o" alt="" style="width: 250px; height: 150px">
                                            <div class="bg-plus">
                                                <span>+</span>
                                            </div>
                                        </label>
                                        {{-- Delete img --}}
                                        <div class="btn-inner">
                                            <div class="btn-delete btn-image-main" id="submit-main"
                                                style="margin-left: 235px;">
                                                <span>x</span>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            {{-- Поле для картинок --}}
                            <div class="form-group mt-5">
                                <div class="d-flex justify-content-between">
                                    <label  >Галерея картинок <br><br> Размер: 1000 х 190</label>
                                    @for ($i = 1; $i < 6; $i++)
                                        <div class="form-element mr-5 mb-5">
                                            <input type="file" id="img-{{ $i }}" accept="image/*"
                                                name="image_{{ $i }}">
                                            <label for="img-{{ $i }}" id="img-{{ $i }}-preview">
                                                <img src="https://bit.ly/3ubuq5o" alt=""
                                                    style="width: 150px; height: 150px">
                                                <div class="bg-plus">
                                                    <span>+</span>
                                                </div>
                                            </label>
                                            {{-- Delete img --}}
                                            <div class="btn-inner">
                                                <div class="btn-delete btn-image" id="submit-{{ $i }}">
                                                    <span>x</span>
                                                </div>
                                            </div>


                                        </div>
                                    @endfor
                                </div>
                            </div>

                            {{-- Поле ссылки youtube --}}
                            <div class="form-group w-50 mb-5">
                                <label>Ссылка на трейлер</label>
                                <input type="text" class="form-control" name="trailer_link" placeholder="Ссылка на видео в youtube">
                            </div>


                            {{-- Поле для выбора типа кино --}}
                            <div class="form-group mt-3">
                                <label class="mr-5">Тип кино</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="type_3d" value="1">
                                    <label class="form-check-label">3D</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="type_2d" value="1">
                                    <label class="form-check-label">2D</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="type_imax" value="1">
                                    <label class="form-check-label">IMAX</label>
                                </div>
                            </div>

                            {{-- Поле для выбора выхода фильма --}}
                            <div class="form-group mt-3">
                                <label class="mr-5">Релиз фильма</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="release" value="1">
                                    <label class="form-check-label mr-4">В кино</label>
                                    <input class="form-check-input" type="radio" name="release" value="0" checked>
                                    <label class="form-check-label">Скоро</label>
                                  </div>
                            </div>

                            {{-- SEO блок --}}
                            <div class="form-group w-50 ">
                                <label class=" d-block">SEO блок:</label>
                                    <label>URL:</label>
                                    <input type="text" class="form-control mb-2" name="seo_url" placeholder="URL">
                                    <label>Title:</label>
                                    <input type="text" class="form-control mb-2" name="seo_title" placeholder="Title">
                                    <label>Keywords:</label>
                                    <input type="text" class="form-control mb-2" name="seo_keywords" placeholder="Word">
                                    <label>Description:</label>
                                    <input type="text" class="form-control mb-2" name="seo_description" placeholder="Description">

                            </div>

                            <input type="submit" class="btn btn-primary d-block m-auto font-weight-bolder"
                                value="Сохранить">
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection