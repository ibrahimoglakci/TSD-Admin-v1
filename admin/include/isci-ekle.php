
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">İşçi Ekle</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active">İşçi Ekle</li>
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
      <a href="<?=SITE?>isci-yonetim" class="btn btn-info" style="float:right; margin-bottom:10px; margin-left:10px;"><i class="fas fa-bars"></i> LİSTE</a> 
       <a href="<?=SITE?>isci-ekle" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus"></i> İŞÇİ EKLE</a>
       </div>
       </div>
       <?php
	   if($_POST)
	   {
		   if(!empty($_POST["adsoyad"]) && !empty($_POST["email"]) && !empty($_POST["kullaniciadi"]) && !empty($_POST["sifre"]) && !empty($_POST["gorev"]))
		   {
			  
			   $adsoyad=$VT->filter($_POST["adsoyad"]);
         $email=$VT->filter($_POST["email"]);
         $kullaniciadi=$VT->filter($_POST["kullaniciadi"]);
			   $sifre=$VT->filter(md5($_POST["sifre"]));
         $gorev=$VT->filter($_POST["gorev"]);
			   
			  
				   
				   
					   $ekle=$VT->SorguCalistir("INSERT INTO kullanicilar","SET adsoyad=?, kullanici=?, sifre=?, mail=?, gorev=?, durum=?, tarih=?",array($adsoyad,$kullaniciadi,$sifre,$email,$gorev,1,date("Y-m-d")));
				   	   
              if($ekle!=false)
              {
                  ?>
                        <div class="alert alert-success"><i class="fa-solid fa-check-circle"></i> İşleminiz başarıyla kaydedildi.</div>
                        <meta http-equiv="refresh" content="1;url=<?=SITE?>isci-yonetim">
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
                <label>İşçi Ad Soyad</label>
                <input type="text" class="form-control" placeholder="Ad Soyad" name="adsoyad">
                </div>
            </div>
           <div class="col-md-12">
                <div class="form-group">
                <label>İşçi E-Mail</label>
                <input type="email" class="form-control" placeholder="ornek@xyz.com" name="email">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label>İşçi Kullanıcı Adı</label>
                <input type="text" class="form-control" placeholder="Kullanıcı Adı" name="kullaniciadi">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label>Şifre</label>
                <input type="password" class="form-control" placeholder="♥♥♥♥♥♥♥♥" name="sifre">
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group">
                  <label>Görev Seç</label>
                  <select class="form-control select2" style="width: 100%;" name="gorev">
                    <option value="Kargo Sorumlusu">Kargo Sorumlusu</option>
                    <option value="Muhasebe Sorumlusu">Muhasebe Sorumlusu</option>
                    <option value="Ürün Sorumlusu">Ürün Sorumlusu</option>
                    <option value="Sosyal Medya Sorumlusu">Sosyal Medya Sorumlusu</option>
                  </select>
                </div>
              <!-- /.col -->
            </div>


            <div class="col-md-12">
                <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary">Ekle</button>
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
 