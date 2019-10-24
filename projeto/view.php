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
	<dt>Nome discente:</dt>
	<dd><?php echo $projeto['NOME_DISCENTE']; ?></dd>

	<dt>Curso:</dt>
	<dd><?php echo $projeto['CURSO_DISCENTE']; ?></dd>

	<dt>Título:</dt>
	<dd><?php echo $projeto['TITULO']; ?></dd>

	<dt>Ano:</dt>
	<dd><?php echo $projeto['ANO']; ?></dd>

	<dt>Orientador:</dt>
	<dd><?php echo $projeto['ORIENTADOR']; ?></dd>

	<dt>Co-orientador:</dt>
	<dd><?php echo $projeto['CO_ORIENTADOR']; ?></dd>

	<dt>Curso:</dt>
	<dd><?php echo $projeto['RESUMO']; ?></dd>

	<dt>Palavras-chave:</dt>
	<dd><?php echo $projeto['PALAVRAS_CHAVE']; ?></dd>

	<dt>Instituição de ensino:</dt>
	<dd><?php echo $projeto['INSTITUTO_ENSINO']; ?></dd>

	<dt>Tipo:</dt>
	<dd><?php echo $projeto['TIPO']; ?></dd>

	<dt>Tag:</dt>
	<dd>
		<?php view_fk($projeto['ID_TAG'], 'tag'); ?>
		<?php if ($tagfk) : ?>
			<?php echo $tagfk['NOME_TAG']; ?>
		<?php else : ?>
			-
		<?php endif; ?>
	</dd>

	<dt>Área:</dt>
	<dd>
		<?php view_fk($projeto['ID_AREA'], 'area'); ?>
		<?php if ($tagfk) : ?>
			<?php echo $tagfk['NOME_AREA']; ?>
		<?php else : ?>
			-
		<?php endif; ?>
	</dd>
	<dt>Arquivo</dt>
	<dd><a class="btn btn-sm btn-secondary" href="<?php echo "uploads/".$projeto['PDF']; ?>"><?php echo $projeto['PDF']; ?></a></dd>

	


</dl>
<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id_fk=<?php echo $_GET['id_fk']?>&tipo=<?php echo $_GET['tipo']?>&id=<?php echo $projeto['ID']; ?>" class="btn btn-primary">Editar</a>
	  <a href="index.php?id_fk=<?php echo $_GET['id_fk']?>&tipo=<?php echo $_GET['tipo']?>" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>