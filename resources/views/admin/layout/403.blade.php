<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ asset('admin/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/vendors/bootstrap-extension/css/bootstrap-extension.css') }}" rel="stylesheet">
        <!-- animation CSS -->
        <link href="{{ asset('admin/css/animate.css') }}" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
        <!-- color CSS -->
        <link href="{{ asset('admin/css/colors/default.css') }}" id="theme" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
<body>

    <!-- Preloader -->
    <section id="wrapper" class="error-page">
        <div class="error-box">
            <div class="error-body text-center">
                <h1>403</h1>
                <h3 class="text-uppercase">Erro. Acesso Negado</h3>
                <p class="text-muted m-t-30 m-b-30 text-uppercase">Você não tem permissão para acessar essa página.</p>
                <a href="{{ url('dashboard') }}" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Voltar para início</a> </div>
            <footer class="footer text-center">Copyright - {{ date('Y') }}</footer>
        </div>
    </section>

</body>
</html>
