@extends('layouts.app')
@section('content')
@push('styles')
    <link href="{{ asset('assets/css/card.css') }}" rel="stylesheet" type="text/css"/>
@endpush
<!-- Content -->
<div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

    <div class="user-profile layout-spacing">
        <div class="widget-content widget-content-area">
            <div class="d-flex justify-content-between">
                <h3 class="">Perfil</h3>
                <a href="/customers/{{$customers->id}}/edit" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
            </div>
            <div class="text-center user-info">
                @if($customers->avatar==null)
                <img src="{{ url('/assets/img/avatar.svg') }}" style="width: 90px; height: 90px; border-radius: 50%"  alt="avatar">
                @else
                <img src="/uploads/avatar/customer/{{ $customers->avatar }}" style="width: 90px; height: 90px; border-radius: 50%"  alt="avatar">
                @endif
                <p class="">{{$customers->name}}</p>
            </div>
            <div class="user-info-list">

                <div class="">
                    <ul class="contacts-block list-unstyled">
                        
                        <li class="contacts-block__item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>{{$customers->cod_cliente}}
                        </li>
                        <li class="contacts-block__item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>{{$customers->localidad}}, {{$customers->provincia}}
                        </li>
                        <li class="contacts-block__item">
                            <a href="mailto:{{$customers->email}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>{{$customers->email}}</a>
                        </li>
                        <li class="contacts-block__item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> {{$customers->telefono}}
                        </li>
                       
                    </ul>
                </div>                                    
            </div>
        </div>
    </div>

    <div class="education layout-spacing ">
        <div class="widget-content widget-content-area">
            <h3 class="">Ultimos Pedidos</h3>
            <div class="timeline-alter">
                @foreach ($orders as $item)
                <div class="item-timeline">
                    <a href="{{ route('orders.show', $item->id) }}"><div class="t-meta-date">
                        <p class=""> {{ Carbon\Carbon::parse($item->fecha_entrega)->format('d/m/Y') }}</p>
                    <p>#{{$item->id}} - <span>{{$item->creado_por}}</span></p>
                    </div></a>
                    <div class="t-dot">
                    </div>
                    <div class="t-text">
                        <p>{{$item->product->name }}</p>
                        <p>{{$item->cantidad}}</p>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>

    <div class="work-experience layout-spacing ">
        
        <div class="widget-content widget-content-area">

            <h3 class="">Servicio Tecnico</h3>
            
            <div class="timeline-alter">
            
                <div class="item-timeline">
                    <div class="t-meta-date">
                        <p class="">04 Mar 2019</p>
                    </div>
                    <div class="t-dot">
                    </div>
                    <div class="t-text">
                        <p>Mortandad Elevada</p>
                        <p><em>L. Leiva</em></p>
                    </div>
                </div>

                

            </div>
        </div>

    </div>

</div>

<div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

    <div class="skills layout-spacing ">
        <div class="widget-content widget-content-area">
        <h3 class="">Ventas </h3>
        <p class="progress-title mb-1">Hy Line W-80</p>
            <div class="progress br-30 mb-1">
                <div class="progress-bar bg-primary" role="progressbar" style="width:  {{$perc1}}%" aria-valuenow=" {{$perc1}}" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span> {{$perc1}}%</span> </div></div>
            </div>
            <p class="progress-title mb-1">Hy Line Brown</p>
            <div class="progress br-30 mb-1">
                <div class="progress-bar bg-primary" role="progressbar" style="width: {{$perc2}}%" aria-valuenow="{{$perc2}}" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>{{$perc2}}%</span> </div></div>
            </div>
            <p class="progress-title mb-1">Parrilleros</p>
            <div class="progress br-30 mb-1">
                <div class="progress-bar bg-primary" role="progressbar" style="width: {{$perc3}}%" aria-valuenow="{{$perc3}}" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"> <span>{{$perc3}}%</span> </div></div>
            </div>
            <p class="progress-title mb-1">Ecologicos</p>
            <div class="progress br-30 mb-1">
                <div class="progress-bar bg-primary" role="progressbar" style="width: {{$perc4}}%" aria-valuenow="{{$perc4}}" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>{{$perc4}}%</span> </div></div>
            </div>

        </div>
    </div>
    <div class="bio layout-spacing ">
        <div class="widget-content widget-content-area">
            <h3 class="mb-3">Granjas</h3>
           
             
            <div style="display: flex; flex-wrap: wrap;">
               
            @foreach ($granjas as $item)
            @if ($item==null)
            <h4 class="text-success"> No se han cargado granjas</h4>
             @else
            <div class="card" style="background-color: rgba(27, 85, 226, 0.380392);">
                <a href="{{ route('warehouse.show', $item->id) }}">
                    <div class="card-body">
                        <h5 class="text">{{$item->name}}</h5>
                        <h6 class="rating-count">{{$item->renspa}}</h6>
                        <div class="rating-stars">
                            <p class="mb-0">{{$item->movimiento }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endif
            @endforeach
           
        </div>  
                <p style="mb-3"><br></p>
                <p></p>
        </div>                                
    </div>
    <div class="bio layout-spacing ">
        <div class="widget-content widget-content-area">
            <h3 class="">Observaciones</h3>
            <p>{{$customers->observaciones}}</p>

            <p></p>
            <p style="mb-3"><br></p>
        </div>                                
    </div>

    

</div>

</div>
</div>
</div>
<!--  END CONTENT AREA  -->
@endsection
