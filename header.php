
<?php 


if(!isset($_SESSION)) 
{ 
	ob_start();
	session_start();
} 

require_once 'nedmin/netting/baglan.php';
require_once 'nedmin/production/fonksiyon.php';

/*Belirli Veriyi Seçme İşlemi.*/
$ayarsor=$db->prepare("SELECT * FROM ayar WHERE ayar_id=:id");
$ayarsor->execute(array(
	'id' =>0
));  /*ayar tablosundaki id 0 ise onu getir sorgusu yazdık.*/

$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);  /*PDO'da veriyi çekmek için gerekli fonksiyonu kullanıyoruz.*/




$kullanicisor=$db->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:mail");
$kullanicisor->execute(array(
	'mail' => $_SESSION['userkullanici_mail']
)); 

$say=$kullanicisor->rowCount();

$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC); 


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<title><?php echo $ayarcek['ayar_title']; ?></title>  -->
	<meta name="description" content=<?php echo $ayarcek['ayar_description']; ?>>
	<meta name="keywords" content=<?php echo $ayarcek['ayar_keywords']; ?>>
	<meta name="author" content=<?php echo $ayarcek['ayar_author']; ?>>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='font-awesome\css\font-awesome.css' rel="stylesheet" type="text/css">
	<!-- Bootstrap -->
	<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">

	<!-- Main Style -->
	<link rel="stylesheet" href="style.css">

	<!-- animate css -->
	<link rel="stylesheet" type="text/css" href="css/animate.css">

	<!-- owl Style -->
	<link rel="stylesheet" href="css\owl.carousel.css">
	<link rel="stylesheet" href="css\owl.transitions.css">

	<!-- fancy Style -->
	<link rel="stylesheet" type="text/css" href="js\product\jquery.fancybox.css?v=2.1.5" media="screen"> <!-- fotoğrafların güzel gözukmesini ve aralarında gezinmeyi sağlıyor -->


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
	<div id="wrapper">
		<div class="header"><!--Header -->
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-md-4 main-logo animated flash"><!-- animated flash projeye dahil ettiğimiz dosyadan gelen css özelliği -->
						<a href="index.php"><img width="250" src="<?php echo $ayarcek['ayar_logo'] ?>" alt="Site Logosu" class="logo img-responsive"></a>
					</div>



					<div class="col-md-8">
						<div class="pushright">
							<div class="top">

								<?php 

								if (!isset($_SESSION['userkullanici_mail'])) { ?>

									<a href="#" id="reg" class="btn btn-default btn-dark">Giriş Yap<span>-- YA DA --</span>Kayıt Ol</a>

								<?php }
								else { ?>

									<a href="#" class="btn btn-default btn-dark">Hoşgeldin<span>--</span><?php echo $kullanicicek['kullanici_adsoyad']; ?></a>
								<?php } ?>

								

								


								<div class="regwrap">
									<div class="row">
										<div class="col-md-6 regform">
											<div class="title-widget-bg">
												<div class="title-widget">Kullanıcı Girişi</div>
											</div>


											<!--  <form role="form">
												<div class="form-group">
													<input type="text" class="form-control" id="username" placeholder="Kullanıcı Adı">
												</div>
												<div class="form-group">
													<input type="password" class="form-control" id="password" placeholder="Şifre">
												</div>
												<div class="form-group">
													<button class="btn btn-default btn-red btn-sm">Giriş Yap</button>
												</div>
											</form>  -->


											<form action="nedmin/netting/islem.php" method="POST" role="form">


												<div class="form-group">
													<input type="text" class="form-control" name="kullanici_mail" id="username" placeholder="Kullanıcı Adınız (Mail Adresiniz)">
												</div>


												<div class="form-group">
													<input type="password" class="form-control" name="kullanici_password" id="password" placeholder="Şifreniz">
												</div>


												<div class="form-group">
													<button type="submit" name="kullanicigiris" class="btn btn-default btn-red btn-sm">Giriş Yap</button>
												</div>

											</form> 



										</div>
										<div class="col-md-6">
											<div class="title-widget-bg">
												<div class="title-widget">Kayıt Ol</div>
											</div>
											<p>
												Yeni kullanıcı mısın? Alışverişe başlamak için hemen kayıt ol!
											</p>
											<a href="register"><button class="btn btn-default btn-yellow">Kayıt Ol</button></a>
										</div>
									</div>
								</div>
								<div class="srch-wrap">
									<a href="#" id="srch" class="btn btn-default btn-search"><i class="fa fa-search"></i></a>
								</div>
								<div class="srchwrap">
									<div class="row">
										<div class="col-md-12">
											<form action="arama" method="POST" class="form-horizontal" role="form">
												<div class="form-group">
													<!-- <label for="search" class="col-sm-2 control-label">Search</label> -->
													<button name="arama" class="btn btn-default control-label">Ara</button>
													<div class="col-sm-10">
														<input type="text" name="aranan" class="form-control" id="search">
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


				</div>
			</div>
			<div class="dashed"></div>
		</div><!--Header -->
		<div class="main-nav"><!--end main-nav -->
			<div class="navbar navbar-default navbar-static-top">
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="navbar-collapse collapse">
								<ul class="nav navbar-nav">
									<li><a href="index.php" class="active">Anasayfa</a><div class="curve"></div></li>						
									
									<?php 

									//Belirli veriyi seçme işlemi
									$menusor=$db->prepare("SELECT * FROM menu where menu_durum=:durum order by menu_sira ASC limit 5");
									/*order by menu_sira ASC limit 5 ; sorgudaki bu cümle menu_sira'ya göre baştan sıralanmasını ve limitinde 5 olmasını sağlıyor. ASC baştan sıralama demek. DESC olsaydı sondan sırala olurdu.*/
									$menusor->execute(array(
										'durum' =>1  /*durum 1 olanlar aktiftir ve listele dedik*/
									));

									while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)){
										?>




										<li><a href="

											<?php 

											if(!empty($menucek['menu_url'])) {  /*empty ;değişkenin boş olup olmadığını denetler.*/

												echo $menucek['menu_url'];
											} 
											else {
												echo "sayfa-".seo($menucek['menu_ad']);
											}
											?>

											"><?php echo $menucek['menu_ad']; ?></a></li>

										<?php } ?>


									</ul>
								</div>
							</div>


							<div class="col-md-2 machart">
								<button id="popcart" class="btn btn-default btn-chart btn-sm "><span class="mychart">Alışveriş Sepeti</span>|<span class="allprice">$0.00</span></button>
								<div class="popcart">
									<table class="table table-condensed popcart-inner">
										<tbody>


											<?php 

											$kullanici_id=$kullanicicek['kullanici_id'];

											$sepetsor=$db->prepare("SELECT * FROM sepet WHERE kullanici_id=:id");
											$sepetsor->execute(array(
												'id' => $kullanici_id
											)); 


											while ($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC) ) {

												$urun_id=$sepetcek['urun_id'];
												$urunsor=$db->prepare("SELECT * FROM urun WHERE urun_id=:urun_id");
												$urunsor->execute(array(
													'urun_id' => $urun_id
												)); 


												$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC); 

												$toplam_fiyat+=$uruncek['urun_fiyat']*$sepetcek['urun_adet'];

												?>

												<tr>
													<td>
														<a href="product.htm"><img src="images\dummy-1.png" alt="" class="img-responsive"></a>
													</td>
													<td><a href="product.htm"><?php echo $uruncek['urun_ad']?></a></td>
													<td><?php echo $sepetcek['urun_adet']?> X</td>
													<td><?php echo $uruncek['urun_fiyat']?> ₺</td>
													<td><a href=""><i class="fa fa-times-circle fa-2x"></i></a></td>
												</tr>

											<?php } ?>


										</tbody>
									</table>
									<br>
									<div class="btn-popcart">
										<a href="sepet.php" class="btn btn-default btn-red btn-sm">Sepeti Görüntüle</a>
									</div>
									<div class="popcart-tot">
										<p>
											Toplam Tutar<br>
											<span><?php echo $toplam_fiyat ?> ₺</span>
										</p>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>  

							<?php 

							if (isset($_SESSION['userkullanici_mail'])) { ?>

								<ul class="small-menu">
									<li><a href="hesabim.php" class="myacc">Hesap Bilgilerim</a></li>
									<li><a href="siparislerim.php" class="myshop">Siparişlerim</a></li>
									<li><a href="logout.php" class="mycheck">Güvenli Çıkış</a></li>
								</ul> 

							<?php  } ?>





						</div>
					</div>
				</div>
			</div><!--end main-nav -->
