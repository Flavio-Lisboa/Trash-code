<?php 
    session_start();

    if(!empty($_SESSION['id'])) {

    require_once "../showcode.php";
    $codes = $code->getCode($_SESSION['id']);

    function showNote($codeId, $codeTitle,$codeContent,$codeDate) {
        echo "  <div class='code'>";
        echo "      <div class='show-code'>";
        echo "          <div class='content2'>";
        echo "              <p class='data'>Data: $codeDate </p>";
        echo "              <p class='title'>Título: $codeTitle</p>";
        echo "              <textarea class='code_content' disabled > Conteúdo:  $codeContent </textarea>";
        echo "          </div>";
        echo "          <form action='../edit_del_code.php' method='POST' class='button2'>";                  
        echo "              <button type='submit' name='btdel' class='bt2' value='". $codeId ."'>Excluir</button>";
        echo "          </form>";
        echo "      </div>";
        echo "  </div>";
    }
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mycode.css">
    <link rel="stylesheet" href="header.css">
    <title>Trash code</title>
</head>
<body>
   
    <div class="container">
        <header class="header">
            <p class="logo" onclick="window.location='code.php'">Trash code</p>
            <div class="content-right">
                <span class="mycode" onclick="window.location='mycode.php'">Meus códigos</span>
                <a class="exit" href="../exit.php">Sair</a>
            </div>
          </header>

        <?php  

            foreach ($codes as $code) {
                $codeId = $code->id_code;
                $codeTitle = $code->title;
                $codeContent = $code->content;
                $codeDate = $code->code_date;

                echo showNote($codeId, $codeTitle,$codeContent,$codeDate);
            }
        ?>
    </div>
</body>
</html>

<?php } else {
    $_SESSION['msg'] = "Faça login para acessar sua conta!";
    header('location: login.php');
} ?>