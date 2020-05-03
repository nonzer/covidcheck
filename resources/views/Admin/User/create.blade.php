@extends('layouts.app')

@section('title', 'Nouveau utilisateur')

@section("container")
    @include('layouts.partial._header')
    @include('layouts.partial._left-side')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layouts.partial._content-header', ['s_title' => 'Nouveau utilisateur','title' => 'Utilisateurs', 'icon' => 'fa-users'])

        <section class="content">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-6">
                    <!-- general form elements disabled -->
                    <div class="box box-primary">
                        <form role="form" method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
                            <div class="box-header with-border">
                                <h3 class="box-title">Nouveau utilisateur</h3>
                            </div>

                            <div class="box-body">
                            @csrf
                            <!-- text input -->
                                <div class="form-group @error('username') has-error @enderror">
                                    <label for="">Identifiant</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">@</span>
                                        <input type="text" name="username" class="form-control" placeholder="Username">
                                    </div>
                                    @error('username')
                                        <span class="help-block" role="alert">
                                            <i class="fa fa-times-circle-o"></i>
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group @error('email') has-error @enderror">
                                    <label for="">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    @error('email')
                                        <span class="help-block" role="alert">
                                            <i class="fa fa-times-circle-o"></i>
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group @error('tel') has-error @enderror">
                                    <label>Numéro téléphone:</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input type="text" name="tel" class="form-control" placeholder='(237) 691274385' >
                                    </div>
                                    @error('tel')
                                        <span class="help-block" role="alert">
                                            <i class="fa fa-times-circle-o"></i>
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group @error('role') has-error @enderror">
                                    <label>Rôle:</label>

                                    <select name="role" id="" class="form-control">
                                        <option value="Admin">Admin</option>
                                        <option value="Auteur">Auteur</option>
                                    </select>
                                    @error('role')
                                        <span class="help-block" role="alert">
                                            <i class="fa fa-times-circle-o"></i>
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('css')
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
@endpush