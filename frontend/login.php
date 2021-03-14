<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="2.css">
    <title>Trash code</title>
</head>
<body>
    <div class="container-sec">
        <h1 class="section"><?php
                if(isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
        </h1>
    </div>
    <form class="box" action="../showuser.php" method="POST">
        <h1>Login</h1>

        <input type="email" name="email" placeholder="Email" required maxlength="100"/>
        <input type="password" name="password" placeholder="Password" required/>
        <input type="submit" name="clickbutton" value="Acessar">

        <p class="link">Não tem conta? <a href="register.php">cadastre-se</a></p>      
    </form>

</body>
</html>