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

                      <div class="btn__add d-flex">

                          <div class="image__inner d-flex " id="formInner" >

                              <div hidden>
                                  <div class="image__item mt-5 ml-3">
                                      <div class="drop-zone m-auto">
                                          <input type="file" name="images[]" accept="image/*" class="drop-zone__input">
                                          <img src="https://bit.ly/3ubuq5o" class="drop-zone__thumb" alt="">
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
                                              <span class="delete__image">x</span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              @foreach ($banners as $banner)
                              <div class="image__item mt-5 ml-3">
                                <div class="drop-zone m-auto">
                                    <input type="file" name="images[]" accept="image/*" class="drop-zone__input">
                                    <img src="{{ Storage::url($banner->image) }}" class="drop-zone__thumb" alt="">
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
                                        <span class="delete__image">x</span>
                                    </div>
                                </div>
                            </div>
                              @endforeach


                          </div>
                          <div class="btn btn-dark" id="add"
                              style="height: 100px;width: 100px;margin-top: 150px;margin-left:20px;">
                              <span style="display: block;margin-top: -5px;font-size: 64px;font-weight: 700;">+</span>
                          </div>
                      </div>


                      <input type="submit" class="btn btn-primary" value="Сохранить"
                          style="position: absolute;bottom: 0;left: 50%;margin: 20px;">

                  </form>

              </div>
          </div>






      </div>

      <style>
          .drop-zone {
              width: 200px;
              height: 200px;
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
              document.querySelectorAll(".delete__image").forEach((inputElement) => {

                  const dropZoneDelete = inputElement.closest(".image__item");

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

              let parent = document.getElementById('formInner');
              let elem = parent.querySelector('.image__item');

              let clone = elem.cloneNode(true);
              parent.appendChild(clone);


              inputAll();
              deleteAll();

          }

          function add_img() {
              document.querySelector("#add").onclick = function() {
                  add_img_block();
              }
          }

          add_img();
      </script>
      <!-- /.content-wrapper -->
  @endsection
