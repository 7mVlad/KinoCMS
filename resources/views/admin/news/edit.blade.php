@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12 mt-5">
                        <form action="{{ route('admin.news.update', $news->id) }}" id="form" method="POST"
                            enctype="multipart/form-data" class="ml-4 mb-3">
                            @csrf
                            @method('PATCH')

                            <div class="form-group radio-switch">
                                <input type="radio" name="status" id="public" value="0"
                                    {{ $news->status == 0 ? 'checked' : '' }}>
                                <label for="public">
                                    ВЫКЛ
                                </label>
                                <input type="radio" name="status" id="private" value="1"
                                    {{ $news->status == 1 ? 'checked' : '' }}>
                                <label for="private">
                                    ВКЛ
                                </label>
                            </div>

                            {{-- Поле для названия --}}
                            <div class="form-group d-flex">
                                <label>Название новости</label>
                                <input type="text" class="form-control w-25 mr-5 ml-3" name="title"
                                    placeholder="Название новости" value="{{ $news->title }}" required>
                                <label>Дата публикации</label>
                                <input type="date" class="form-control w-25 ml-3" name="date" value="{{ $news->date }}"
                                    required>
                            </div>

                            {{-- Поле для описания --}}
                            <div class="form-group w-75">
                                <label>Описание новости</label>
                                <textarea class="form-control" placeholder="Описание новости" name="content" style="resize: none; height:150px"
                                    required>{{ $news->content }}</textarea>
                            </div>

                            {{-- Поле для главной картинки --}}
                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <label>Главная картинка</label>

                                    <div class="form-element ml-5 mb-5">

                                        <label>
                                            <input type="file" accept="image/*" name="main_image"
                                                onchange="document.getElementById('mainImage').src = window.URL.createObjectURL(this.files[0])">

                                            <img id="mainImage"
                                                src="{{ isset($news->main_image) ? Storage::url($news->main_image) : 'https://bit.ly/3ubuq5o' }}"
                                                style="width: 250px">

                                        </label>


                                        {{-- Удаление картинок --}}
                                        <div class="btn-delete" style="margin-left:235px"
                                            onclick="imageMainDelete('{{ $news->id ?? '' }}')">
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

                                                <img id="img-{{ $i }}"
                                                    src="{{ isset($newsImages[$i]->path) ? Storage::url($newsImages[$i]->path) : 'https://bit.ly/3ubuq5o' }}">

                                            </label>

                                            {{-- Удаление картинок --}}
                                            <div class="btn-delete"
                                                onclick="imageDelete('{{ $newsImages[$i]->id ?? '' }}', {{ $i }})">
                                                <span>x</span>
                                            </div>

                                        </div>
                                    @endfor
                                </div>
                            </div>

                            {{-- Поле ссылки youtube --}}
                            <div class="form-group w-50 mb-5">
                                <label>Ссылка на видео</label>
                                <input type="text" class="form-control" name="video_link"
                                    placeholder="Ссылка на видео в youtube" value="{{ $news->video_link }}">
                            </div>

                            {{-- SEO блок --}}
                            <div class="form-group w-50 ">
                                <label class=" d-block">SEO блок:</label>
                                <label>URL:</label>
                                <input type="text" class="form-control mb-2" name="seo_url" placeholder="URL"
                                    value="{{ $seoBlock->url }}" required>
                                <label>Title:</label>
                                <input type="text" class="form-control mb-2" name="seo_title" placeholder="Title"
                                    value="{{ $seoBlock->title }}" required>
                                <label>Keywords:</label>
                                <input type="text" class="form-control mb-2" name="seo_keywords" placeholder="Word"
                                    value="{{ $seoBlock->keywords }}" required>
                                <label>Description:</label>
                                <input type="text" class="form-control mb-2" name="seo_description"
                                    placeholder="Description" value="{{ $seoBlock->description }}" required>

                            </div>

                            <input type="submit" class="btn btn-primary font-weight-bolder d-block m-auto" value="Изменить">

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
