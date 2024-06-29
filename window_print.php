<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo Gerado</title>
    <link rel="stylesheet" href="stylesphp.css">  
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>  
    <script type="text/javascript">
        function imprimir() {
            window.print();
        }   
    </script>   
</head>
<body>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = htmlspecialchars($_POST['nome']);
        $nascimento = htmlspecialchars($_POST['nascimento']);
        $email = htmlspecialchars($_POST['email']);
        $telefone = htmlspecialchars($_POST['telefone']);
        $endereco = htmlspecialchars($_POST['endereco']);
        $escolaridade = htmlspecialchars($_POST['escolaridade']);
        $empresa = htmlspecialchars($_POST['empresa']);
        $cargo = htmlspecialchars($_POST['cargo']);
        $periodo = htmlspecialchars($_POST['periodo']);
        // Função para calcular a idade
        function calcularIdade($data_nascimento) {
            $data_nascimento = new DateTime($data_nascimento);
            $hoje = new DateTime();
            $idade = $hoje->diff($data_nascimento);
            return $idade->y;
        }
        $idade = calcularIdade($nascimento);

        echo "<h2><p><strong></strong> $nome</p></h2>";
        echo "<hr class=\"sep\">";
        echo "<h2>Dados Pessoais</h2>";
        echo "<p><strong>Data de Nascimento</strong> $nascimento</p>";
        echo "<p><strong>Idade:</strong> $idade anos</p>";
        echo "<p><strong>Telefone:</strong> $telefone</p>";
        echo "<p><strong>E-Mail:</strong> $email</p>";
        echo "<p><strong>Endereço:</strong> $endereco</p>";
        echo "<hr class=\"sep\">";
        echo "<h2>Formação ou Escolaridade</h2>";  
        echo "<p><strong>Escolaridade:</strong> $escolaridade</p>";

        if (isset($_POST['enviado']) && is_array($_POST['enviado'])) {
            echo "<hr class=\"sep\">";
            echo "<h2>Informações Adicionais</h2>";
            foreach ($_POST['enviado'] as $info) {
                echo "<p>" . htmlspecialchars($info) . "</p>";
            }
        }   

        echo "<hr class=\"sep\">";
        echo "<h2>Histórico Profissional</h2>";
        echo "<p><strong>Empresa:</strong> $empresa</p>";
        echo "<p><strong>Cargo:</strong> $cargo</p>";
        echo "<p><strong>Período:</strong> $periodo</p>";
    }
    ?>
    <div class="no-print">
        <input type="submit" onclick="imprimir()" value="Imprimir">
    </div>
</body> 
</html> <
