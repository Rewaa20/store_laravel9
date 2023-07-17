@extends('master')
@section('title','register')
@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
           
            <!--sign up form-->
            <div class="col-sm-6">
                <div class="signup-form">
                    <h2>التسجيل كمستخدم جديد!</h2>
                    <form action="{{url('product')}}" method="POST">
                        @csrf
                        <input type="text" name="name" value="{{old('name')}}" placeholder="اسم المستخدم"/>
                        <p style="color:rgb(205, 81, 3)">@error('name'){{$message}}@enderror</p>
                        <input type="email" name="email" value="{{old('email')}}" placeholder="عنوان البريد الإلكتروني"/>
                        <p style="color:rgb(205, 81, 3)">@error('email'){{$message}}@enderror</p>
                        <input type="password" name="password" value="{{old('password')}}" placeholder="كلمة المرور"/>
                        <p style="color:rgb(205, 81, 3)">@error('password'){{$message}}@enderror</p>
                        <button type="submit" class="btn btn-default">تسجيل</button>
                    </form>
                </div>
            </div>
            <!--/sign up form-->
        </div>
    </div>
</section><!--/form-->

@endsection