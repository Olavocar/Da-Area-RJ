
<?php require_once "controlleruserdata.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br"> <!-- Alteração para Português -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar uma Nova Senha</title> <!-- Título em Português -->
    <link rel="stylesheet" href="estilo.css">
    <link href="favicon_io/favicon-16x16.png" rel="icon"> <!-- Correção na tag link -->
</head>
<body id="bg">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="controlleruserdata.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Nova Senha</h2> <!-- Título em Português -->
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        Crie uma nova senha <!-- Tradução -->
                        <input class="form-control" type="password" name="password" placeholder="Criar nova senha" required> <!-- Tradução -->
                    </div>
                    <div class="form-group">
                        Confirme sua nova senha <!-- Tradução -->
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirme sua senha" required> <!-- Tradução -->
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="change-password" value="Alterar"> <!-- Tradução -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>