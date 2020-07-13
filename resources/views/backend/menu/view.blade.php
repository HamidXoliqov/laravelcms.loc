@extends('layouts.backend')
@section('title')
    {{'View '.$menu->title}}
@stop
@section('content')

    <!-- page content -->
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">View {{$menu->title}}</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('menu.index')}}">Menus</a>
                    </li>                    
                    <li class="breadcrumb-item ">
                        <a href="{{route('menu.create')}}">Add</a>
                    </li>                    
                    <li class="breadcrumb-item active">
                        View
                    </li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa fa-eye"></i>
                        View {{$menu->title}}
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
                                            <img src="{{$menu->getImage()}}" class="img-thumbnail img-width-view">
                                        </td>
                                    </tr>  
                                    <tr>
                                        <td>Title</td>
                                        <td>{{$menu->title}}</td>
                                    </tr>  
                                    <tr>
                                        <td>Template</td>
                                        <td>{{$temp_name}}</td>
                                    </tr>  
                                    <tr>
                                        <td>Metka</td>
                                        <td>{{$temp_slug}}</td>
                                    </tr> 
                                    <tr>
                                        <td>Standard metka</td>
                                        <td>{{($menu->module)?$menu->module:'q'}}</td>
                                    </tr> 
                                    <tr>
                                        <td>Role</td>
                                        <td>{{($menu->module)?'Standard':'No standard'}}</td>
                                    </tr>      
                                    <tr>
                                        <td>Parend</td>
                                        <td>
                                            {{$menu->parend_id}}
                                        </td>
                                    </tr>     
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            {{($menu->status!=0)?'On':'Off'}}
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


