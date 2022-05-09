@extends('admin.layouts.main')
@section('content')

    <div class="row" style="margin-top: 300px;margin-bottom: 410px;">
        <div class="col-6 m-auto">
            <h2 class="text-center mb-5 font-weight-bold">{{$result}}</h2>

            <div class="btn btn-info d-block m-auto w-25">
                <a class="font-weight-bold" style="color: rgb(255, 255, 255); z-index:5" href="{{route('admin.mailing.index')}}">
                    Вернуться к рассылке
                </a>
            </div>
        </div>
    </div>



@endsection
