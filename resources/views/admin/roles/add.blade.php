@extends('admin.layout.main')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Regras</h3>
                <p class="text-muted">Adicionar regras</p>
                @include('admin.layout.errors')

                {!! Form::open(['url' => 'dashboard/roles', 'class' => 'form-horizontal']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Categoria:', ['class' => 'col-md-7']) !!}
                    <div class="col-md-12">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Descrição:', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    @foreach($perms as $perm)
                        <div class="col-md-4">
                            <div class="form-check">
                                <label for="PermNames-{{ $perm->id }}" class="custom-control custom-checkbox">
                                    <input type="checkbox" id="PermNames-{{ $perm->id }}" class="custom-control-input" name="permission[]" value="{{ $perm->id }}">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">{{ $perm->name }}</span>
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        {!! Form::submit('Adicionar', ['class' => 'btn btn-rounded btn-success']) !!}
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection