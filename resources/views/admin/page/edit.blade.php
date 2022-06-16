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
                          <form action="{{route('admin.page.update', $page->id)}}" id="form" method="POST" enctype="multipart/form-data" class="ml-4 mb-3">
                            @csrf
                            @method('PATCH')

                            <div class="form-group radio-switch">
                                <input type="radio" name="status" id="public" value="0"
                                    {{ $page->status == 0 ? 'checked' : '' }}>
                                <label for="public">
                                    ВЫКЛ
                                </label>
                                <input type="radio" name="status" id="private" value="1"
                                    {{ $page->status == 1 ? 'checked' : '' }}>
                                <label for="private">
                                    ВКЛ
                                </label>
                            </div>



                            {{-- Поле для названия --}}
                            <div class="form-group d-flex">
                                <label>Название</label>
                                <input type="text" class="form-control w-25 mr-5 ml-3" name="title" placeholder="Название" value="{{$page->title}}">
                            </div>
                              @error('title')
                                <div class="text-danger">Это поле необходимо для заполнения</div>
                              @enderror

                              {{-- Поле для описания --}}
                            <div class="form-group w-75">
                                <label>Описание</label>
                                <textarea class="form-control" placeholder="Описание" name="content"
                                    style="resize: none; height:150px">{{$page->content}}</textarea>
                            </div>
                            @error('content')
                                <div class="text-danger">Это поле необходимо для заполнения</div>
                            @enderror

                             {{-- Поле для главной картинки --}}
                             <div class="form-group mt-5">
                                <div class="d-flex">
                                    <label>Главная картинка</label>

                                    <div class="form-element ml-5 mb-5">

                                        <label>
                                            <input type="file" accept="image/*" name="main_image"
                                                onchange="document.getElementById('mainImage').src = window.URL.createObjectURL(this.files[0])">

                                            <img id="mainImage"
                                                src="{{ isset($page->main_image) ? Storage::url($page->main_image) : 'https://bit.ly/3ubuq5o' }}"
                                                style="width: 250px">

                                        </label>


                                        {{-- Удаление картинок --}}
                                        <div class="btn-delete" style="margin-left:235px"
                                            onclick="imageMainDelete('{{ $page->id ?? '' }}')">
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
                                                    src="{{ isset($pageImages[$i]->path) ? Storage::url($pageImages[$i]->path) : 'https://bit.ly/3ubuq5o' }}">

                                            </label>

                                            {{-- Удаление картинок --}}
                                            <div class="btn-delete"
                                                onclick="imageDelete('{{ $pageImages[$i]->id ?? '' }}', {{ $i }})">
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
                                    <input type="text" class="form-control mb-2" name="seo_url" placeholder="URL" value="{{$seoBlock->url}}">
                                    <label>Title:</label>
                                    <input type="text" class="form-control mb-2" name="seo_title" placeholder="Title" value="{{$seoBlock->title}}">
                                    <label>Keywords:</label>
                                    <input type="text" class="form-control mb-2" name="seo_keywords" placeholder="Word" value="{{$seoBlock->keywords}}">
                                    <label>Description:</label>
                                    <input type="text" class="form-control mb-2" name="seo_description" placeholder="Description" value="{{$seoBlock->description}}">

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
