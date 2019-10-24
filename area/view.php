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
	<dd><?php echo $area['NOME_AREA']; ?></dd>

	<dt>Tag:</dt>
	<dd>
		<?php view_fk($area['ID_TAG'], 'tag'); ?>
		<?php if ($tagfk) : ?>
			<?php echo $tagfk['NOME_TAG']; ?>
		<?php else : ?>
			-
		<?php endif; ?>
	</dd>
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $area['ID']; ?>" class="btn btn-primary">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>