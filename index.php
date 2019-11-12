<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CIATRI R.L.</title>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/pages/login-register-lock.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/colors/default-dark.css" id="theme" rel="stylesheet">
    <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Ciatri</p>
        </div>
    </div>
    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="Frm_Ingresar">
                    <a class="text-center db"><img width="250px" src="assets/images/background/logo-icon.jpg" alt="Home" /><br/></a>
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" id="Usuario" placeholder="Usuario">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" id="Password" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" id="Btn_Ingresar" type="button">Ingresar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        $("#Btn_Ingresar").click(function() {

            if($('#Frm_Ingresar')[0].checkValidity())
            {
                $.ajax({
                        url: 'fnc/ValidarUsuario.php',
                        type: 'post',
                        data: 'Usuario='+$('#Usuario').val()+'&Password='+$('#Password').val(),
                        success: function (data) {
                            datos = JSON.parse(data);

                            if(datos["Respuesta"] == 'OK')
                            {
                                window.location.href = "main/Noticias/Consulta_Noticias.php";
                            }
                            else
                            {
                                swal(
                                    datos["Mensaje"]
                                );
                            }
                        }
                    });
            }
            else
            {
                swal(
                    'Debe llenar todos los campos'
                );
            }
        });

    </script>
    
</body>

</html>