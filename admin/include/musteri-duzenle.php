<?php
if(!empty($_GET["ID"]))
{
  $ID=$VT->filter($_GET["ID"]);
  
    $veri=$VT->VeriGetir("musteriler","WHERE ID=?",array($ID),"ORDER BY ID ASC",1);
    if($veri!=false)
    {
?> 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Müşteri Düzenle</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active">Müşteri Düzenle</li>
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
      <a href="<?=SITE?>rehber" class="btn btn-info" style="float:right; margin-bottom:10px; margin-left:10px;"><i class="fas fa-bars"></i> LİSTE</a> 
       <a href="<?=SITE?>musteri-ekle" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus"></i> MÜŞTERİ EKLE</a>
       </div>
       </div>
       <?php
	   if($_POST)
	   {
      if(!empty($_POST["adsoyad"]) && !empty($_POST["email"]) && !empty($_POST["telefon"]) && !empty($_POST["password"])) {
        $adsoyad=$VT->filter($_POST['adsoyad']);     
        $email=$VT->filter($_POST['email']);
        $password=md5($VT->filter($_POST['password']));
        $telefon=$VT->filter($_POST['telefon']);
        $adress=$VT->filter($_POST['adress']);
        $seflink=$VT->seflink($adsoyad);
			   
			  if(!empty($_FILES["resim"]["name"])) {
          $yukle=$VT->upload("resim","assets/images/profilfotolari/");
          if($yukle!=false)
          {

              $ekle=$VT->SorguCalistir("UPDATE musteriler","SET isimsoyisim=?, seflink=?, email=?, password=?, telefon=?, adress=?, image=? WHERE ID=?",array($adsoyad,$seflink,$email,$password,$telefon,$adress,$yukle,$veri[0]["ID"]),1);

          }
          else
          {
           $ekle=false;
             ?>
                  <div class="alert alert-info">Resim yükleme işleminiz başarısız.</div>
                  <?php
          }

         
         
      
          
        }
        else {

          $ekle=$VT->SorguCalistir("UPDATE musteriler","SET isimsoyisim=?, seflink=?, email=?, password=?, telefon=?, adress=? WHERE ID=?",array($adsoyad,$seflink,$email,$password,$telefon,$adress,$veri[0]["ID"]),1);
      

        }
			   
			   
			   if($ekle!=false)
			   {
				    ?>
                   <div class="alert alert-success"><i class="fa-solid fa-check-circle"></i> Müşteri hesap bilgileri başarıyla güncellendi.</div>
                   <meta http-equiv="refresh" content="1;url=<?=SITE?>rehber">
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
                <label>İsim Soyisim</label>
                <input type="text" class="form-control" placeholder="İsim Soyisim" name="adsoyad" autocomplete="off" value="<?=$veri[0]["isimsoyisim"]?>">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Şifre</label>
                <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off" value="">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>E-mail</label>
                <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off" value="<?=$veri[0]["email"]?>">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Telefon</label>
                <input type="text" class="form-control" placeholder="Telefon numarası" name="telefon" autocomplete="off" value="<?=$veri[0]["telefon"]?>">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Adres</label>
                <input type="text" class="form-control" placeholder="Adress" name="adress" autocomplete="off" value="<?=$veri[0]["adress"]?>">
              </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label for="imageinput">Profil Fotoğrafı
                <img src="<?=SITE?>assets/images/profilfotolari/<?=$veri[0]["image"]?>" alt="" width="80" height="80" style="margin-left: 80px;">
                </label>
                
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label> </label>
                <input type="file" id="imageinput" class="form-control"  placeholder="Resim Seçiniz ..." name="resim">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                <button type="submit" class="btn btn-block btn-info">Güncelle</button>
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