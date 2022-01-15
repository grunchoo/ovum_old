@push('scripts')
<script>
   /* Sumar dos números. */
function sumar (valor) {
    var total = 0;	
    valor = parseInt(valor); // Convertir el valor a un entero (número).
	
    total = document.getElementById('spTotal').innerHTML;
	
    // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
    total = (total == null || total == undefined || total == "") ? 0 : total;
	
    /* Esta es la suma. */
    total = (parseInt(total) + parseInt(valor));
	
    // Colocar el resultado de la suma en el control "span".
    document.getElementById("spTostal").value = total;
    document.getElementById('spTotal').innerHTML = total;
}
</script>
@endpush
<div class="form-row">         

 
    
    <div class="form-group col-md-4">       
        <h6>Hembras Nacidas</h6>
        {{ Form::text('hembra', null, ['id' => 'txt_campo_1', 'onchange'=>'sumar(this.value);', 'class' => 'form-control']) }}      
    </div>  
    <div class="form-group col-md-4">       
        <h6>Machos</h6>
        {{ Form::text('macho', null, ['id' => 'txt_campo_2', 'onchange'=>'sumar(this.value);','class' => 'form-control']) }}      
    </div>
    <div class="form-group col-md-4">       
        <h6>Segunda</h6>
        {{ Form::text('segunda', null, ['id' => 'txt_campo_3', 'onchange'=>'sumar(this.value);','class' => 'form-control']) }}      
    </div>
    <div class="form-group col-md-2">       
       
        {{ Form::text('total', null, ['id' => 'spTostal', 'hidden class' => 'form-control']) }}      
    </div>
             
</div>

<h5>Total:  <span id="spTotal"></span></h5>

     

<button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>