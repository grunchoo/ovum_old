<div class="form-row">       
    <div class="form-group col-md-4">       
        <h6>Cliente</h6>
        {{ Form::select('lote_id', \App\Lote::pluck('name', 'id'),null, ['placeholder' => 'Seleccionar Lote', 'class' => 'form-control']) }}      
    </div>
    <div class="form-group col-md-4">       
        <h6>Huevos a Incubar</h6>
        {{ Form::text('huevosinc', null, ['class' => 'form-control']) }}      
    </div>    
             
</div>



{{ Form::text('production_order_id', $prodor->id, ['hidden class' => 'form-control']) }}


     

<button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>