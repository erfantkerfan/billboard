@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-8">
            <div class="card">
                <div class="card-header text-center">اعلامیه های فعال</div>
                <div class="card-body text-right" dir="rtl">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام(شناساگر)</th>
                            <th scope="col">تیتر</th>
                            <th scope="col">متن</th>
                            <th scope="col">حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slider)
                            <tr>
                                <th scope="row">{{$slider->id}}</th>
                                <td>{{$slider->name}}</td>
                                <td>{{$slider->head}}</td>
                                <td>{{$slider->body}}</td>
                                <td>
                                    <form method="post" action="{{ route('slider') }}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <input type="hidden" class="form-control" name="id" id="id" value="{{$slider->id}}">
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card">
                <div class="card-header text-center">آپلود  اعلامیه</div>
                <div class="card-body text-right" dir="rtl">
                    <form method="POST"  enctype="multipart/form-data" action="{{ route('slider') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="نام اعلامیه" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="head" id="head" placeholder="تیتر" value="{{ old('head') }}">
                            @if ($errors->has('head'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('head') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="body" id="body" placeholder="متن" value="{{ old('body') }}">
                            @if ($errors->has('body'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="file" id="file">
                            @if ($errors->has('file'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">آپلود</button>
                        نسبت اندازه تصویر و پسوند jpg رعایت شود
                    </form>
                </div>
            </div>
        </div>

        <div class="col-4 offset-8">
            <div class="card">
                <div class="card-header text-center">ادمین های سایت</div>
                <div class="card-body text-right" dir="rtl">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام کاربری</th>
                            <th scope="col">حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->username}}</td>
                                <td>
                                    <form method="post" action="{{ route('register') }}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <input type="hidden" class="form-control" name="id" id="id" value="{{$user->id}}">
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
