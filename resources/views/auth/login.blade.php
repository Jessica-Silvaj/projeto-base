<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Login</title>
</head>

<body>
    {{-- <section class="material-half-bg">
      <div class="cover"></div>
    </section> --}}
    <section class="login-content">
        <div class="logo">
            <h1>LOGO</h1>
        </div>
        <div class="login-box">
            <form class="login-form" action="{{ route('login.authentication')}}" method="POST">
                @csrf
                <h3 class="login-head"><i class="bi bi-person me-2"></i>ENTRAR</h3>
                <div class="mb-3">
                    <label class="form-label">Matricula</label>
                    <input class="form-control" name="cod_matricula" type="text" placeholder="Matricula" autofocus required />
                </div>
                <div class="mb-3">
                    <label class="form-label">SENHA</label>
                    <input class="form-control" name="senha" type="password" placeholder="Senha" required>
                </div>
                <div class="mb-3 btn-container d-grid">
                    <button class="btn btn-primary btn-block"><i
                            class="bi bi-box-arrow-in-right me-2 fs-5"></i>ENTRAR</button>
                </div>
            </form>
        </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
