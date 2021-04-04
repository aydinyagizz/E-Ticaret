
<?php 

include 'header.php'; 


$urunsor=$db->prepare("SELECT * FROM urun WHERE urun_id=:id");
$urunsor->execute(array(
  'id' => $_GET['urun_id']
)); 


$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC); 


?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ürün Düzenleme <small>


              <?php  if ($_GET['durum']=="ok") {  ?>

                <b style="color: green;">İşlem Başarılı.</b>

                <?php
              } 


              elseif ($_GET['durum']=="no") {  ?>

                <b style="color: red;">İşlem Başarısız.</b>

                <?php   
              }

              ?>





            </small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- sadece / işareti kullanırsak en kök dizine çıkar, ../ ise bir üst dizine çıkar. -->
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">



              <!-- Kategori seçme başlangıç -->


              <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-6">

                  <?php  

                  $urun_id=$uruncek['kategori_id']; 

                  $kategorisor=$db->prepare("select * from kategori where kategori_ust=:kategori_ust order by kategori_sira");
                  $kategorisor->execute(array(
                    'kategori_ust' => 0
                    ));

                    ?>
                    <select class="select2_multiple form-control" required="" name="kategori_id" >


                     <?php 

                     while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {

                       $kategori_id=$kategoricek['kategori_id'];

                       ?>

                       <option value="<?php echo $kategoricek['kategori_id']; ?>"><?php echo $kategoricek['kategori_ad']; ?></option>

                       <?php } ?>

                     </select>
                   </div>
                 </div>


                 <!-- kategori seçme bitiş -->



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ürün Ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="birthday" name="urun_ad" placeholder="Ürün Adını Giriniz" required="required" class="date-picker form-control col-md-7 col-xs-12" >
                </div>
              </div>


              <!-- CK editör Başlangıcı -->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Detay <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="ckeditor" id="editor1" name="urun_detay"></textarea>
                </div>
              </div>

              <script type="text/javascript">
                
                CKEDITOR.replace ('editor1', 
                {

                  filebrowserBrowseUr1 : 'ckfinder/ckfinder.html',

                  filebrowserImageBrowseUr1 : 'ckfinder/ckfinder.html?type=Images',

                  filebrowserFlashBrowseUr1 : 'ckfinder/ckfinder.html?type=Flash',

                  filebrowserUploadUr1 : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                  filebrowserImageUploadUr1 : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                  filebrowserFlashUploadUr1 : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                  forcePasteAsPlainText : true

                }

                  );

              </script>
              <!-- CK editör Bitişi -->


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ürün Fiyat <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="birthday" name="urun_fiyat" placeholder="Ürün Fiyatını Giriniz" class="date-picker form-control col-md-7 col-xs-12" >
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ürün Video <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="birthday" name="urun_video" placeholder="Ürün Videosunu Giriniz" class="date-picker form-control col-md-7 col-xs-12" >
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ürün Keyword <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="birthday" name="urun_keyword" placeholder="Ürün Anahtar Kelimesini Giriniz" required="required" class="date-picker form-control col-md-7 col-xs-12" >
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ürün Stok <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="birthday" name="urun_stok" placeholder="Ürün Stok Giriniz" required="required" class="date-picker form-control col-md-7 col-xs-12" >
                </div>
              </div>



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="urun_durum" required>


                  <option value="1">Aktif</option>

                  <option value="0">Pasif</option>

               </select>
             </div>
           </div>


           <div class="ln_solid"></div>
           <div class="form-group">
            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" name="urunekle" class="btn btn-success">Kaydet</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>



</div>
</div>
<!-- /page content -->


<?php include 'footer.php'; ?>  <!--başka dosyaları dahil etmeye yarar.-->  