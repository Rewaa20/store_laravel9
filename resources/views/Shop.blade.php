@extends('master')
@section('title','Shop')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>الأقسام</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{url('jewlary')}}">اكسسوريز</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{url('care')}}">عنايه</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{url('makeup')}}">مكياج</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{url('bag')}}">شنط</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{url('parfan')}}">عطور</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{url('devs')}}">اجهزه</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{url('women')}}">ملابس نساء</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{url('men')}}">رجال</a></h4>
                            </div>
                        </div>
                        
                    </div><!--/category-products-->

        
                
                </div>
            </div>
            
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    @if(Session::get('categ'))
                    <h2 class="title text-center">
                        @php
                        echo (Session::get('categ'))
                        @endphp
                    </h2>
                    @else
                    <h2 class="title text-center">المنتجات</h2>
                    @endif
                    
                    @if (Session::get('categ'))
                    @foreach ($prods as $itm)
                    @if ($itm->ProdCat == Session::get('categ'))
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('uploaded/'. $itm->ProdImg )}}" alt="" />
                                    <h2>${{$itm->ProdPrice}}</h2>
                                    <p>{{$itm->ProdName}}</p>
                                    <a href="{{url('cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>${{$itm->ProdPrice}}</h2>
                                        <p>{{$itm->ProdName}} </p>
                                        <a href="{{ url('product/'.$itm->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="{{url('fav/'.$itm->id)}}"><i class="fa fa-plus-square"></i>أضف إلى المفضلة</a></li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @else
                    @foreach ($prods as $itm)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('uploaded/'. $itm->ProdImg )}}" alt="" />
                                    <h2>${{$itm->ProdPrice}}</h2>
                                    <p>{{$itm->ProdName}}</p>
                                    <a href="{{url('cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>${{$itm->ProdPrice}}</h2>
                                        <p>{{$itm->ProdName}} </p>
                                        <a href="{{ url('product/'.$itm->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="{{url('fav/'.$itm->id)}}"><i class="fa fa-plus-square"></i>أضف إلى المفضلة</a></li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>

@endsection