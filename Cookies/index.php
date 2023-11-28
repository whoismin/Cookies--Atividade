<?php
include 'Cookies.php';

$usuarioAtual = getUsuarioCookie();

$usuarioLogado = ($usuarioAtual !== null);
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>Cookie Constent Box | CodingNepal</title>
  <link rel="stylesheet" href="style.css">
 </head>
<body>
<?php if ($usuarioLogado) : ?>
                <p class="Txt">Bem-vindo de volta, <?= $usuarioAtual ?>!</p>
            <?php else : ?>
                <p class="Txt">Bem-vindo pela primeira vez!</p>
            <?php endif; ?>
  <div class="wrapper">
    <img src="cookie.png" alt="">
    <div class="content">
      <header>Cookies Consent</header>
      <form method="post" action="index.php">
                <label for="usuario">Usuário:</label>
                <input type="text" id="usuario" name="usuario" value="<?= $usuarioAtual ?>">
                <br>
                <div class="buttons">
                <?php if ($usuarioLogado) : ?>
                    <button class="item" type="submit" name="definirCookie">Editar Cookie</button>
                <?php else : ?>
                    <button class="item" type="submit" name="definirCookie">Definir Cookie</button>
                <?php endif; ?>
            </form>
            <form method="post" action="index.php">
                <?php if ($usuarioLogado) : ?>
                    <button class="item" type="submit" name="excluirCookie">Excluir </button>
                <?php endif; ?>
         </div>
    </div>
  </div>
  <script>
    const cookieBox = document.querySelector(".wrapper"),
    acceptBtn = cookieBox.querySelector("button");

    acceptBtn.onclick = ()=>{
      //setting cookie for 1 month, after one month it'll be expired automatically
      document.cookie = "CookieBy=CodingNepal; max-age="+60*60*24*30;
      if(document.cookie){ //if cookie is set
        cookieBox.classList.add("hide"); //hide cookie box
      }else{ //if cookie not set then alert an error
        alert("Cookie can't be set! Please unblock this site from the cookie setting of your browser.");
      }
    }
    let checkCookie = document.cookie.indexOf("CookieBy=CodingNepal"); //checking our cookie
    //if cookie is set then hide the cookie box else show it
    checkCookie != -1 ? cookieBox.classList.add("hide") : cookieBox.classList.remove("hide");
  </script>
</body>
</html>
