@extends('admin.layout.main')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Regras</h3>
                <p class="text-muted">Adicionar regras</p>
                @include('admin.layout.errors')

                {!! Form::model($role, ['url' => 'dashboard/roles/' . $role->id, 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                @include('admin.roles.form', ['submitButton' => 'Editar'])
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection