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
                            <th scope="col">تعداد</th>
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
                                <td>{{$slider->files}}</td>
                                <td>
                                    <form method="post" action="{{ route('slider') }}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <input type="hidden" class="form-control" name="id" id="id" value="{{$slider->id}}">
                                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
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
                                <div class="custom-control invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="head" id="head" placeholder="تیتر" value="{{ old('head') }}">
                            @if ($errors->has('head'))
                                <div class="custom-control invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('head') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="body" id="body" placeholder="متن" value="{{ old('body') }}">
                            @if ($errors->has('body'))
                                <div class="custom-control invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('body') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="files[]" multiple id="file">
                            @if ($errors->has('files.*'))
                                <div class="custom-control invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('files.*') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">آپلود</button>
                            پسوند jpg رعایت شود
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header text-center">تنظیمات سایت</div>
                <div class="card-body text-right" dir="rtl">
                    <table class="table">
                        <thead class="thead-light">
                        <tr class="text-center">
                            <th scope="col">نام</th>
                            <th scope="col">مقدار</th>
                            <th scope="col">تنظیم</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($configs as $config)
                            <tr>
                                <form id="config_form{{$loop->iteration}}" method="post" action="{{ route('config') }}">
                                    <input type="hidden" form="config_form{{$loop->iteration}}" name="_token" value="{{ csrf_token() }}">
                                    <td scope="row">
                                        <input form="config_form{{$loop->iteration}}" type="text" class="form-control" name="name" id="name" readonly value="{{$config->name}}">
                                    </td>
                                    <td>
                                        <input form="config_form{{$loop->iteration}}" type="text" class="form-control" name="attribute" id="attribute" value="{{$config->attribute}}">
                                    </td>
                                    <td>
                                        <button form="config_form{{$loop->iteration}}" type="submit" class="btn btn-success btn-sm">تنظیم</button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

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
                                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
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
