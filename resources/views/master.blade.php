<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')| E-MALL</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('css/main.css')}}" rel="stylesheet">
	<link href="{{asset('css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('css/edit-style.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('js/html5shiv.js')}}"></script>
    <script src="{{asset('js/respond.min.js')}}"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('images/ico/apple-touch-icon-57-precomposed.png')}}">
	<style>
		.alert{
			width:200px;
			text-align: center;
			margin: auto
		}
	</style>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{url('/')}}"><img src="{{asset('images/home/logo-2.png')}}" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								@if ((Auth::user()))
								<li><a href="{{url('fav')}}"><i class="fa fa-star"></i> المفضلة</a></li>
								<li><a href="{{url('showCart')}}"><i class="fa fa-shopping-cart"></i> عربة التسوق</a></li>
								<li><a href="{{url('logout')}}"><i class="fa fa-lock"></i> تسجيل خروج</a></li>
								@else
								<li><a href="{{url('login')}}"><i class="fa fa-lock"></i> تسجيل دخول</a></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{url('/')}}">الرئيسية</a></li>
								<li><a href="{{url('shop')}}">المنتجات</a></li>
								@if ((Auth::user()))
								<li><a href="{{url('product/create')}}">لوحة التحكم</a></li>
								@endif
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="بحث"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

    @yield('content')

    <footer id="footer"><!--Footer-->
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">

					<div class="col-sm-4">
						<div class="companyinfo" style="margin-top: 5px;">
							<h2 style="font-size: 38px;"><span>e</span>-mall</h2>
							<!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>-->
						</div>
					</div>

					<div class="col-sm-2">
						<div class="single-widget">
							<h2>روابط</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">الرئيسية</a></li>
								<!-- <li><a href="#">الحساب</a></li> -->
								<li><a href="#">المفضلة</a></li>
								<li><a href="#">عربة التسوق</a></li>
								<li><a href="#">التسجيل</a></li>
							</ul>
						</div>
					</div>

					<div class="col-sm-2">
						<div class="single-widget">
							<h2>تسوق سريع</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">تي شيرت</a></li>
								<li><a href="#">رجالي</a></li>
								<li><a href="#">حريمي</a></li>
								<li><a href="#">بطاقات الهدايا</a></li>
								<li><a href="#">أحذية</a></li>
							</ul>
						</div>
					</div>

					<div class="col-sm-2">
						<div class="single-widget">
							<h2>عن المتجر</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">معلومات الشركة</a></li>
								<li><a href="#">الوظائف</a></li>
								<li><a href="#">موقع المتجر</a></li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p style="text-align: center;">Copyright © <script>document.write(new Date().getFullYear());</script> E-MALL Inc. جميع الحقوق محفوظة</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="{{asset('js/jquery.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('js/price-range.js')}}"></script>
    <script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>