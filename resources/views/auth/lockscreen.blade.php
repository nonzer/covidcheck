@extends('layouts.app')

@section('title', 'Se reconnecter')

@section("container")
    <div class="lockscreen-logo">
        <a href="#"><img src="{{ asset('dist/img/logo.svg') }}" alt=""></a>
    </div>
    <!-- User name -->
    <div class="lockscreen-name">{{ Username() }}</div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
            <img src="{{ asset('dist/img/other/'. AvatarUser()) }}" alt="User Image">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <form class="lockscreen-credentials" method="post" action="{{ route('lockscreen.store') }}">
            @csrf
            <div class="input-group">
                <input type="password" name="password" class="form-control" placeholder="Mot de passe">

                <div class="input-group-btn">
                    <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                </div>
            </div>
        </form>
        <!-- /.lockscreen credentials -->

    </div>
    <!-- /.lockscreen-item -->
    @error('password')
        <div class="has-error">
            <p class="help-block text-center">
                {{ $message }}
            </p>
        </div>
    @enderror
    <div class="text-center">
        <a href="{{ route('login') }}">Connectez-vous avec un utilisateur différent</a>
    </div>
    <div class="lockscreen-footer text-center">
        Copyright &copy; 2020 <a href="#">AlphaLabo</a>. Tous droits
        reservés.
    </div>
@endsection