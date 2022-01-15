<div class="mt-4">
    
    <div class="d-flex justify-content-center">
        <div class="form-group col-md-6">
            {{ Form::label('mort_h', 'Mortandad Hembras') }}
            {{ Form::text('mort_h', null, ['class' => 'form-control']) }}
        </div>
        
        <div class="form-group col-md-6">
            {{ Form::label('mort_m', 'Mortandad Machos') }}
            {{ Form::text('mort_m', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="form-group col-md-12">       
            {{ Form::label('incub', 'Huevos Incubables') }}
            {{ Form::text('incub', null, ['class' => 'form-control']) }}
        </div> 
    </div>
    <div class="d-flex justify-content-center">
        
        <div class="form-group col-md-6">       
            {{ Form::label('comlimp', 'Comunes Limpios') }}
            {{ Form::text('comlimp', null, ['class' => 'form-control']) }}       
        </div>
        <div class="form-group col-md-6">       
            {{ Form::label('sucio', 'Sucio') }}
            {{ Form::text('sucio', null, ['class' => 'form-control']) }}       
        </div>
    </div>
    <div class="d-flex justify-content-center">
        
        <div class="form-group col-md-6">       
            {{ Form::label('rotos', 'Rotos') }}
            {{ Form::text('rotos', null, ['class' => 'form-control']) }}       
        </div>
        <div class="form-group col-md-6">       
            {{ Form::label('tirados', 'Tirados') }}
            {{ Form::text('tirados', null, ['class' => 'form-control']) }}       
        </div>
    </div>

    <hr>
    <div class="form-group col-md-12"> 
        {{ Form::label('observaciones', 'Observaciones') }}
        {{Form::textarea('observaciones', null, ['class' => 'form-control'])}}
    </div>
</div>


{{ Form::text('user_id', $user_id , ['hidden class' => 'form-control']) }}       
{{ Form::text('loteprod_id', $lote , ['hidden class' => 'form-control']) }} 
{{ Form::text('macho', $macho , ['hidden class' => 'form-control']) }} 
{{ Form::text('hembra', $hembra , ['hidden class' => 'form-control']) }}       
     
<!-- Cierra Liena -->
<div class="d-flex justify-content-center">
<button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>

</div>