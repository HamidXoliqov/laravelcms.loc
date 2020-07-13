@extends('layouts.backend')
@section('title')
    {{'View language'}}
@stop
@section('content')

    <!-- page content -->
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">View Language</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('lang.index')}}">Languages</a>
                    </li>                    
                    <li class="breadcrumb-item ">
                        <a href="{{route('lang.create')}}">Add</a>
                    </li>                    
                    <li class="breadcrumb-item active">
                        View
                    </li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa fa-eye"></i>
                        View Language
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="10px">Name</th>
                                        <th width="100px">Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Image</td>
                                        <td>
                                            <img src="{{$lang->getImage()}}" style="width: 80px;">
                                        </td>
                                    </tr>  
                                    <tr>
                                        <td>Name Des</td>
                                        <td>{{$lang->name_des}}</td>
                                    </tr>  
                                    <tr>
                                        <td>Name Mob</td>
                                        <td>{{$lang->name_mob}}</td>
                                    </tr>  
                                    <tr>
                                        <td>Url</td>
                                        <td>{{$lang->url}}</td>
                                    </tr>      
                                    <tr>
                                        <td>Role</td>
                                        <td>
                                            {{($lang->default!=0)?'On':'Off'}}
                                        </td>
                                    </tr>                                   
                                </tbody>
                            </table>
                        </div>
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


