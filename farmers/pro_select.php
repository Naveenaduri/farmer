<!doctype html>
<html class="fixed">

<head>
	<?php
	include_once 'includes/head.php';
	?>
	
	<!-- Web Fonts  -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="vendor/animate/animate.css">
	<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="vendor/font-awesome/css/fontawesome-all.min.css" />
	<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

	<!-- Specific Page Vendor CSS -->
	<link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.css" />
	<link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.theme.css" />
	<link rel="stylesheet" href="vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
	<link rel="stylesheet" href="vendor/morris/morris.css" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/theme.css" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="css/skins/default.css" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">

	<!-- Head Libs -->
	<script src="vendor/modernizr/modernizr.js"></script>

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
					<h2>Select Product</h2>
				</header>
				<?php
				$mob=$_SESSION['farmer_num'];
				$q1="select ocd.name as name from oc_product oc,oc_product_to_category opc,oc_category_description ocd where oc.phnum='$mob' and oc.product_id=opc.product_id and opc.category_id=ocd.category_id group by ocd.category_id;";
				$q1=mysqli_query($conn,$q1);
				$r1=mysqli_num_rows($q1);
				?>

				<!-- start: page -->
				<div class="row">
					<div class="col">
						<section class="card">
							<header class="card-header">
								<h2 class="card-title"><?php if (isset($_POST['farmer_num'])) {
															echo "Update";
														} else {
														echo "Select";
														} ?> Product</h2>
							</header>
							<div class="card-body">
							  <form action="pro-add.php" method="POST">

								<div class="form-group row">
									<label class="col-lg-3 control-label text-lg-right pt-2">Product Category<span class="required">*</span></label>
									<div class="col-lg-6">
										<select data-plugin-selectTwo class="form-control populate" id='pro_category' onfocusout="selectCat();">
											<option value=""> --SELECT-- </option>
											<?php	
											while ($dept_row = mysqli_fetch_assoc($q1)) {
												?>
												<option value="<?php echo $dept_row['name']; ?>" > <?php echo $dept_row['name']; ?> </option>
											<?php } ?>
										</select>
										<div id="cat_err" style="color:red"></div>
									</div>
								</div>
						        <div class="form-group row">
									<label class="col-lg-3 control-label text-lg-right pt-2">Select Product<span class="required">*</span></label>
									<div class="col-lg-6">
										<select data-plugin-selectTwo class="form-control populate" id='pro_name' name="product_id">
											<option value="--SELECT--"> --SELECT-- </option>
											
										</select>
										<div id="sel_err" style="color:red"></div>
									</div>
								</div>
								<hr>
								<div class="form-group row">
									<div class="col-lg-6"></div>
									<div class="col-lg-3">
										<?php
										if (isset($_POST['farmer_num'])) {
											echo "<button class='btn btn-primary' id='update' style='width:100%;' onclick='upd();'>Update</button>";
										} else {
											echo "<button class='btn btn-primary' id='add' style='width:100%;' onclick='add();'>Select</button>";
										}
										?>
									</div>
									<!-- <input type="hidden" value="<?php if (isset($_POST['farmer_num'])) {
																	echo $_POST['farmer_num'];
																} ?>" id='farmer_num'> -->
									<div class="col-lg-3"></div>
								</div>
                               </form>
							</div>
						</section>
					</div>
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

	<!-- Theme Base, Components and Settings -->
	<script src="js/theme.js"></script>

	<!-- Theme Custom -->
	<script src="js/custom.js"></script>

	<!-- Theme Initialization Files -->
	<script src="js/theme.init.js"></script>

	<!-- Examples -->
	<script src="js/examples/examples.dashboard.js"></script>
	<script>
	function selectCat()
	{
		var procat = $('#pro_category').val();
		var mySelect = $('#pro_name');
		// alert(procat);
		$.ajax({
				url: 'queries/product.php',
				data: {
					procat:procat,
					product_sel: ''
				},
				dataType: 'text',
				type: 'post',
				success: function(data) {
					 //console.log(data);
					 $(mySelect).empty();
					var res = data.split("@");

					// console.log(res);
					res.shift();
					// console.log(res);

					$.each(res, function(res, res) {
					res=res.split("$");
					//console.log(res);
					mySelect.append(`<option value="${res[1]}"> 
                                       ${res[0]} 
                                  </option>`); 
					
				});
				},
				failure: function(data) {
					alert('Error While Selecting Product.');
				}
			});
		
	}
	</script>
	<script>
		function add() {

			var fac_dept = $('#pro_category').val();
			var fac_role = $('#pro_name').val();

			var ret = true;
			document.getElementById("cat_err").innerHTML = "";
			document.getElementById("sel_err").innerHTML = "";


			if (pro_category == "--SELECT--") {
				document.getElementById("cat_err").innerHTML = " Select A Valid Option";
				ret = false;
			}

			if (pro_name == "--SELECT--") {
				document.getElementById("sel_err").innerHTML = " Select A Valid Option";
				ret = false;
			}

			if (ret == false) {
				return false;
			}
			// getrequest("queries/faculty.php", "fac_name=" + fac_name + "&fac_passwd=" + fac_passwd + "&fac_mail=" + fac_mail + "&fac_dept=" + fac_dept + "&fac_role=" + fac_role + "&add_fac=''", "fac-view.php");
			// window.location = "";
		}

		function upd() {
			var fac_dept = $('#pro_category').val();
			var fac_role = $('#pro_name').val();

			var ret = true;
			document.getElementById("cat_err").innerHTML = "";
			document.getElementById("sel_err").innerHTML = "";


			if (pro_category == "--SELECT--") {
				document.getElementById("cat_err").innerHTML = " Select A Valid Option";
				ret = false;
			}

			if (pro_name == "--SELECT--") {
				document.getElementById("sel_err").innerHTML = " Select A Valid Option";
				ret = false;
			}
			if (ret == false) {
				return false;
			}
			getrequest("queries/faculty.php", "farmer_num=" + farmer_num + "&fac_name=" + fac_name + "&fac_mail=" + fac_mail + "&fac_dept=" + fac_dept + "&fac_role=" + fac_role + "&upd_fac=''", "fac-view.php");
			// window.location='';
		}
	</script>
</body>

</html>