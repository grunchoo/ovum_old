@extends('layouts.admin')
@push('styles')
<link href={{ asset('plugins/table/datatable/datatables.css') }} rel="stylesheet" type="text/css" />
<link href={{ asset('plugins/table/datatable/dt-global_style.css') }} rel="stylesheet" type="text/css" />
<link href={{ asset('plugins/table/datatable/custom_dt_html5.css') }} rel="stylesheet" type="text/css" />
<link href={{ asset('css/select2.css') }} rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_miscellaneous.css') }}">
<link href={{ asset('plugins/apex/apexcharts.css') }} rel="stylesheet" type="text/css" />
<link href={{ asset('assets/css/widgets/modules-widgets.css') }} rel="stylesheet" type="text/css" /> 
<link href={{ asset('assets/css/apps/contacts.css') }} rel="stylesheet" type="text/css" /> 



@endpush
@section('content')
@php
    $ini = 150 ;
    $pp7 = 135;
    $pp14 = 140 ;
    $pp21 = 200 ;
    $pp28 = 230 ;
    $pp35 = 215 ;
    $pp42 = 350 ;
    $pp49 = 500 ;
@endphp
<div class="col-md-12 col-sm-12 col-12 mb-5">
    <div class="d-flex justify-content-between">
        <div class=" d-flex mb-2 widget bg-dark p-3">
            <div class="pr-2">
                <div class=" text-center pr-2 border-right border-primary">
                    <h1 class="mb-0 text-primary" style="letter-spacing: -5px;">{{$loteprod->id}}</h1>
                    <p class="mb-0" style="font-size: 50%; color:gray">CRIANZA</p>
                </div>
            </div>
            <div >
                <h5 class="mb-0 text-primary text-bold">{{$loteprod->lote}}<span style="font-size: 50%; color:gray"> ({{$loteprod->supplier->name}})</span></h5>
                <span class="pr-2 border-right border-gray">Galpón {{$loteprod->supplier->galpon}}</span><span class="pl-2 text-primary pr-2 border-right border-gray">{{$loteprod->product->name}} - {{$loteprod->sexo}}</span> 
                <p class="mb-0" style="font-size: 50%; color:gray">BETBEDER</p>
            </div>
            
           
        </div>
        <div class=" d-flex justify-content-between">
            <div>
                
            </div>
            
            <div class="widget bg-dark p-3 text-center pl-3 pr-3 border-right border-gray" >
                <h2 class="mb-0 text-primary">@if ($loteprod->fecha_fin==null)
                    {{$now->diffInDays($loteprod->fecha_inicio)}}
                    @else
                    {{$loteprod->fecha_fin->diffInDays($loteprod->fecha_inicio)}}
                @endif</h2>
                <small>EDAD</small>
            </div>
            <div class="widget bg-dark p-3 text-center pl-3 pr-3 border-right border-gray" >
              
                <h2 class="mb-0 text-primary">{{$loteprod->hembras_actuales}}</h2>
                <small>CANT. AVES</small>
            </div>
            <div class=" widget bg-dark p-3 text-center pl-3 pr-3 border-right border-gray" >
                <h2 class="mb-0 text-primary">57</h2>
                <small>MORTANDAD</small>
            </div>
            <div class="widget bg-dark p-3 text-center pl-3 pr-3 border-right border-gray" >
                <h2 class="mb-0 text-primary">1.5<span style="font-size: 50%; color:gray">%</span></h2>
                <small>PORC. MORT</small>
            </div>
            <div class=" widget bg-dark p-3 text-center pl-3 " >
                <h2 class="mb-0 text-primary">0.79<span style="font-size: 50%; color:gray">Kg.</span></h2>
                <small>PESO PROM.</small>
            </div>
            
           
        </div>
    </div>
</div>



<div id="chart"></div>

@push('scripts')
<script src="{{ asset('assets/js/apps/contact.js')}}"></script>
<script src="{{ asset('plugins/apex/apexcharts.min.js')}}"></script>
<script src="{{ asset('assets/js/widgets/modules-widgets.js')}}"></script>

<script>
    var options = {
  chart: {
    fontFamily: 'Sora, sans-serif',
    height: 250,
    width: 450,
    type: 'line',
    toolbar: {
        show: false
      },
  },
  
  colors: ['#F15A24', '#808080'],
  dataLabels: {
    enabled: false
  },
  title: {
      text: 'Peso Promedio',
      align: 'center',
      margin: 0,
      offsetX: 10,
      offsetY: 0,
      floating: false,
      style: {
        fontSize: '18px',
        color:  '#0e1726'
      },
    },
  stroke: {
        curve: 'smooth'
    },
  series: [{
    name: 'Crianza',
    data: [45,125,582,869,1200,1900, 0, 0]
  },
  {
    name: 'Tabla',
    
    data: [{{$ini}}, {{$pp7}}, {{$pp14}}, {{$pp21}}, {{$pp28}}, {{$pp35}}, {{$pp42}}, {{$pp49}}]
  }],
  
  xaxis: {
    categories: [0,7,14,21,28,35,42,49],
    axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      },
      crosshairs: {
        show: true
      },
      
  }, 
  yaxis: {
      labels: {
        formatter: function(value, index) {
          return (value) + 'g.'
        },
        offsetX: 0,
        offsetY: 0,
        style: {
            fontSize: '12px',
            fontFamily: 'Sora, sans-serif',
            cssClass: 'apexcharts-yaxis-title',
        },
      }
    },
  grid: {
      borderColor: '#e0e6ed',
      strokeDashArray: 5,
      xaxis: {
          lines: {
              show: false
          }
      },   
      yaxis: {
          lines: {
              show: false,
          }
      },
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: -10
      }, 
    }, 
    tooltip: {
      theme: 'dark',
      marker: {
        show: true,
      },
      x: {
        show: false,
      }
    },
    
}

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();
</script>
@endpush
@endsection