
<?php include 'header.php'; 

/*Belirli Veriyi Seçme İşlemi.*/
$hakkimizdasor=$db->prepare("SELECT * FROM hakkimizda WHERE hakkimizda_id=:id");
$hakkimizdasor->execute(array(
  'id' =>0
));  /*ayar tablosundaki id 0 ise onu getir sorgusu yazdık.*/

$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);  /*PDO'da veriyi çekmek için gerekli fonksiyonu kullanıyoruz.*/

?>



<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Hakkımızda Ayarları <small>


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




              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Başlık <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="birthday" name="hakkimizda_baslik" value="<?php echo $hakkimizdacek['hakkimizda_baslik'] ?>" required="required" class="date-picker form-control col-md-7 col-xs-12" >
                </div>
              </div>

              <!--  
              <div class="form-group"> 
                <label class="control-label col-md-3 col-sm-3 col-xs-12">İçerik <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="birthday" name="hakkimizda_icerik" value="<?php echo $hakkimizdacek['hakkimizda_icerik'] ?>" required="required" class="date-picker form-control col-md-7 col-xs-12" >
                </div>
              </div>-->


              <!-- CK editör Başlangıcı -->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="ckeditor" id="editor1" name="hakkimizda_icerik">  <?php echo $hakkimizdacek['hakkimizda_icerik']; ?> </textarea>
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Video <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="birthday" name="hakkimizda_video" value="<?php echo $hakkimizdacek['hakkimizda_video'] ?>" required="required" class="date-picker form-control col-md-7 col-xs-12" >
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Vizyon <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="birthday" name="hakkimizda_vizyon" value="<?php echo $hakkimizdacek['hakkimizda_vizyon'] ?>" required="required" class="date-picker form-control col-md-7 col-xs-12" >
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Misyon <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="birthday" name="hakkimizda_misyon" value="<?php echo $hakkimizdacek['hakkimizda_misyon'] ?>" required="required" class="date-picker form-control col-md-7 col-xs-12" >
                </div>
              </div>




              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="hakkimizdakaydet" class="btn btn-success">Güncelle</button>
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