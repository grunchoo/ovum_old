<div class="form-row">         
    <div class="form-group col-md-4">       
        <h6>Cliente</h6>
        {{ Form::select('customer_id', \App\Customer::pluck('name', 'id'),null, ['placeholder' => 'Seleccionar Cliente', 'class' => 'form-control']) }}      
    </div>
    <div class="form-group col-md-2">       
        <h6>Producto</h6>
        {{ Form::select('product_id', \App\Product::pluck('name', 'id'),null, ['placeholder' => 'Seleccionar Producto', 'class' => 'form-control']) }} 
    </div>
    <div class="form-group col-md-2">       
        <h6>Fecha Entrega</h6>
        {{ Form::date('fecha_entrega', null, ['class' => 'form-control']) }}      
    </div>  
    <div class="form-group col-md-2 col-6">       
        <h6>Cantidad</h6>
        {{ Form::text('cantidad', null, ['class' => 'form-control']) }}      
    </div>  
    <div class="form-group col-md-2 col-6">       
        <h6>Precio</h6>
        {{ Form::text('precio', null, ['class' => 'form-control']) }}      
    </div>  
    
             
</div>

<div class="form-row">
    <div class="form-group col-md-12">       
        <h6>Observaciones</h6>
        {{ Form::textarea('observaciones', null, ['class' => 'form-control']) }}      
    </div>  
    
</div>
{{ Form::text('creado_por', $userid, ['hidden class' => 'form-control']) }}
{{ Form::text('creator_id', $user, ['hidden class' => 'form-control']) }}

     

<button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>