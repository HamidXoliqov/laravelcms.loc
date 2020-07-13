@extends('layouts.backend')

@section('content')

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">  Изменить бренд</strong>
                    @include('backend.error')
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => ['brand.update',$brand->id], 'method' => 'put']) !!}
                    <div class="tab-content pt-3" id="myTabContent">
                        <div class="form-group">
                            <label for="files">Наименование  бренд  </label><br/>
                            <input class="form-control" type="text" name="name" value="{{$brand->name}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Изменить</button>
                    <a href="{{route('brand.index')}}" class="btn btn-outline-primary">
                        <i class="fa fa-arrow-left"></i> Назад
                    </a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div><!-- .content -->
@endsection
