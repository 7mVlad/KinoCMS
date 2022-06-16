@extends('admin.layouts.main')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="row">
            <div class="col-10 m-auto">
                <h2 class=" text-center mt-5 mb-5 font-weight-bold">На главной верх</h2>



                <form action="{{ route('admin.banner.update') }}" id="formTop" method="POST" enctype="multipart/form-data"
                    style="border: 3px solid rgb(0, 0, 0);position: relative;border-radius:20px;">
                    @csrf
                    @method('PATCH')
                    <label class="ml-5 mt-3">Размер: 1000х190</label>

                    <input type="text" name="position" value="top" hidden>

                    @php
                        $i = 0;
                    @endphp
                    <div class="form-group pl-5">
                        <div class="d-flex flex-wrap">

                            @foreach ($bannersTop as $key => $banner)
                                @php
                                    $i++;
                                @endphp
                                <div class="item pb-5" id="item-{{ $i }}">

                                    <div class="form-element m-5">
                                        <label>
                                            <input type="file" accept="image/*" name="images[]"
                                                onchange="document.getElementById('img-{{ $i }}').src = window.URL.createObjectURL(this.files[0])">

                                            <img id="img-{{ $i }}" style="width: 200px; height:200px"
                                                src="{{ isset($banner->image) ? Storage::url($banner->image) : 'https://bit.ly/3ubuq5o' }}">

                                        </label>

                                        {{-- Удаление картинок --}}
                                        <div class="btn-delete" style="margin-top: -220px;margin-left: 190px;"
                                            onclick="deleteBannerTop('{{ $banner->id ?? '' }}', {{ $i }})">
                                            <span>x</span>
                                        </div>
                                    </div>
                                    <label class="pt-5 pb-2">URL:</label>
                                    <input class="w-75 form-control d-inline ml-2" name="url[]" type="text"
                                        placeholder="URL" value="{{ $banner->url }}">
                                    <br>
                                    <label>Текст:</label>
                                    <input class="w-75 form-control d-inline mb-3 text" name="text[]" type="text"
                                        placeholder="Текст" value="{{ $banner->text }}">
                                </div>
                            @endforeach

                            <div id="topInner">

                            </div>
                            <div class="btn btn-dark mr-5" id="addTop"
                                style="height: 100px;width: 100px;margin-top: 75px;;margin-bottom: 75px;margin-left:20px;">
                                <span style="display: block;margin-top: -5px;font-size: 64px;font-weight: 700;">+</span>
                            </div>
                        </div>
                    </div>


                    <input type="submit" class="btn btn-primary" value="Сохранить"
                        style="position: absolute;bottom: 0;left: 50%;margin: 20px;">

                    <div style="position: absolute; left: 30px; bottom:30px;">
                        <label>Скорость вращения</label>
                        <select class="form-select ml-3" aria-label="Default select example" name="news_speed_banner">
                            @if (isset($mainPage))
                                <option value="5000" {{ $mainPage->top_speed_banner == 5000 ? 'selected' : '' }}>5c
                                </option>
                                <option value="10000" {{ $mainPage->top_speed_banner == 10000 ? 'selected' : '' }}>10c
                                </option>
                                <option value="15000" {{ $mainPage->top_speed_banner == 15000 ? 'selected' : '' }}>15c
                                </option>
                            @endif

                        </select>
                    </div>

                </form>

                {{-- Фон для страницы --}}
                <h2 class="text-center mt-5 mb-5 font-weight-bold">Сквозной баннер на заднем фоне</h2>
                <form id="form" action="#" method="post" enctype="multipart/form-data"
                    style="border: 3px solid rgb(0, 0, 0);padding-bottom: 40px;border-radius:20px;position: relative;">
                    @csrf
                    @method('PATCH')

                    <div class="form-group m-5">
                        <div class="d-flex">
                            <label>Размер 2000х3000</label>

                            <div class="form-element ml-5 mb-5">

                                <label>
                                    <input type="file" accept="image/*" name="bg_image"
                                        onchange="document.getElementById('mainImage').src = window.URL.createObjectURL(this.files[0])">

                                    <img id="mainImage"
                                        src="{{ isset($mainPage->bg_banner) ? Storage::url($mainPage->bg_banner) : 'https://bit.ly/3ubuq5o' }}"
                                        style="width: 250px; height:200px">

                                </label>

                            </div>

                        </div>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Сохранить"
                        style="position: absolute;bottom: 0;left: 50%;margin: 20px;">
                </form>



                {{-- Нижний баннер --}}
                <h2 class=" text-center mt-5 mb-5 font-weight-bold">На главной Новости Акции</h2>

                <form action="{{ route('admin.banner.update') }}" id="formBottom" method="POST" enctype="multipart/form-data"
                    style="border: 3px solid rgb(0, 0, 0);position: relative;border-radius:20px;">
                    @csrf
                    @method('PATCH')
                    <label class="ml-5 mt-3">Размер: 1000х190</label>

                    <input type="text" name="position" value="bottom" hidden>


                    <div class="form-group pl-5">
                        <div class="d-flex flex-wrap">

                            @foreach ($bannersBottom as $key => $banner)
                                @php
                                    $i++;
                                @endphp
                                <div class="item pb-5" id="item-{{ $i }}">

                                    <div class="form-element m-5">
                                        <label>
                                            <input type="file" accept="image/*" name="images[]"
                                                onchange="document.getElementById('img-{{ $i }}').src = window.URL.createObjectURL(this.files[0])">

                                            <img id="img-{{ $i }}" style="width: 200px; height:200px"
                                                src="{{ isset($banner->image) ? Storage::url($banner->image) : 'https://bit.ly/3ubuq5o' }}">

                                        </label>

                                        {{-- Удаление картинок --}}
                                        <div class="btn-delete" style="margin-top: -220px;margin-left: 190px;"
                                            onclick="deleteBannerBottom('{{ $banner->id ?? '' }}', {{ $i }})">
                                            <span>x</span>
                                        </div>
                                    </div>
                                    <label class="pt-5 pb-2">URL:</label>
                                    <input class="w-75 form-control d-inline ml-2" name="url[]" type="text"
                                        placeholder="URL" value="{{ $banner->url }}">
                                    <br>
                                    <label>Текст:</label>
                                    <input class="w-75 form-control d-inline mb-3 text" name="text[]" type="text"
                                        placeholder="Текст" value="{{ $banner->text }}">
                                </div>
                            @endforeach

                            <div id="bottomInner">

                            </div>
                            <div class="btn btn-dark mr-5" id="addBottom"
                                style="height: 100px;width: 100px;margin-top: 75px;;margin-bottom: 75px;margin-left:20px;">
                                <span style="display: block;margin-top: -5px;font-size: 64px;font-weight: 700;">+</span>
                            </div>
                        </div>
                    </div>



                    <input type="submit" class="btn btn-primary" value="Сохранить"
                        style="position: absolute;bottom: 0;left: 50%;margin: 20px;">

                    <div style="position: absolute; left: 30px; bottom:30px;">
                        <label>Скорость вращения</label>
                        <select class="form-select ml-3" aria-label="Default select example" name="news_speed_banner">
                            @if (isset($mainPage))
                                <option value="5000" {{ $mainPage->news_speed_banner == 5000 ? 'selected' : '' }}>5c
                                </option>
                                <option value="10000" {{ $mainPage->news_speed_banner == 10000 ? 'selected' : '' }}>10c
                                </option>
                                <option value="15000" {{ $mainPage->news_speed_banner == 15000 ? 'selected' : '' }}>15c
                                </option>
                            @endif

                        </select>
                    </div>

                </form>


            </div>
        </div>



    </div>

    <script>
        $(document).ready(function() {
            let i = 0 + {{ count($bannersBottom) }} + {{ count($bannersTop) }};

            $('#addBottom').on('click', function() {
                i++;
                $('#bottomInner').before(`
                        <div class="item pb-5" id="item-` + i + `">

                            <div class="form-element m-5">
                                <label>
                                    <input type="file" accept="image/*" name="images[]"
                                    onchange="document.getElementById('img-` + i + `').src = window.URL.createObjectURL(this.files[0])" required>

                                <img id="img-` + i + `" style="width: 200px; height:200px"
                                src="https://bit.ly/3ubuq5o">

                                </label>

                                {{-- Удаление картинок --}}
                                <div class="btn-delete" style="margin-top: -220px;margin-left: 190px;"
                                    onclick="deleteBannerTop('{{ $banner->id ?? '' }}', ` + i + `)">
                                    <span>x</span>
                                </div>
                            </div>
                            <label class="pt-5 pb-2">URL:</label>
                            <input class="w-75 form-control d-inline ml-2" name="url[]" type="text"
                                placeholder="URL">
                            <br>
                            <label>Текст:</label>
                            <input class="w-75 form-control d-inline mb-3 text" name="text[]" type="text"
                                placeholder="Текст">
                        </div>
                    `);
            });

            $('#addTop').on('click', function() {
                i++;
                $('#topInner').before(`
                        <div class="item pb-5" id="item-` + i + `">

                            <div class="form-element m-5">
                                <label>
                                    <input type="file" accept="image/*" name="images[]"
                                    onchange="document.getElementById('img-` + i + `').src = window.URL.createObjectURL(this.files[0])" required>

                                <img id="img-` + i + `" style="width: 200px; height:200px"
                                src="https://bit.ly/3ubuq5o">

                                </label>

                                {{-- Удаление картинок --}}
                                <div class="btn-delete" style="margin-top: -220px;margin-left: 190px;"
                                    onclick="deleteBannerBottom('{{ $banner->id ?? '' }}', ` + i + `)">
                                    <span>x</span>
                                </div>
                            </div>
                            <label class="pt-5 pb-2">URL:</label>
                            <input class="w-75 form-control d-inline ml-2" name="url[]" type="text"
                                placeholder="URL">
                            <br>
                            <label>Текст:</label>
                            <input class="w-75 form-control d-inline mb-3 text" name="text[]" type="text"
                                placeholder="Текст">
                        </div>
                    `);
            });



        });
    </script>

    <script>
        function deleteBannerTop(id, i) {
            form = document.getElementById('formTop');

            document.getElementById('item-' + i).remove();

            if (id != '') {
                form.insertAdjacentHTML("afterbegin", '<input type="hidden" name="deleteBannerTop[]" value="' + id + '">');
            }
        }
        function deleteBannerBottom(id, i) {
            form = document.getElementById('formBottom');

            document.getElementById('item-' + i).remove();

            if (id != '') {
                form.insertAdjacentHTML("afterbegin", '<input type="hidden" name="deleteBannerBottom[]" value="' + id + '">');
            }
        }
    </script>


    <!-- /.content-wrapper -->
@endsection
