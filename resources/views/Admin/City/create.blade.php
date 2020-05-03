@extends('layouts.app', ['region' => 'active'])

@section('title', 'Nouvelle ville')

@section("container")
    @include('layouts.partial._header')
    @include('layouts.partial._left-side')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layouts.partial._content-header', ['s_title' => 'Nouvelle ville','title' => 'Villes', 'icon' => 'fa-location-arrow'])

        <section class="content">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-6">
                    <!-- general form elements disabled -->
                    <div class="box box-primary">
                        <form role="form" method="post" action="{{ route('city.store') }}">
                            <div class="box-header with-border">
                                <h3 class="box-title">Nouvelle ville</h3>
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
                                <div class="form-group @error('region_id') has-error @enderror">
                                    <label>Region</label>
                                    <select name="region_id" class="form-control">
                                        @foreach($regions as $region)
                                            <option {{ old('region_id') ? 'selected' : '' }} value="{{ $region->id }}">{{ $region->slug .' - '. $region->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('region_id')
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
