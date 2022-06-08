@extends('admin.layouts.main')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row ">
                    <div class="col-12">
                        {{-- Форма --}}
                        <form action="{{ route('admin.contact.update') }}" class=" mb-5" method="post"
                            enctype="multipart/form-data" id="form">
                            @csrf
                            @method('PATCH')

                            <script>
                                $(document).ready(function () {
                                    let i = 0;
                                    $('#add').on('click',function(){
                                        ++i;
                                        $('#formInner').before(`<div class="contact__form m-5">
                                        <div style="border: 3px solid rgb(0, 0, 0);border-radius:20px;">
                                            <div class="form-group d-flex m-5">
                                                <label>Название кинотеатра</label>
                                                <select name="cinema_id[]" class="form-control w-50 ml-5">
                                                    <option value="">--- Выберите кинотеатр ---</option>
                                                    @foreach ($cinemas as $key => $cinema)
                                                        <option value="{{ $cinema->id }}">{{ $cinema->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group d-flex m-5">
                                                <label>Адресс</label>
                                                <textarea class="form-control w-75 ml-5" placeholder="Адресс" name="address[]"
                                                    style="resize: none; height:150px">{{ old('content') }}</textarea>
                                            </div>
                                            <div class="form-group d-flex m-5">
                                                <label>Координаты для карты</label>
                                                <input type="text" class="form-control w-50 ml-5" name="coordinates[]"
                                                    placeholder="Координаты для карты" value="{{ old('title') }}">
                                            </div>

                                            <div class="form-group d-flex">
                                                <label class="ml-5 mb-4 mt-3">Лого</label>

                                                <div class="image__item ml-5 pl-5">
                                                    <div class="drop-zone">
                                                        <input type="file" name="logo_image[]" accept="image/*"
                                                            class="drop-zone__input" required>
                                                        <img src="https://bit.ly/3ubuq5o" class="drop-zone__thumb" alt="">
                                                    </div>


                                                    <div class="btn-inner">
                                                        <div class="mt-5">
                                                            <span class="btn btn-danger delete__item">Удалить</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>`);
                                        inputAll();
                                        deleteAll();
                                    });



                                });
                            </script>



                            @foreach ($contacts as $contact)
                                <div class="contact__form m-5">
                                    <div style="border: 3px solid rgb(0, 0, 0);border-radius:20px;">
                                        <div class="form-group d-flex m-5">
                                            <label>Название кинотеатра</label>
                                            <select name="cinema_id[]" class="form-control w-50 ml-5">
                                                @foreach ($cinemas as $key => $cinema)
                                                    <option  value="{{ $cinema->id }}"
                                                        {{ $cinema->id == $contact->cinema_id ? 'selected' : '' }} >
                                                        {{ $cinema->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group d-flex m-5">
                                            <label>Адресс</label>
                                            <textarea class="form-control w-75 ml-5" placeholder="Адресс" name="address[]"
                                                style="resize: none; height:150px">{{ $contact->address }}</textarea>
                                        </div>
                                        <div class="form-group d-flex m-5">
                                            <label>Координаты для карты</label>
                                            <input  type="text" class="form-control w-50 ml-5" name="coordinates[]"
                                                placeholder="Координаты для карты" value="{{ $contact->coordinates }}">
                                        </div>

                                        <div class="form-group d-flex">
                                            <label class="ml-5 mb-4 mt-3">Лого</label>

                                            <div class="image__item ml-5 pl-5">
                                                <div class="drop-zone">
                                                    <input type="file" name="logo_image[]" accept="image/*"
                                                        class="drop-zone__input">
                                                    <img src="{{ $contact->logo_image }}" class="drop-zone__thumb" alt="">
                                                </div>


                                                <div class="btn-inner">
                                                    <div class="mt-5">
                                                        <span class="btn btn-danger delete__item">Удалить</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            @endforeach

                            <div id="formInner">

                            </div>

                            <div class="form-group">
                                <div class="btn btn-dark mt-2 mb-3" id="add">
                                    Добавить еще кинотеатр
                                </div>
                            </div>



                            {{-- SEO блок --}}
                            <div class="form-group w-50 ">
                                <label class=" d-block">SEO блок:</label>

                                <label>URL:</label>
                                <input type="text" class="form-control mb-2" name="seo_url" placeholder="URL"
                                    value="{{ $seoBlock->url ?? '' }}">
                                <label>Title:</label>
                                <input type="text" class="form-control mb-2" name="seo_title" placeholder="Title"
                                    value="{{ $seoBlock->title ?? '' }}">
                                <label>Keywords:</label>
                                <input type="text" class="form-control mb-2" name="seo_keywords" placeholder="Word"
                                    value="{{ $seoBlock->keywords ?? '' }}">
                                <label>Description:</label>
                                <input type="text" class="form-control mb-2" name="seo_description"
                                    placeholder="Description" value="{{ $seoBlock->description ?? '' }}">
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

    <style>
        .drop-zone {
            width: 250px;
            height: 150px;
            cursor: pointer;
            border: 2px solid #000;
            border-radius: 10px;
        }

        .drop-zone__input {
            display: none;
        }

        .drop-zone__thumb {
            width: 100%;
            height: 100%;
            border-radius: 10px;
            overflow: hidden;
            background-color: #cccccc;
            background-size: cover;
            position: relative;
        }

    </style>

    <script>
        function inputAll() {
            document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {

                const dropZoneElement = inputElement.closest(".drop-zone");

                dropZoneElement.addEventListener("click", (e) => {
                    inputElement.click();
                });

                inputElement.addEventListener("change", (e) => {
                    if (inputElement.files.length) {

                        updateThumbnail(dropZoneElement, inputElement.files[0]);
                    }
                });


            });
        }

        function updateThumbnail(dropZoneElement, file) {

            let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

            // Show thumbnail for image files
            if (file.type.startsWith("image/")) {
                const reader = new FileReader();

                reader.readAsDataURL(file);
                let url = URL.createObjectURL(file);
                reader.onload = () => {
                    thumbnailElement.src = url;
                };
            } else {
                thumbnailElement.src = null;
            }

        }

        function deleteAll() {
            document.querySelectorAll(".delete__item").forEach((inputElement) => {

                const dropZoneDelete = inputElement.closest(".contact__form");

                deleteItem(inputElement, dropZoneDelete);

            });
        }

        function deleteItem(element, dropZoneDelete) {

            let image = dropZoneDelete.querySelector('img');

            element.onclick = function() {
                let path = image.src;
                dropZoneDelete.remove();
                add_field(path);
            }

        }

        inputAll();
        deleteAll();
    </script>
@endsection
