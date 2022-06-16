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

                            @foreach ($contacts as $key => $contact)

                                <div class="contact__form m-5" id="contact-{{$key}}">
                                    <div style="border: 3px solid rgb(0, 0, 0);border-radius:20px;">
                                        <div class="form-group d-flex m-5">
                                            <label>Название кинотеатра</label>
                                            <select name="cinema_id[]" class="form-control w-50 ml-5">
                                                @foreach ($cinemas as $cinema)
                                                    <option value="{{ $cinema->id }}"
                                                        {{ $cinema->id == $contact->cinema_id ? 'selected' : '' }}>
                                                        {{ $cinema->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group d-flex m-5">
                                            <label>Адресс</label>
                                            <textarea class="form-control w-75 ml-5" placeholder="Адресс" name="address[]" style="resize: none; height:150px">{{ $contact->address }}</textarea>
                                        </div>
                                        <div class="form-group d-flex m-5">
                                            <label>Координаты для карты</label>
                                            <input type="text" class="form-control w-50 ml-5" name="coordinates[]"
                                                placeholder="Координаты для карты" value="{{ $contact->coordinates }}">
                                        </div>


                                        {{-- Поле для Логотип --}}
                                        <div class="form-group m-5">
                                            <div class="d-flex">
                                                <label>Лого</label>

                                                <div class="form-element ml-5 mb-5">

                                                    <label>
                                                        <input type="file" accept="image/*" name="logo_image[]"
                                                            onchange="document.getElementById('logoImage-{{$key}}').src = window.URL.createObjectURL(this.files[0])">
                                                        <img id="logoImage-{{$key}}"
                                                            src="{{ isset($contact->logo_image) ? Storage::url($contact->logo_image) : 'https://bit.ly/3ubuq5o' }}"
                                                            style="width: 250px">

                                                    </label>


                                                    {{-- Удаление картинок --}}
                                                    <div class="btn-delete" style="margin-left:235px"
                                                        onclick="contactsDeleteImage('{{ $contact->id ?? '' }}', {{$key}})">
                                                        <span>x</span>
                                                    </div>

                                                </div>

                                            </div>

                                            {{-- Delete Item Contact --}}
                                            <div class="btn btn-danger" onclick="contactsDelete('{{ $contact->id ?? '' }}', {{$key}})">
                                                Удалить
                                            </div>

                                        </div>


                                    </div>

                                </div>
                            @endforeach

                            <script>
                                $(document).ready(function () {
                                    let i = 0 + {{count($contacts)}};
                                    $('#add').on('click',function(){
                                        i++;
                                        $('#formInner').before(`<div class="contact__form m-5" id="contact-`+ i +`>
                                        <div style="border: 3px solid rgb(0, 0, 0);border-radius:20px;">
                                            <div class="form-group d-flex m-5">
                                                <label>Название кинотеатра</label>
                                                <select name="cinema_id[]" class="form-control w-50 ml-5">
                                                    <option value="">--- Выберите кинотеатр ---</option>
                                                    @foreach ($cinemas as $cinema)
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

                                            {{-- Поле для Логотип --}}
                                        <div class="form-group mt-5">
                                            <div class="d-flex">
                                                <label>Логотип</label>

                                                <div class="form-element ml-5 mb-5">

                                                    <label>
                                                        <input type="file" accept="image/*" name="logo_image[]"
                                                            onchange="document.getElementById('logoImage-`+ i +`').src = window.URL.createObjectURL(this.files[0])">

                                                        <img id="logoImage-`+ i +`"
                                                            src="https://bit.ly/3ubuq5o"
                                                            style="width: 250px">

                                                    </label>


                                                    {{-- Удаление картинок --}}
                                                    <div class="btn-delete" style="margin-left:235px"
                                                        onclick="contactsDeleteImage('{{ $contact->id ?? '' }}', `+ i +`)">
                                                        <span>x</span>
                                                    </div>

                                                </div>

                                            </div>
                                            {{-- Delete Item Contact --}}
                                            <div class="btn btn-danger" onclick="contactsDelete('{{ $contact->id ?? '' }}', `+ i +`">
                                                Удалить
                                            </div>
                                        </div>

                                        </div>

                                    </div>`);

                                    });



                                });
                            </script>





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
<script>
    function contactsDeleteImage(id, i) {
        document.getElementById('logoImage-' + i).src = 'https://bit.ly/3ubuq5o';

    if (id != '') {
        form.insertAdjacentHTML("afterbegin", '<input type="hidden" name="contactsDeleteImage[]" value="'+id+'">');
    }
    }

    function contactsDelete(id, i) {

    document.getElementById('contact-' + i).remove();

    if (id != '') {
        form.insertAdjacentHTML("afterbegin", '<input type="hidden" name="contactsDelete[]" value="'+id+'">');
    }
}
</script>
@endsection
