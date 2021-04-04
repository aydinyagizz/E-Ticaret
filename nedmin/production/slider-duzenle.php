
<?php 

include 'header.php'; 


$slidersor=$db->prepare("SELECT * FROM slider WHERE slider_id=:id");
$slidersor->execute(array(
  'id' => $_GET['slider_id']
)); 


$slidercek=$slidersor->fetch(PDO::FETCH_ASSOC); 


?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Slider Düzenleme <small>


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
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Yüklü Resim <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <img width="300" src="../../<?php echo $slidercek['slider_resimyol']; ?>">
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="first-name"  name="slider_resimyol"  class="form-control col-md-7 col-xs-12">
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Slider Ad <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="birthday" name="slider_ad" value="<?php echo $slidercek['slider_ad'] ?>" required="required" class="date-picker form-control col-md-7 col-xs-12" >
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Slider Link <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="birthday" name="slider_link" value="<?php echo $slidercek['slider_link'] ?>" class="date-picker form-control col-md-7 col-xs-12" >
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Slider Sıra <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="birthday" name="slider_sira" value="<?php echo $slidercek['slider_sira'] ?>" required="required" class="date-picker form-control col-md-7 col-xs-12" >
              </div>
            </div>



            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Durum<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
               <select id="heard" class="form-control" name="slider_durum" required>


                   <!-- Kısa İf Kulllanımı 

                    <?php echo $slidercek['slider_durum'] == '1' ? 'selected=""' : ''; ?>

                  -->


                  <option value="1" <?php echo $slidercek['slider_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>

                  <option value="0" <?php if ($slidercek['slider_durum']== '0') { echo 'selected=""'; } ?>>Pasif</option>


                  <!--
                   <?php 

                   if ($slidercek['slider_durum']==0) {?>


                   <option value="0">Pasif</option>
                   <option value="1">Aktif</option>


                   <?php } else {?>

                   <option value="1">Aktif</option>
                   <option value="0">Pasif</option>

                   <?php  }

                   ?> 
                 -->


               </select>
             </div>
           </div>


           <input type="hidden" name="slider_id" value="<?php echo $slidercek['slider_id'] ?>"> 
           <input type="hidden" name="slider_resimyol" value="<?php echo $slidercek['slider_resimyol'] ?>"> 





           <div class="ln_solid"></div>
           <div class="form-group">
            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" name="sliderduzenle" class="btn btn-success">Güncelle</button>
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