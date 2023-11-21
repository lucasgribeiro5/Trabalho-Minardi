<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idCarro = isset($_POST['idCarro']) ? intval($_POST['idCarro']) : 0;
    $acao = isset($_POST['acao']) ? $_POST['acao'] : '';

    if ($idCarro <= 0 || empty($acao)) {
        echo "ID do item e ação são obrigatórios.";
        exit();
    }

    $idCarro = mysqli_real_escape_string($conexao, $idCarro);
    $acao = mysqli_real_escape_string($conexao, $acao);

    if ($acao === 'liberar') {
        $sql = "UPDATE carros SET stt = 'liberado' WHERE id = $idCarro";
    } elseif ($acao === 'suspender') {
        $sql = "UPDATE carros SET stt = 'suspenso' WHERE id = $idCarro";
    }

    $result = mysqli_query($conexao, $sql);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao realizar ação.";
    }
} else {
    echo "Método de requisição inválido.";
}

$conexao->close();
?>
