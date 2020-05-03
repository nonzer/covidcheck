@extends('layouts.app')

@section('title', 'Se connecter')

@section("container")
    <div class="login-logo">
        <a href="#"><img src="{{ asset('dist/img/logo.svg') }}" alt=""></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Connectez-vous pour demarrer votre session</p>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group has-feedback @error('username') has-error @enderror">
                <input type="text" name="username" class="form-control @error('username') error @enderror" value="{{ old('username') }}" placeholder="Identifiant">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @error('username')
                    <span class="help-block" role="alert">
                        <i class="fa fa-times-circle-o"></i>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group has-feedback @error('password') has-error @enderror">
                <input type="password" name="password" class="form-control @error('password') error @enderror" placeholder="Mot de passe">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @error('password')
                    <span class="help-block" role="alert">
                        <i class="fa fa-times-circle-o"></i>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Garder ma session active
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat btn-submit">Valider</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
    <!-- /.login-box-body -->
@endsection

@push('js')
    <!-- iCheck -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
@endpush

@push('css')
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/blue.css') }}">
@endpush