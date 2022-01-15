@extends('layouts.app')
@section('content')
@if((new \Jenssegers\Agent\Agent())->isPhone())
@if ($order->status =='Nuevo') 
    <div class="btn btn-success rounded-circle" style="position: absolute; bottom: 15px; right: 15px; ">
    <a href="{{ route('orders.edit', $order->id) }}" ><i class="fa fa-pen"></i> </a>  
    </div>
 @endif
<div class="container">
  <div class="d-flex justify-content-between">
    <div >
      <h4><em><strong style="color: #506690">Orden # </strong></em> {{$order->id}}</h4>
    </div>
    <div>
      @if ($order->aprovacion =='Pendiente') 
      <span class="text-warning"><i class="fad fa-exclamation-circle"></i> Pendiente </span>
      @elseif ($order->aprovacion =='Rechazado') 
      <span class="text-danger bs-tooltip" title="{{$order ->motrechazo}}">Rechazado </span>
      @elseif ($order->aprovacion =='Aprovado') 
      <span class="badge badge-pill outline-badge-success"><i class="fad fa-check"></i> </span>
              @if($order->production_order_id ==null)
                  <span class="badge badge-pill badge-danger"><i class="fad fa-comment-alt-slash"></i> S/N</span>
              @else()
                  <span class="badge badge-pill badge-primary">{{ $order->production_order_id }}</span>
              @endif
      @endif
      
    </div>
  </div>

  <div class="card">
    <div class="card-body">
    
      <div class="d-flex" style="margin-left: -15px; margin-right:-15px ">
        <div class="avatar avatar-sm mr-3" style="width: 40px">
          <img alt="avatar" src={{ url('/assets/img/account.png') }} class="rounded-circle" />
        </div>
        <div class="mt-auto">
          <h6>{{$order->customer->name}}</h6>
        </div>
      </div>
      <!-- datos -->
      <hr class="mt-1 mb-2">
      <div class="d-flex justify-content-between">
        <h5 class="mb-4">Detalle:</h5>
        <div><i class="fad fa-calendar-alt"></i> {{ Carbon\Carbon::parse($order->fecha_entrega)->format('d/m/Y')}}</div>
      </div>
      
      <div class="mt-1 mb-1 rounded" style="margin-left: -15px; margin-right:-15px; background: rgb(63,61,86); background: linear-gradient(180deg, rgba(63,61,86,0.5970763305322129) 0%, rgba(62,56,129,0.5998774509803921) 100%);">  
        <div class="pt-3 pb-2 d-flex justify-content-between bg-secondary-light rounded"  >
            <!--  elige la foto del producto  -->
            @if($order->product_id == 1)
              <div class="avatar avatar-sm" style="width: 60px">
                <img alt="avatar" src={{ url('/assets/img/hl80.png') }} class="rounded" />
              </div>
            @elseif($order->product_id == 2)
            <div class="avatar avatar-sm" style="width: 60px">
              <img alt="avatar" src={{ url('/assets/img/hlbr.png') }} class="rounded" />
            </div>
            @endif
            <!--  muestra producto y cantidad  -->
          <div >
            <div class="mt-1">
              <h6>
                {{$order->product->name}}
              </h6>
            </div>
            <div class=" rounded text-center" style="background: #009688">
              <h5 class="p-1">{{$order->cantidad}} </h5>
            </div>
          </div>
          <!-- aca debe mostrar el precio cerrado-->
          <div class=" mt-1 mr-3">
            <div><h6>Precio</h6></div>
            <div><h6 class="p-1">$@if($order->precio ==null)  -- @else(){{$order->precio}}@endif</h6></div>
          </div>  
        </div>

      </div>
      <!-- tete-->
    @if($order->observaciones==null)
    @else

      <h5 class="mt-2 mb-2" style="color: #607d8b">Observaciones</h5>
        <div class="mt-1 mb-1 rounded" style="margin-left: -5px; margin-right:-5px; background: 
        #515365; color:#d3d3d3">  
          <div class="p-2">
          <p style="font-size: 16px"> {{$order->observaciones}}</p>
          </div>
        </div>
      </div>
      @endif
    <div class="d-flex justify-content-between mb-0">
      <div>
        <span class="text-info">Vendedor:</span>  {{$order->creado_por}}
      </div>
      <div><span class="text-info">Fecha Pedido:</span> {{ Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</div> 
    </div>
  </div>

  <!-- LAS VACUNAS -->

  <div class="card">
    <div class="card-body " >
      <div class="d-flex justify-content-between">
        <h5>VACUNAS</h5>
        @if ($order->status =='Nuevo') 
          <div class="float-right">
            <a href="javascript:;" data-toggle="modal" onclick="createData()" data-target="#CreateModal" class="  badge badge-pill badge-secondary  ">+ Vacuna</a>
          </div>
        @endif
      </div>
    
      <div>
      </div>
     
    <ul class="list-group list-group-flush">
      @forelse ($detail as $item)
          <li><i class="fad fa-angle-right"></i> {{$item->productAdditional->name}} @if($item->observaciones == null) <a href=" href="javascript:;" data-toggle="modal" onclick="eliminarVacuna()" data-target="#delVacModal" class="  badge badge-info  "" class="text-danger"><i class="far fa-trash-alt"></i></a></li>@else()- {{$item->observaciones}} <a href="#" class="badge badge-danger"> <i class="far fa-trash-alt"></i></a></li>@endif
        @empty
        No Hay Vacunas Cargadas
      @endforelse

    </ul>
    
  </div>
  </div>


</div>



<!--version pantallas grandes -->

@else()
@if ($order->status =='Nuevo') 
<div class="btn btn-success rounded-circle" style="position: absolute; bottom: 15px; right: 15px; ">
<a href="{{ route('orders.edit', $order->id) }}" ><i class="fa fa-pen"></i> </a>  
</div>
@endif
<div class="d-flex justify-content-between">
  <div class="container">
    <div class="d-flex justify-content-between">
      <div >
        <h4><em><strong style="color: #506690">Orden # </strong></em> {{$order->id}}</h4>
      </div>
      <div>
        @if ($order->aprovacion =='Pendiente') 
        <span class="text-warning"><i class="fad fa-exclamation-circle"></i> Pendiente </span>
        @elseif ($order->aprovacion =='Rechazado') 
        <span class="text-danger bs-tooltip" title="{{$order ->motrechazo}}">Rechazado </span>
        @elseif ($order->aprovacion =='Aprovado') 
        <span class="badge badge-pill outline-badge-success"><i class="fad fa-check"></i> </span>
                @if($order->production_order_id ==null)
                    <span class="badge badge-pill badge-danger"><i class="fad fa-comment-alt-slash"></i> S/N</span>
                @else()
                    <span class="badge badge-pill badge-primary">{{ $order->production_order_id }}</span>
                @endif
        @endif
        
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <div class="d-flex" style="margin-left: -15px; margin-right:-15px ">
          <div class="avatar avatar-sm mr-3" style="width: 40px">
            <img alt="avatar" src={{ url('/assets/img/account.png') }} class="rounded-circle" />
          </div>
          <div class="mt-auto">
            <h6>{{$order->customer->name}}</h6>
          </div>
        </div>
        <!-- datos -->
        <hr class="mt-1 mb-2">
        <div class="d-flex justify-content-between">
          <h5 class="mb-4">Detalle:</h5>
          <div><i class="fad fa-calendar-alt"></i> {{ Carbon\Carbon::parse($order->fecha_entrega)->format('d/m/Y')}}</div>
        </div>
        
        <div class="mt-1 mb-1 rounded" style="margin-left: -15px; margin-right:-15px; background: rgb(63,61,86); background: linear-gradient(180deg, rgba(63,61,86,0.5970763305322129) 0%, rgba(62,56,129,0.5998774509803921) 100%);">  
          <div class="pt-3 pb-2 d-flex justify-content-between bg-secondary-light rounded"  >
              <!--  elige la foto del producto  -->
              @if($order->product_id == 1)
                <div class="avatar avatar-sm" style="width: 60px">
                  <img alt="avatar" src={{ url('/assets/img/hl80.png') }} class="rounded" />
                </div>
              @elseif($order->product_id == 2)
              <div class="avatar avatar-sm" style="width: 60px">
                <img alt="avatar" src={{ url('/assets/img/hlbr.png') }} class="rounded" />
              </div>
              @endif
              <!--  muestra producto y cantidad  -->
            <div >
              <div class="mt-1">
                <h6>
                  {{$order->product->name}}
                </h6>
              </div>
              <div class=" rounded text-center" style="background: #009688">
                <h5 class="p-1">{{$order->cantidad}} </h5>
              </div>
            </div>
            <!-- aca debe mostrar el precio cerrado-->
            <div class=" mt-1 mr-3">
              <div><h6>Precio</h6></div>
              <div><h6 class="p-1">$@if($order->precio ==null)  -- @else(){{$order->precio}}@endif</h6></div>
            </div>  
          </div>

        </div>
        <!-- tete-->
        @if($order->observaciones==null)
        @else

        <h5 class="mt-2 mb-2" style="color: #607d8b">Observaciones</h5>
          <div class="mt-1 mb-1 rounded" style="margin-left: -5px; margin-right:-5px; background: 
          #515365; color:#d3d3d3">  
            <div class="p-2">
            <p style="font-size: 16px"> {{$order->observaciones}}</p>
            </div>
          </div>
        </div>
        @endif
        <div class="d-flex justify-content-between mb-0">
          <div>
            <span class="text-info">Vendedor:</span>  {{$order->creado_por}}
          </div>
          <div><span class="text-info">Fecha Pedido:</span> {{ Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</div> 
        </div>
      </div>

        <!-- LAS VACUNAS -->

      <div class="card">
        <div class="card-body " >
          <div class="d-flex justify-content-between">
            <h5>VACUNAS</h5>
            @if ($order->status =='Nuevo') 
              <div class="float-right">
                <a href="javascript:;" data-toggle="modal" onclick="createData()" data-target="#CreateModal" class="  badge badge-pill badge-secondary  ">+ Vacuna</a>
              </div>
            @endif
          </div>
          <ul class="list-group list-group-flush">
            @forelse ($detail as $item)
                <li><i class="fad fa-angle-right"></i> {{$item->productAdditional->name}} @if($item->observaciones == null) <a href=" href="javascript:;" data-toggle="modal" onclick="eliminarVacuna()" data-target="#delVacModal" class="  badge badge-info  "" class="text-danger"><i class="far fa-trash-alt"></i></a></li>@else()- {{$item->observaciones}} <a href="#" class="badge badge-danger"> <i class="far fa-trash-alt"></i></a></li>@endif
              @empty
              No Hay Vacunas Cargadas
            @endforelse
          </ul>
        </div>
      </div>
      @if($order->motrechazo ==null)
      @else
      <div class="card">
        <div class="card-body">
          <h6 class="text-warning">Motivo del Rechazo</h6>
          <div>
            {{$order->motrechazo}}
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
</div>
@can('ventas.orderlist')
<div class="col-md-6">
  <h3>Agregados al pedido</h3>
</div>
@endcan
@endif
  <!-- Modal para agregar standares-->
  <div id="CreateModal" class="modal fade  text-info" role="dialog">
    <div class="modal-dialog modal-lg ">
    <!-- Modal content-->
    
        <div class="modal-content">
            <div class="modal-header bg-low">
                <h4 class="modal-title  text-center">Agregar Vacuna</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            
                <div class="modal-body">
                    {{ csrf_field() }}
                    
                    {!! Form::open(['route' => ['ordersdetail.addvacuna'],'files'=>true]) !!}  
                        @include('orders.forms.f-vacuna')
                    {!! Form::close() !!}
                </div>
            
        </div>
    
    </div>
</div>  

<!-- Modal -->
<div class="modal fade" id="EntregaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Asignar Entrega</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
          </div>
          <div class="modal-body">
              <p class="modal-text">Detalles de la entrega...</p>
          </div>
          <div class="modal-footer">
              <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
              <button type="button" class="btn btn-primary">Guardar</button>
          </div>
      </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="delVacModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Eliminar Vacuna</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> x
              </button>
          </div>
          <div class="modal-body">
              <p class="modal-text">Estas seguro que queres eliminar la vacuna?</p>
          </div>
          <div class="modal-footer">
              <button class="btn btn-info" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
              <button type="button" class="btn btn-danger">Eliminar</button>
          </div>
      </div>
  </div>
</div>





<script type="text/javascript">
    function createData(id)
    {
    var id = id;
    var url = '{{ route("orders.create", ":id") }}';
    url = url.replace(':id', id);
    $("#createForm").attr('action', url);
    }
    
    function formeSubmit()
    {
    $("#createForm").submit();
    }
    </script>





@endsection