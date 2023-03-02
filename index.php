<!DOCTYPE html>
<html lang="sk">
<head>
	<title>Kníhkupectvo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="google-site-verification" content="FlEhbd9zM600T0Zobn53LQ06CHwY1temyAhDUko7HIg" />
	<meta name="keywords" content="Kníhkupectvo, knihy,knihy pre autoškoly,Mobily,knihy pre študentov,knihy pre stredné školy, knihy pre vysoké školy"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

	<link rel="stylesheet" href="css/fontawesome-all.css">

	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />

	<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">

</head>

<body>
	<!-- top-header -->
					<!-- header lists -->
					<!-- //header lists -->
				</div>
			</div>
		</div>
	</div>

	<!-- //shop locator (popup) -->

	<!-- modals -->
	<!-- log in -->
	<!-- //top-header -->

	<!-- header-bottom-->
	<div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid">
				<!-- logo -->
				<div class="col-md-3 logo_agile">
					<h1 class="text-center">
						<a href="index.php" class="font-weight-bold font-italic">
							<img src="images/logo2.png" alt=" " class="img-fluid">Kníhkupectvo
						</a>
					</h1>
				</div>
				<!-- //logo -->
				<!-- header-bot -->
				<div class="col-md-9 header mt-4 mb-md-0 mb-4">
					<div class="row">
						<div class="col-10 agileits_search">
							<form class="form-inline" action="#" method="post">
								<input class="form-control mr-sm-2" type="search" placeholder="Hľadať" aria-label="Search" required>
								<button class="btn my-2 my-sm-0" type="submit">Hľadaj</button>
							</form>
						</div>
						<!-- //search -->
						<!-- cart details -->
						<div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
							<div class="wthreecartaits wthreecartaits2 cart cart box_1">
								<form action="#" method="post" class="last">
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="display" value="1">
									<button class="btn w3view-cart" type="submit" name="submit" value="">
										<i class="fas fa-cart-arrow-down"></i>
									</button>
								</form>
							</div>
						</div>
						<!-- //cart details -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- shop locator (popup) -->
	<!-- //header-bottom -->
	<!-- navigation -->
	<div class="navbar-inner">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="agileits-navi_search">
					<form action="#" method="post">
					</form>
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto text-center mr-xl-5">
						<li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="index.php">Domov
								<span class="sr-only">(current)</span>
							</a>
						</li>
                        <li class="nav-item mr-lg-2 mb-lg-0 mb-2">
                            <a class="nav-link" href="about.php">O Nás</a>
                        </li>
                        <li class="nav-item mr-lg-2 mb-lg-0 mb-2">
                        </li>
                        <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Kontaktujte nás</a>
                        </li>
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Kategórie
							</a>
							<div class="dropdown-menu">
								<div class="agile_inner_drop_nav_info p-4">
									<h5 class="mb-3">Produkty</h5>
									<div class="row">
										<div class="col-sm-6 multi-gd-img">
										<?php
                                    require("config.php");
                                    if ($db->connect_error) {
                                        die("connection failed: " . $db->connect_error);
                                    }
                                    $big = array();
                                    $result = $db->query('SELECT DISTINCT autor FROM knihy ORDER BY knihy.autor;');
                                    while ($row = $result->fetch_assoc()) {
                                        $category = explode(" | ", $row["autor"])[0];
                                        if (!in_array($category, $big, false)) {
                                            $big[] = $category;
                                        }
                                    }
                                    $result_rest = array();
                                    foreach ($big as $i) {
                                        $temp = $db->query("SELECT DISTINCT autor FROM knihy WHERE autor LIKE '$i%' ORDER BY autor");
                                        $last_sub_category = null;
                                        while ($row = $temp->fetch_assoc()) {
                                            $split = explode(" | ", $row["autor"]);
                                            if (count($split) == 1) {
                                                continue;
                                            }
                                            $sub_categories = array_slice($split, 1, 2);
                                            if (count($split) == 2) {
                                                $result_rest[$i][$sub_categories[0]][] = null;
                                                continue;
                                            }
                                            if ($last_sub_category == $sub_categories) {
                                                continue;
                                            }
                                            $last_sub_category = $sub_categories;
                                            $result_rest[$i][$sub_categories[0]][] = $sub_categories[1];

                                        }
                                    }
                                    echo "<ul>";
                                    foreach ($result_rest as $key => $item) {
                                        echo '<li class="menu-item-has-children">';
                                        echo '<a href="' . rawurlencode($key) . '.html">' . $key . '</a>';
                                        echo '<ul class="category-mega-menu">';
                                        foreach ($item as $nested_key => $nested_item) {
                                            echo '<li class="menu-item-has-children">';
                                            echo '<a href="' . rawurlencode($nested_key) . '.html">' . $nested_key . '</a>';
                                            echo '<ul>';
                                            foreach ($nested_item as $nested_nested_item) {
                                                if ($nested_nested_item == null) {
                                                    continue;
                                                }
                                                echo '<ul>';
                                                echo '<li>';
                                                echo '<a href="' . rawurlencode($nested_nested_item) . '.html">' . $nested_nested_item . '</a>';
                                                echo '</li>';
                                                echo '</ul>';
                                            }
                                            echo '</ul>';
                                            echo '</li>';
                                        }
                                        echo '</ul>';
                                        echo '</li>';
                                    }
                                    echo '</ul>';
                                    ?>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation -->

	<!-- banner -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<!-- Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item item1 active">
				<div class="container">
					<div class="w3l-space-banner">
						<div class="carousel-caption p-lg-5 p-sm-4 p-3">
							<p>Pri prvom nákupe
								<span>10%</span> zľava</p>
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Obrovské
								<span>Zľavy</span>
							</h3>
							<a class="button2" href="product.php">Nakupujte ihneď </a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item item2">
				<div class="container">
					<div class="w3l-space-banner">
						<div class="carousel-caption p-lg-5 p-sm-4 p-3">
							<p>Kúpte 
								<span>Si</span> Knihu</p>
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Nový
								<span>Tovar</span>
							</h3>
							<a class="button2" href="product.php">Nakupujte ihneď </a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item item3">
				<div class="container">
					<div class="w3l-space-banner">
						<div class="carousel-caption p-lg-5 p-sm-4 p-3">
							<p>Pri prvom nákupe
								<span>10%</span> Zľava</p>
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Len
								<span>U nás</span>
							</h3>
							<a class="button2" href="product.php">Nakúpte ihneď</a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item item4">
				<div class="container">
					<div class="w3l-space-banner">
						<div class="carousel-caption p-lg-5 p-sm-4 p-3">
							<p>Momentálne Prebiehajú
								<span>40%</span> Zľavy</p>
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Tento
								<span>Týždeň</span>
							</h3>
							<a class="button2" href="product.php">Nakúpte Ihneď</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- //banner -->

	<!-- top Products -->

	</div>
	<!-- //top products -->

	<!-- middle section -->
	<div class="join-w3l1 py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<div class="row">
				<div class="col-lg-6">
					<div class="join-agile text-left p-4">
						<div class="row">
							<div class="col-sm-7 offer-name">
								<h6>Knihy pre stredné školy</h6>
								<h4 class="mt-2 mb-3">Prebieha výpredaj</h4>
								<p>Zľava až do 25%</p>
							</div>
							<div class="col-sm-5 offerimg-w3l">
								<img src="images/off1.png" alt="" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mt-lg-0 mt-5">
					<div class="join-agile text-left p-4">
						<div class="row ">
							<div class="col-sm-7 offer-name">
								<h6>Knihy pre autkošly</h6>
								<h4 class="mt-2 mb-3">Sample</h4>
								<p>Doručenie zadarmo</p>
							</div>
							<div class="col-sm-5 offerimg-w3l">
								<img src="images/off2.png" alt="" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- middle section -->
    <!-- footer -->
	<footer>
		<div class="footer-top-first">
			<div class="container py-md-5 py-sm-4 py-3">
				<!-- footer first section -->
				
				<!-- //footer first section -->
				<!-- footer second section -->
				<div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-dolly"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Doručenie Zadarmo</h3>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer my-md-0 my-4">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-shipping-fast"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Donáška po celom svete</h3>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="far fa-thumbs-up"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Veľký Výber</h3>
							</div>
						</div>
					</div>
				</div>


	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- //jquery -->

	<!-- nav smooth scroll -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //nav smooth scroll -->

	<!-- popup modal (for location)-->
	<script src="js/jquery.magnific-popup.js"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- //popup modal (for location)-->

	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

		paypals.minicarts.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script>
	<!-- //cart-js -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->
	
	<!-- scroll seller -->
	<script src="js/scroll.js"></script>
	<!-- //scroll seller -->

	<!-- smoothscroll -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->
</body>

</html>