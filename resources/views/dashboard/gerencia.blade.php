@push('styles')
    
@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<!-- Grafico de ventas por Linea Genetica -->
<script>
       var options = {
    chart: {
        type: 'donut',
        width: 380
    },
    colors: ['#5c1ac3', '#e2a03f', '#e7515a', '#e2a03f'],
    dataLabels: {
      enabled: false
    },
    legend: {
        position: 'bottom',
        horizontalAlign: 'center',
        fontSize: '14px',
        markers: {
          width: 10,
          height: 10,
        },
        itemMargin: {
          horizontal: 5,
          vertical: 8
        }
    },
    plotOptions: {
      pie: {
        donut: {
          size: '15%',
          background: 'transparent',
          labels: {
            show: true,
            name: {
              show: true,
              fontSize: '19px',
              fontFamily: 'Nunito, sans-serif',
              color: undefined,
              offsetY: 0
            },
            value: {
              show: true,
              fontSize: '26px',
              fontFamily: 'Nunito, sans-serif',
              color: '#bfc9d4',
              offsetY: 16,
              formatter: function (val) {
                return val
              }
            },
            total: {
              show: true,
              showAlways: true,
              label: 'Total',
              color: '#ffffff',
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
      width: '5',
      colors: '#0e1726'
    },
          series: [
                @foreach ($ventas as $venta) 
                        {{ $venta->y}},
                    
                    @endforeach
           
          ],
          
        labels: [
            @foreach ($ventas as $venta) 
                        '{{ $venta->x}}',
                    
                    @endforeach
        ],
       
        };

var chartventas = new ApexCharts(document.querySelector("#chartventas"), options);

chartventas.render();
</script>
<script>
    var options = {
          series: [{
          name: 'W-80',
          data: [ @foreach ($vtaw80 as $venta)
                            {{ $venta->y}}, 
                        @endforeach]
        }, {
          name: 'Brown',
          data: [@foreach ($vtabr as $vensta)
                            {{ $vensta->y}}, 
                        @endforeach]
        }],
          chart: {
          height: 350,
          type: 'area'
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'date',
          categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
          datetimeFormatter: {month: "MM 'yyyy",}
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy '
          },
        },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
</script>
<!-- Grafico de ventas por provincia -->
<script>
      var options = {
         
        chart: {
        type: 'bar',
        toolbar: {
          show: false,
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'  
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
        series: [{
            data: [   @foreach ($label as $venta)
                            {{ $venta->y}}, 
                        @endforeach
                    ]
            }],
        xaxis: {
            labels: {
                style:{
                fontSize: '7px',
                fontFamily: 'Nunito, sans-serif',
                fontWeight: 400,
                },
            },
          categories: [ @foreach ($label as $venta) 
                        '{{ $venta->p}}',
                    
                    @endforeach
          ],
        },
        yaxis: {
      show: false,
        },
        };

        var chartprov = new ApexCharts(document.querySelector("#chartprov"), options);
        chartprov.render();
</script>
@endpush



  
 

        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one">
                <div class="widget-heading">
                    <h5 class="">Ventas</h5>
                    <ul class="tabs tab-pills">
                        <li><a href="javascript:void(0);" id="tb_1" class="tabmenu">Mensual</a></li>
                    </ul>
                    
                </div>

                <div class="widget-content">
                    <div class="tabs tab-content">
                        <div id="content_1" class="tabcontent"> 
                            <div id="chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-two">
                <div class="widget-heading">
                    <h5 class="">Ventas por Linea</h5>
                    <p>Ultimos 30 Días</p>
                </div>
                <div class="widget-content">
                    <div id="chartventas" class=""></div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 ">
            <div class="widget-two">
                <div class="widget-content">
                    <div class="w-numeric-value">
                        <div class="w-content">
                            <span class="w-value">Ventas por Provincia</span>
                            <span class="w-numeric-title"></span>
                        </div>
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                        </div>
                    </div>
                    <div>
                        <div id="chartprov"></div>
                    </div>
                </div>
            </div>
        </div>
     
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget-three">
                <div class="widget-heading">
                    <h5 class="">Stock de Huevos</h5>
                </div>
                <div class="widget-content">

                    <div class="order-summary">

                        

                        <div class="summary-list">
                           
                            <div class="w-summary-details">
                                
                                <div class="w-summary-info">
                                    <h6>Huevos con menos de 7 dias</h6>
                                    <p class="summary-count">137,515</p>
                                </div>

                                <div class="w-summary-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 86%" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="summary-list">
                            
                            <div class="w-summary-details">
                                
                                <div class="w-summary-info">
                                    <h6>Huevos entre 7 y 14 dias</h6>
                                    <p class="summary-count">55,085</p>
                                </div>

                                <div class="w-summary-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        
                        <div class="summary-list">
                           
                            <div class="w-summary-details">
                                
                                <div class="w-summary-info">
                                    <h6>Huevos con mas de 14 dias</h6>
                                    <p class="summary-count">92,600</p>
                                </div>

                                <div class="w-summary-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        
                    </div>

                </div>
            </div>
        </div>

    