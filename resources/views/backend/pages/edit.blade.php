@extends('layouts.backend')
@section('title')
    {{'Edit '.$pages->title}}
@stop
@section('content')

    <!-- page content -->
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Edit {{$pages->title}}</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{url('pages')}}">Pages</a> 
                    </li>                     
                    <li class="breadcrumb-item ">
                        <a href="{{route('pages.create')}}">Add</a>
                    </li>                    
                    <li class="breadcrumb-item active">
                        Edit
                    </li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-edit"></i>
                            Edit {{$pages->title}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {!! Form::open(['route' => ['pages.update',$pages->id],'method'=>'put','files'=>'true']) !!}
                            <div class="row">
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                            Menu
                                        </label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {{Form::select('menu_id',$menus,$menu->id,['class'=>'form-control','placeholder' => $menu->title])}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                            Title
                                        </label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {{Form::text('title',$pages->title,['class'=>'form-control','placeholder' => 'Title'])}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                            Short
                                        </label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {{Form::text('short',$pages->short,['class'=>'form-control','placeholder' => 'Short'])}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                            Text
                                        </label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {{Form::textarea('text',$pages->text,['class'=>'form-control','placeholder' => 'Text'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                            Image
                                        </label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                        <img src="{{$pages->getImage()}}" class="img-thumbnail img-width-edit">
                                            {{Form::file('image')}}
                                        </div>
                                    </div>
                                    <div style="display: none;">
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <label>
                                                    {{Form::checkbox('telegram', '0', false)}}
                                                    Telegram
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <label>
                                                    {{Form::checkbox('facebook', '0', false)}}
                                                    Facebook
                                                </label>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
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
