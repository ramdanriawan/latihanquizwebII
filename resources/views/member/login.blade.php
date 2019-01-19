@extends('layouts.front.front')

@section('content')
<style>
    .box {
        width: 500px;
        margin: 0 0;
    }

    .shape1{
        position: relative;
        height: 150px;
        width: 150px;
        background-color: #0074d9;
        border-radius: 80px;
        float: left;
        margin-right: -50px;
    }
    .shape2 {
        position: relative;
        height: 150px;
        width: 150px;
        background-color: #0074d9;
        border-radius: 80px;
        margin-top: -30px;
        float: left;
    }
    .shape3 {
        position: relative;
        height: 150px;
        width: 150px;
        background-color: #0074d9;
        border-radius: 80px;
        margin-top: -30px;
        float: left;
        margin-left: -31px;
    }
    .shape4 {
        position: relative;
        height: 150px;
        width: 150px;
        background-color: #0074d9;
        border-radius: 80px;
        margin-top: -25px;
        float: left;
        margin-left: -32px;
    }
    .shape5 {
        position: relative;
        height: 150px;
        width: 150px;
        background-color: #0074d9;
        border-radius: 80px;
        float: left;
        margin-right: -48px;
        margin-left: -32px;
        margin-top: -30px;
    }
    .shape6 {
        position: relative;
        height: 150px;
        width: 150px;
        background-color: #0074d9;
        border-radius: 80px;
        float: left;
        margin-right: -20px;
        margin-top: -35px;
    }
    .shape7 {
        position: relative;
        height: 150px;
        width: 150px;
        background-color: #0074d9;
        border-radius: 80px;
        float: left;
        margin-right: -20px;
        margin-top: -57px;
    }
    .float {
        position: absolute;
        z-index: 2;
    }

    .form {
        margin-left: 145px;
    }

    .col-lg-9 {
        margin-bottom: 50px;
        margin-top: 50px;
    }
</style>
    <div class='col-lg-9'>
        <div class="box">
            <div class="shape1"></div>
            <div class="shape2"></div>
            <div class="shape3"></div>
            <div class="shape4"></div>
            <div class="shape5"></div>
            <div class="shape6"></div>
            <div class="shape7"></div>
            <div class="float">
                <form class="form" action="/member/proseslogin" method='post'>
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email" class="text-white">Email:</label><br>
                        <input type="email" name="email" id="email" class="form-control" placholder='email'>
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-white">Password:</label><br>
                        <input type="password" name="password" id="password" class="form-control" placeholder='password'>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection