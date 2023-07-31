<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Site usando pyhon</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.7.1/socket.io.js" integrity="sha512-Z6C1p1NIexPj5MsVUunW4pg7uMX6/TT3CUVldmjXx2kpip1eZcrAnxIusDxyFIikyM9A61zOVNgvLr/TGudOQg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- conexão com uma página de estilo css -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

    <?php
    echo __FILE__;
    ?>
    <header class="top-bar">
        <h1>Site com python</h1>
        <h6>Bem vindo ao chat usando python para mandar mensagens entre computadores em uma mesma rede em
            tempo de execução</h6>
    </header>

    <!-- div centralizada -->
    <div class="container">
        <div id="lista_mensagens">
            adadasdadadasd
            <p>Olá, insira um nome de usuário e digite uma mensagem para envia-la</p>
        </div>

    </div>

    <!-- barra onde é colocado o nome de usuário/input da mensagem e o botão de enviar -->
    <div class="barra_msg" id="inputs">
        <input type="text" class="input_txt" id="usuario" required placeholder="Usuário">
        <input type="text" class="input_txt" id="mensagem" required placeholder="Digite uma mensagem">
        <button id="botao">Enviar</button>

    </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        var socket = io("localhost:5000");

        socket.on("connect", function() {
            console.log("Usuário conectou")
        });

        socket.on("message", function(data) {
            console.log("Mensagem enviada");
            $('#lista_mensagens').append($("<p>").text(data));
        });

        $("#botao").on("click", function() {
            console.log("Clicou no botão");
            socket.send($("#usuario").val() + ": " + $("#mensagem").val())
            $("#mensagem").val("")
        });

        // alert("Carreguei")
    });
</script>

</html>