<?php 
	require_once('functions.php');

	view($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Detalhes</h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>Nome:</dt>
	<dd><?php echo $tag['NOME_TAG']; ?></dd>

	<dt>Id Área:</dt>
	<dd><?php echo $tag['ID_AREA']; ?></dd>

</dl>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $tag['ID']; ?>" class="btn btn-primary">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>