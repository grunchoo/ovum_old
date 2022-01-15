    <div class="form-row">       
    <div class="form-group col-md-12">       
        <h6>Fecha Nacimiento</h6>
        {{ Form::date('dateofend', null, ['class' => 'form-control']) }}      
    </div>    
             
</div>


{{ Form::text('user_id', $user, ['hidden class' => 'form-control']) }}

{{ Form::text('status', "Nuevo", ['hidden class' => 'form-control']) }}

     

<button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>