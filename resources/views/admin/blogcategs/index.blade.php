@extends('admin.layout.main')

@section('content')

    <div class="row">
        <div class="col-sm-7">
            <div class="white-box">
                <h3 class="box-title">Categorias</h3>
                <p class="text-muted">Todas as categorias</p>

                @include('flash::message')
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Uso em blogs</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categs as $categ)
                            <tr>
                                <td>{{ $categ->id }}</td>
                                <td>{{ $categ->name }}</td>
                                <td>
                                    <span class="label label-warning">
                                        @if($categ->blogs->count() <= 9)
                                            0{{ $categ->blogs->count() }}
                                        @else
                                            {{ $categ->blogs->count() }}
                                        @endif
                                    </span>
                                </td>

                                <td class="text-nowrap">
                                    <div class="row">
                                        <a href="#" data-toggle="modal" data-original-title="Editar" data-target="#modal-{{ $categ->id }}"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                        {!! Form::open(['url' => 'dashboard/blogcategs/' . $categ->id, 'method' => 'DELETE']) !!}
                                        <a href="#" onclick="$(this).closest('form').submit();"> <i class="fa fa-close text-danger"></i> </a>
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="4">Sem categorias no momento</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @foreach($categs as $categ)
            <!-- .modal -->
            <div id="modal-{{ $categ->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Editar categoria</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(['url' => 'dashboard/blogcategs/' . $categ->id, 'method' => 'PUT']) !!}
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nome:</label>
                                <input type="text" class="form-control" name="name" value="{{ $categ->name }}" id="recipient-name">
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
                <h3 class="box-title">Categorias</h3>
                <p class="text-muted">Adicionar categoria</p>
                @include('admin.layout.errors')
                <br />
                {!! Form::open(['url' => 'dashboard/blogcategs', 'class' => 'form-horizontal form-label-left']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Categoria:', ['class' => 'control-label col-md-2 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-9 col-xs-12">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
                        </div>
                        {!! Form::submit('Adicionar', ['class' => 'btn btn-rounded btn-success']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
