
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Banka Hesap Ekle</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active">Banka Hesap Ekle</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-12">
      <a href="<?=SITE?>banka-hesaplar" class="btn btn-info" style="float:right; margin-bottom:10px; margin-left:10px;"><i class="fas fa-bars"></i> LİSTE</a> 
       <a href="<?=SITE?>hesap-ekle" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus"></i> BANKA HESAP EKLE</a>
       </div>
       </div>
       <?php
	   if($_POST)
	   {
		   if(!empty($_POST["hesapadi"]) && !empty($_POST["hesapsahibi"]) && !empty($_POST["subekodu"]) && !empty($_POST["iban"]) && !empty($_POST["banka"]))
		   {
			  
			   $hesapsahibi=$VT->filter($_POST["hesapsahibi"]);
         $hesapadi=$VT->filter($_POST["hesapadi"]);
         $subekodu=$VT->filter($_POST["subekodu"]);
			   $iban=$VT->filter(preg_replace('/\s+/','',"TR".$_POST["iban"]));
         $banka=$VT->filter($_POST["banka"]);
			   
			  
				   
				   
					   $ekle=$VT->SorguCalistir("INSERT INTO banka_hesaplari","SET hesap_adi=?, banka_adi=?, hesap_sahibi=?, sube_kodu=?, iban=?, durum=?, tarih=?",array($hesapadi,$banka,$hesapsahibi,$subekodu,$iban,1,date("Y-m-d")));
				   	   
              if($ekle!=false)
              {
                  ?>
                        <div class="alert alert-success"><i class="fa-solid fa-check-circle"></i> Banka hesabı başarıyla kaydedildi.</div>
                        <meta http-equiv="refresh" content="1;url=<?=SITE?>banka-hesaplar">
                        <?php
              }
              else
              {
                  ?>
                        <div class="alert alert-danger"><i class="fa-solid fa-times-circle"></i> İşleminiz sırasında bir sorunla karşılaşıldı. Lütfen daha sonra tekrar deneyiniz.</div>
                        <?php
              }
            }
       else
       {
          ?>
              <div class="alert alert-warning"><i class="fa-solid fa-triangle-exclamation"></i> Boş bıraktığınız alanları doldurunuz.</div>
          <?php
       }
      }
          ?>
       <form action="#" method="post" enctype="multipart/form-data">
       <div class="col-md-12">
       <div class="card-body card card-primary">
            <div class="row">
              
            <div class="col-md-12">
                <div class="form-group">
                <label>Hesap Adı</label>
                <input type="text" class="form-control" placeholder="Banka Adı" name="hesapadi">
                </div>
            </div>
           <div class="col-md-12">
                <div class="form-group">
                <label>Hesap Sahibi</label>
                <input type="text" class="form-control" placeholder="Hesap Sahibi Ad Soyad" name="hesapsahibi">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label>Şube Kodu - Şube Adı</label>
                <input type="text" class="form-control" placeholder="Şube Kodu - Şube Adı" name="subekodu">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label>IBAN Numarası</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">TR</span>
                    </div>
                    <input type="text" class="form-control" autocomplete="off" id="ibaninput" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="IBAN Numarası" name="iban" maxlength="28">
                </div>
                
                </div>
            </div>

            <script>
              document.querySelector('#ibaninput').addEventListener('keydown', (e) => {
                  e.target.value = e.target.value.replace(/(\d{4})(\d+)/g, '$1 $2')
              })
              /* Jquery */
              $('#ibaninput').keyup(function() {
                $(this).val($(this).val().replace(/(\d{4})(\d+)/g, '$1 $2'))
              });
            </script>
            
            <div class="col-md-12">
                <div class="form-group">
                  <label>Banka Seç</label>
                  <select class="form-control select2" style="width: 100%;" name="banka">
                    <option value="Ziraat Bankası" data-thumbnail="<?=SITE?>assets/logolar/ziraat.png" width="30px" height="30px" alt=""> Ziraat Bankası</option>
                    <option value="AkBank">AkBank</option>
                    <option value="İş Bankası">İş Bankası</option>
                    <option value="Garanti Bankası">Garanti Bankası</option>
                    <option value="Yapı Kredi">Yapı Kredi</option>
                  </select>
                </div>
              <!-- /.col -->
            </div>


            <div class="col-md-12">
                <div class="form-group">
                <button type="submit" class="btn btn-block btn-info">Hesap Ekle</button>
                </div>
            </div>
            
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        </div>
       </form>
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 