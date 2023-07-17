@extends('master')
@section('title','login')
@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            @if ($warning = Session::get('fail'))
                <div  class="alert alert-warning ">{{$warning}}</div>
            @endif
            <!--login form-->
            <div class="col-sm-6 col-sm-offset-1">
                <div class="login-form">
                    <h2>التسجيل باستخدام حسابك</h2>
                    <form action="{{url('valid')}}" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="عنوان البريد الإلكتروني الخاص بك" />
                        <input type="password"name="password" placeholder="كلمة المرور" />
                        <button type="submit" class="btn btn-default">تسجيل الدخول</button>
                        <br>
                        <h4><a href="{{url('register')}}">أو التسجيل كمستخدم جديد</a></h4>
                    </form>
                </div>
            </div>
            <!--/login form-->
            
        </div>
    </div>
</section><!--/form-->
@endsection