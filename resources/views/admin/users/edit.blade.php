@extends('admin.layout.main')

@section('content')

    <div class="row">
        <div class="col-sm-7">
            <div class="white-box">
                <h3 class="box-title">Usuários</h3>
                <p class="text-muted">Todas os usuários</p>
                @include('admin.layout.errors')

                {!! Form::model($user, ['url' => 'dashboard/users/' . $user->id, 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nome:', ['class' => 'col-md-7']) !!}
                    <div class="col-md-6 col-sm-9 col-xs-12">
                        {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'E-mail:', ['class' => 'col-md-7']) !!}
                    <div class="col-md-6 col-sm-9 col-xs-12">
                        {!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Senha:', ['class' => 'col-md-7']) !!}
                    <div class="col-md-6 col-sm-9 col-xs-12">
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Senha']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Repita senha:', ['class' => 'col-md-7']) !!}
                    <div class="col-md-6 col-sm-9 col-xs-12">
                        {!! Form::password('passwd', ['class' => 'form-control', 'placeholder' => 'Repita senha']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('class', 'Perfil:', ['class' => 'col-sm-12']) !!}
                    <div class="col-sm-6">
                        {!! Form::select('class', ['admin' => 'Admin', 'user' => 'Usuário'], $user->class, ['class' => 'custom-select col-md-7']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('role', 'Regra:', ['class' => 'col-sm-12']) !!}
                    <div class="col-sm-6">
                        {!! Form::select('role', $roles, $userRole, ['class' => 'custom-select col-md-7']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        {!! Form::submit('Atualizar', ['class' => 'btn btn-rounded btn-success']) !!}
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection