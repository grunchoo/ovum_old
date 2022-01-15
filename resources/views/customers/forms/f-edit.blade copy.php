<div class="form-row">         
    <div class="form-group col-md-3">       
        <h6>Cod Cliente</h6>
        {{ Form::text('cod_cliente', null, ['class' => 'form-control border-danger']) }}      
    </div>
    <div class="form-group col-md-3">       
        <h6>Nombre</h6>
        {{ Form::text('name', null, ['class' => 'form-control']) }}      
    </div>
    <div class="form-group col-md-3">       
        <h6>Domicilio</h6>
        {{ Form::text('domicilio', null, ['class' => 'form-control']) }}      
    </div>  
    <div class="form-group col-md-3">       
        <h6>CUIT</h6>
        {{ Form::text('cuit', null, ['class' => 'form-control']) }}      
    </div>  
             
</div>

<div class="form-row">
    
    
</div>
     

<button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>