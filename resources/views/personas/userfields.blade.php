<!--de la tabla persona -->
    
    <!-- Nombre Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control','pattern' => '[a-zA-Z ]{4,30}', 'placeholder' => 'Nombre Completo', 'required']) !!}
    </div>

    <!-- Apellido Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('apellido', 'Apellido:') !!}
        {!! Form::text('apellido', null, ['class' => 'form-control','pattern' => '[a-zA-Z ]{4,30}', 'placeholder' => 'Apellido Completo', 'required']) !!}
    </div>

    <!-- Cedula Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('cedula', 'Cedula:') !!}
        {!! Form::text('cedula', null, ['class' => 'form-control','pattern' => '[0-9]{7,8}', 'placeholder' => 'Solo Numeros', 'required']) !!}
    </div>

    <!-- telefono Nac Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('telefono', 'Telefono:') !!}
        {!! Form::text('telefono', null, ['class' => 'form-control','pattern' => '[0-9]{11}','placeholder' => 'Solo Numeros', 'required']) !!}
    </div>

    <!-- email  Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'required', 'placeholder'=>'Email de contacto']) !!}
    </div>

    <!-- contrasela  Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('password', 'Password:') !!}
        <input type="password" name="password" class="form-control" placeholder="Contraseña de acceso">
    </div>

    <!--tipo -->
    <input type="hidden" name="tipo" value="admin">
   
<div class="form-group col-sm-12">
    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
</div>
