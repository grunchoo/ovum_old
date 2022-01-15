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
                <h3 class="">{{ $warehouse->customer->name}}</h3>
                <a href="/warehouse/{{$warehouse->id}}/edit" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
            </div>
            <div class="text-center user-info">
                <p class="">{{$warehouse->name}}</p>
            </div>
            <div class="user-info-list">

                <div class="">
                    <ul class="contacts-block list-unstyled">
                        
                        <li class="contacts-block__item">
                         <span>RESNPA:</span>  {{$warehouse->renspa}}
                        </li>
                       
                    </ul>
                    <div>
                    <a href="https://www.google.com/maps/search/?api=1&query={{$warehouse->latitud}},{{$warehouse->longitud}}" class="btn btn-dark"> Ir a la granja</a>
                    </div>
                </div>                                    
            </div>
        </div>
    </div>

    

</div>

</div>
</div>
</div>
<!--  END CONTENT AREA  -->
@endsection
