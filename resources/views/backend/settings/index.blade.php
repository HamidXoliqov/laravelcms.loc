<?
use App\User;
?>
@extends('layouts.backend')
@section('title')
    {{'Settings'}}
@stop
@section('content')

    <!-- page content -->
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Settings</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Settings
                    </li>                    
                    <li class="breadcrumb-item ">
                        <a href="{{route('settings.create')}}">Add</a>
                    </li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>DataTable Settings
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="10px">№</th>
                                        <th>Title</th>
                                        <th>Name</th>
                                        <th>Value</th>
                                        <th width="250px">User</th>
                                        <th width="20%">Actions</th>
                                    </tr>
                                </thead>
                                @if (count($settings)>0)
                                <tbody>
                                    @php $i=1 @endphp
                                    @foreach($settings as $value)
                                        <tr>
                                            <td>@php echo $i++ @endphp</td>
                                            <td>{{$value->title}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->value}}</td>
                                            <td>{{User::name($value->user_id)}}</td>
                                            <td>                                          
                                                <a  class="btn btn-info" href="{{route('settings.show',$value->id)}}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a  class="btn btn-warning" href="{{route('settings.edit',$value->id)}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <div style="display: inline-table;">    
                                                    {!! Form::open(['route' => ['settings.destroy',$value->id],'method'=>'DELETE']) !!}
                                                    <button type="submit"  class="btn btn-danger">
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    </button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach                                    
                                </tbody>
                                @else
                                <div class="page-not">
                                    <p align="center">                         
                                        Bu bo'limda hali ma'lumot saqlanmagan !!!
                                    </p>
                                </div>
                                @endif
                            </table>
                        </div>
                    </div>
                    <div class="pagination-admin">                        
                        {{$settings->links()}}
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2019</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- /page content -->

@endsection


