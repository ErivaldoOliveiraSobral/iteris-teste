<?php 
	require_once('functions.php'); 
	buscaNumero($_GET['numero']);

?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Nota <?php echo $nota['id']; ?></h2>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>Número:</dt>
	<dd><?=$nota['numero']?></dd>

	<dt>Descrição:</dt>
	<dd><?=$nota['descricao']?></dd>

	<dt>Data de Faturamento:</dt>
	<dd><?=$nota['dataFaturamento']?></dd>

	<dt>Data de Pagamento:</dt>
	<dd><?=$nota['dataPagamento']?></dd>

	<dt>Status:</dt>
	<dd><?=$nota['status']?></dd>
</dl>
</hr>


<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?=$nota['id']?>" class="btn btn-primary">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>
<?php include(FOOTER_TEMPLATE); ?>