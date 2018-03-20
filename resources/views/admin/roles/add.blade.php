@extends('admin.layout.main')

@section('content')

    <div class="row">
        <div class="col-sm-7">
            <div class="white-box">
                <h3 class="box-title">Regras</h3>
                <p class="text-muted">Adicionar regras</p>
                @include('admin.layout.errors')

                {!! Form::open(['url' => 'dashboard/roles', 'class' => 'form-horizontal']) !!}
                @include('admin.roles.form', ['submitButton' => 'Adicionar'])
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection