@extends('admin.layout.main')

@section('content')

    <div class="row">
        <div class="col-md-4 col-xs-12">
            <div class="white-box">
                <div class="user-bg">
                    @if($user->avatar == null)
                        <img src="{{ asset('uploads/user/default_avatar.jpg') }}" alt="Avatar" width="100%">
                    @else
                        <img src="{{ asset('uploads/user/' . $user->avatar) }}" alt="Avatar" width="100%">
                    @endif
                    <div class="overlay-box">
                        <div class="user-content">
                            <a href="javascript:void(0)">
                                @if($user->avatar == null)
                                    <img src="{{ asset('uploads/user/default_avatar.jpg') }}" class="thumb-lg img-circle" alt="Avatar">
                                @else
                                    <img src="{{ asset('uploads/user/' . $user->avatar) }}" class="thumb-lg img-circle" alt="Avatar">
                                @endif
                            </a>
                            <h4 class="text-white">{{ $user->name }}</h4>
                            <h5 class="text-white">{{ $user->email }}</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-8 col-xs-12">
            @include('flash::message')
            @include('admin.layout.errors')
            <div class="white-box">
                <ul class="nav customtab nav-tabs" role="tablist">
                    <li role="presentation" class="nav-item"><a href="#profile" class="nav-link active" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Perfil</span></a></li>
                    <li role="presentation" class="nav-item"><a href="#settings" class="nav-link" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-pencil"></i></span> <span class="hidden-xs">Alterar perfil</span></a></li>
                    <li role="presentation" class="nav-item"><a href="#password" class="nav-link" aria-controls="password" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-lock"></i></span> <span class="hidden-xs">Alterar senha</span></a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Nome</strong>
                                <br>
                                <p class="text-muted">{{ $user->name }}</p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>E-mail</strong>
                                <br>
                                <p class="text-muted">{{ $user->email }}</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong></strong>
                                <br>
                                <p class="text-muted"></p>
                            </div>
                        </div>
                        <hr>
                        <strong>Descrição</strong> <br />
                        {{ $user->description }}
                    </div>

                    <div class="tab-pane" id="settings">
                        {!! Form::model($user, ['url' => 'dashboard/profileupd', 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal form-material']) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'Nome', ['class' => 'col-md-12']) !!}
                                <div class="col-md-12">
                                    {!! Form::text('name', null, ['class' => 'form-control form-control-line']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', 'Email', ['class' => 'col-md-12']) !!}
                                <div class="col-md-12">
                                    {!! Form::email('email', null, ['class' => 'form-control form-control-line']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('description', 'Descrição', ['class' => 'col-md-12']) !!}
                                <div class="col-md-12">
                                    {!! Form::textarea('description', null, ['class' => 'form-control form-control-line', 'rows' => 5]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('avatar', 'Avatar', ['class' => 'col-md-12']) !!}
                                <div class="col-md-12">
                                    {!! Form::file('avatar') !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <img src="" id="img" height="200px">
                                </div>
                                <p style="color:red;">Tamanho recomendado da imagem. MAX: 2MB<p>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    {!! Form::submit('Atualizar perfil', ['class' => 'btn btn-success']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>

                    <div class="tab-pane" id="password">
                        {!! Form::open(['url' => 'dashboard/passupd', 'method' => 'PUT', 'class' => 'form-horizontal form-material']) !!}

                            <div class="form-group">
                                {!! Form::label('password', 'Senha', ['class' => 'col-md-12']) !!}
                                <div class="col-md-12">
                                    {!! Form::password('password', ['class' => 'form-control form-control-line']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('passwd', 'Nova Senha', ['class' => 'col-md-12']) !!}
                                <div class="col-md-12">
                                    {!! Form::password('passwd', ['class' => 'form-control form-control-line']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    {!! Form::submit('Atualizar senha', ['class' => 'btn btn-success']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript">
        //Imagem principal
        $("#avatar").change(function () {
            readURL(this);
        });
        //Imagem principal
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#img").attr("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection