<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Prochito ITS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
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
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div style="z-index:10">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
            <div class="content">

                <div class="title m-b-md">
                    
                    {{-- nventory Management System --}}
                    {{-- <marquee behavior="scroll">
                        <p style="color:red">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                        </marquee> --}}
                <div class="fontss" style="background-color:ivory;">
                        <font face="Arial Black" style="z-index:10">
                        <font color="#ff0000">I</font><font color="#">nventory</font>
                        <font color="#ff0000">M</font><font color="#">anagement</font>
                        <font color="#ff0000">S</font><font color="#">ystem</font>
                    </font>
                </div>
                <marquee style="z-index:2;position:absolute;left:18%;top:47%;font-family:Cursive;font-size:14pt;color:orange;height:100px;"scrollamount="3" direction="down">Inventory Management System</marquee><marquee style="z-index:2;position:absolute;left:1%;top:39%;font-family:Cursive;font-size:14pt;color:#f56c42;height:50%;"scrollamount="7" direction="down">Inventory Management System</marquee><marquee style="z-index:2;position:absolute;left:11%;top:7%;font-family:Cursive;font-size:14pt;color:lime;height:302px;"scrollamount="4" direction="down">Prochito ITS</marquee><marquee style="z-index:2;position:absolute;left:25%;top:33%;font-family:Cursive;font-size:14pt;color:#219c73;height:435px;"scrollamount="3" direction="down">Inventory Management System</marquee><marquee style="z-index:2;position:absolute;left:75%;top:13%;font-family:Cursive;font-size:14pt;color:#0cbbcf;height:432px;"scrollamount="2" direction="down">Inventory Management System</marquee><marquee style="z-index:2;position:absolute;left:60%;top:29%;font-family:Cursive;font-size:14pt;color:#374066;height:369px;"scrollamount="1" direction="down">Inventory Management System</marquee><marquee style="z-index:2;position:absolute;left:70%;top:17%;font-family:Cursive;font-size:14pt;color:#2f0ec4;height:289px;"scrollamount="7" direction="down">Inventory Management System</marquee><marquee style="z-index:2;position:absolute;left:80%;top:27%;font-family:Cursive;font-size:14pt;color:red;height:78px;"scrollamount="7" direction="down">Prochito ITS</marquee><marquee style="z-index:2;position:absolute;left:16%;top:17%;font-family:Cursive;font-size:14pt;color:#ffcc00;height:56px;"scrollamount="5" direction="down">Inventory Management System</marquee><marquee style="z-index:2;position:absolute;left:30%;top:46%;font-family:Cursive;font-size:14pt;color:#ffcc00;height:194px;"scrollamount="2" direction="down">Inventory Management System</marquee><marquee style="z-index:2;position:absolute;left:2%;top:10%;font-family:Cursive;font-size:14pt;color:Fuchsia;height:251px;"scrollamount="6" direction="down">Inventory Management System</marquee><marquee style="z-index:2;position:absolute;left:48%;top:24%;font-family:Cursive;font-size:14pt;color:#720ec4;height:154px;" direction="down">Inventory Management System</marquee><marquee style="z-index:2;position:absolute;left:41%;top:22%;font-family:Cursive;font-size:14pt;color:Fuchsia;height:82px;" direction="down">Inventory Management System</marquee><marquee style="z-index:2;position:absolute;left:46%;top:2%;font-family:Cursive;font-size:14pt;color:c40e8d;height:70px;"scrollamount="3" direction="down">Prochito ITS</marquee><marquee style="z-index:2;position:absolute;left:42%;top:15%;font-family:Cursive;font-size:14pt;color:#992943;height:334px;" direction="down">Inventory Management System</marquee><marquee style="z-index:2;position:absolute;left:40%;font-family:Cursive;font-size:14pt;color:#ffcc00;height:167px;"scrollamount="7" direction="down">Inventory Management System</marquee><marquee style="z-index:2;position:absolute;left:45%;top:18%;font-family:Cursive;font-size:14pt;color:#ffcc00;height:420px;"scrollamount="7" direction="down">Inventory Management System</marquee><marquee style="z-index:2;position:absolute;left:22%;top:26%;font-family:Cursive;font-size:14pt;color:#violet;height:12px;"scrollamount="7" direction="down">Inventory Management System</marquee><marquee style="z-index:2;position:absolute;left:49%;top:4%;font-family:Cursive;font-size:14pt;color:#yellow;height:366px;"scrollamount="2" direction="down">Inventory Management System</marquee><marquee style="z-index:2;position:absolute;left:26%;top:32%;font-family:Cursive;font-size:14pt;color:#green;height:358px;"scrollamount="1" direction="down">Inventory Management System</marquee><marquee style="z-index:2;position:absolute;left:3%;top:14%;font-family:Cursive;font-size:14pt;color:#ffcc00;height:130px;"scrollamount="3" direction="down">Inventory Management System</marquee>
                    {{-- <marquee behavior="scroll">
                        <p style="color:red">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                    </marquee> --}}
                </div>
                <!-- <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> -->
            </div>
        </div>
    </body>
</html>