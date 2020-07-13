@extends('layouts.backend')
@section('title')
    {{'Create language'}}
@stop
@section('content')

    <!-- page content -->
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Create Language</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{url('lang')}}">Languages</a> 
                    </li>                    
                    <li class="breadcrumb-item active">
                        Add
                    </li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-plus-square"></i>
                        Create Language
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {!! Form::open(['route' => 'lang.store','files'=>'true']) !!}
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">
                                    Url
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    {{Form::text('url',null,['class'=>'form-control','placeholder' => 'Url'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">
                                    Name Des
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    {{Form::text('name_des',null,['class'=>'form-control','placeholder' => 'Name Des'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Name Mob</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    {{Form::text('name_mob',null,['class'=>'form-control','placeholder' => 'Name Mob'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Default language</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    {{Form::select('default', $default, null, ['placeholder' => 'Default','class'=>'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">Image</label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    {{Form::file('image')}}
                            </div>
                            <div class="ln_solid"></div>

                            <div class="form-group row">
                                <div class="col-md-9 offset-md-3">
                                    <button type="submit" class="btn btn-success">
                                        Create
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
