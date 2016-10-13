@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                <h3 class="text-center">@Lang('andinistas.login')</h3>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <!-- <label for="email" class="col-md-4 control-label">E-Mail</label> -->

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail" autofocus >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <!-- <label for="password" class="col-md-4 control-label">@Lang('andinistas.password')</label> -->

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" placeholder="@Lang('andinistas.password')">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> @Lang('andinistas.password.remember')
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">@Lang('andinistas.password.forget')
                                </a>
                            </div>
                        </div>                       
                    </form>
                    <h4 class="text-center">@Lang('andinistas.or')</h4>
                    <form>
                         
                           
                             <a class="btn btn-facebook btn-block" id="facebook" href="{{ url('/redirect/facebook') }}"><i class="fa fa-facebook-square " aria-hidden="true"></i> Facebook</a>

                             <a class="btn btn-instagram btn-block" id="instagram" href="{{ url('/redirect/instagram') }}"> <i class="fa fa-instagram " aria-hidden="true"></i> Instagram</a>

                             <a class="btn btn-twitter btn-block" id="twitter" href="{{ url('/redirect/twitter') }}"><i class="fa fa-twitter " aria-hidden="true"></i> Twitter</a>                   
                                                  
                             <a class="btn btn-google btn-block" id="google" href="{{ url('/redirect/google') }}"><i class="fa fa-google " aria-hidden="true"></i> Google</a>
                         
                             
                                                 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
