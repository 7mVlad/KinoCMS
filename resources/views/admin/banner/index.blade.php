  @extends('admin.layouts.main')
  @section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

          <div class="row">
              <div class="col-10 m-auto">
                  <h2 class=" text-center mt-5 mb-5 font-weight-bold">На главной верх</h2>



                  <form action="{{route('admin.banner.update')}}" id="form" method="POST" enctype="multipart/form-data"
                      style="border: 3px solid rgb(0, 0, 0);padding-bottom: 180px;position: relative;border-radius:20px;">
                      @csrf
                      @method('PATCH')
                      <label class="ml-5 mb-4 mt-3">Размер: 1000х190</label>

                    <input type="text" name="position" value="top" hidden>

                      <div class="btn__add d-flex">

                          <div class="image__inner d-flex " id="formInner-top" >

                              <div hidden>
                                  <div class="image__item-top mt-5 ml-3">
                                      <div class="drop-zone-top m-auto">
                                          <input type="file" name="images[]" accept="image/*" class="drop-zone__input-top">
                                          <img src="https://bit.ly/3ubuq5o" class="drop-zone__thumb-top" alt="">
                                      </div>
                                      <label class="mt-3">URL:</label>
                                      <input class="w-75 form-control d-inline mb-3 url" name="url[]" type="text"
                                          placeholder="URL">
                                      <br>
                                      <label>Текст:</label>
                                      <input class="w-75 form-control d-inline mb-3 text" name="text[]" type="text"
                                          placeholder="Текст">
                                      <div class="btn-inner">
                                          <div class="btn-delete btn-image-main" style="margin-left: 235px;">
                                              <span class="delete__image-top">x</span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              @foreach ($bannersTop as $banner)
                              <div class="image__item-top mt-5 ml-3">
                                <div class="drop-zone-top m-auto">
                                    <input type="file" name="images[]" accept="image/*" class="drop-zone__input-top">
                                    <img src="{{$banner->image}}" class="drop-zone__thumb-top" alt="">
                                </div>
                                <label class="mt-3">URL:</label>
                                <input class="w-75 form-control d-inline mb-3 url" name="url[]" type="text"
                                    placeholder="URL" value="{{$banner->url}}">
                                <br>
                                <label>Текст:</label>
                                <input class="w-75 form-control d-inline mb-3 text" name="text[]" type="text"
                                    placeholder="Текст" value="{{$banner->text}}">
                                <div class="btn-inner">
                                    <div class="btn-delete btn-image-main" style="margin-left: 235px;">
                                        <span class="delete__image-top">x</span>
                                    </div>
                                </div>
                            </div>
                              @endforeach


                          </div>
                          <div class="btn btn-dark" id="add-top"
                              style="height: 100px;width: 100px;margin-top: 150px;margin-left:20px;">
                              <span style="display: block;margin-top: -5px;font-size: 64px;font-weight: 700;">+</span>
                          </div>
                      </div>


                      <input type="submit" class="btn btn-primary" value="Сохранить"
                          style="position: absolute;bottom: 0;left: 50%;margin: 20px;">

                          <div style="position: absolute; left: 30px; bottom:30px;">
                            <label>Скорость вращения</label>
                            <select class="form-select ml-3" aria-label="Default select example" name="news_speed_banner">
                                @if (isset($mainPage))
                                    @if ($mainPage->top_speed_banner == 5000)
                                    <option selected value="5000">5c</option>
                                    @else
                                        <option value="5000">5c</option>
                                    @endif

                                    @if ($mainPage->top_speed_banner == 10000)
                                        <option selected value="10000">10c</option>
                                    @else
                                        <option value="10000">10c</option>
                                    @endif

                                    @if ($mainPage->top_speed_banner == 15000)
                                        <option selected value="15000">15c</option>
                                    @else
                                        <option value="15000">15c</option>
                                    @endif

                                @else
                                    <option value="5000">5c</option>
                                    <option value="10000">10c</option>
                                    <option value="15000">15c</option>
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

                    <div class="form-group mt-5">
                        <div class="d-flex">
                            <label class="pl-5 pr-5">Размер 2000х3000</label>

                            <div class="form-element ml-5 mb-5">
                                <input type="file" id="bgImage" accept="image/*" name="bg_image">
                                <label for="bgImage" id="bgImage-preview">
                                    <img src="{{ $mainPage->bg_banner }}" alt="" style="width: 250px; height: 150px">
                                    <div class="bg-plus">
                                        <span>+</span>
                                    </div>
                                </label>

                            </div>

                        </div>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Сохранить"
                          style="position: absolute;bottom: 0;left: 50%;margin: 20px;">
                  </form>



                  {{-- Нижний баннер --}}
                  <h2 class=" text-center mt-5 mb-5 font-weight-bold">На главной Новости Акции</h2>

                  <form action="{{route('admin.banner.update')}}" id="form" method="POST" enctype="multipart/form-data"
                      style="border: 3px solid rgb(0, 0, 0);padding-bottom: 180px;position: relative;border-radius:20px;">
                      @csrf
                      @method('PATCH')
                      <label class="ml-5 mb-4 mt-3">Размер: 1000х190</label>

                      <input type="text" name="position" value="bottom" hidden>

                      <div class="btn__add d-flex">

                          <div class="image__inner d-flex " id="formInner-bottom" >

                              <div hidden>
                                  <div class="image__item-bottom mt-5 ml-3">
                                      <div class="drop-zone-bottom m-auto">
                                          <input type="file" name="images[]" accept="image/*" class="drop-zone__input-bottom">
                                          <img src="https://bit.ly/3ubuq5o" class="drop-zone__thumb-bottom" alt="">
                                      </div>
                                      <label class="mt-3">URL:</label>
                                      <input class="w-75 form-control d-inline mb-3 url" name="url[]" type="text"
                                          placeholder="URL">
                                      <br>
                                      <label>Текст:</label>
                                      <input class="w-75 form-control d-inline mb-3 text" name="text[]" type="text"
                                          placeholder="Текст">
                                      <div class="btn-inner">
                                          <div class="btn-delete btn-image-main" style="margin-left: 235px;">
                                              <span class="delete__image-bottom">x</span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              @foreach ($bannersBottom as $banner)
                              <div class="image__item-bottom mt-5 ml-3">
                                <div class="drop-zone-bottom m-auto">
                                    <input type="file" name="images[]" accept="image/*" class="drop-zone__input-bottom">
                                    <img src="{{$banner->image}}" class="drop-zone__thumb-bottom" alt="">
                                </div>
                                <label class="mt-3">URL:</label>
                                <input class="w-75 form-control d-inline mb-3 url" name="url[]" type="text"
                                    placeholder="URL" value="{{$banner->url}}">
                                <br>
                                <label>Текст:</label>
                                <input class="w-75 form-control d-inline mb-3 text" name="text[]" type="text"
                                    placeholder="Текст" value="{{$banner->text}}">
                                <div class="btn-inner">
                                    <div class="btn-delete btn-image-main" style="margin-left: 235px;">
                                        <span class="delete__image-bottom">x</span>
                                    </div>
                                </div>
                            </div>
                              @endforeach


                          </div>
                          <div class="btn btn-dark" id="add-bottom"
                              style="height: 100px;width: 100px;margin-top: 150px;margin-left:20px;">
                              <span style="display: block;margin-top: -5px;font-size: 64px;font-weight: 700;">+</span>
                          </div>
                      </div>


                      <input type="submit" class="btn btn-primary" value="Сохранить"
                          style="position: absolute;bottom: 0;left: 50%;margin: 20px;">

                          <div style="position: absolute; left: 30px; bottom:30px;">
                            <label>Скорость вращения</label>
                            <select class="form-select ml-3" aria-label="Default select example" name="news_speed_banner">
                                @if (isset($mainPage))
                                @if ($mainPage->top_speed_banner == 5000)
                                <option selected value="5000">5c</option>
                                @else
                                    <option value="5000">5c</option>
                                @endif

                                @if ($mainPage->top_speed_banner == 10000)
                                    <option selected value="10000">10c</option>
                                @else
                                    <option value="10000">10c</option>
                                @endif

                                @if ($mainPage->top_speed_banner == 15000)
                                    <option selected value="15000">15c</option>
                                @else
                                    <option value="15000">15c</option>
                                @endif

                            @else
                                <option value="5000">5c</option>
                                <option value="10000">10c</option>
                                <option value="15000">15c</option>
                            @endif

                             </select>
                          </div>


                  </form>


              </div>
          </div>



      </div>

<script>
function previewBeforeUpload(id) {

    document.querySelector("#"+id).addEventListener("change",function(e) {

        if(e.target.files.length == 0){
            return;
        }

    let file = e.target.files[0];
    let url = URL.createObjectURL(file);

    document.querySelector("#"+id+"-preview div").style.visibility = "hidden";
    document.querySelector("#"+id+"-preview img").src = url;


    });
}

previewBeforeUpload("bgImage");
</script>

<style>
    .drop-zone-top,
    .drop-zone-bottom {
        width: 200px;
        height: 200px;
        cursor: pointer;
        border: 2px solid #000;
        border-radius: 10px;
    }

    .drop-zone__input-top,
    .drop-zone__input-bottom {
        display: none;
    }

    .drop-zone__thumb-top,
    .drop-zone__thumb-bottom {
        width: 100%;
        height: 100%;
        border-radius: 10px;
        overflow: hidden;
        background-color: #cccccc;
        background-size: cover;
        position: relative;
    }

    .btn-inner .btn-delete {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        position: relative;

        margin-top: -330px;
        margin-left: 135px;

        background-color: red;
        cursor: pointer;
    }

    .btn-delete span {
        color: #fff;
        position: absolute;
        font-size: 25px;
        top: -5px;
        right: 8px;
    }

</style>

<script>
    function bannerPosition(position) {
        function inputAll() {
        document.querySelectorAll(".drop-zone__input-"+position).forEach((inputElement) => {

            const dropZoneElement = inputElement.closest(".drop-zone-"+position);

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

        let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb-"+position);

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
        document.querySelectorAll(".delete__image-"+position).forEach((inputElement) => {

            const dropZoneDelete = inputElement.closest(".image__item-"+position);

            deleteImageBanner(inputElement, dropZoneDelete);

        });
    }

    function deleteImageBanner(element, dropZoneDelete) {

        let image = dropZoneDelete.querySelector('img');
        let url = dropZoneDelete.querySelector('.url');
        let text = dropZoneDelete.querySelector('.text');

        element.onclick = function() {
            let path = image.src;
            image.src = "https://bit.ly/3ubuq5o";
            url.value = "";
            text.value = "";
            add_field(path);
        }
    }

    function add_img_block() {

        let parent = document.getElementById('formInner-'+position);
        let elem = parent.querySelector('.image__item-'+position);

        let clone = elem.cloneNode(true);
        parent.appendChild(clone);

        inputAll();
        deleteAll();

    }
    inputAll();
    deleteAll();

    function add_img() {

        document.querySelector("#add-"+position).onclick = function() {
            add_img_block();
        }
    }

    add_img();
    }

    bannerPosition("top");
    bannerPosition("bottom");

</script>
      <!-- /.content-wrapper -->
@endsection
