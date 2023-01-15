<?php
if(!empty($_GET["ID"]))
{
  $ID=$VT->filter($_GET["ID"]);
  
    $veri=$VT->VeriGetir("banka_hesaplari","WHERE ID=?",array($ID),"ORDER BY ID ASC",1);
    if($veri!=false)
    {
?> 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Banka Hesap Düzenle</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active">Banka Hesap Düzenle</li>
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
       <a href="<?=SITE?>hesap-ekle" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus"></i> HESAP EKLE</a>
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
			   
			  
        
         $ekle=$VT->SorguCalistir("UPDATE banka_hesaplari","SET hesap_adi=?, banka_adi=?, hesap_sahibi=?, sube_kodu=?, iban=?, durum=?, tarih=? WHERE ID=?",array($hesapadi,$banka,$hesapsahibi,$subekodu,$iban,1,date("Y-m-d"),$veri[0]["ID"]),1);
      
          
				   
			   
			   
			   if($ekle!=false)
			   {
				    ?>
                   <div class="alert alert-success"><i class="fa-solid fa-check-circle"></i> Hesap başarıyla güncellendi.</div>
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
               <div class="alert alert-danger"><i class="fa-solid fa-triangle-exclamation"></i> Boş bıraktığınız alanları doldurunuz.</div>
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
                <input type="text" class="form-control" placeholder="Hesap Adı" name="hesapadi" value="<?=$veri[0]["hesap_adi"]?>">
                </div>
            </div>
           <div class="col-md-12">
                <div class="form-group">
                <label>Hesap Sahibi</label>
                <input type="text" class="form-control" placeholder="Hesap Sahibi" name="hesapsahibi" value="<?=$veri[0]["hesap_sahibi"]?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label>Şube Kodu/Şube İsmi</label>
                <input type="text" class="form-control" placeholder="Şube Kodu - Şube Adı" name="subekodu" value="<?=$veri[0]["sube_kodu"]?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label>IBAN Numarası</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" autocomplete="off" id="ibaninput" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="IBAN Numarası" name="iban" maxlength="30" value="<?=stripslashes(chunk_split($veri[0]["iban"], 4, ' '))?>">
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
                  <?php 

                  if($veri[0]["banka_adi"]=="Ziraat Bankası") {
                    $ziraat="selected";
                    $akbank="";
                    $isbank="";
                    $garantibank="";
                    $yapikredi="";
                  }
                  if($veri[0]["banka_adi"]=="AkBank") {
                    $akbank="selected";
                    $ziraat="";
                    $isbank="";
                    $garantibank="";
                    $yapikredi="";

                  }
                  if($veri[0]["banka_adi"]=="İş Bankası") {
                    $isbank="selected";
                    $ziraat="";
                    $akbank="";
                    $garantibank="";
                    $yapikredi="";

                  }
                  if($veri[0]["banka_adi"]=="Garanti Bankası") {
                    $garantibank="selected";
                    $ziraat="";
                    $akbank="";
                    $isbank="";
                    $yapikredi="";

                  }
                  if($veri[0]["banka_adi"]=="Yapı Kredi") {
                    $yapikredi="selected";
                    $ziraat="";
                    $akbank="";
                    $isbank="";
                    $garantibank="";

                  }
                
                  ?>
                    <option value="Ziraat Bankası" <?=$ziraat?> > Ziraat Bankası</option>
                    <option value="AkBank" <?=$akbank?> >AkBank</option>
                    <option value="İş Bankası" <?=$isbank?> >İş Bankası</option>
                    <option value="Garanti Bankası" <?=$garantibank?> >Garanti Bankası</option>
                    <option value="Yapı Kredi" <?=$yapikredi?> >Yapı Kredi</option>
                  </select>
                </div>
              <!-- /.col -->
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary">KAYDET</button>
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
 
<?php
  }
  else
   {
    echo "Hatalı Bilgi gönderildi!";
  }
}
else {
  echo "Bu sayfaya erişim izniniz bulunmamaktadır!";
}
?>