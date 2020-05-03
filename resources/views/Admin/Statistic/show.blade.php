@extends('layouts.app', ['dashboard' => 'active'])

@section('title', 'Détails statistique')

@section("container")
    @include('layouts.partial._header')
    @include('layouts.partial._left-side')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @include('layouts.partial._content-header', ['title' => 'Détails statistique', 'icon' => 'fa-dashboard'])

    <!-- Main content -->
        <section class="content">

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="box box-solid">
                        <div class="box-header">
                            <h3 class="box-title text-warning">Sparkline Bar</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body text-center" style="height: 500px">
                            <div class="sparkline" data-type="bar" data-width="97%" data-height="300px" data-bar-Width="34" data-bar-Spacing="13" data-bar-Color="@if($val === "infecte")#f39c12 @elseif($val === "recovered") #00a65a @elseif($val === "death") #f56954 @endif">
                                @foreach($regions as $region)
                                    {{ countCasRegion($region->id, $val). ',' }}
                                @endforeach
                            </div>
                            <div>
                                @foreach($regions as $region)
                                    <span style="padding-right: 30px" title="{{ $region->name }}">{{ $region->slug }}</span>
                                @endforeach
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->{{--
                    x + y = 8  -> x = 8 - y -> x = 3.5
                    w - z = 6 -> 5 + y - z = 6 -> y = z + 1 -> y = 4.5
                    y + z = 8 -> z + 1 + z = 8 -> z = 3.5
                    x + w = 13 -> w = 13 - 8 + y = 5 + y -> w = 9.5--}}
                </div>
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('js')
    <!-- SlimScroll -->
    <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <script>
        $(function () {
            //INITIALIZE SPARKLINE CHARTS
            $(".sparkline").each(function () {
                var $this = $(this);
                $this.sparkline('html', $this.data());
            });
        });
    </script>
@endpush

@push('css')
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
@endpush