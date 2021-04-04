
<?php 

include 'header.php'; 

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Menü Ekleme <small>




            </small></h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- sadece / işareti kullanırsak en kök dizine çıkar, ../ ise bir üst dizine çıkar. -->
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">




              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Menü Ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="birthday" name="menu_ad" required="required" placeholder="Menü Adını Giriniz." class="date-picker form-control col-md-7 col-xs-12" >  <!-- required="required"; alanın zorunlu girilmesini sağlama kodu. -->
                </div>
              </div>


              <!-- CK editör Başlangıcı -->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Detay <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="ckeditor" id="editor1" name="menu_detay"></textarea>
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Menü Url <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="birthday" name="menu_url" placeholder="Menü URL Giriniz." class="date-picker form-control col-md-7 col-xs-12" >
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Menü Sıra <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="birthday" name="menu_sira" required="required" placeholder="Menü Sıra Giriniz." class="date-picker form-control col-md-7 col-xs-12" >
                </div>
              </div>



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="menu_durum" required>


                  <option value="1">Aktif</option>



                  <option value="0">Pasif</option>


               </select>
             </div>
           </div>







           <div class="ln_solid"></div>
           <div class="form-group">
            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" name="menukaydet" class="btn btn-success">Kaydet</button>
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