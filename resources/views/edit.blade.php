@extends('master')
@section('title','Edit')
@section('content')
@extends('master')
@section('title','add_Product')
@section('content')
<div id="contact-page" class="container">
    <div class="bg">
        <div class="row" style="margin-bottom: 50px;">    		
            <div class="col-sm-12">    			   			
                <h2 class="title text-center">تعديل المنتجات</h2>    			    				    				
                <!--<div id="gmap" class="contact-map">
                </div>-->
            </div>			 		
        </div>    	
        <div class="row">  	
            <div class="col-sm-8">
                <div class="contact-form">
                    <div class="status alert alert-success" style="display: none"></div>
                    <form action="{{url('product/'. $edit->id)}}" method="POST" enctype="multipart/form-data" id="main-contact-form" class="contact-form row" name="contact-form" >
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" required="required" value="{{$edit->ProdName}}" placeholder="اسم المنتج">
                        </div>
                        <p class="red">@error('name')
                            {{$message}}
                        @enderror</p>
                        <div class="form-group col-md-6">
                            <input type="number" name="price" class="form-control" required="required" value="{{$edit->ProdPrice}}" placeholder="السعر">
                        </div>
                        <p class="red">@error('price')
                            {{$message}}
                        @enderror</p>
                        <div class="form-group col-md-6">
                            <select name="cat" class="form-control" value="{{$edit->ProdCat}}">
                                <option>اكسسوريز</option>
                                <option>عنايه</option>
                                <option>مكياج</option>
                                <option>شنط</option>
                                <option>عطور</option>
                                <option>اجهزه</option>
                                <option>ملابس نساء</option>
                                <option>رجال</option>
                            </select>
                        </div>
                        <p class="red">@error('cat')
                            {{$message}}
                        @enderror</p>
                        <div class="form-group col-md-6">
                            <input type="file" name="image" class="form-control"   placeholder="اختر صورة المنتج">
                        </div>
                        <p class="red">@error('image')
                            {{$message}}
                        @enderror</p>
                        <div class="form-group col-md-12">
                            <textarea name="des" id="message" required="required" class="form-control" rows="8" value="" placeholder="وصف المنتج أو نبذة عنه">{{$edit->ProdDes}}</textarea>
                        </div>                      
                        <p class="red">@error('des')
                            {{$message}}
                        @enderror</p>  
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="حفظ التعديلات">
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </div>	
</div><!--/#contact-page-->
@endsection