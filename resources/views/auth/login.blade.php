@extends('layouts.app')

@section('content')
    <div class="login_page">
        <div class="login_form">
            <h1 class="inline">
                ログイン
                <span><img class="inline" src="{{ asset('/img/login.png') }}"></span>
            </h1>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">メールアドレス</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="input_form" name="email"
                                   value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">パスワード</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="input_form" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                ログイン
                            </button>
                            {{--<a class="btn btn-default" href="/login/twitter">twitterでログイン</a>--}}
                            <br>
                        <!--                                 <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
 -->                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        body {
            background-color: #f9f9f9;
        }
    </style>
@endsection
