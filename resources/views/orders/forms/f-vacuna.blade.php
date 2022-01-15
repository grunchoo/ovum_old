<div class="form-row">
           
    <div class="form-group col-md-4">
        <h6>Vacuna</h6>
        {{ Form::select('product_additional_id', \App\ProductAdditional::pluck('name', 'id'),null, ['placeholder' => '---', 'class' => 'form-control ']) }}
    </div>
    <div class="form-group col-md-8">
        <h6>Observaciones</h6>
        {{ Form::text('observaciones', null, ['class' => 'form-control']) }}      
    </div>
</div>


{{ Form::text('order_id',  $order->id, ['hidden class' => 'form-control border-danger']) }}


<button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>