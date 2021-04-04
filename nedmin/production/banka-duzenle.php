
<?php 

include 'header.php'; 


$bankasor=$db->prepare("SELECT * FROM banka WHERE banka_id=:id");
$bankasor->execute(array(
  'id' => $_GET['banka_id']
)); 


$bankacek=$bankasor->fetch(PDO::FETCH_ASSOC); 


?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Banka Düzenleme <small>


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
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Banka Ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="birthday" name="banka_ad" value="<?php echo $bankacek['banka_ad'] ?>" required="required" class="date-picker form-control col-md-7 col-xs-12" >
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Banka IBAN <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="birthday" name="banka_iban" value="<?php echo $bankacek['banka_iban'] ?>" required="required" class="date-picker form-control col-md-7 col-xs-12" >
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Banka Hesap Ad Soyad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="birthday" name="banka_hesapadsoyad" value="<?php echo $bankacek['banka_hesapadsoyad'] ?>" required="required" class="date-picker form-control col-md-7 col-xs-12" >
                </div>
              </div>



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Banka Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="banka_durum" required>


                  <option value="1" <?php echo $bankacek['banka_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>

                  <option value="0" <?php if ($bankacek['banka_durum']== '0') { echo 'selected=""'; } ?>>Pasif</option>

                </select>
              </div>
            </div>


            <input type="hidden" name="banka_id" value="<?php echo $bankacek['banka_id'] ?>"> 





            <div class="ln_solid"></div>
            <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="bankaduzenle" class="btn btn-success">Güncelle</button>
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