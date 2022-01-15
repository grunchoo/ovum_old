@extends('layouts.admin')
@push('styles')
<link href={{ asset('plugins/table/datatable/dt-global_style.css') }} rel="stylesheet" type="text/css" />
<link href={{ asset('plugins/table/datatable/datatables.css') }} rel="stylesheet" type="text/css" />
<link href={{ asset('plugins/table/datatable/custom_dt_html5.css') }} rel="stylesheet" type="text/css" />
<link href={{ asset('assets/css/elements/avatar.css') }} rel="stylesheet" type="text/css" />
@endpush
@section('content')


<div class="row layout-top-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="media" >
            <div class="w-img pr-2">
                <h2><i class="fad fa-cog"></i></h2>
            </div>
            <div class="media-body">
                <h6 class="font-weight-bold mb-0" style="color: #1B2E4B ">Configuración | Usuarios</h6>
                <p class="mb-1" style="font-size: 10pt; font-style: italic; color:#005879"> Scapeflow</p>
            </div>
            <div> 
                @can('users.create')
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm "><i class="fa fa-plus"></i> Nuevo </a>
                @endcan
            </div>
        </div>
        <div class="widget-content widget-content-area  ">
            <div class="table-responsive ">
                <table id="default-ordering" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Empresa</th>
                            <th>Ult. Login</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $row)
                        <tr style="border-bottom: 1px; ">
                            <td >
                                <img class="avatar avatar-sm rounded-circle" alt="avatar" src="storage/.{{ $row->profile_image }}"  />
                            </td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->empresa }}</td>
                            <td>{{ $row->last_login_at }}</td>
                            <td>{{ $row->category_id }}</td>
                           
                            <td class="btn-group"  >
                                @can('users.show')
                                    <a href=" {{ route('users.show', $row->id) }}" class="btn btn-primary btn-sm"><i class="fad fa-eye"></i></a>
                                @endcan
                            
                                <!-- si tiene permisos para cerrar puede seguir con la edicion del registro -->    
                                
                                @can('users.edit')
                                    <a href=" {{ route('users.edit', $row->id) }}" class="btn btn-success btn-sm"><i class="fad fa-pencil"></i></a>
                                @endcan
                                                                
                                @can('users.destroy')
                                <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$row->id}})" 
                                        data-target="#DeleteModal" class="btn btn-sm btn-danger"><i class="fad fa-trash-alt"></i></a>
                                @endcan
                                    
                            </td>
                                                                     
                               
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>

</div>

</div>
<div id="DeleteModal" class="modal fade text-danger" role="dialog">
    <div class="modal-dialog ">
    <!-- Modal content-->
    <form action="" id="deleteForm" method="post">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title text-white text-center">ELIMINAR REGISTRO</h4>
            </div>
            <div class="modal-body">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <p class="text-center">Estas seguro que queres Eliminar el registro?</p>
            </div>
            <div class="modal-footer">
                <center>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Eliminar</button>
                </center>
            </div>
        </div>
    </form>
    </div>
</div>  



<script type="text/javascript">
function deleteData(id)
{
    var id = id;
    var url = '{{ route("users.destroy", ":id") }}';
    url = url.replace(':id', id);
    $("#deleteForm").attr('action', url);
}

function formSubmit()
{
    $("#deleteForm").submit();
}
</script>

@push('scripts')
<script src="{{ asset('plugins/table/datatable/datatables.js')}}"></script>

<script>        
    $('#default-ordering').DataTable( {
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Viendo pagina _PAGE_ de _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Buscar...",
           "sLengthMenu": "Ver :  _MENU_",
        },
        "order": [[ 0, "desc" ]],
        "stripeClasses": [],
        "lengthMenu": [ 10, 15, 20, 50],
        "pageLength": 15,
        drawCallback: function () { $('.dataTables_paginate > .pagination').addClass(' pagination-style-13 pagination-bordered mb-5'); }
    } );
</script>
@endpush

@endsection

