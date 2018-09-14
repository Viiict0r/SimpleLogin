<?php
session_start();
require "UserLogin.php";

/*
 * Verificando e validando os dados informados no formulário de login.
 */
$msg = null;
if (isset($_POST['user'], $_POST['password']) && !empty($_POST['user']) && !empty($_POST['password'])) {

    $user = addslashes($_POST['user']);
    $password = addslashes($_POST['password']);

    $login = new UserLogin();
    if ($login->valid($user, $password)) {
        $_SESSION['user'] = $user;
        $_SESSION['password'] = $password;
        header("Location: admin.php");
        die;
    } else {
        $msg = "Usuário ou senha inválidos.";
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Página de Login</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    </head>
    <body>
        <?php
            /*
             * Verifica se possui alguma mensagem de erro.
             */
            if ($msg != null) {
                echo $msg . "<br/>";
            }
        ?>
        <div class="form">
            <form method="POST">
                Usuário:<br/>
                <input type="text" required name="user"><br/>
                Senha:<br/>
                <input type="password" required name="password"><br/><br/>
                <input type="submit" value="Login">
            </form>
        </div>
    </body>
</html>
