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

            <div class="col-xl-8 col-lg-7 col-md-7 col-sm-7 text-sm-right text-center layout-spacing align-self-center">
                <div class="d-flex justify-content-sm-end justify-content-center">
                <a href="{{route('orders.create')}}" class="btn btn-primary">Crear</a> 
                <a href="{{route('orders.selectorder')}}" class="ml-1 btn btn-secondary">Ordenes x Nacimientos</a>
                </div>
            </div>
        </div> 

        <div class="searchable-items list">
            <div class="items items-header-section">
                <div class="item-content">
                    <div class="col-md-5">
                       
                        <h4 style="margin-left: 0;">Solicitante</h4>
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
                    
                        <div class="user-profile col-md-5"> 
                            <a href=" {{ route('orders.show', $row->id) }}">
                            <div class="user-meta-info">
                                <p class="user-name"  data-name="{{  $row->customer->name }}" >{{  $row->customer->name }}</p>
                                <p class="user-work"  data-occupation="" > #{{  $row->id }} - Entrega: {{ Carbon\Carbon::parse($row->fecha_entrega)->format('d/m/Y') }}
                                    @if($row->production_order_id ==null)
                                 <span class="badge badge-pill badge-danger"><i class="fad fa-comment-alt-slash"></i> S/N</span>
                                    @else()
                                    <span class="badge badge-pill badge-primary">{{ $row->production_order_id }}</span>
                                    @endif
                                    
                                </p>
                            </div></a>
                        </div>
                    

                    
                    <div class="user-meta-info col-md-3">
                        <p class="user-name" >{{ $row->product->name }}</p>
                            <p class="user-work" >{{ $row->cantidad }}</p>
                        </div>
                        <div class="user-meta-info col-md-2">
                            @if ($row->status =='Nuevo') 
                            <p class="badge outline-badge-primary mb-0" >Nuevo</p>
                            @elseif ($row->status =='Despachado') 
                            <p class="badge outline-badge-warning mb-0" >Despachado</p>
                            @elseif ($row->status =='Entregado') 
                            <p class="badge outline-badge-success mb-0" >Entregado</p>
                            @elseif ($row->status =='Cancelado') 
                            <p class="badge outline-badge-danger mb-0" >Cancelado</p>
                            @endif
                               <p class="user-work">{{ $row->creado_por }}</p>
                            </div>
                    
                </div>
            </div>
            
            @endforeach
          
            
            
        </div>
    
</div>
<a href="#" class="cd-top text-replace js-cd-top">Top</a>























@endsection