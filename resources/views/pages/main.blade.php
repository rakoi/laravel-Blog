<!DOCTYPE html>
<html lang="en">
 
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Blog</title>

    <!-- Bootstrap Core CSS -->
    <link href=" {{ asset('css/app.css') }}" rel="stylesheet">
    <link href=" {{ asset('css/clean-blog.min.css') }}" rel="stylesheet">
    <link href=" {{ asset('css/parsley.css') }}" rel="stylesheet">
    <link href=" {{ asset('css/clean-blog.min.css') }}" rel="stylesheet">
    <link href=" {{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href=" {{ asset('css/styles.css') }}" rel="stylesheet">
    <!-- Theme CSS -->
    <link href=" {{ asset('vend/app.css') }}" rel="stylesheet">
    <link href=" {{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.css') }}">
     <script src="js/jquery.js"></script>

      <script src="js/tinymce/tinymce.min.js"></script>
      <script type="text/javascript">
           tinymce.init({
            selector:'textarea'
            });
       </script>
    <![endif]-->


</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/">Rakoi's Web</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <a href="/blog">Blog</a>
                    </li>
                    <li>
                        <a href="/about">About</a>
                    </li>
                    <li>
                        <a href="/contact">Contact</a>
                    </li>
                   
                     <li class="dropdown">
                        <a href="/" class="dropdown-toggle" data-toggle="dropdown">
                                @if(Auth::check())
                                {{ Auth::User()->name }}
                                @else
                                     <li><a href="{{ route('login') }}">Login</a></li>
                                @endif
                             <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                              <a href="{{ route('posts.create') }}">Create Post</a>
                            </li>
                            <li>
                                <a href="/posts"> All Posts</a>
                            </li>
                            <li>
                                <a href="/tags"> Tags</a>
                            </li>
                             <li>
                                <a href="/category"> Categories</a>
                            </li>
                            <hr>
                             <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                </form>
                             </li>
                 </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

        @yield('content')

 <footer >
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; Rakoi's Web 2016</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

<script type="{{ asset('js/parsley.min.js') }}"></script>
  <script src="js/parsley.min.js"></script>
   <script src="js/jquery.js"></script>

    <script src="js/select2.min.js"></script>
    
    <script type="text/javascript">
    $(".select2").select2();
    </script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
     </script>
     

  </body>

</html>
