<div class="form-row">
    <div class="col-sm-2">
        <div class="form-group">
            <label for="fullName">Cod. Cliente (TANGO)</label>
            {{ Form::text('cod_cliente', null, ['class' => 'form-control']) }}      
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="fullName">Cliente</label>
            {{ Form::text('name', null, ['class' => 'form-control']) }}      
        </div>
    </div>
    <div class="col-sm-4">
        <label class="dob-input">CUIT</label>
        {{ Form::text('cuit', null, ['class' => 'form-control ']) }}        
    </div>
</div>
<div class="form-row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="profession">Localidad</label>
            {{ Form::text('localidad', null, ['class' => 'form-control']) }}     
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="profession">Provincia</label>
            {{ Form::text('provincia', null, ['class' => 'form-control']) }}     
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-sm-8">
        <div class="form-group">
            <label for="profession">Domicilio</label>
            {{ Form::text('domicilio', null, ['class' => 'form-control']) }}     
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="profession">Codigo Postal</label>
            {{ Form::text('codpost', null, ['class' => 'form-control']) }}     
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="profession">Telefono</label>
            {{ Form::text('telefono', null, ['class' => 'form-control']) }}     
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="profession">Email</label>
            {{ Form::text('email', null, ['class' => 'form-control']) }}     
        </div>
    </div>
</div>



<button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
   


