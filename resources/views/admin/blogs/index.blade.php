@extends('admin.layout.main')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Blogs</h3>
                <div class="form-inline padding-bottom-15">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <a href="{{ url('dashboard/blogs/create') }}" class="btn btn-outline btn-primary btn-sm">Add new</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Views</th>
                                <th>Título</th>
                                <th>Criado em</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($blogs as $blog)
                            <tr>
                                <td>{{ $blog->id }}</td>
                                <td>{{ $blog->views }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->created_at->format('d-m-Y') }}</td>
                                <td class="text-nowrap">
                                    <div class="row">
                                        <a href="{{ url('dashboard/blogs/' . $blog->id . '/edit') }}" data-toggle="tooltip" data-original-title="Editar"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>

                                        {!! Form::open(['url' => 'dashboard/blogs/' . $blog->id, 'method' => 'DELETE']) !!}
                                        <a href="#" data-toggle="tooltip" data-original-title="Deletar" onclick="$(this).closest('form').submit();"> <i class="fa fa-close text-danger"></i> </a>
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="5">Sem blogs no momento</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $blogs->links() }}
            </div>
        </div>
    </div>

@endsection
