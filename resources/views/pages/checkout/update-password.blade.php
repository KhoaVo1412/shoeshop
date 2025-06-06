@extends('welcome')
@section('content')
<section id="form"><!--form-->
    <div class="container" style="position: absolute; margin-top: -195px;margin-left: 50px;">
        <div class="row">
            <div class="col-sm-5 col-sm-offset-1">

                <div class="col-sm-10">
                    <div class="signup-form"><!--sign up forsm-->
                        <h2>Nhập mật khẩu mới</h2>
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            {!!session()->get('message')!!}
                        </div>
                        @elseif(session()->has('error'))
                        <div class="alert alert-danger">
                            {!!session()->get('error')!!}
                        </div>
                        @endif
                        <form action="{{URL::to('/update-password-save')}}" method="POST">
                            {{ @csrf_field() }}
                            <input type="password" name="customer_password_cu" placeholder="Nhập mật khẩu cũ"/>
                            <input type="password" name="customer_password" placeholder="Mật khẩu mới"/>
                            <input type="password" name="customer_repassword" placeholder="Nhập lại mật khẩu mới"/>
                            <button type="submit" class="btn btn-default">Cập nhật mật khẩu</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </div>
</section><!--/form-->

@endsection
