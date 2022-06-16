@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">

                        <form id="form" action="{{ route('admin.cinema.update', $cinema->id) }}" method="POST"
                            enctype="multipart/form-data" class="ml-4 mb-3">
                            @csrf
                            @method('PATCH')

                            {{-- Поле для названия --}}
                            <div class="form-group w-25">
                                <label>Название кинотеатра</label>
                                <input type="text" class="form-control" name="title" placeholder="Название кинотеатра"
                                    value="{{ $cinema->title }}" required>
                            </div>

                            {{-- Поле для описания --}}
                            <div class="form-group w-75">
                                <label>Описание</label>
                                <textarea class="form-control" placeholder="Описание" name="description" style="resize: none; height:150px" required>{{ $cinema->description }}</textarea>
                            </div>

                            <div class="form-group w-75">
                                <label>Условия</label>
                                <textarea class="form-control" placeholder="Условия" name="conditions" style="resize: none; height:150px">{{ $cinema->conditions }}</textarea>
                            </div>

                            {{-- Поле для Логотип --}}
                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <label>Логотип</label>

                                    <div class="form-element ml-5 mb-5">

                                        <label>
                                            <input type="file" accept="image/*" name="logo_image"
                                                onchange="document.getElementById('logoImage').src = window.URL.createObjectURL(this.files[0])">

                                            <img id="logoImage"
                                                src="{{ isset($cinema->logo_image) ? Storage::url($cinema->logo_image) : 'https://bit.ly/3ubuq5o' }}"
                                                style="width: 250px">

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

                                            <img id="bannerImage"
                                                src="{{ isset($cinema->top_banner) ? Storage::url($cinema->top_banner) : 'https://bit.ly/3ubuq5o' }}"
                                                style="width: 250px">

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

                                                <img id="img-{{ $i }}"
                                                    src="{{ isset($cinemaImages[$i]->path) ? Storage::url($cinemaImages[$i]->path) : 'https://bit.ly/3ubuq5o' }}">

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

                            <h2 class="font-weight-bold text-center mb-5">Список Залов</h2>

                            <div class="row mb-5 pb-5">
                                <table class="table table-striped table-dark col-10 m-auto text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Название</th>
                                            <th scope="col">Дата создания</th>
                                            <th scope="col" colspan="2" class="text-center">Действия</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($halls as $hall)
                                            <tr>
                                                <td>{{ $hall->hall_number }}</td>
                                                <td>{{date('d.m.Y', strtotime($hall->created_at))}}</td>
                                                <td class="text-right">
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('admin.hall.edit', $hall->id) }}">
                                                        <i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Изменить
                                                    </a>
                                                </td>
                                                <td class="text-left">
                                                    <a class="btn btn-danger btn-sm"
                                                        href="{{ route('admin.hall.delete', $hall->id) }}">
                                                        <i class="fas fa-trash"></i>&nbsp;&nbsp;Удалить
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-2 mb-5">
                                    <div>
                                        <a style="margin-left: 700px"
                                            href="{{ route('admin.hall.create', $cinema->id) }}">
                                            <div class="btn btn-outline-success">Создать зал</div>
                                        </a>
                                    </div>
                                </div>
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

                            <div class="form-group d-flex justify-content-center">
                                <input type="submit" class="btn btn-primary font-weight-bolder mr-3" value="Изменить">

                        </form>
                        <form action="{{ route('admin.cinema.delete', $cinema->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger font-weight-bolder" value="Удалить">
                        </form>
                    </div>

                </div>
            </div>
            <!-- /.row -->

    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
