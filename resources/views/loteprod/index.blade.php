@extends('layouts.admin')
@push('styles')
<link href={{ asset('plugins/table/datatable/datatables.css') }} rel="stylesheet" type="text/css" />
<link href={{ asset('plugins/table/datatable/dt-global_style.css') }} rel="stylesheet" type="text/css" />
<link href={{ asset('plugins/table/datatable/custom_dt_html5.css') }} rel="stylesheet" type="text/css" />
<link href={{ asset('css/select2.css') }} rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_miscellaneous.css') }}">
<link href={{ asset('plugins/apex/apexcharts.css') }} rel="stylesheet" type="text/css" />
<link href={{ asset('assets/css/widgets/modules-widgets.css') }} rel="stylesheet" type="text/css" /> 


@endpush
@section('content')

<div class="col-md-12 col-sm-12 col-12">
    <div class="d-flex justify-content-between">
        <div class="seperator-header">
            <h2 class="text-bold">Lotes de Producción</h2>
        </div>
        <div class="task-action">
            <a href="javascript:;" data-toggle="modal" onclick="createData()" 
            data-target="#CreateModal" class="btn btn-primary btn-sm" style="margin-right:10px;"><i class="fa fa-plus"></i> Nuevo</a>
            
        </div>
    </div>
</div>
<div class=" col-md-12 col-sm-12 col-12 ">
    <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area  ">
            <div class="table-responsive ">
                <table id="default-ordering" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Granja</th>
                            <th>Linea</th>
                            <th>Lote</th>
                            <th>Estado</th>
                            <th>M / H</th>
                            <th>Semanas</th>
                            <th>Acciones</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($loteprod as $row)
                        
                        <tr style="border-bottom: 1px; ">
                            
                            <td class="p-2" >{{ $row->supplier->name}}</td>
                            <td class="p-2" style="max-width: 0; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $row->product->short}}</td>
                            <td class="p-2">{{ $row->lote }}</td>
                            <td class="p-2">
                                @if ($row->activo =='Produccion')
                                <span class="badge badge-info">{{ $row->activo}}</span>
                                @elseif ($row->activo =='Replume')
                                <span class="badge badge-warning">{{ $row->activo}}</span>
                                @elseif ($row->activo =='Recria')
                                <span class="badge badge-danger">{{ $row->activo}}</span>
                                @endif
                                </td>
                            <td class="p-2">{{ $row->machos }} | {{ $row->hembras }}</td>
                            <td class="p-2">{{\Carbon\Carbon::parse($row->fecha_nacimiento)->diffInWeeks($hoy)}} semanas</td>
                            
                            <td class="btn-group p-2"  >
                                <a href=" {{ route('loteprod.show', $row->id) }}" class="btn btn-primary btn-sm p-1"><i class="fad fa-eye"></i></a>
                                
                            
                                <!-- si tiene permisos para cerrar puede seguir con la edicion del registro -->    
                                
                                <a href="javascript:;" data-toggle="modal" onclick="editData({{$row->id}})" 
                                    data-target="#EditModal-{{$row->id}}" class="btn btn-success btn-sm p-1"><i class="fad fa-pencil"></i></a>
                                    
                            </td>
                        </tr>
                        
                        
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>






@push('scripts')
<script src="{{ asset('plugins/table/datatable/datatables.js')}}"></script>
<script src="{{ asset('plugins/apex/apexcharts.min.js')}}"></script>

<script>        
    $('#default-ordering').DataTable( {
        
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Viendo pagina _PAGE_ de _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Buscar...",
           "sLengthMenu": "Ver :  _MENU_",
        },
        "order": [[ 5, "asc" ]],
        "stripeClasses": [],
        "lengthMenu": [ 10, 20, 50],
        "pageLength": 10,
        drawCallback: function () { $('.dataTables_paginate > .pagination').addClass(' pagination-style-13 pagination-bordered mb-5'); }
    } );
</script>
<script>
    @foreach ($errors->all() as $error)
        toastr.error("{{$error}}")
    @endforeach
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script>
    $(document).ready(function(){
        $('#empleados').select2();
    });
</script>

<script>
    var options = {
     chart: {
         type: 'donut',
         width: 250
     },
     colors: ['#2196f3', '#e2a03f', '#8738a7'],
     dataLabels: {
       enabled: false
     },
     legend: {
         position: 'bottom',
         horizontalAlign: 'center',
         fontSize: '11px',
         markers: {
           width: 10,
           height: 10,
         },
         itemMargin: {
           horizontal: 0,
           vertical: 4
         }
     },
     plotOptions: {
       pie: {
         donut: {
           size: '65%',
           background: 'transparent',
           labels: {
             show: true,
             name: {
               show: true,
               fontSize: '16px',
               fontFamily: 'Titillium Web, sans-serif',
               color: undefined,
               offsetY: -10
             },
             value: {
               show: true,
               fontSize: '16px',
               fontFamily: 'Titillium Web, sans-serif',
               color: '20',
               offsetY: 0,
               formatter: function (val) {
                 return val
               }
             },
             total: {
               show: true,
               showAlways: true,
               label: 'Total',
               color: '#888ea8',
               formatter: function (w) {
                 return w.globals.seriesTotals.reduce( function(a, b) {
                   return a + b
                 }, 0)
               }
             }
           }
         }
       }
     },
     stroke: {
       show: true,
       width: 5,
     },
     series: [8, 4, 32],
     labels: ['Sintomas', 'Laboral', 'Extralaboral'],
     responsive: [{
         breakpoint: 250,
         options: {
             chart: {
                 width: '200px',
                 height: '200px'
             },
             legend: {
                 position: 'bottom'
             }
         },
   
         breakpoint: 250,
         options: {
             chart: {
                 width: '250px',
                 height: '250px'
             },
             legend: {
                 position: 'bottom'
             },
             plotOptions: {
               pie: {
                 donut: {
                   size: '65%',
                 }
               }
             }
         },
     }]
   }
   
   var chart = new ApexCharts(document.querySelector("#activos"), options);
   
   chart.render();
   </script>
   <script>
       var options = {
        chart: {
            type: 'donut',
            width: 250
        },
        colors: ['#2196f3', '#e2a03f', '#8738a7', '#3bca8f'],
        dataLabels: {
          enabled: false
        },
            legend: {
            position: 'bottom',
            horizontalAlign: 'center',
            fontSize: '11px',
            markers: {
            width: 10,
            height: 10,
            },
            itemMargin: {
            horizontal: 0,
            vertical: 4
            }
        },
        plotOptions: {
        pie: {
            donut: {
            size: '65%',
            background: 'transparent',
            labels: {
                show: true,
                name: {
                show: true,
                fontSize: '16px',
                fontFamily: 'Titillium Web, sans-serif',
                color: undefined,
                offsetY: -10
                },
                value: {
                show: true,
                fontSize: '16px',
                fontFamily: 'Titillium Web, sans-serif',
                color: '20',
                offsetY: 0,
                formatter: function (val) {
                    return val
                }
                },
                total: {
                show: true,
                showAlways: true,
                label: 'Total',
                color: '#888ea8',
                formatter: function (w) {
                    return w.globals.seriesTotals.reduce( function(a, b) {
                    return a + b
                    }, 0)
                }
                }
            }
            }
        }
        },
        stroke: {
        show: true,
        width: 5,
        },
        series: [23, 12, 1, 15],
        labels: ['Positivo', 'Negativo', 'Positivo CC', 'No Hisopado'],
        responsive: [{
            breakpoint: 250,
            options: {
                chart: {
                    width: '200px',
                    height: '200px'
                },
                legend: {
                    position: 'bottom'
                }
            },

            breakpoint: 250,
            options: {
                chart: {
                    width: '250px',
                    height: '250px'
                },
                legend: {
                    position: 'bottom'
                },
                plotOptions: {
                pie: {
                    donut: {
                    size: '65%',
                    }
                }
                }
            },
        }]
    }

var chart = new ApexCharts(document.querySelector("#activostest"), options);

chart.render();
</script>
<script>
    var options = {
     chart: {
         type: 'donut',
         width: 400
     },
     dataLabels: {
       enabled: false
     },
         legend: {
         position: 'right',
         horizontalAlign: 'center',
         fontSize: '10px',
         markers: {
         width: 10,
         height: 10,
         },
         itemMargin: {
         horizontal: 0,
         vertical: 4
         }
     },
     plotOptions: {
     pie: {
         donut: {
         size: '50%',
         background: 'transparent',
         labels: {
             show: true,
             name: {
             show: true,
             fontSize: '16px',
             fontFamily: 'Titillium Web, sans-serif',
             color: undefined,
             offsetY: -10
             },
             value: {
             show: true,
             fontSize: '16px',
             fontFamily: 'Titillium Web, sans-serif',
             color: '20',
             offsetY: 0,
             formatter: function (val) {
                 return val
             }
             },
             total: {
             show: true,
             showAlways: true,
             label: 'Total',
             color: '#888ea8',
             formatter: function (w) {
                 return w.globals.seriesTotals.reduce( function(a, b) {
                 return a + b
                 })
             }
             }
         }
         }
     }
     },
     stroke: {
     show: true,
     width: 5,
     },
     series: [125],
     labels: ['Gracias'],
     responsive: [{
         breakpoint: 1250,
         options: {
             chart: {
                 width: '200px',
                 height: '200px'
             },
             legend: {
                 position: 'bottom'
             }
         },

         breakpoint: 1250,
         options: {
             chart: {
                 width: '200px',
                 height: '200px'
             },
             legend: {
                 position: 'left'
             },
             plotOptions: {
             pie: {
                 donut: {
                 size: '65%',
                 }
             }
             }
         },
     }]
 }

var chart = new ApexCharts(document.querySelector("#activosseso"), options);

chart.render();
</script>
<script>
    
      
    var options = {
        series: [125],
        chart: {
            width: 500,
            height: 290,
            type: 'pie',
        },
        dataLabels: {
        enabled: true
        },
            legend: {
            position: 'left',
            horizontalAlign: 'center',
            fontSize: '11px',
            markers: {
            width: 10,
            height: 10,
            },
            itemMargin: {
            horizontal: 0,
            vertical: 4
            }
        },
       
        labels: ['free'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                    },
                legend: {
                    position: 'bottom',
                    fontSize: '10px',
                }
            }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#activosses"), options);
        chart.render();
    
    
    
</script>
@endpush

@endsection

