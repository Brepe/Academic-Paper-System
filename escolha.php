<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database(); ?>

<?php if ($db) : ?>

<div class="row">
	<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="area/index.php?tipo=" class="btn btn-primary">
			<div class="row">
				<div class="col-xs-12 text-center">
					<i class="fa fa-plus fa-3x"></i>
				</div>
				<div class="col-xs-12 text-center">
					<p>Todos os projetos &emsp;</p>
				</div>
			</div>
		</a>
	</div>
	<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="area/index.php?tipo=IC" class="btn btn-primary">
			<div class="row">
				<div class="col-xs-12 text-center">
					<i class="fa fa-plus fa-3x"></i>
				</div>
				<div class="col-xs-12 text-center">
					<p>Projetos de IC &emsp;</p>
				</div>
			</div>
		</a>
	</div>

	<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="area/index.php?tipo=TCC" class="btn btn-primary">
			<div class="row">
				<div class="col-xs-12 text-center">
					<i class="fa fa-plus fa-3x"></i>
				</div>
				<div class="col-xs-12 text-center">
					<p>Projetos de TCC &emsp;</p>
				</div>
			</div>
		</a>
	</div>
</div>

<?php else : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>

<?php endif; ?>

<?php include('area/modal.php'); ?>

<?php include(FOOTER_TEMPLATE); ?>