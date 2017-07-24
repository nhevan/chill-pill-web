<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Chill Pill</title>

        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #00b4d0;
                color: white;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                font-size: 50px;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            
            .input-field .select-wrapper .caret{
                color: white;
            }
            .input-field .select-wrapper .select-dropdown{
                border-bottom: 1px solid white;
            }
            /* label color */
           .input-field label {
             color: white;
           }
           /* label focus color */
           .input-field input[type=text]:focus + label {
             color: #000;
           }
           input[type=text]:not(.browser-default){
                border-bottom: 1px solid white;
           }
           input[type=text]:not(.browser-default):focus:not([readonly]), input[type=password]:not(.browser-default):focus:not([readonly]){
                border-bottom: 1px solid #de446a;
           }
           input[type=text]:not(.browser-default):focus:not([readonly])+label, input[type=password]:not(.browser-default):focus:not([readonly])+label{
            color: #fffcf7;
           }
           input[type=text].valid:not(.browser-default), input[type=password].valid:not(.browser-default){
                border-bottom: 1px solid white;
           }
        }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            {{-- @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif --}}
            <div class="container">
                <div class="row">

                    <div class="input-field col s12">
                        <div class="content">
                            <img src="images/chill-pill-logo-1.png" style="width:100px">
                            <div class="title m-b-md">
                                Chill Pill
                            </div>
                        </div>
                    </div>

                    <div class="input-field col s6 offset-s3">
                        <select>
                            <option value="" disabled selected required>Choose user type</option>
                            <option value="patient">Patient</option>
                            <option value="doctor">Doctor</option>
                        </select>
                    </div>

                    <div class="input-field col s6 offset-s3">
                        <input id="username" type="text" class="validate">
                        <label for="username">Username</label>
                    </div>

                    <div class="input-field col s6 offset-s3">
                        <input id="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>

                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('select').material_select();
            });
        </script>
    </body>
</html>
