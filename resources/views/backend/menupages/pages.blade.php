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
                        <a href="{{url('menu')}}">Menu</a>                        
                    </li>
                    <li class="breadcrumb-item active">
                        Pages
                    </li>                    
                    <li class="breadcrumb-item ">
                        <a href="{{route('pages.create_pages')}}">Add pages</a>
                    </li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>DataTable Menu
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
                                                <a href="{!!route('men',['id'=>$value->id])!!}">
                                                {{$value->title}}
                                                </a>
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
                                                <input type="checkbox" checked data-toggle="toggle" data-style="ios" value="{{$value->default}}">
                                            </td>
                                            <td>                                      
                                                <a  class="btn btn-info" href="{{route('menu.show',$value->id)}}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a  class="btn btn-warning" href="{{route('menu.edit',$value->id)}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <div style="display: inline-table;">    
                                                    {!! Form::open(['route' => ['menu.destroy',$value->id],'method'=>'DELETE']) !!}
                                                    <button type="submit"  class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
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


