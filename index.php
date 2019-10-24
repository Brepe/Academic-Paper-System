<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<?php $db = open_database();
tag_cloud(); ?>
<?php if ($db) : ?>
<script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
<script src="https://cdn.anychart.com/releases/v8/js/anychart-tag-cloud.min.js"></script>
<script src="https://cdn.anychart.com/releases/8.7.0/js/anychart-core.min.js"></script>

<script>
anychart.onDocumentReady(function() {
 // create a tag (word) cloud chart
  var chart = anychart.tagCloud(<?php echo $dinamic_tags ?>);
   // set a chart title
  //chart.title('15 most spoken languages')
  // set an array of angles at which the words will be laid out
  chart.angles([0,-20])
  // enable a color range
  //chart.colorRange(true);
  // set the color range length
  chart.colorRange().length('100%');
  // create and configure a color scale.
  chart.hovered().fill("#cc66ff");
//   var customColorScale = anychart.scales.ordinalColor();
//   customColorScale.colors(["#cc66ff", "#ff0066", "#009900",'#0086b3', '#ffcc99', '#ff8080']);

  // set the color scale as the color scale of the chart
  //chart.colorScale(customColorScale);
  chart.mode("spiral");

  // display the word cloud chart
  chart.container("container");
  chart.draw();
})
</script>
<div class="row">

	<div  class="col-xs-12 col-sm-8 col-md-8">
		<div class="row">
			<div class="col-xs-6 col-sm-3 col-md-2">
				<a href="usuario/index.php" class="btn btn-primary">
					<div class="row">
						<div class="col-xs-12 text-center">
							<i class="fa fa-plus fa-3x"></i>
						</div>
						<div class="col-xs-12 text-center">
							<p>Entrar &emsp;</p>
						</div>
					</div>
				</a>
			</div>

			<div class="col-xs-6 col-sm-3 col-md-2">
				<a href="tag/index.php" class="btn btn-primary">
					<div class="row">
						<div class="col-xs-12 text-center">
							<i class="fa fa-plus fa-3x"></i>
						</div>
						<div class="col-xs-12 text-center">
							<p>TAGS &emsp;</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-xs-6 col-sm-3 col-md-2">
				<a href="escolha.php" class="btn btn-primary">
					<div class="row">
						<div class="col-xs-12 text-center">
							<i class="fa fa-plus fa-3x"></i>
						</div>
						<div class="col-xs-12 text-center">
							<p>PROJETOS &emsp;</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-xs-6 col-sm-3 col-md-2">
				<a href="area/index.php?tipo=" class="btn btn-primary">
					<div class="row">
						<div class="col-xs-12 text-center">
							<i class="fa fa-plus fa-3x"></i>
						</div>
						<div class="col-xs-12 text-center">
							<p>ÁREAS &emsp;</p>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
	<div  class="col-xs-12 col-sm-6 col-md-4" id="container">
	</div>
</div>

<?php else : ?>
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>

<?php endif; ?>

<?php include('area/modal.php'); ?>

<?php include(FOOTER_TEMPLATE); ?>