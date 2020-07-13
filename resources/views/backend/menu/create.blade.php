@extends('layouts.backend')
@section('title')
    {{'Create Menu'}}
@stop
@section('content')

    <!-- page content -->
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Create Menu</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{url('menu')}}">Menus</a> 
                    </li>                    
                    <li class="breadcrumb-item active">
                        Add
                    </li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-plus-square"></i>
                        Create Menu
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {!! Form::open(['route' => 'menu.store','files'=>'true']) !!}
                            <div class="row">
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                            Title
                                        </label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {{Form::text('title',null,['class'=>'form-control','placeholder' => 'Title'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                            Image
                                        </label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {{Form::file('image')}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                            Template
                                        </label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {{Form::select('template_id',$temp,null,['class'=>'form-control','placeholder' => 'Template'])}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                            Standard template
                                        </label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {{Form::select('module',$temp_str,null,['class'=>'form-control','placeholder' => 'Template'])}}
                                        </div>
                                    </div>
                                </div>
                            <div class="ln_solid"></div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <button type="submit" class="btn btn-primary btn-create">
                                    Save
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
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
