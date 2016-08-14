<!DOCTYPE html>
<!-- saved from url=(0050)http://getbootstrap.com/examples/starter-template/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />
        

        <link rel="icon" href="http://getbootstrap.com/favicon.ico">

        <title>Test Asingment</title>

        <!-- Bootstrap core CSS -->
        
        <link href="{{asset('assets/site/css/bootstrap.css')}}" rel="stylesheet">
        <link href="{{asset('assets/site/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/site/plugins/nprogress/nprogress.css')}}" rel="stylesheet">
        <link href="{{asset('assets/site/css/style.css')}}" rel="stylesheet">
        

        <!-- Custom styles for this template -->
        <link href="http://getbootstrap.com/examples/starter-template/starter-template.css" rel="stylesheet">

    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="http://getbootstrap.com/examples/starter-template/#">Test</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">


                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">

            @yield('content')

        </div><!-- /.container -->

        @section('scripts')
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $.ajaxSetup({
                    headers: {
                        'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                    }
                });
            });
        </script>
        <script src="{{asset('assets/site/js/bootstrap.js')}}"></script>
        <script src="{{asset('assets/site/plugins/nprogress/nprogress.js')}}"></script>
        @show 

    </body></html>