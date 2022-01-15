<div class="row">
    <div class="col-md-2">
    <img class="img-fluid" src="/uploads/avatars/{{ $user->avatar }}">
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="form-group col-md-4">
                {{ Form::label('name', 'Nombre') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group col-md-3">       
                   
            </div>
            <div class="form-group col-md-5">
                {{ Form::label('email', 'E-mail') }}
                {{ Form::text('email', null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                {{ Form::label('username', 'Usuario') }}
                {{ Form::text('username', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group col-md-4">
                    {{ Form::label('empresa', 'Empresa') }}
                    {{ Form::text('empresa', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group col-md-5">
                        {{ Form::label('titulo', 'Titulo') }}
                        {{ Form::text('titulo', null, ['class' => 'form-control']) }}
                    </div>
        </div>
    </div>
</div>


<hr>
<div class="row">
    <div class="col-md-6">
        {{ Form::label('avatar', 'Avatar') }}
        {{ Form::file('avatar', null) }}
    </div>
    <div class="col-md-6">
        {{ Form::label('firma', 'Firma') }}
        {{ Form::file('firma', null) }}
    </div>
</div>

<hr>
<div class="row">
    <div class="col-md-7">
            <h3>Lista de Roles</h3>
            <div class="form-group">
                <ul class="list-unstyled">
                    @foreach ($roles as $role)
                    <li>
                        <label>
                            {{ Form::checkbox('roles[]', $role->id, null) }}
                            {{ $role->name }} -
                            <em>{{ $role->description ?: 'Sin Datos' }}</em>
                        </label>
                    </li>
                        
                    @endforeach
                </ul>
            </div>

    </div>
    <div class="col-md-3">
        <img class="img-fluid" src="/uploads/firmas/{{ $user->firma }}">
    </div>
</div>


<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>