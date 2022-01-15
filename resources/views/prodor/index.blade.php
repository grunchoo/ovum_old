@extends('layouts.app')
@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="col-lg-12">
    <div class="widget-content searchable-container list">

        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5 col-sm-7 filtered-list-search layout-spacing align-self-center">
                <form class="form-inline my-2 my-lg-0">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        <input type="text" class="form-control product-search" id="input-search" placeholder="Buscar...">
                    </div>
                </form>
            </div>

            <div class="col-xl-8 col-lg-7 col-md-7 col-sm-5 text-sm-right text-center layout-spacing align-self-center">
                <div class="d-flex justify-content-sm-end justify-content-center">
                    <a href="javascript:;" data-toggle="modal" onclick="createData()" data-target="#CreateModal" class="btn btn-primary ">Alta Nacimiento</a>
                
                
                </div>
            </div>
        </div> 

        <div class="searchable-items list">
            <div class="items items-header-section">
                <div class="item-content">
                    <div class="col-md-4">
                       
                        <h4 style="margin-left: 0;">Nacimiento</h4>
                    </div>
                    <div class="user-email col-md-3">
                        <h4 style="margin-left: 0;">Huevo Incub.</h4>
                    </div>
                    <div class="user-email col-md-3">
                        <h4 style="margin-left: 0;">Pedido</h4>
                    </div>
                    <div class="user-location col-md-2">
                        <h4 style="margin-left: 0;">Status</h4>
                    </div>
                  
                    
                </div>
            </div>
            @foreach($orders as $row)
            <div class="items">
                <div class="item-content">
                    
                        <div class="user-profile col-md-4"> 
                            <a href=" {{ route('prodor.show', $row->id) }}">
                            <div class="user-meta-info">
                                <p class="user-name"  data-name="{{  $row->lote_id }}" ># {{  $row->id }}</p>
                                <p class="user-work"  data-occupation="" > Fecha Nacimiento: {{ Carbon\Carbon::parse($row->dateofend)->format('d/m/Y') }}</p>
                            </div></a>
                        </div>
                    

                    
                    <div class="user-meta-info col-md-3">
                        <p class="user-name" >W-80:  {{  $row->total_hi_blanco }}</p>
                            <p class="user-work" >Brown:  {{  $row->total_hi_color }}</p>
                        </div>
                        <div class="user-meta-info col-md-3">
                            <p class="user-name" >W-80: 150.000</p>
                                <p class="user-work" >Brown: 160.000</p>
                            </div>
                        <div class="user-meta-info col-md-2">
                            @if ($row->status =='Nuevo') 
                            <p class="badge outline-badge-primary" >Nuevo</p>
                            @elseif ($row->status =='Incubadora') 
                            <p class="badge outline-badge-warning" >Incubadora</p>
                            @elseif ($row->status =='Nacimiento') 
                            <p class="badge outline-badge-success" >Nacimiento</p>
                            @elseif ($row->status =='Cerrado') 
                            <p class="badge outline-badge-danger" >Cerrado</p>
                            @endif
                               
                            </div>
                    
                </div>
            </div>
            
            @endforeach
          
            
            
        </div>
    
</div>
<a href="#" class="cd-top text-replace js-cd-top">Top</a>


 <!-- Modal para agregar standares-->
 <div id="CreateModal" class="modal fade  text-info" role="dialog">
    <div class="modal-dialog modal-lg ">
    <!-- Modal content-->
    
        <div class="modal-content">
            <div class="modal-header bg-low">
                <h4 class="modal-title  text-center">Alta de Nacimiento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            
                <div class="modal-body">
                    {{ csrf_field() }}
                    
                    {!! Form::open(['route' => ['prodor.store'],'files'=>true]) !!}  
                        @include('prodor.forms.f-create')
                    {!! Form::close() !!}
                </div>
            
        </div>
    
    </div>
</div>  




<script type="text/javascript">
    function createData(id)
    {
    var id = id;
    var url = '{{ route("prodor.create", ":id") }}';
    url = url.replace(':id', id);
    $("#createForm").attr('action', url);
    }
    
    function formeSubmit()
    {
    $("#createForm").submit();
    }
</script>







@endsection