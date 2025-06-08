<?php
// Configurar a conexão com o banco de dados
$host = 'mysql'; // ou 'db' se for em Docker
$db   = 'calculadora_db';     // nome do banco de dados
$user = 'root';
$pass = 'rootpassword';     // substitua pela senha correta
//senha
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

// Buscar todos os registros
$sql = "SELECT * FROM calculos ORDER BY data_hora_do_calculo DESC";
$stmt = $pdo->query($sql);
$registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Todos os Cálculos</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { padding: 8px; border: 1px solid #ccc; text-align: center; }
        .aprovado { color: green; font-weight: bold; }
        .reprovado { color: red; font-weight: bold; }

        body{
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h2>Relatório de Todos os Cálculos</h2>
    <table>
        <thead>
            <tr>
                <th>Data/Hora</th>
                <th>Nota do Semestre</th>
                <th>Nota da Prova Final</th>
                <th>Nota Final</th>
                <th>Situação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registros as $row): ?>
                <tr>
                    <td><?= $row['data_hora_do_calculo'] ?></td>
                    <td><?= $row['nota_semestre'] ?></td>
                    <td><?= $row['nota_prova_final'] ?></td>
                    <td><?= $row['nota_final'] ?></td>
                    <td class="<?= strtolower($row['situacao']) ?>"><?= $row['situacao'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="index.php">Voltar para Calculadora</a>
</body>
</html>
