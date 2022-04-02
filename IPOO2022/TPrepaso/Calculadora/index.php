<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calculadora</title>
        <link href="estilos/Pace/pace-theme-minimal.css" rel="stylesheet" type="text/css"/>
        <link href="estilos/AnimateCSS/animate.css" rel="stylesheet" type="text/css"/>
        <link href="estilos/fontAwesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="estilos/Bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>        
        <header class="jumbotron text-center">
            <h1>Calculadora b&aacute;sica orientada a objetos</h1>
        </header>
        <aside>
            <div class="container">
                <div class="col-sm-8">
                    <form action="" method="POST">
                        <div class="form-group">
                            <div class="col-sm-3">
                                Numero 1:
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="n1" class="form-control" placeholder="48">
                            </div>
                        </div>
                        <div class="clearfix"></div><br>
                        <div class="form-group">
                            <div class="col-sm-3">
                                Numero 2:
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="n2" class="form-control" placeholder="12">
                            </div>
                        </div>
                        <div class="clearfix"></div><br>
                        <div class="form-group text-center">
                            <div class="col-sm-3">
                                <button type="submit" name="sumar" class="btn btn-danger">Sumar</button>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" name="restar" class="btn btn-info">Restar</button>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" name="multiplicar" class="btn btn-warning">Multiplicar</button>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" name="dividir" class="btn btn-success">Dividir</button>
                            </div>                            
                        </div>
                    </form>
                </div>
                <div class="col-sm-4 text-center">
                    <h2>Resultado:</h2>
                    <?php
                    include 'Calculadora.php';
                    $calculadora = new Calculadora();
                    if (isset($_POST['sumar']) | isset($_POST['restar']) | isset($_POST['multiplicar']) | isset($_POST['dividir'])) {
                        $calculadora->setNumero1($_POST['n1']);
                        $calculadora->setNumero2($_POST['n2']);
                        if (isset($_POST['sumar'])) {
                            $calculadora->Sumar();
                        } elseif (isset($_POST['restar'])) {
                            $calculadora->Restar();
                        } elseif (isset($_POST['multiplicar'])) {
                            $calculadora->Multiplicar();
                        } elseif (isset($_POST['dividir'])) {
                            $calculadora->Dividir();
                        }
                    }
                    ?>
                </div>
            </div>
        </aside>
        <footer class="text-center text-info navbar-fixed-bottom">
            Hecho por Erick
        </footer>   
        <script src="estilos/Pace/pace.min.js" type="text/javascript"></script>
        <script src="estilos/Bootstrap/js/jquery.min.js" type="text/javascript"></script>
        <script src="etilos/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>