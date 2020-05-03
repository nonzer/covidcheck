@extends('layouts.app', ['region' => 'active'])

@section('title', 'Regions')

@section("container")
    @include('layouts.partial._header')
    @include('layouts.partial._left-side')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('layouts.partial._content-header', ['title' => 'Regions', 'icon' => 'fa-globe'])

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><a href="{{ route('region.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Nouvelle region</a></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body  table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>#</th>
                                    <th>Abbréviation</th>
                                    <th>Nom</th>
                                    <th>Statistiques</th>
                                </tr>
                                @forelse($regions as $region)
                                    <tr>
                                        <td>
                                            <span><a href="{{ route('region.edit', $region->id) }}"><i class="fa fa-edit"></i></a></span>
                                            <span><a href="#" data-toggle="modal" data-target="#modal-warning-{{ $region->id }}"><i class="fa fa-trash"></i></a></span>
                                            @include('layouts.partial._modal', ["id" => $region->id, "prefix" => "region.destroy"])
                                        </td>
                                        <td>{{ $region->slug }}</td>
                                        <td>{{ $region->name }}</td>
                                        <td>
                                            <span class="badge bg-yellow">{{ addZero(countCasRegion($region->id, "infecte")) }}</span>
                                            <span class="badge bg-green">{{ addZero(countCasRegion($region->id, "recovered")) }}</span>
                                            <span class="badge bg-red">{{ addZero(countCasRegion($region->id, "death")) }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="4">No data available in table</td>
                                    </tr>
                                @endforelse
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
