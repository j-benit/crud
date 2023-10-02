<div class="box box-info padding-1">
    <div class="box-body">
        
       
        
        <div class="form-group">
            {{ Form::label('categorias_id') }}
            {{ Form::select('categorias_id',  $categorias, $correo->categorias_id, ['class' => 'form-control' . ($errors->has('categorias_id') ? ' is-invalid' : ''), 'placeholder' => 'Categorias Id']) }}
            {!! $errors->first('categorias_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('correo') }}
            {{ Form::text('correo', $correo->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
            {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>