<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="refresh" content="{{$refresh}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        @font-face {
            font-family:'Bmitra';
            src: url('/fonts/BTITRBOLD.ttf');
        }
        @font-face {
            font-family: 'IranNastaliq';
            src: url('/fonts/IranNastaliq.eot?#') format('eot'),
            url('/fonts/IranNastaliq.ttf') format('truetype'),
            url('/fonts/IranNastaliq.woff') format('woff');
        }
    </style>
</head>
    <body class="container-fluid" style="font-family:'Bmitra'">

    <div class="col-12">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-pause="false" data-interval="{{\App\Config::where('name','زمان هر اسلاید')->first()->attribute*1000}}">
            {{--<ol class="carousel-indicators">--}}
                {{--@foreach($sliders as $slider)--}}
                    {{--<li data-target="#carouselExampleIndicators" data-slide-to="{{$slider->id}}"></li>--}}
                {{--@endforeach--}}
            {{--</ol>--}}
            <div class="carousel-inner">
{{--                {{dd($sliders[0])}}--}}
                @forelse($sliders as $slider)
                    @for ($i = 1; $i <= $slider->files; $i++)
                        {{--<div class="carousel-item {{ $loop->first ? ' active' : '' }}">--}}
                        <div class="carousel-item @if($loop->first && $i==1) active @endif">
                            <img class="d-block w-100" src="image/slider/{{$slider->id}}/{{$i}}.jpg" alt="{{$slider->name}}" width="1280px" height="670px">
                            <div class="carousel-caption d-md-block">
                                <h5 style="color:black;mix-blend-mode: difference">{{$slider->head}}</h5>
                                <p style="color:black;mix-blend-mode: difference">{{$slider->body}}</p>
                            </div>
                        </div>
                    @endfor
                @empty
                    <div class="item active">
                        <img src="/image/empty.jpg" alt="empty" style="width:100%;" width="1280px" height="670px">
                    </div>
                @endforelse
            </div>
            {{--<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">--}}
                {{--<span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
                {{--<span class="sr-only">Previous</span>--}}
            {{--</a>--}}
            {{--<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">--}}
                {{--<span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
                {{--<span class="sr-only">Next</span>--}}
            {{--</a>--}}
        </div>
    </div>

    </body>
</html>