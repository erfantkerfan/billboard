<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>تابلو فرهنگی دانشکده مهندسی عمران، آب و محیط زیست</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
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
            html, body {
                background-color: #fff;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: grey;
                padding: 0 25px;
                font-weight: 600;
                text-decoration: none;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body style="font-family:'Bmitra'">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">پنل ادمین</a>
                    @else
                        <a href="{{ route('login') }}">ورود</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <a href="{{ Route('slider') }}" style="text-decoration: none; color: inherit; font-family:'IranNastaliq'">
                        تابلو فرهنگی دانشکده مهندسی عمران، آب و محیط زیست
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
