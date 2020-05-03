@extends('layouts.app', ['region' => 'active'])

@section('title', 'Nouvelle stat')

@section("container")
    @include('layouts.partial._header')
    @include('layouts.partial._left-side')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('layouts.partial._content-header', ['s_title' => 'Nouvelle Stat','title' => 'Statistiques', 'icon' => 'fa-globe'])

        <section class="content">
            <div class="box box-default">
                <form role="form" method="post" action="{{ route('statistic.store') }}">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nouvelle stat</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="infecte">Cas infecté</label>
                                    <input name="infecte" id="infecte" min="0" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="recovered">Cas guerri</label>
                                    <input name="recovered" id="recovered" min="0" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="death">Cas décédé</label>
                                    <input name="death" id="death" min="0" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ville">Ville</label>
                                    <select name="cities_id" id="ville" class="form-control select2">
                                        <option value="">Sélectionnez une ville</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="datepicker">Date:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input name="date_out" type="text" class="form-control pull-right" id="datepicker">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="right btn btn-primary">Sauvegarder <i class="fa fa-long-arrow-right"></i></button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('css')
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">

@endpush

@push('js')
    <!-- Select2 -->
    <script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- bootstrap datepicker -->
    <script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- Page script -->
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
            //Date picker
            $('#datepicker').datepicker({
                autoclose: true
            })
        })
    </script>
@endpush