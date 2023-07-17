@extends('master')
@section('title','Cart')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">الرئيسية</a></li>
              <li class="active">عربة التسوق</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">المنتج</td>
                        <td class="description"></td>
                        <td class="price">السعر</td>
                        <td class="quantity">الكمية</td>
                        <td class="total">المجموع</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($res_prod as $itm)
                    @foreach ($res as $dd)
                    @if ($dd->P_id == $itm->id )
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{asset('uploaded/'. $itm->ProdImg)}}" width="70" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$itm->ProdName}}</a></h4>
                        </td>
                        <td class="cart_price">
                            <p>${{$itm->ProdPrice}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$itm->ProdAmount}}" autocomplete="off" size="2">
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">${{$itm->Total}}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{ url('delCart/'.$dd->id) }}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    @endforeach

                   
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">

        <div class="row">
            
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>إجمالي عربة التسوق <span>$59</span></li>
                        <li>الضريبة <span>$2</span></li>
                        <li>تكلفة الشحن <span>Free</span></li>
                        <li>المجموع <span>$61</span></li>
                    </ul>
                        <a class="btn btn-default update" href="">حفظ التعديلات</a>
                        <a class="btn btn-default check_out" href="{{ url('done') }}">اتمام عملية الشراء</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection
