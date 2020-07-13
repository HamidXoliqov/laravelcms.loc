@extends('layouts.backend')

@section('content')

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Бренды</strong>
                </div>
                <div class="card-body">
                    <a href="{{route('brand.create')}}" class="btn btn-success mb-3 float-right">
                        <i class="fa fa-plus"></i> Добавить
                    </a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Наименования бренда</th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach($brands as $brand)
                            <tr>
                                <th scope="row">{{$brand->id}}</th>
                                <td>{{$brand->name}}</td>

                                <td class="text-center">
                                    <a href="{{route('brand.edit', $brand->id)}}" class="btn btn-primary">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    {!! Form::open(['route' => ['brand.destroy',$brand->id], 'method' => 'delete','class' => ' d-inline-block']) !!}
                                    <button class="btn btn-danger js-delete-btn" onclick="return confirm('Вы уверены?')">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                    @endforeach
                            <tr>
                                <td colspan="5" class="text-center">

                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <nav>
                        {{ $brands->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div><!-- .content -->

@endsection


