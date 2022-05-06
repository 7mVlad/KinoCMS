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
                        <form action="{{route('admin.hall.store', $cinema->id)}}" method="POST" enctype="multipart/form-data"
                            class="ml-4 mb-3">
                            @csrf
                            {{-- Поле для названия --}}
                            <div class="form-group w-25">
                                <label>Номер зала</label>
                                <input type="text" class="form-control" name="hall_number" placeholder="Номер зала"
                                    required {{ old('hall_number') }}>
                            </div>

                            {{-- Поле для описания --}}
                            <div class="form-group w-75">
                                <label>Описание зала</label>
                                <textarea class="form-control" placeholder="Описание зала" name="description" style="resize: none; height:150px"
                                    required>{{ old('content') }}</textarea>
                            </div>


                            {{-- Поле для главной картинки --}}
                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <label>Схема зала</label>

                                    <div class="form-element ml-5 mb-5">
                                        <input type="file" id="img-logo" accept="image/*" name="hall_scheme">
                                        <label for="img-logo" id="img-logo-preview">
                                            <img src="https://bit.ly/3ubuq5o" alt="" style="width: 250px; height: 150px">
                                            <div class="bg-plus">
                                                <span>+</span>
                                            </div>
                                        </label>
                                        {{-- Delete img --}}
                                        <div class="btn-inner">
                                            <div class="btn-delete btn-image-logo" id="submit-logo"
                                                style="margin-left: 235px;">
                                                <span>x</span>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            {{-- Поле для главной картинки --}}
                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <label>Верхний баннера</label>

                                    <div class="form-element ml-5 mb-5">
                                        <input type="file" id="img-banner" accept="image/*" name="top_banner">
                                        <label for="img-banner" id="img-banner-preview">
                                            <img src="https://bit.ly/3ubuq5o" alt="" style="width: 250px; height: 150px">
                                            <div class="bg-plus">
                                                <span>+</span>
                                            </div>
                                        </label>
                                        {{-- Delete img --}}
                                        <div class="btn-inner">
                                            <div class="btn-delete btn-image-banner" id="submit-banner"
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
                                    <label>Галерея картинок <br><br> Размер: 1000 х 190</label>

                                    @for ($i = 0; $i < 5; $i++)
                                        <div class="form-element mr-5 mb-5">
                                            <input type="file" id="img-{{ $i }}" accept="image/*"
                                                name="images[]">
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
    <script>
        function previewBeforeUpload(id) {

            document.querySelector("#" + id).addEventListener("change", function(e) {

                if (e.target.files.length == 0) {
                    return;
                }

                let file = e.target.files[0];
                let url = URL.createObjectURL(file);

                document.querySelector("#" + id + "-preview div").style.visibility = "hidden";
                document.querySelector("#" + id + "-preview img").src = url;

            });
        }

        function deleteImage(id) {
            document.querySelector("#submit-" + id).onclick = function() {
                let path = document.querySelector("#img-" + id + "-preview img").src;
                document.querySelector("#img-" + id + "-preview img").src = "https://bit.ly/3ubuq5o";
                document.querySelector("#img-" + id + "-preview div").style.visibility = "visible";
                add_field(path);

            }
        }

        previewBeforeUpload("img-logo");
        deleteImage("logo");
        previewBeforeUpload("img-banner");
        deleteImage("banner");
    </script>
@endsection
