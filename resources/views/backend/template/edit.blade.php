@extends('layouts.backend')
@section('title')
    {{'Edit template'}}
@stop
@section('content')

    <!-- page content -->
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Edite Template</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('temp.index')}}">Templates</a>
                    </li>                    
                    <li class="breadcrumb-item ">
                        <a href="{{route('temp.create')}}">Add</a>
                    </li>                    
                    <li class="breadcrumb-item active">
                        Edit
                    </li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-edit"></i>
                        Edit Template
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {!! Form::open(['route' => ['temp.update',$temp->id],'method'=>'put']) !!}
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">
                                    Title
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    {{Form::text('title',$temp->title,['class'=>'form-control','placeholder' => 'Title'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">
                                    Metka
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    {{Form::text('slug',$temp->slug,['class'=>'form-control','placeholder' => 'Slug'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">
                                    Satandard
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    {{Form::checkbox('role', '1', false,['class' => 'str-chek'])}}
                                </div>
                            </div>

                            <div class="form-group row" id="str">
                                <label class="control-label col-md-3 col-sm-3 col-xs-3">
                                    Metka standard
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    {{Form::text('module',$temp->module,['class'=>'form-control','placeholder' => 'Standars slug'])}}
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

@push('scripts')
<script>
    $("#str").hide();
    $(".str-chek").click(function(){
        if(this.checked) {
                $("#str").show();
            }         
            else         
            {
                $("#str").hide();
            }
    });
</script>
@endpush