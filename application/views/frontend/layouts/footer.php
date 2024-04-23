<a href="#top-page" class="to-top">
	<div class="icon icon-arrows-up"></div>
</a>

<script src="<?= frontend_url() ?>assets/library/jquery/jquery.js"></script>
<script src="<?= frontend_url() ?>assets/library/jquery/jquery-easing.js"></script>
<script src="<?= frontend_url() ?>assets/library/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= frontend_url() ?>assets/library/retina/retina.min.js"></script>
<script src="<?= frontend_url() ?>assets/library/backstretch/jquery.backstretch.min.js"></script>
<script src="<?= frontend_url() ?>assets/library/swiper/swiper.min.js"></script>
<script src="<?= frontend_url() ?>assets/library/owlcarousel/owl.carousel.min.js"></script>
<script src="<?= frontend_url() ?>assets/library/slick/slick.js"></script>
<script src="<?= frontend_url() ?>assets/library/waypoints/jquery.waypoints.min.js"></script>
<script src="<?= frontend_url() ?>assets/library/isotope/isotope.pkgd.min.js"></script>
<script src="<?= frontend_url() ?>assets/library/waitforimages/jquery.waitforimages.min.js"></script>
<script src="<?= frontend_url() ?>assets/library/lightcase/js/lightcase.js"></script>
<script src="<?= frontend_url() ?>assets/library/wow/wow.min.js"></script>
<script src="<?= frontend_url() ?>assets/library/parallax/jquery.parallax.min.js"></script>
<script src="<?= frontend_url() ?>assets/library/counterup/jquery.counterup.min.js"></script>
<script src="<?= frontend_url() ?>assets/library/magnificpopup/jquery.magnific-popup.min.js"></script>
<script src="<?= frontend_url() ?>assets/library/ytplayer/jquery.mb.ytplayer.min.js"></script>
<script src="<?= frontend_url() ?>assets/js/main.js"></script>
<script src="<?= frontend_url() ?>assets/library/settings/jquery.cookies.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.6.9/apexcharts.min.js"></script>
<script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.0.0/p5.min.js"></script>
<script type="text/javascript">
	let base_url = '<?= base_url() ?>';

	function preload() {
		planeImage = loadImage('<?= frontend_url('flight/assets/plane.png') ?>');
		carImage = loadImage('<?= frontend_url('flight/assets/car.png') ?>');
	}

	var center_lat = "<?= $airport['center_lat'] ?>";
	var center_lng = "<?= $airport['center_lng'] ?>";
	var lat1 = "<?= $airport['lat1'] ?>";
	var lat2 = "<?= $airport['lat2'] ?>";
	var lng1 = "<?= $airport['lng1'] ?>";
	var lng2 = "<?= $airport['lng2'] ?>";
	var id = "<?= $airport['id'] ?>";

	$("download")
		.attr("href", "img.png")
		.attr("download", "output.png")
		.appendTo("chart")
		.click()
		.remove();
</script>
<script src="<?= frontend_url('flight/sketch.js') ?>"></script>
<script src="<?= frontend_url('flight/lib/mappa.min.js') ?>"></script>
<script src="<?= frontend_url('flight/custom.js') ?>"></script>
</body>

</html>