@extends('admin.layout.main')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Usuários</h3>
                <p class="text-muted">Todas os usuários</p>
                <div class="form-inline padding-bottom-15">
                    <div class="row">
                        <div class="col-sm-6">
                            @permission('createusers')
                            <div class="form-group">
                                <a href="{{ url('dashboard/users/create') }}" class="btn btn-outline btn-primary btn-sm">Add new</a>
                            </div>
                            @endpermission
                        </div>
                    </div>
                </div>

                @include('flash::message')
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Perfil</th>
                            <th>Opções</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><span class="label label-success">{{ ucfirst($user->class) }}</span></td>
                                <td class="text-nowrap">
                                    <div class="row">
                                        @permission('editusers')
                                            @if($user->id == \Auth::user()->id)
                                                <a href="{{ url('dashboard/profile') }}" data-toggle="tooltip" data-original-title="Editar"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                            @else
                                                <a href="{{ url('dashboard/users/' . $user->id . '/edit') }}" data-toggle="tooltip" data-original-title="Editar"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                            @endif
                                        @endpermission

                                        @permission('deleteusers')
                                            {!! Form::open(['url' => 'dashboard/users/' . $user->id, 'method' => 'DELETE']) !!}
                                            <a href="#" onclick="$(this).closest('form').submit();" data-toggle="tooltip" data-original-title="Deletar"> <i class="fa fa-close text-danger"></i> </a>
                                            {!! Form::close() !!}
                                        @endpermission
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
