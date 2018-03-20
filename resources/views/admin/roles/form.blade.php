
    <div class="form-group">
        {!! Form::label('name', 'Categoria:', ['class' => 'col-md-7']) !!}
        <div class="col-md-12">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('display_name', 'Descrição:', ['class' => 'col-md-12']) !!}
        <div class="col-md-12">
            {!! Form::text('display_name', null, ['class' => 'form-control', 'placeholder' => 'Descrição']) !!}
        </div>
    </div>

    <div class="form-group row">
        @foreach($perms as $perm)
            <div class="col-sm-4">
                <div class="form-check">
                    <label for="PermNames" class="custom-control custom-checkbox">
                        <input type="checkbox" id="PermNames" class="custom-control-input" name="permission[]" value="{{ $perm->id }}" {{ in_array($perm->id, $rolePerm) ? 'checked' : '' }}>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">{{ $perm->name }}</span>
                    </label>
                </div>
            </div>
        @endforeach
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            {!! Form::submit($submitButton, ['class' => 'btn btn-rounded btn-success']) !!}
        </div>
    </div>
