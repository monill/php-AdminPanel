@extends('admin.layout.main')

@section('content')

    <div class="row">
        <div class="col-sm-7">
            <div class="white-box">
                <h3 class="box-title">Usuários</h3>
                <p class="text-muted">Todas os usuários</p>

                @include('flash::message')
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Classe</th>
                            <th>Opções</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->class }}</td>
                                <td class="text-nowrap">
                                    <div class="row">
                                        @if($user->id === \Auth::user()->id)
                                            <a href="{{ url('dashboard/profile') }}" data-toggle="tooltip" data-original-title="Editar"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                        @else
                                            <a href="#" data-toggle="modal" data-original-title="Editar" data-target="#modal-{{ $user->id }}"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                        @endif

                                        @if($user->id == \Auth::user()->id)

                                        @elseif(\Auth::user()->class == 'admin' and $user->id !== \Auth::user()->id)
                                            {!! Form::open(['url' => 'dashboard/blogcategs/' . $user->id, 'method' => 'DELETE']) !!}
                                            <a href="#" onclick="$(this).closest('form').submit();"> <i class="fa fa-close text-danger"></i> </a>
                                            {!! Form::close() !!}
                                        @endif

                                        @if(\Auth::user()->class == 'sysop' and $user->id !== \Auth::user()->id)
                                            {!! Form::open(['url' => 'dashboard/blogcategs/' . $user->id, 'method' => 'DELETE']) !!}
                                            <a href="#" onclick="$(this).closest('form').submit();"> <i class="fa fa-close text-danger"></i> </a>
                                            {!! Form::close() !!}
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @foreach($users as $user)
        <!-- .modal -->
            <div id="modal-{{ $user->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Editar usuário</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(['url' => 'dashboard/userupd/' . $user->id, 'method' => 'PUT']) !!}
                                <div class="form-group">
                                    {!! Form::label('name', 'Nome:', ['class' => 'control-label']) !!}
                                    {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email', 'Nome:', ['class' => 'control-label']) !!}
                                    {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('password', 'Senha:', ['class' => 'control-label']) !!}
                                    {!! Form::text('password', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('class', 'Classe:', ['class' => 'control-label']) !!}
                                    {!! Form::select('class', ['admin' => 'Admin', 'user' => 'Usuário'], $user->class, ['class' => 'form-control']) !!}
                                </div>
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-danger waves-effect waves-light">Salvar</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        <!-- .modal -->
        @endforeach

        <div class="col-sm-5">
            <div class="white-box">
                <h3 class="box-title">Usuário</h3>
                <p class="text-muted">Adicionar Usuário</p>
                @include('admin.layout.errors')
                <br />
                {!! Form::open(['url' => 'dashboard/adduser', 'class' => 'form-horizontal form-label-left']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nome:', ['class' => 'control-label col-md-2 col-sm-3 col-xs-12']) !!}
                    <div class="col-md-6 col-sm-9 col-xs-12">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'E-mail:', ['class' => 'control-label col-md-2 col-sm-3 col-xs-12']) !!}
                    <div class="col-md-6 col-sm-9 col-xs-12">
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Senha:', ['class' => 'control-label col-md-2 col-sm-3 col-xs-12']) !!}
                    <div class="col-md-6 col-sm-9 col-xs-12">
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Senha']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Repita senha:', ['class' => 'control-label col-md-2 col-sm-3 col-xs-12']) !!}
                    <div class="col-md-6 col-sm-9 col-xs-12">
                        {!! Form::password('passwd', ['class' => 'form-control', 'placeholder' => 'Repita senha']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('class', 'Classe:', ['class' => 'control-label col-md-2 col-sm-3 col-xs-12']) !!}
                    <div class="col-md-6 col-sm-9 col-xs-12">
                        {!! Form::select('class', ['admin' => 'Admin', 'user' => 'Usuário'], ['class' => 'form-control']) !!}
                    </div>
                </div>

                {!! Form::submit('Adicionar', ['class' => 'btn btn-rounded btn-success']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
