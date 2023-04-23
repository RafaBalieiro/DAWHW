<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela de Cadastro</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">

    <form class="register-form" action="../5. Meus Produtos/myproducts.php" method="post">
      <h2>Criar conta</h2>
      <span>Já tenho uma conta? <a href="../1. Login/login.html" class="already-login">Login</a></span>
      <br><br>
      <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" placeholder="Digite seu e-mail" required>
      </div>

      <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" placeholder="Digite seu nome" required>
      </div>

      <div class="form-group">
        <label for="password">Senha: </label>
        <input type="password" name="password" id="password" placeholder="Digite sua senha" required>
      </div>

      <div class="form-group">
        <label for="password">Confirme a senha: </label>
        <input type="password" name="confirm-password" id="confirm-password" placeholder="Digite sua senha novamente"
          required>
        <input type="number" style="display:none" value=1 id="isRegister" name="isRegister">
      </div>

      <button onClick={insertUsuario()} type="submit">Cadastrar</button>

    </form>
  </div>

  <script src="register.js"></script>
</body>

</html>
