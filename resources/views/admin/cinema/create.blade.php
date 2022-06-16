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
                        <form action="{{ route('admin.cinema.store') }}" method="POST" enctype="multipart/form-data"
                            class="ml-4 mb-3">
                            @csrf
                            {{-- Поле для названия --}}
                            <div class="form-group w-25">
                                <label>Название кинотеатра</label>
                                <input type="text" class="form-control" name="title" placeholder="Название кинотеатра"
                                    required>
                            </div>

                            {{-- Поле для описания --}}
                            <div class="form-group w-75">
                                <label>Описание</label>
                                <textarea class="form-control" placeholder="Описание" name="description" style="resize: none; height:150px"
                                    required>{{ old('content') }}</textarea>
                            </div>

                            {{-- Поле для условия --}}
                            <div class="form-group w-75">
                                <label>Условия</label>
                                <textarea class="form-control" placeholder="Условия" name="conditions" style="resize: none; height:150px"
                                    required>{{ old('content') }}</textarea>
                            </div>

                            {{-- Поле для Логотип --}}
                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <label>Логотип</label>

                                    <div class="form-element ml-5 mb-5">

                                        <label>
                                            <input type="file" accept="image/*" name="logo_image"
                                                onchange="document.getElementById('logoImage').src = window.URL.createObjectURL(this.files[0])">

                                            <img id="logoImage" src="https://bit.ly/3ubuq5o" style="width: 250px">

                                        </label>


                                        {{-- Удаление картинок --}}
                                        <div class="btn-delete" style="margin-left:235px"
                                            onclick="imageLogoDelete('{{ $cinema->id ?? '' }}')">
                                            <span>x</span>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            {{-- Поле для верхнего баннера --}}
                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <label>Фото верхнего баннера</label>

                                    <div class="form-element ml-5 mb-5">

                                        <label>
                                            <input type="file" accept="image/*" name="top_banner"
                                                onchange="document.getElementById('bannerImage').src = window.URL.createObjectURL(this.files[0])">

                                            <img id="bannerImage" src="https://bit.ly/3ubuq5o" style="width: 250px">

                                        </label>


                                        {{-- Удаление картинок --}}
                                        <div class="btn-delete" style="margin-left:235px"
                                            onclick="imageBannerDelete('{{ $cinema->id ?? '' }}')">
                                            <span>x</span>
                                        </div>

                                    </div>

                                </div>
                            </div>


                            {{-- Поле для картинок --}}
                            <div class="form-group mt-5">
                                <div class="d-flex justify-content-between">
                                    <label>Галерея картинок <br><br> Размер: 1000 х 190</label>

                                    @for ($i = 0; $i < 5; $i++)
                                        <div class="form-element mr-5 mb-5">
                                            <label>
                                                <input type="file" accept="image/*" name="images[]"
                                                    onchange="document.getElementById('img-{{ $i }}').src = window.URL.createObjectURL(this.files[0])">

                                                <img src="https://bit.ly/3ubuq5o" id="img-{{ $i }}">
                                            </label>

                                            {{-- Удаление картинок --}}
                                            <div class="btn-delete"
                                                onclick="imageDelete('{{ $cinemaImages[$i]->id ?? '' }}', {{ $i }})">
                                                <span>x</span>
                                            </div>


                                        </div>
                                    @endfor

                                </div>
                            </div>



                            {{-- SEO блок --}}
                            <div class="form-group w-50 ">
                                <label class=" d-block">SEO блок:</label>
                                <label>URL:</label>
                                <input type="text" class="form-control mb-2" name="seo_url" placeholder="URL" required>
                                <label>Title:</label>
                                <input type="text" class="form-control mb-2" name="seo_title" placeholder="Title" required>
                                <label>Keywords:</label>
                                <input type="text" class="form-control mb-2" name="seo_keywords" placeholder="Word"
                                    required>
                                <label>Description:</label>
                                <input type="text" class="form-control mb-2" name="seo_description"
                                    placeholder="Description" required>

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
