@extends('master')
@section('title','CPanel')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">الرئيسية</a></li>
              <li class="active">لوحة التحكم</li>
            </ol>
        </div>

        <h4 style="margin-bottom: 3rem;"><a href="{{url('add')}}">اضافة منتج جديد</a></h4>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">المنتج</td>
                        <td class="description"></td>
                        <td class="description">الصنف</td>
                        <td class="price">السعر</td>
                        <td class="price">تاريخ الاضافة</td>
                        <td class="price">عدد عمليات تصفح المنتج</td>
                        <td class="price">عدد عمليات البيع</td>
                        <td class="total">العمليات</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($res as $itm)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{asset('uploaded/'. $itm->ProdImg )}}" width="70" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$itm->ProdName}}</a></h4>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$itm->ProdCat}}</a></h4>
                        </td>
                        <td class="cart_price">
                            <p>${{$itm->ProdPrice}}</p>
                        </td>
                        <td class="cart_description">
                            <p>{{$itm->ProdDate}}</p>
                        </td>
                        <td class="cart_description">
                            <p>{{$itm->ProdShow}}</p>
                        </td>
                        <td class="cart_description">
                            <p>{{$itm->ProdBuy}}</p>
                        </td>
                        <td class="cart_delete">
                           
							<a class="cart_quantity_delete" href="{{ url('delProd/'.$itm->id) }}"><i class="fa fa-times"></i></a>
                            <a class="cart_quantity_delete" href="{{ url('product/'.$itm->id.'/edit') }}"><i class="fa fa-pencil-square-o"></i></a>

                            <!-- <a class="cart_quantity_delete" href="product-details.html"><i class="fa fa-info-circle"></i></a> -->
                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
@endsection