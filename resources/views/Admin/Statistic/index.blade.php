@extends('layouts.app', ['statistic' => 'active'])

@section('title', 'Statistique Covid-19')

@section("container")
    @include('layouts.partial._header')
    @include('layouts.partial._left-side')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    @include('layouts.partial._content-header', ['title' => 'Statistique Covid-19', 'icon' => 'fa-bar-chart'])

        <!-- Main content -->
        <section class="content">
            <div class="row">
                @include('layouts.partial._successMessage')
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><a href="{{ route('statistic.create') }}" class="btn btn-primary">Nouvelle enregistrement</a></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ville</th>
                                        <th>Infectés</th>
                                        <th>Guéris</th>
                                        <th>Morts</th>
                                        <th>Date relevé</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($statistics as $statistic)
                                        <tr>
                                            <td>
                                                <span><a href="{{ route('statistic.edit', $statistic->id) }}"><i class="fa fa-edit"></i></a></span>
                                                <span><a href="#" data-toggle="modal" data-target="#modal-warning-{{ $statistic->id }}"><i class="fa fa-trash"></i></a></span>
                                                @include('layouts.partial._modal', ["id" => $statistic->id, "prefix" => "statistic.destroy"])
                                            </td>
                                            <td>{{ $statistic->city->region->slug .' - '. $statistic->city->name }}</td>
                                            <td class="bg-yellow">{{ $statistic->infecte }}</td>
                                            <td class="bg-green">{{ $statistic->recovered }}</td>
                                            <td class="bg-red">{{ $statistic->death }}</td>
                                            <td>{{ newFormat($statistic->date_out) }}</td>
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
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('css')
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
@endpush

@push('js')
    <!-- SlimScroll -->
    <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
@endpush