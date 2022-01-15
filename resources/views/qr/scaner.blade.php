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
            <h2 class="text-bold">Postura Diaria de Lotes</h2>
        </div>
        
    </div>
</div>

<div id="qr-reader" style="width:500px"></div>
<div id="qr-reader-results"></div>

            

@push('scripts')
<script src="html5-qrcode.min.js"></script>
<script>
function docReady(fn) {
    // see if DOM is already available
    if (document.readyState === "complete"
        || document.readyState === "interactive") {
        // call on next available tick
        setTimeout(fn, 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}

docReady(function () {
    var resultContainer = document.getElementById('qr-reader-results');
    var lastResult, countResults = 0;
    function onScanSuccess(decodedText, decodedResult) {
        if (decodedText !== lastResult) {
            ++countResults;
            lastResult = decodedText;
            // Handle on success condition with the decoded message.
            console.log(`Scan result ${decodedText}`, decodedResult);
        }
    }

    var html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess);
});
</script>
    <!-- Lector de QR -->
    
    <script src="{{ asset('js/html5-qrcode.min.js') }}" defer></script>
@endpush
@endsection