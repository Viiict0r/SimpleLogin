<?php
session_start();

/*
 * Verifica se o usuário está logado.
 */
if (!isset($_SESSION['user'], $_SESSION['password'])) {
    header("Location: index.php");
    die;
}
/*
 * Verifica se o usuário clicou no link "Sair".
 */
if (isset($_GET['a']) && !empty($_GET['a'])) {
    $a = $_GET['a'];
    if ($a == "logout") {
        session_destroy();
        header("Location: index.php");
        die;
    }
}

?>
<h1>Página administrativa.</h1>
<h2>Olá <?php echo $_SESSION['user']; ?>!</h2>
<a href="?a=logout">Sair</a>
