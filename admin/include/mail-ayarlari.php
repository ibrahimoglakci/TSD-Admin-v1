<?php 
$mailayarlar=$VT->VeriGetir("mail_ayarlari","WHERE ID=?",array(1),"ORDER BY ID ASC",1);

if($mailayarlar!=false) {
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Mail Ayarları</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active">Mail Ayarları</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
     
       <?php
       
	   if($_POST)
	   {
		   if(!empty($_POST["smtp"]) && !empty($_POST["port"]) && !empty($_POST["sertifika"]) && !empty($_POST["smtpmail"]) && !empty($_POST["mailsifre"]))
		   {
			   $smtp=$VT->filter($_POST["smtp"]);
			   $port=$VT->filter($_POST["port"]);
			   $sertifika=$VT->filter($_POST["sertifika"]);
         $smtpmail=$VT->filter($_POST["smtpmail"]);
         $mailsifre=$VT->filter($_POST["mailsifre"]);
			   
				   $guncelle=$VT->SorguCalistir("UPDATE mail-ayarlari","SET server=?, port=?, sertifika=?, mail=?, sifre=? WHERE ID=?",array($smtp,$port,$sertifika,$smtpmail,$mailsifre,1),1);
			  
			   if($guncelle!=false)
			   {
				    ?>
                   <div class="alert alert-success"><i class="fa-solid fa-check-circle"></i> İşleminiz başarıyla kaydedildi.</div>
                   <meta http-equiv="refresh" content="1;url=<?=SITE?>mail-ayarlari" />
                   <?php
			   }
			   else
			   {
				    ?>
                   <div class="alert alert-danger">İşleminiz sırasında bir sorunla karşılaşıldı. Lütfen daha sonra tekrar deneyiniz.</div>
                   <?php
			   }
		   }
		   else
		   {
			   ?>
               <div class="alert alert-danger">Boş bıraktığınız alanları doldurunuz.</div>
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
                <label>SMTP Server</label>
                <input type="text" class="form-control" placeholder="SMTP Server" name="smtp" value="<?=$mailayarlar[0]["server"]?>">
                </div>
            </div>
           
             <div class="col-md-12">
                <div class="form-group">
                <label>SMTP Port</label>
                <input type="text" class="form-control" placeholder="SMTP Port" id="portinput" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="port" value="<?=$mailayarlar[0]["port"]?>">
                </div>
                <script>
                  document.querySelector('#portinput').addEventListener('keydown', (e) => {
                      e.target.value = e.target.value.replace(/(\d{4})(\d+)/g, '$1 $2')
                  })
                  /* Jquery */
                  $('#portinput').keyup(function() {
                    $(this).val($(this).val().replace(/(\d{4})(\d+)/g, '$1 $2'))
                  });
                </script>

            </div>
             <div class="col-md-12">
                <div class="form-group">
                <label>Mail Sertifika</label>
                <input type="text" class="form-control" placeholder="Mail Sertifika" name="sertifika" value="<?=$mailayarlar[0]["sertifika"]?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label>SMTP Email</label>
                <input type="email" class="form-control" placeholder="SMTP Email" name="smtpmail" value="<?=$mailayarlar[0]["mail"]?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label>SMTP Mail Şifre</label>
                <input type="password" class="form-control" placeholder="SMTP Email Şifre" name="mailsifre" value="<?=$mailayarlar[0]["sifre"]?>">
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
              
?>