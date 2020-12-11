<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="2.css">
    <title>Code</title>
</head>
<body>

    <div class="container-sec">
        <h4 class="section">
            <?php
                if(isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
        </h4>
    </div>
    <form class="box" action="../insertuser.php" method="POST">
        <h1>Register</h1>

        <input type="email" name="email" placeholder="Email" required maxlength="100"/>
        <input type="password" name="password" placeholder="Password" required maxlength="20" minlength="7"/>
        <!-- <input type="password" name="password" placeholder="Confirmar Password" required maxlength="20" minlength="8"/> -->
        <input type="submit" name="clickbutton" value="Cadastrar" />

        <p class="link">Já tem cadastro? <a href="login.php">Entrar</a></p>
    </form>
    
</body>
</html>


