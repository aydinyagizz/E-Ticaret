
<?php 
include 'header.php'; 


/*Belirli Veriyi Seçme İşlemi.*/
$menusor=$db->prepare("SELECT * FROM menu WHERE menu_seourl=:sef");
$menusor->execute(array(
  'sef' =>$_GET['sef']
));  /*ayar tablosundaki id 0 ise onu getir sorgusu yazdık.*/

$menucek=$menusor->fetch(PDO::FETCH_ASSOC);  /*PDO'da veriyi çekmek için gerekli fonksiyonu kullanıyoruz.*/

?>

	
	
	<div class="container">
		
		<div class="row">
			<div class="col-md-9"><!--Main content-->

				<div class="title-bg">
					<div class="title"><?php echo $menucek['menu_ad']; ?></div>
				</div>

				<div class="page-content">
					<p>
						 <?php echo $menucek['menu_detay']; ?> 
					</p>
					
				</div>

				
			</div>



			<!-- sadebar buraya gelecek. -->
			<?php include 'sidebar.php'; ?>


		</div>
		<div class="spacer"></div>
	</div>
	
	
	<?php include 'footer.php'; ?>
