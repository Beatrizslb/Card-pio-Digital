<?php
require 'config.inc.php';

// Contadores
$sqlClientes = "SELECT COUNT(*) AS total FROM clientes";
$totalClientes = mysqli_fetch_assoc(mysqli_query($conexao, $sqlClientes))['total'];

$sqlProdutos = "SELECT COUNT(*) AS total FROM produtos";
$totalProdutos = mysqli_fetch_assoc(mysqli_query($conexao, $sqlProdutos))['total'];

// Gráfico de produtos por categoria
$sqlCategorias = "SELECT categoria, COUNT(*) AS qtd FROM produtos GROUP BY categoria";
$resultCategorias = mysqli_query($conexao, $sqlCategorias);
$categorias = [];
$quantidades = [];

while ($row = mysqli_fetch_assoc($resultCategorias)) {
    $categorias[] = $row['categoria'];
    $quantidades[] = $row['qtd'];
}
?>

<h2 style="color:#8B4513;">
  <img src="uploads/icons/grafico-de-barras.png" alt="grafico" width="24" height="24" style="margin-right: 4px;">
  Visão Geral
</h2>

<div style="display:flex; gap:20px; margin:20px 0; flex-wrap:wrap;">
  <div style="flex:1; min-width:200px; background:#8B4513; color:white; padding:20px; border-radius:10px; text-align:center;">
    <h3>Clientes</h3>
    <p style="font-size:2em; margin:0;"><?= $totalClientes ?></p>
  </div>

  <div style="flex:1; min-width:200px; background:#D2691E; color:white; padding:20px; border-radius:10px; text-align:center;">
    <h3>Produtos</h3>
    <p style="font-size:2em; margin:0;"><?= $totalProdutos ?></p>
  </div>
</div>

<section style="max-width:600px; margin: 0 auto 40px auto;">
  <canvas id="graficoCategorias"></canvas>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('graficoCategorias').getContext('2d');
new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?= json_encode($categorias) ?>,
    datasets: [{
      label: 'Produtos por categoria',
      data: <?= json_encode($quantidades) ?>,
      backgroundColor: ['#D2691E', '#CD853F', '#FFB84D', '#8B4513'],
      borderWidth: 1
    }]
  },
  options: {
    plugins: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Distribuição de Produtos por Categoria',
        color: '#8B4513',
        font: { size: 16, weight: 'bold' }
      }
    },
    scales: {
      y: { beginAtZero: true }
    }
  }
});
</script>
