<?php require_once "controlleruserdata.php"; ?>
<!-- registro.html -->
<!DOCTYPE html>
<html>
<head>
    <link href=favicon_io/favicon-16x16.png rel=icon>
    <link href=estilo.css rel=stylesheet>
    <title>Cadastro e Login</title>
</head>
<body id=bg>

<h2>Cadastro</h2>
<form action="cadastro.php" method="post">
    Nome: <input type="text" name="nome"><br>
    Sobrenome: <input type="text" name="sobrenome"><br>
    Email: <input type="email" name="email"><br>
    Senha: <input type="password" name="senha"><br>
    Confirmação de Senha: <input type="password" name="csenha"><br>
    Telefone: <input type="text" name="telefone"><br>
    Data de Nasc.: <input type="date" name="data_nasc">
    Estado: <input type="text" name="estado"><br>
    <input type="submit" value="Cadastrar">
</form>

<hr>

<h2>Login</h2>
<form action="login.php" method="post">
    Email: <input type="email" name="email"><br>
    Senha: <input type="password" name="senha"><br>
    <input type="submit" value="Entrar">
</form>

</body>
</html>
```

### Parte PHP (Cadastro e Login)
```php
<!-- cadastro.php -->
<?php
// Conexão com o banco de dados (substitua pelos seus próprios detalhes)
$host = "db4free.net:3306";
$usuario = "volaodarj";
$senha_bd = "26ec018b";
$banco = "daarerj";

$con = new mysqli($host, $usuario, $senha_bd, $banco);

// Verifica conexão
if ($con->connect_error) {
    die("Erro de conexão: " . $con->connect_error);
}

// Coletando dados do formulário
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmaSenha = $_POST['csenha'];
$telefone = $_POST['telefone'];
$data_nasc = $_POST['data_nasc'];
$estado = $_POST['estado'];

// Verificando se as senhas coincidem
if ($senha !== $confirmaSenha) {
    die("As senhas não coincidem. Por favor, tente novamente.");
}

// Inserindo dados no banco de dados
$sql = "INSERT INTO cadastro (nome, sobrenome, email, senha, telefone, data_nasc, estado) VALUES ('$nome', '$sobrenome', '$email', '$senha','$telefone', '$data_nasc', '$estado')";

if ($con->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $con->error;
}

$con->close();
?>
```

```php
<!-- login.php -->
<?php
// Conexão com o banco de dados (mesmo código do cadastro.php)

// Coletando dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Verificando no banco de dados se o usuário existe
$sql = "SELECT * FROM cadastro WHERE email = '$email' AND senha = '$senha'";
$result = $con->query($sql);

// ... (seu código de conexão e processamento)

if ($result->num_rows > 0) {
    // Usuário autenticado com sucesso
    echo "Login bem-sucedido!";
    // Redirecionamento após o login
    header("Location: home.php"); // Redireciona para a página do dashboard após o login
    exit();
} else {
    echo "Email ou senha incorretos. Tente novamente.";
}

$con->close();

?>