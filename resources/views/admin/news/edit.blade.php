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
                          <form action="{{route('admin.news.update', $news->id)}}" method="POST" enctype="multipart/form-data" class="ml-4 mb-3">
                            @csrf
                            @method('PATCH')

                            @if($news->status == 1)
                                <div class="form-group radio-switch">
                                    <input type="radio" name="status" id="public" value="0">
                                    <label for="public">
                                    ВЫКЛ
                                    </label>
                                    <input type="radio" name="status" id="private" value="1" checked>
                                    <label for="private">
                                    ВКЛ
                                    </label>
                                </div>
                            @else
                            <div class="form-group radio-switch">
                                <input type="radio" name="status" id="public" value="0" checked>
                                <label for="public">
                                ВЫКЛ
                                </label>
                                <input type="radio" name="status" id="private" value="1">
                                <label for="private">
                                ВКЛ
                                </label>
                            </div>
                            @endif



                            {{-- Поле для названия --}}
                            <div class="form-group d-flex">
                                <label>Название новости</label>
                                <input type="text" class="form-control w-25 mr-5 ml-3" name="title" placeholder="Название новости" value="{{$news->title}}">
                                <label>Дата публикации</label>
                                <input type="date" class="form-control w-25 ml-3" name="date" value="{{$news->date}}">
                            </div>
                              @error('title')
                                <div class="text-danger">Это поле необходимо для заполнения</div>
                              @enderror

                              {{-- Поле для описания --}}
                            <div class="form-group w-75">
                                <label>Описание новости</label>
                                <textarea class="form-control" placeholder="Описание новости" name="content"
                                    style="resize: none; height:150px">{{$news->content}}</textarea>
                            </div>
                            @error('content')
                                <div class="text-danger">Это поле необходимо для заполнения</div>
                            @enderror

                            {{-- Поле для главной картинки --}}
                            <div class="form-group mt-5">
                                <div class=" d-flex">
                                    <label >Главная картинка</label>

                                    <div class="form-element ml-5 mb-5">
                                        <input type="file" id="img-main" accept="image/*" name="main_image">
                                        <label for="img-main" id="img-main-preview">
                                            <img src="{{ Storage::url($news->main_image) }}" alt="" style="width: 250px; height: 150px">
                                            <div class="bg-plus" hidden>
                                                <span>+</span>
                                            </div>
                                        </label>
                                        {{-- Delete img --}}
                                        <div class="btn-inner">
                                            <div class="btn-delete btn-image-main" id="submit-main"
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
                                                @if(isset($newsPaths[$i]))
                                                <img src="{{ Storage::url($newsPaths[$i]) }}" alt=""
                                                    style="width: 150px; height: 150px">
                                                <div class="bg-plus" hidden>
                                                    <span>+</span>
                                                </div>
                                                @else
                                                <img src="https://bit.ly/3ubuq5o" alt=""
                                                    style="width: 150px; height: 150px">
                                                <div class="bg-plus">
                                                    <span>+</span>
                                                </div>
                                                @endif

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

                            {{-- Поле ссылки youtube --}}
                            <div class="form-group w-50 mb-5">
                                <label>Ссылка на видео</label>
                                <input type="text" class="form-control" name="video_link" placeholder="Ссылка на видео в youtube" value="{{$news->video_link}}">
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
