@extends('layouts.app', ['region' => 'active'])

@section('title', 'Modification region')

@section("container")
    @include('layouts.partial._header')
    @include('layouts.partial._left-side')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layouts.partial._content-header', ['s_title' => 'Modification region','title' => 'Regions', 'icon' => 'fa-globe'])

        <section class="content">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-6">
                    <!-- general form elements disabled -->
                    <div class="box box-primary">
                        <form role="form" method="post" action="{{ route('region.update', $region->id) }}">
                            <div class="box-header with-border">
                                <h3 class="box-title">Region #{{ $region->name }}</h3>
                            </div>

                            <div class="box-body">
                            @method("PATCH")
                            @csrf
                            <!-- text input -->
                                <div class="form-group @error('name') has-error @enderror">
                                    <label>Nom</label>
                                    <input type="text" name="name" value="{{ old('name') ?? $region->name }}" class="form-control">
                                    @error('name')
                                    <span class="help-block" role="alert">
                                            <i class="fa fa-times-circle-o"></i>
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group @error('slug') has-error @enderror">
                                    <label>Abbréviation</label>
                                    <input type="text" name="slug" value="{{ old('slug') ?? $region->slug }}" class="form-control">
                                    @error('slug')
                                    <span class="help-block" role="alert">
                                            <i class="fa fa-times-circle-o"></i>
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="box-footer">
                                <a href="{{ route('region.index') }}" class="btn btn-default">Retour</a>
                                <button type="submit" class="btn btn-primary">Modifier</button>
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
