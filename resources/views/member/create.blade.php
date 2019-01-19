@extends('layouts.front.front')

@section('content')
<div class="col-lg-9 container my-5">
    <form class="form-horizontal" role="form" method="POST" action="/member/simpandaftar">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Register New User</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Name</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                        <input type="text" name="nama" class="form-control" id="name"
                               placeholder="John Doe" required autofocus value='{{ old("nama") }}'>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                    @if ( $errors->has('nama'))
                        <span class="text-danger align-middle">
                            <i class="fa fa-close"> {{ $errors->first('nama') }}</i>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">E-Mail Address</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                        <input type="text" name="email" class="form-control" id="email"
                               placeholder="you@example.com" required autofocus  value='{{ old("email") }}'>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                    @if ( $errors->has('email'))
                        <span class="text-danger align-middle">
                            <i class="fa fa-close"> {{ $errors->first('email') }}</i>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Password</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="Password" required value='{{ old("password") }}'>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                    @if ( $errors->has('password'))
                        <span class="text-danger align-middle">
                            <i class="fa fa-close"> {{ $errors->first('password') }}</i>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Confirm Password</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">
                            <i class="fa fa-repeat"></i>
                        </div>
                        <input type="password" name="password_confirmation" class="form-control"
                               id="password_confirmation" placeholder="Password" required  value='{{ old("password_confirmation") }}'>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-control-feedback">
                    @if ( $errors->has('password_confirmation'))
                    <span class="text-danger align-middle">
                        <i class="fa fa-close"> {{ $errors->first('password_confirmation') }}</i>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> Register</button>
                <button type="reset" class="btn btn-warning text-white"><i class="fa fa-refresh-alt"></i> Reset</button>
            </div>
        </div>
    </form>
</div>
@endsection('content')