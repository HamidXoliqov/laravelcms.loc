@extends('layouts.backend')
@section('title')
    {{'Edit Setting'}}
@stop
@section('content')

    <!-- page content -->
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Edite Setting</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('settings.index')}}">Settings</a>
                    </li>                    
                    <li class="breadcrumb-item ">
                        <a href="{{route('settings.create')}}">Add</a>
                    </li>                    
                    <li class="breadcrumb-item active">
                        Edit
                    </li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-edit"></i>
                        Edit Settings
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {!! Form::open(['route' => ['settings.update',$setting->id],'method'=>'put']) !!}
                            {{ Form::hidden('user_id', $user_id) }}
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">
                                    Title
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    {{Form::text('title',$setting->title,['class'=>'form-control','placeholder' => 'Title'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">
                                    Name
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    {{Form::text('name',$setting->name,['class'=>'form-control','placeholder' => 'Name'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">
                                    Value
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    {{Form::text('value',$setting->value,['class'=>'form-control','placeholder' => 'Value'])}}
                                </div>
                            </div>
                            <div class="ln_solid"></div>

                            <div class="form-group row">
                                <div class="col-md-9 offset-md-3">
                                    <button type="submit" class="btn btn-success">
                                        Edit
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
