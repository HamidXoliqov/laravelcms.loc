@extends('layouts.backend')
@section('title')
    {{'Languages'}}
@stop
@section('content')

    <!-- page content -->
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Languages</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Languages
                    </li>                    
                    <li class="breadcrumb-item ">
                        <a href="{{route('lang.create')}}">Add</a>
                    </li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>DataTable Languages
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="10px">№</th>
                                        <th width="100px">Image</th>
                                        <th>Name Des</th>
                                        <th>Name Mob</th>
                                        <th>Url</th>
                                        <th width="10%">Role</th>
                                        <th width="20%">Actions</th>
                                    </tr>
                                </thead>
                                @if (count($lang)>0)
                                <tbody>
                                    @php $i=1 @endphp
                                    @foreach($lang as $value)
                                        <tr>
                                            <td>@php echo $i++ @endphp</td>
                                            <td>
                                                <img src="{{$value->getImage()}}"  class="img-thumbnail">
                                            </td>
                                            <td>{{$value->name_des}}</td>
                                            <td>{{$value->name_mob}}</td>
                                            <td>{{$value->url}}</td>
                                            <td>
                                                <div class="toggle btn btn-primary ios {{($value->default)?'':'off'}}" data-toggle="toggle" role="button" style="width: 61.0547px; height: 37.7344px;">
                                                    <input class="status" type="checkbox" checked="" data-toggle="toggle" data-style="ios" data-id="{{$value->id}}" data-action="lang/status/{{$value->id}}">
                                                    <div class="toggle-group">
                                                        <label for="" class="btn btn-primary toggle-on">On</label>
                                                        <label for="" class="btn btn-light toggle-off">Off</label>
                                                        <span class="toggle-handle btn btn-light"></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>                                                
                                                <a  class="btn btn-info" href="{{route('lang.show',$value->id)}}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a  class="btn btn-warning" href="{{route('lang.edit',$value->id)}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <div style="display: inline-table;">    
                                                    {!! Form::open(['route' => ['lang.destroy',$value->id],'method'=>'DELETE']) !!}
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
                                            Bu bo'limda hali ma'lumot saqlanmagan
                                        </p>
                                    </div>
                                    @endif
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

@push('scripts')
<script>
    $('.toggle').click(function(){
        var id = $(this).children().first().data('id');
        var action = $(this).children().first().data('action');        
        $(this).toggleClass("off");
          $.ajax({
            url: action,
            type: 'GET',
            data: {id : id},
            dataType: 'json',
            success: function( data ) {
                if(data=='success')
                {
                    location.reload();
                }
            }       
        })         
    });
</script>
@endpush
