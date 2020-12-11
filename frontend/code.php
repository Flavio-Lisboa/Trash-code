<?php 
    session_start();
    if(!empty($_SESSION['id'])) {
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="code.css">
    <link rel="stylesheet" href="header.css">
    <title>Trash code</title>
</head>
<body>

    <div class="container">
        <header class="header">
            <p class="logo" onclick="window.location='code.php'">Trash code</p>
            <div class="content-right">
                <span class="mycode" onclick="window.location='mycode.php'"> Meus códigos</span>
                <a class="exit" href="../exit.php">Sair</a>
            </div>
        </header>
        
        <div class="content">
            <form class="box" action="../insertcode.php" method="POST">
                <div class="box_msg">
                    <p class="msg">
                        <?php 
                            if(isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        } ?>
                    </p>
                </div>
                <h1>Code</h1>

                <input type="text" name="code_title" class="title" placeholder="  Título" maxlength="40"/>
                <textarea type="text" class="code" name="code" placeholder=" Digite ou cole seu código aqui" required maxlength="4000"></textarea>
                <button type="submit" name="clickbutton" class="button">Salvar código</button>
                
            </form>
        </div>
        
    </div>

</body>
</html>

<?php } else {
    $_SESSION['msg'] = "Faça login para acessar sua conta!";
    header('location: login.php');
} ?>