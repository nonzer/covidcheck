@extends('layouts.app', ['user' => 'active'])

@section('title', 'Utilisateurs')

@section("container")
    @include('layouts.partial._header')
    @include('layouts.partial._left-side')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    @include('layouts.partial._content-header', ['title' => 'Utilisateurs', 'icon' => 'fa-globe'])

    <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-8">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Nouveau utilisateur</a></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body  table-responsive no-padding">
                            <table class="table table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>Avatar</th>
                                    <th>Identifiant</th>
                                    <th>Email</th>
                                    <th>Numéro téléphone</th>
                                    <th>Rôle</th>
                                    <th>Statut</th>
                                </tr>
                                @forelse($users as $user)
                                    <tr>
                                        <td>
                                            <span><a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-flat"><i class="fa fa-edit"></i></a></span>
                                            <span>
                                                <form action="{{ route('user.destroy', $user->id) }}" method="post" style="display: inline-block">
                                                    @method('DELETE')
                                                    @csrf
                                                    @if($user->status == 1)
                                                        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-toggle-on"></i></button>
                                                    @else
                                                        <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-toggle-off"></i></button>
                                                    @endif
                                                </form>
                                            </span>
                                        </td>
                                        <td><img src="{{ asset('dist/img/other/user2-160x160.jpg') }}" width="75px" class="img-circle" alt=""></td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->tel }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            @if($user->status == 1)
                                                <span class="text-green"><i class="fa fa-unlock"></i> actif</span>
                                            @else
                                                <span class="text-red"><i class="fa fa-unlock-alt"></i> inactif</span>
                                            @endif
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
