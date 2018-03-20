@extends('admin.layout.main')

@section('content')

    <div class="row">
        <div class="col-sm-7">
            <div class="white-box">
                <h3 class="box-title">Permissões</h3>
                <p class="text-muted">Adicionar permissões</p>
                @include('admin.layout.errors')
                <br />
                {!! Form::open(['url' => 'dashboard/perms', 'class' => 'form-horizontal']) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Nome:', ['class' => 'col-md-7']) !!}
                        <div class="col-md-7">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('display_name', 'Descrição:', ['class' => 'col-md-7']) !!}
                        <div class="col-md-7">
                            {!! Form::text('display_name', null, ['class' => 'form-control', 'placeholder' => 'Descrição']) !!}
                        </div>
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

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Permissões</h3>
                <p class="text-muted">Todas as permissões</p>
                @include('flash::message')
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Opções</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($perms as $perm)
                            <tr>
                                <td>{{ $perm->id }}</td>
                                <td>{{ $perm->name }}</td>
                                <td>{{ $perm->display_name }}</td>

                                <td class="text-nowrap">
                                    <div class="row">
                                        <a href="#" data-toggle="modal" data-original-title="Editar" data-target="#modal-{{ $perm->id }}"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>

                                        {!! Form::open(['url' => 'dashboard/perms/' . $perm->id, 'method' => 'DELETE']) !!}
                                        <a href="#" data-toggle="tooltip" data-original-title="Deletar" onclick="$(this).closest('form').submit();"> <i class="fa fa-close text-danger"></i> </a>
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="5">Sem regras no momento</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @foreach($perms as $perm)
            <!-- .modal -->
            <div id="modal-{{ $perm->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Editar permissão</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(['url' => 'dashboard/perms/' . $perm->id, 'method' => 'PUT']) !!}
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nome:</label>
                                <input type="text" class="form-control" name="name" value="{{ $perm->name }}" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="display_name" class="control-label">Descrição:</label>
                                <input type="text" class="form-control" name="display_name" value="{{ $perm->display_name }}" id="recipient-name">
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
    </div>

@endsection