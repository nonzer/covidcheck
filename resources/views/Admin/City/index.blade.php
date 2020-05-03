@extends('layouts.app', ['ville' => 'active'])

@section('title', 'Villes')

@section("container")
    @include('layouts.partial._header')
    @include('layouts.partial._left-side')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    @include('layouts.partial._content-header', ['title' => 'Villes', 'icon' => 'fa-location-arrow'])

    <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><a href="{{ route('city.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Nouvelle ville</a></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body  table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Region</th>
                                        <th>Statistiques</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($cities as $city)
                                        <tr>
                                            <td>
                                                <span><a href="{{ route('city.edit', $city->id) }}"><i class="fa fa-edit"></i></a></span>
                                                <span><a href="#" data-toggle="modal" data-target="#modal-warning-{{ $city->id }}"><i class="fa fa-trash"></i></a></span>
                                                @include('layouts.partial._modal', ["id" => $city->id, "prefix" => "city.destroy"])
                                            </td>
                                            <td>{{ $city->name }}</td>
                                            <td>{{ $city->region->slug }}</td>
                                            <td>
                                                <span class="badge bg-yellow">{{ countCasCity('infecte', $city->id) }}</span>
                                                <span class="badge bg-green">{{ countCasCity('recovered', $city->id) }}</span>
                                                <span class="badge bg-red">{{ countCasCity('death', $city->id) }}</span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="4">No data available in table</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-2">
                    <p><span class="badge bg-yellow">Cas infecté</span></p>
                    <p><span class="badge bg-green">Cas guérri</span></p>
                    <p><span class="badge bg-red">Cas Décédé</span></p>
                </div>
                <div class="col-md-4">
                    @include('layouts.partial._successMessage')
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('css')
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
@endpush
