@extends('layouts.app', ['region' => 'active'])

@section('title', 'Nouvelle region')

@section("container")
    @include('layouts.partial._header')
    @include('layouts.partial._left-side')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @include('layouts.partial._content-header', ['s_title' => 'Nouvelle region','title' => 'Regions', 'icon' => 'fa-globe'])

        <section class="content">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-6">
                    <!-- general form elements disabled -->
                    <div class="box box-primary">
                        <form role="form" method="post" action="{{ route('region.store') }}">
                            <div class="box-header with-border">
                                <h3 class="box-title">Nouvelle region</h3>
                            </div>

                            <div class="box-body">
                                @csrf
                                <!-- text input -->
                                <div class="form-group @error('name') has-error @enderror">
                                    <label>Nom</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Entrez...">
                                    @error('name')
                                        <span class="help-block" role="alert">
                                            <i class="fa fa-times-circle-o"></i>
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group @error('slug') has-error @enderror">
                                    <label>Abbréviation</label>
                                    <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" placeholder="Entrez ...">
                                    @error('slug')
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
