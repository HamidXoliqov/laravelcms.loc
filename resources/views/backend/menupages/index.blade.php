@extends('layouts.backend')
@section('title')
    {{$menu->title.' / Pages'}}
@stop
@section('content')

    <!-- page content -->
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">
                    {{$menu->title}}
                </h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{url('menu')}}">Menus</a>                        
                    </li>
                    <li class="breadcrumb-item active">
                        {{$menu->title}}
                    </li>                    
                    <li class="breadcrumb-item ">
                        <a href="{{route('menpage.create',['id'=>$menu->id])}}">Add</a>
                    </li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>DataTable {{$menu->title}} pages
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="10px">№</th>
                                        <th width="100px">Image</th>
                                        <th>Title</th>
                                        <th width="30%">Translate</th>
                                        <th width="10%">Status</th>
                                        <th width="20%">Actions</th>
                                    </tr>
                                </thead>
                                @if (count($pages)>0)
                                <tbody>
                                    @php $i=1 @endphp
                                    @foreach($pages as $value)
                                        <tr>
                                            <td>@php echo $i++ @endphp</td>
                                            <td>
                                                <img src="{{$value->getImage()}}" style="width: 50%">
                                            </td>
                                            <td>
                                                {{$value->title}}
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-id="{{$value->id}}">
                                                    uz
                                                </button>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-id="{{$value->id}}">
                                                    ru
                                                </button>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-id="{{$value->id}}">
                                                    eng
                                                </button>
                                               <!--  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-id="{{$value->id}}">
                                                    eng
                                                </button> -->
                                                <div style="display: inline-flex;justify-content: flex-end;">     
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-id="{{$value->id}}" >
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="toggle btn btn-primary ios {{($value->status)?'':'off'}}" data-toggle="toggle" role="button" style="width: 61.0547px; height: 37.7344px;">
                                                    <input class="status" type="checkbox" checked="" data-toggle="toggle" data-style="ios" data-id="{{$value->id}}" data-action="/pages/status/{{$value->id}}">
                                                    <div class="toggle-group">
                                                        <label for="" class="btn btn-primary toggle-on">On</label>
                                                        <label for="" class="btn btn-light toggle-off">Off</label>
                                                        <span class="toggle-handle btn btn-light"></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> 
                                                <button class="btn btn-secondary up" data-value="{{$value->id}}" data-action="/pages/up/{{$value->id}}">
                                                    <i class="fa fa-arrow-up"></i>
                                                </button>                                     
                                                <button class="btn btn-success down" data-value="{{$value->id}}" data-action="/pages/down/{{$value->id}}">
                                                    <i class="fa fa-arrow-down"></i>
                                                </button>                                    
                                                <a  class="btn btn-info" href="{{route('menpage.show',$value->id)}}">
                                                    <i class="fa fa-eye"></i>
                                                </a>   
                                                <a  class="btn btn-warning" href="{{route('menpage.edit',$value->id)}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <div style="display: inline-table;">    
                                                    {!! Form::open(['route' => ['menpage.destroy',$value->id],'method'=>'DELETE']) !!}
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
                    <div class="pagination-admin">                        
                        {{$pages->links()}}
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

         <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new translation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <form >
                  <div class="modal-body">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Language:</label>
                        <input type="text" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Translate:</label>
                        <input type="text" class="form-control">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                  </div>
                </form>              
            </div>
          </div>
        </div>
@endsection

@push('scripts')
<script>
    $( ".up" ).click(function() {
        var id = $(this).data().value;
        var action = $(this).data('action');
        var csrf = $('meta[name="csrf-token"]').attr('content');        
      
      $.ajax({
        url: action,
        type: 'GET',
        data: {id : id,'_token': csrf},
        dataType: 'json',

        success: function( data ) {
            if(data=='success')
            {
                location.reload();
            }
        }       
    })
    });
    
    $( ".down" ).click(function() {
        var id = $(this).data().value;
        var action = $(this).data('action');
        var csrf = $('meta[name="csrf-token"]').attr('content');        
      
      $.ajax({
        url: action,
        type: 'GET',
        data: {id : id,'_token': csrf},
        dataType: 'json',

        success: function( data ) {
            if(data=='success')
            {
                location.reload();
            }
        }       
    })
    });

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
