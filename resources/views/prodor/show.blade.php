@extends('layouts.app')
@section('content')

@php
    $hembras=0;
    $hembrasbr=0;
    $huevinc=0;
    $huevincbr=0;
@endphp
<!-- Content -->
<div class="col-lg-12">
    <div class="widget-content searchable-container list">

        <div class="row">
            <div class="col-md-6 layout-spacing align-self-center">
                
                    <div class="">
                    <h3>Nacimiento # {{$prodor->id}} @if($prodor->status =='Incubadora')<span class="text-secondary"><small>Incubando desde  {{\Carbon\Carbon::parse($incubado)->diffForHumans()}}</small></span>@elseif($prodor->status =='Nacimiento') <span class="text-danger"> BB Nacidos</span>@endif</h3>
          
                    </div>
               
            </div>

            <div class="col-md-6  text-sm-right text-center layout-spacing align-self-center">
                <div class="d-flex justify-content-sm-end justify-content-center">
                    @if($prodor->status =='Nuevo')
                    <a href="javascript:;" data-toggle="modal" onclick="createData()" data-target="#CreateModal"class="btn btn-primary">+Lote</a> 
                    <a href="javascript:;" data-toggle="modal" onclick="incubateData({{$prodor->id}})" data-target="#IncubarModal"class="ml-1 btn btn-success">Incubar</a> 
                    @elseif($prodor->status =='Incubadora') 
                    <a href="javascript:;" data-toggle="modal" onclick="naceData({{$prodor->id}})" data-target="#naceModal"class="btn btn-success">Nacer</a> 
                    @endif
                 
                </div>
            </div>
        </div> 

        <div class="searchable-items list">
            <div class="items items-header-section">
                <div class="item-content">
                    <div class="col-md-4">
                       
                        <h4 style="margin-left: 0;">Lote</h4>
                    </div>
                    <div class="user-email col-md-3">
                        <h4 style="margin-left: 0;">Nacimiento</h4>
                    </div>
                    <div class="user-email col-md-3">
                        <h4 style="margin-left: 0;">Total</h4>
                    </div>
                    <div class="user-location col-md-2">
                        <h4 style="margin-left: 0;">% Nac.</h4>
                    </div>
                  
                    
                </div>
            </div>
            @foreach($prodordet as $row)
            @if($row->lote->product_id == 1)
            <div class="items">
                <div class="item-content text-warning">
                    
                    <div class="user-profile col-md-2"> 
                        @if($prodor->status =='Nacimiento')
                       <!-- <a href="javascript:;" data-toggle="modal" onclick="editData({{$row->id}})" data-target="#EditModal">                       -->
                        <a href=" {{ route('prodordet.edit', $row->id) }}">
                        
                            @endif
                        <div class="user-meta-info">
                            <p class="user-name"  data-name="{{  $row->lote_id }}" >{{$row->id }}- {{  $row->lote->name }}</p>
                            <p class="user-work"  data-occupation="" ><i class="fas fa-egg"></i> {{  $row->huevosinc }}</p>
                        </div></a>
                    </div>

                    <div class="user-meta-info col-md-1">
                        <p class="user-name" ><i class="fad fa-venus"></i> {{  $row->hembra }}</p>
                            <p class="user-work" ><i class="fad fa-mars"></i> {{  $row->macho }}</p>
                        </div>
                        <div class="user-meta-info col-md-1">
                            {{  $row->total }}
                            </div>
                    <div class="action-btn col-md-2">
                        <p class="user-name" > {{  $row->nacperc }}</p>
                       
                    </div>
                </div>
            </div>
            @php
       
            $hembras+=$row->hembra;  
            $huevinc+=$row->huevosinc  
            @endphp
              @elseif($row->lote->product_id == 2)
              <div class="items">
                  <div class="item-content text-warning">
                      
                      <div class="user-profile col-md-2"> 
                        @if($prodor->status =='Nacimiento')
                        <a href="javascript:;" data-toggle="modal" onclick="editData({{$row->id}})" data-target="#EditModal">                       
                        
                            @endif
                          <div class="user-meta-info">
                              <p class="user-name"  data-name="{{  $row->lote_id }}" >{{$row->id }}-{{  $row->lote->name }}</p>
                              <p class="user-work"  data-occupation="" ><i class="fas fa-egg"></i> {{  $row->huevosinc }}</p>
                          </div></a>
                      </div>
  
                      <div class="user-meta-info col-md-1">
                          <p class="user-name" ><i class="fad fa-venus"></i> {{  $row->hembra }}</p>
                              <p class="user-work" ><i class="fad fa-mars"></i> {{  $row->macho }}</p>
                          </div>
                          <div class="user-meta-info col-md-1">
                              {{  $row->total }}
                              </div>
                      <div class="action-btn col-md-2">
                        <p class="user-name" > {{  $row->nacperc }}</p>
                         
                      </div>
                  </div>
              </div>
              @php
            
              $hembrasbr+=$row->hembra;  
              $huevincbr+=$row->huevosinc  
              @endphp
            @endif
            @endforeach

        </div>
        <div class="row">
            <div class="col-md-5 col-sm-7 layout-spacing align-self-center">
                <h6>Total de Huevos Incubados</h6>
            
                <p>HL-W80 <span> {{$huevinc}}</span>  /  <span class="text-warning">HL-Brown {{$huevincbr}}</span></p>
                
            </div>

            <div class="col-md-5 col-sm-7 layout-spacing align-self-center">
                <h6>Total de Hembras Nacidas</h6>
            
                <p>HL-W80 <span> {{$hembras}}</span>  /  <span class="text-warning">HL-Brown {{$hembrasbr}}</span></p>
                
            </div>
        
        </div>
        
    
</div>
<!--  END CONTENT AREA  -->

<!-- Modal para agregar standares-->
<div id="CreateModal" class="modal fade  text-info" role="dialog">
    <div class="modal-dialog modal-lg ">
    <!-- Modal content-->
    
        <div class="modal-content">
            <div class="modal-header bg-low">
                <h4 class="modal-title  text-center">Agregar Lotes a Incubacion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            
                <div class="modal-body">
                    {{ csrf_field() }}
                    
                    {!! Form::open(['route' => ['prodordet.store'],'files'=>true]) !!}  
                        @include('prodor.forms.add-lote')
                    {!! Form::close() !!}
                </div>
            
        </div>
    
    </div>
</div>  


<!-- Modal para Incubar Huevos-->
<div id="IncubarModal" class="modal fade text-info" role="dialog">
    <div class="modal-dialog ">
    <!-- Modal content-->
    <form action="" id="incubateForm" method="post">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white text-center">Incubar Huevos</h4>
            </div>
            <div class="modal-body">
                {{ csrf_field() }}
                {{ method_field('GET') }}
                <p class="text-center">Estas seguro que queres Incubar estos huevos?</p>
                {{ Form::text('huevinc', $huevinc, [' hidden class' => 'form-control']) }}
                {{ Form::text('huevincbr', $huevincbr, ['hidden class' => 'form-control']) }}
            </div>
            <div class="modal-footer">
                <center>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formiSubmit()">Incubar</button>
                </center>
            </div>
        </div>
    </form>
    </div>
</div>  

<!-- Modal para Nacer Huevos-->
<div id="naceModal" class="modal fade text-info" role="dialog">
    <div class="modal-dialog ">
    <!-- Modal content-->
    <form action="" id="naceForm" method="post">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white text-center">Nacer pollitos</h4>
            </div>
            <div class="modal-body">
                {{ csrf_field() }}
                {{ method_field('GET') }}
                <p class="text-center">Estas seguro que queres <span class="text-info">Nacer</span> estos huevos?</p>
              
            </div>
            <div class="modal-footer">
                <center>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="" class="btn btn-primary" data-dismiss="modal" onclick="formNSubmit()">Nacer</button>
                </center>
            </div>
        </div>
    </form>
    </div>
</div>  





<script type="text/javascript">
    function createData(id)
    {
    var id = id;
    var url = '{{ route("prodordet.create", ":id") }}';
    url = url.replace(':id', id);
    $("#createForm").attr('action', url);
    }
    
    function formeSubmit()
    {
    $("#createForm").submit();
    }
</script>


<script type="text/javascript">
    function incubateData(id)
    {
        var id = id;
        var url = '{{ route("prodor.incubar", ":id") }}';
        url = url.replace(':id', id);
        $("#incubateForm").attr('action', url);
    }
    
    function formiSubmit()
    {
        $("#incubateForm").submit();
    }
</script>


<script type="text/javascript">
    function naceData(id)
    {
        var id = id;
        var url = '{{ route("prodor.nacer", ":id") }}';
        url = url.replace(':id', id);
        $("#naceForm").attr('action', url);
    }
    
    function formNSubmit()
    {
        $("#naceForm").submit();
    }
</script>
<!-- Modal para editar la muestra-->

<div id="EditModal" class="modal fade  text-info" role="dialog">
    <div class="modal-dialog modal-lg ">
    <!-- Modal content-->
    
        <div class="modal-content">
            <div class="modal-header bg-low">
                <h4 class="modal-title  text-center">Cargar Nacimiento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            
                <div class="modal-body">
                    {{ csrf_field() }}
                    {{ method_field('GET') }}

                    {!! Form::model($prodordet, ['route' => ['prodordet.update', $row->id], 'method' => 'PUT','files'=>true]) !!}
 

                        @include('prodor.forms.f-edit')

                    {!! Form::close() !!}
                   
                </div>
            
        </div>
    
    </div>
</div>  
<script type="text/javascript">
    function editData(id)
    {
    var id = id;
    var url = '{{ route("prodordet.edit", ":id") }}';
    url = url.replace(':id', id);
    $("#editForm").attr('action', url);
    }
    
    function formeSubmit()
    {
    $("#editForm").submit();
    }
    </script>

@endsection


    
