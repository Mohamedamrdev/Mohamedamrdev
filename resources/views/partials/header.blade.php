    <!-- Font Awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href={{asset('css/style.css')}} rel="stylesheet" />
    <!-- Responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />


        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

        <!-- Owl slider stylesheet -->
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
            <body class="sub_page">

                <div class="hero_area">
                    <div class="bg-box">
                        <img src="images/hero-bg.jpg" alt="">
                    </div>
                    <!-- Header section starts -->
                <!-- Header section starts -->
<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="{{ route('index') }}">
                <span>Feane</span>
            </a>
            <a class="navbar-brand" id="usernameDropdown" class="px-3 py-2 rounded-md" style="color: rgb(216, 174, 19);">
                @if (Auth::check())
                    {{ Auth::user()->name }}
                @else
                    Guest
                @endif
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="mx-auto navbar-nav">
                    @unless(request()->is('register','login'))  <!-- تحقق إذا لم تكن على صفحة التسجيل -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">Home</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('menu') }}">Menu </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('booktable') }}">Book Table</a>
                        </li>
                    @endunless
                </ul>
                @unless(request()->is('register','login','order','profile'))  <!-- تحقق إذا لم تكن على صفحة التسجيل -->

                <div class="user_option">
                    <a href="#" class="user_link">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                    <a class="cart_link" href="{{ route('cart') }}">
                        <!-- SVG code هنا -->
                    </a>
                    @endunless

                    @unless(request()->is('register','login','order','profile'))  <!-- تحقق إذا لم تكن على صفحة التسجيل -->
                    <form class="form-inline">
                        <button class="my-2 btn my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                    @endunless

                    @unless(request()->is('register','login','profile'))  <!-- تحقق إذا لم تكن على صفحة التسجيل -->
                    <a href="#" class="order_online">
                        Order Online
                    </a>
                @endunless
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- End header section -->
</div>
