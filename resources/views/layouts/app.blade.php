<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'النيابه') }}</title>

  

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('googleapis') }}" rel="stylesheet">
 
 
    <link rel="stylesheet" href=" {{ asset('bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('bootstrap.rtl.min.css') }}" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">

    <link href="{{ asset('jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dataTables.bootstrap4.min.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('responsive.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('jquery.fancybox.min.css')}}" media="screen">

    <script src="{{ asset('jquery.js')}}"></script>  
    <script src="{{ asset('jquery.fancybox.min.js')}}"></script>

    <script src="{{ asset('jquery.validate.js')}}"></script>
    <script src="{{ asset('jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('bootstrap4.min.js')}}"></script>
    <script src="{{ asset('dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('dataTables.buttons.min.js')}}"></script>

 <script src="{{ asset('dataTables.rowReorder.min.js')}}"></script>
<script src="{{ asset('dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('responsive.bootstrap4.min.js')}}"></script>

    <link rel="stylesheet" href="{{ asset('buttons.dataTables.min.css')}}">
    <script src="/vendor/datatables/buttons.server-side.js"></script>
 
</head>
    <style type="text/css">
    .gallery
    {
        display: inline-block;
        margin-top: 20px;
    }
    .close-icon{
    	border-radius: 50%;
        position: absolute;
        right: 5px;
        top: -10px;
        padding: 5px 8px;
    }
    .form-image-upload{
        background: #e8e8e8 none repeat scroll 0 0;
        padding: 15px;
    }
    </style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                      <img src="{{asset('logo.jpg')}}"  alt="" width="50" height="50" class="d-inline-block align-text-top">

                    {{ config('app.name', 'Laravel') }}

                </a>
  

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">دخول</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">تسجيل</a>
                                </li>
                            @endif
                        @else
                         <li class="nav-item">
                                    <a  class="btn btn-info ml-auto nav-link" href="{{ route('home') }}">الرئيسه</a>
                                </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle  " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       تسجيل الخروج
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
<script type="text/javascript">
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
   <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
</html>
