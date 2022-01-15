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
                        <input type="text" class="form-control product-search" id="input-search" placeholder="Buscar Clientes...">
                    </div>
                </form>
            </div>

            <div class="col-xl-8 col-lg-7 col-md-7 col-sm-5 text-sm-right text-center layout-spacing align-self-center">
                <div class="d-flex justify-content-sm-end justify-content-center">
                    <svg id="btn-add-contact" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                </div>

                
            </div>
        </div>

        <div class="searchable-items list">
            <div class="items items-header-section">
                <div class="item-content">
                    <div class="col-md-5">
                       
                        <h4 style="margin-left: 0;">Nombre</h4>
                    </div>
                    <div class="user-email col-md-2">
                        <h4 style="margin-left: 0;">RENSPA</h4>
                    </div>
                    <div class="user-location col-md-3">
                        <h4 style="margin-left: 0;">Tipo</h4>
                    </div>
                  
                    
                </div>
            </div>
            @foreach($warehouse as $row)
            <div class="items">
                <div class="item-content">
                    
                        <div class="user-profile col-md-5"> 
                            <a href=" {{ route('warehouse.show', $row->id) }}">
                            <div class="user-meta-info">
                                <p class="user-name"  data-name="{{ $row->name}}" >{{ $row->name}}</p>
                                <p class="user-work"  data-occupation="{{ $row->customer_id}}" >{{ $row->customer->name}}</p>
                            </div></a>
                        </div>
                    

                    <div class="user-meta-info col-md-2">
                        <p class="user-name" >{{ $row->renspa}}</p>
                           
                        </div>
                    <div class="user-meta-info col-md-3">
                        <p class="user-name" >{{ $row->movimiento}}</p>
                            <p class="user-work" >{{ $row->dte}}</p>
                        </div>
                   
                    
                </div>
            </div>
            @endforeach

            
        </div>
    </div>
</div>
<a href="#" class="cd-top text-replace js-cd-top">Top</a>



@endsection