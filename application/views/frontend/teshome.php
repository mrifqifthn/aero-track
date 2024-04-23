<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.0.0/p5.min.js"></script>
	<script type="text/javascript">
	let base_url = '<?= base_url()?>';

	function preload() {
		planeImage = loadImage('<?= frontend_url('flight/assets/plane.png')?>');
		carImage = loadImage('<?= frontend_url('flight/assets/car.png')?>');
	}
</script>
<script src="<?= frontend_url('flight/sketch.js')?>"></script>
<script src="<?= frontend_url('flight/lib/mappa.min.js')?>"></script>
    <style>
		html,
		body {
			margin: 0;
			padding: 0;
		}

		canvas {
			display: block;
		}
	</style>
  </head>

  <body>
  <div id="mapPlane"></div>
  </body>

</html>