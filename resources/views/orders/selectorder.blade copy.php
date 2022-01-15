@extends('layouts.app')
@section('content')
@php
    $suma=0;
@endphp
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="app-hamburger-container">
            <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu chat-menu d-xl-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
        </div>
        <div class="doc-container">
            <div class="tab-title">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="search">
                            <input type="text" class="form-control" placeholder="Buscar...">
                        </div>
                        <ul class="nav nav-pills inv-list-container d-block" id="pills-tab" role="tablist">
                            @foreach ($prodor as $item)
                            <li class="nav-item">
                                <div class="nav-link list-actions" id="invoice-{{ $item->id}}" data-invoice-id="{{ $item->id}}">
                                    <div class="f-m-body">
                                        <div class="f-head">
                                            <span><i class="fad fa-egg"></i></span>
                                        </div>
                                        <div class="f-body">
                                            <p class="invoice-number">Nacimiento #{{ $item->id}}</p>
                                            <p class="invoice-generated-date">Fecha Nac.: {{ Carbon\Carbon::parse($item->dateofend)->format('d/m/Y') }}</p>
                                            <p class="invoice-number">W-80:  {{number_format($orders->where('production_order_id', $item->id)->where('product_id', '=', '1')->sum('cantidad'))}} | Br: {{number_format($orders->where('production_order_id', $item->id)->where('product_id', '=', '2')->sum('cantidad'))    }}
                                               
                                           </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="invoice-container">
                <div class="invoice-inbox">

                    <div class="inv-not-selected">
                        <p>Selecciona un nacimiento para ver los pedidos</p>
                    </div>

                    <div class="invoice-header-section">
                        <h4 class="inv-number"></h4>
                        
                        <div class="invoice-action">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer action-print" data-toggle="tooltip" data-placement="top" data-original-title="Reply"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                        </div>
                    </div>
                    
                    <div id="ct"  >
                        <div class="hidden invoice-header-section">
                           
                               <div>
                                <h6 class="">Pedidos para el Nacimiento </h6> 
                               </div>
                               <h5  class="inv-number"></h5>
                           </div>
                        @if((new \Jenssegers\Agent\Agent())->isPhone())
                        @foreach ($orders as $item)
                        <div class="invoice-{{ $item->production_order_id }}">
                            <div class="widget-content ">
                                <div class="searchable-items list">
                                    <div class="items">
                                        <div class="item-content" style="padding-left: 0em; padding-right: 0em;">
                                            <div class=" col-sm-3" > 
                                                <a href=" {{ route('orders.show', $item->id) }}">
                                                <div class="user-meta-info">
                                                    <p class="user-name"  data-name="{{  $item->customer->name }}" >{{  $item->customer->name }}</p>
                                                    <p class="user-work"  data-occupation="" > {{  $item->id }} - F.E.: {{ Carbon\Carbon::parse($item->fecha_entrega)->format('d/m/Y') }}</p>
                                                </div></a>
                                            </div>
                                            <div class="user-meta-info col-md-1">
                                                @if($item->product_id  == '1')
                                                <p class="user-name" >W-80</p>
                                                @elseif($item->product_id  == '2')
                                                <p class="user-name text-warning" >Brown</p>
                                                @elseif($item->product_id  == '3')
                                                <p class="user-name text-secondary" >Parr.</p>
                                                @elseif($item->product_id  == '4')
                                                <p class="user-name text-success" >ECO</p>
                                                @endif
                                                <p class="user-work text-center">{{ number_format($item->cantidad) }}</p>
                                            </div>
                                            <div class="user-meta-info col-md-2">
                                                @if ($item->status =='Nuevo') 
                                                <p class="badge outline-badge-primary" >Nuevo</p>
                                                @elseif ($item->status =='Despachado') 
                                                <p class="badge outline-badge-warning" >Despachado</p>
                                                @elseif ($item->status =='Entregado') 
                                                <p class="badge outline-badge-success" >Entregado</p>
                                                @elseif ($item->status =='Cancelado') 
                                                <p class="badge outline-badge-danger" >Cancelado</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       @php
                       $suma+=$item->cantidad  
                       @endphp
                        @endforeach
                        @else
                        @foreach ($orders as $item)
                        <div class="invoice-{{ $item->production_order_id }}">
                            <div class="widget-content searchable-container list">
                                <div class="searchable-items list">
                                    <div class="items">
                                        <div class="item-content">
                                            <div class="user-profile col-md-5"> 
                                                <a href=" {{ route('orders.show', $item->id) }}">
                                                <div class="user-meta-info">
                                                    <p class="user-name"  data-name="{{  $item->customer->name }}" >{{  $item->customer->name }}</p>
                                                    <p class="user-work"  data-occupation="" > {{  $item->id }} - Entrega: {{ Carbon\Carbon::parse($item->fecha_entrega)->format('d/m/Y') }}</p>
                                                </div></a>
                                            </div>
                                            <div class="user-meta-info col-md-3">
                                                @if($item->product_id  == '1')
                                                <p class="user-name" >{{ $item->product->name }}</p>
                                                @elseif($item->product_id  == '2')
                                                <p class="user-name text-warning" >{{ $item->product->name }}</p>
                                                @elseif($item->product_id  == '3')
                                                <p class="user-name text-secondary" >{{ $item->product->name }}</p>
                                                @elseif($item->product_id  == '2')
                                                <p class="user-name text-success" >{{ $item->product->name }}</p>
                                                @endif
                                                <p class="user-work">{{ number_format($item->cantidad) }}</p>
                                            </div>
                                            <div class="user-meta-info col-md-2">
                                                @if ($item->status =='Nuevo') 
                                                <p class="badge outline-badge-primary" >Nuevo</p>
                                                @elseif ($item->status =='Despachado') 
                                                <p class="badge outline-badge-warning" >Despachado</p>
                                                @elseif ($item->status =='Entregado') 
                                                <p class="badge outline-badge-success" >Entregado</p>
                                                @elseif ($item->status =='Cancelado') 
                                                <p class="badge outline-badge-danger" >Cancelado</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       @php
                       $suma+=$item->cantidad  
                       @endphp
                        @endforeach
                        @endif
                       
                       
                        
                                            
                            
                                                <!--datos de ventas--
                                                <div class="content-section  animated animatedFadeInUp fadeInUp">
                                <div class="col-lg-12">
                                    <div class="widget-content searchable-container list">
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
                                                        
                                                            <div class="action-btn col-md-2">
                                                                <h4 style="margin-left: 0;">Acciones</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                -->
                                                   
                                                    
                                                    
                                                
                                                <!--END datos de ventas-->                                 
                                            
                                   
                    

                </div>

            </div>
            
        </div>

    </div>


    
@endsection