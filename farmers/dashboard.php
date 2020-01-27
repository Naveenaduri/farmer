<!doctype html>
<html class="fixed">

<head>
	<?php include_once 'includes/head.php'; ?>

	<!-- Web Fonts  -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="vendor/animate/animate.css">

	<link rel="stylesheet" href="vendor/font-awesome/css/fontawesome-all.min.css" />
	<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

	<!-- Specific Page Vendor CSS -->
	<link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.css" />
	<link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.theme.css" />
	<link rel="stylesheet" href="vendor/select2/css/select2.css" />
	<link rel="stylesheet" href="vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
	<link rel="stylesheet" href="vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
	<link rel="stylesheet" href="vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
	<link rel="stylesheet" href="vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
	<link rel="stylesheet" href="vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
	<link rel="stylesheet" href="vendor/dropzone/basic.css" />
	<link rel="stylesheet" href="vendor/dropzone/dropzone.css" />
	<link rel="stylesheet" href="vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
	<link rel="stylesheet" href="vendor/codemirror/lib/codemirror.css" />
	<link rel="stylesheet" href="vendor/codemirror/theme/monokai.css" />
	<link rel="stylesheet" href="vendor/summernote/summernote.css" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/theme.css" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="css/skins/default.css" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">

	<!-- Head Libs -->
	<script src="vendor/modernizr/modernizr.js"></script>
    
<!--
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
-->

</head>

<body>
	<section class="body">

		<!-- start: header -->
		<?php include_once 'includes/header.php'; ?>
		<!-- end: header -->

		<div class="inner-wrapper">
			<!-- start: sidebar -->
			<aside id="sidebar-left" class="sidebar-left">

				<div class="sidebar-header">
					<div class="sidebar-title">
						Navigation
					</div>
					<div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
						<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>

				<?php include 'includes/nav-bar.php'; ?>

			</aside>
			<!-- end: sidebar -->

			<section role="main" class="content-body">
				<header class="page-header">
					<h2>Farmer</h2>
				</header>				
				<!-- start: page -->

                <div class="jumbotron jumbotron-fluid" style="background-color:transparent !important;margin-top:10px;padding:10px">
<!--                  <div class="container">-->
                  <span style="font-size:18px;color:black;">
                    <div class="alert alert-info" role="alert" >
                      ADD Product via SMS
                    </div>
                      <p style="font-size:16px;">Send SMS to : 9220592205</p>
                      <p  style="font-size:16px;">ADD  Product_ID  Quantity(in KG)  Price(in RS) </p>
                    <div class="alert alert-success" role="alert">
                      UPDATE Product via SMS
                    </div>
                      <p>Send SMS to : 9220592205</p>
                      <p>UPD   Product_ID  Quantity(in KG)  Price(in RS) </p>
                    <div class="alert alert-danger" role="alert">
                      DELETE Product via SMS
                    </div>
                      <p>Send SMS to : 9220592205</p>
                      <p>DEL  Product_ID  </p>
                    <div class="alert alert-warning" role="alert">
                     To Know Product_Id                    
                    </div>
                      <p>Send SMS to : 9220592205</p>
					  <p>SELL  Category_Name </p>
					  <div class="alert alert-dark" role="alert">
                      Product Sold Offline
                    </div>
                      <p>Send SMS to : 9220592205</p>
                      <p>SOLD  Product_id </p>
                   </span>
<!--                  </div>-->
                </div>             
                
				<!-- end: page -->
			</section>
		</div>
	</section>

	<!-- Vendor -->
	<script src="vendor/jquery/jquery.js"></script>
	<script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
	<script src="vendor/popper/umd/popper.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.js"></script>
	<script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="vendor/common/common.js"></script>
	<script src="vendor/nanoscroller/nanoscroller.js"></script>
	<script src="vendor/select2/js/select2.js"></script>
	<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
	<script src="vendor/jquery-placeholder/jquery-placeholder.js"></script>

	<!-- Specific Page Vendor -->
	<script src="vendor/jquery-ui/jquery-ui.js"></script>
	<script src="vendor/jqueryui-touch-punch/jqueryui-touch-punch.js"></script>
	<script src="vendor/jquery-appear/jquery-appear.js"></script>
	<script src="vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
	<script src="vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
	<script src="vendor/flot/jquery.flot.js"></script>
	<script src="vendor/flot.tooltip/flot.tooltip.js"></script>
	<script src="vendor/flot/jquery.flot.pie.js"></script>
	<script src="vendor/flot/jquery.flot.categories.js"></script>
	<script src="vendor/flot/jquery.flot.resize.js"></script>
	<script src="vendor/jquery-sparkline/jquery-sparkline.js"></script>
	<script src="vendor/raphael/raphael.js"></script>
	<script src="vendor/morris/morris.js"></script>
	<script src="vendor/gauge/gauge.js"></script>
	<script src="vendor/snap.svg/snap.svg.js"></script>
	<script src="vendor/liquid-meter/liquid.meter.js"></script>
	<script src="vendor/jqvmap/jquery.vmap.js"></script>
	<script src="vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
	<script src="vendor/jqvmap/maps/jquery.vmap.world.js"></script>
	<script src="vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
	<script src="vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
	<script src="vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
	<script src="vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
	<script src="vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
	<script src="vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
	<script src="vendor/summernote/summernote.js"></script>


	<!-- Theme Base, Components and Settings -->
	<script src="js/theme.js"></script>

	<!-- Theme Custom -->
	<script src="js/custom.js"></script>

	<!-- Theme Initialization Files -->
	<script src="js/theme.init.js"></script>

	<!-- Examples -->
	<script src="js/examples/examples.dashboard.js"></script>
	<script>
		function add_product() {

			var pro_id = $('#pro_id').val();
			var pro_quantity = $('#pro_quantity').val();
			var pro_price = $('#pro_price').val();

			var ret = true;
			document.getElementById("name_err").innerHTML = "";
			document.getElementById("quantity_err").innerHTML = "";
			document.getElementById("price_err").innerHTML = "";

			if (pro_id == "") {
				document.getElementById("name_err").innerHTML = "Select Any Product.";
				ret = false;
			}

			if (pro_quantity == "") {
				document.getElementById("quantity_err").innerHTML = " Quantity Cannot Be Empty";
				ret = false;
			}
			if (pro_price == "") {
				document.getElementById("price_err").innerHTML = " Price Cannot Be Empty";
				ret = false;
			}


			if (ret == false) {
				return false;
			}

			$.ajax({
				url: 'queries/product.php',
				data: {
					pro_id: pro_id,
					pro_quantity: pro_quantity,
					pro_price: pro_price,
					product_add: ''
				},
				dataType: 'text',
				type: 'post',
				success: function(data) {
					alert(data);
					window.location = 'pro_view.php';
				},
				failure: function(data) {
					alert('Error While Adding Product.');
				}
			});
		}

		function upd() {
			var product_id = $('#product_id').val();
			var pro_quantity = $('#pro_quantity').val();
			var pro_price = $('#pro_price').val();

			var ret = true;
			document.getElementById("name_err").innerHTML = "";
			document.getElementById("quantity_err").innerHTML = "";
			document.getElementById("price_err").innerHTML = "";

			if (pro_quantity == "") {
				document.getElementById("quantity_err").innerHTML = " Quantity Cannot Be Empty";
				ret = false;
			}
			if (pro_price == "") {
				document.getElementById("price_err").innerHTML = " Price Cannot Be Empty";
				ret = false;
			}


			if (ret == false) {
				return false;
			}

			$.ajax({
				url: 'queries/product.php',
				data: {
					product_id: product_id,
					pro_quantity: pro_quantity,
					pro_price: pro_price,
					product_upd: ''
				},
				dataType: 'text',
				type: 'post',
				success: function(data) {
					alert(data);
					window.location = 'pro_view.php';
				},
				failure: function(data) {
					alert('Error While Adding Product.');
				}
			});
		}
	</script>
</body>

</html>