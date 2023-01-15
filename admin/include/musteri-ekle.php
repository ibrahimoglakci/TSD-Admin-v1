<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

?>


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
      <a href="<?=SITE?>rehber" class="btn btn-info" style="float:right; margin-bottom:10px; margin-left:10px;"><i class="fas fa-bars"></i> LİSTE</a> 
       <a href="<?=SITE?>musteri-ekle" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus"></i> MÜŞTERİ EKLE</a>
       </div>
       </div>
       <?php
	   if($_POST) {
      if(!empty($_POST["adsoyad"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["telefon"])) {
        $adsoyad=$VT->filter($_POST['adsoyad']);     
        $email=$VT->filter($_POST['email']);
        $password=md5($VT->filter($_POST['password']));
        $telefon=$VT->filter($_POST['telefon']);
        $adress=$VT->filter($_POST['adress']);
        $seflink=$VT->seflink($adsoyad);

        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0,6);

        

        $mailsettings=$VT->VeriGetir("mail_ayarlari","WHERE ID=?",array(1),"ORDER BY ID ASC",1);
        if($mailsettings!=false) {
          $host=$mailsettings[0]["server"];
          $smtpusername=$mailsettings[0]["mail"];
          $smtppassword=$mailsettings[0]["sifre"];
          $smtpport=$mailsettings[0]["port"];
          $smtpsertifika=$mailsettings[0]["sertifika"];
        }
        
        
        $mail = new PHPMailer(true);
          try {
            $mail -> SMTPDebug = 0;
            $mail -> isSMTP();
            $mail->CharSet = 'UTF-8';
            $mail -> Host = $host;
            $mail ->SMTPAuth = true;
            $mail ->Username = $smtpusername;
            $mail ->Password = $smtppassword;
            $mail ->SMTPSecure = $smtpsertifika;
            $mail ->Port = $smtpport;
            $mail ->setFrom($smtpusername, 'SRK Ajans - Web Yazılım');
            $mail ->addAddress($email, $adsoyad);
            $mail ->isHTML(true);
            $mail ->Subject = 'Email verification';


            $str = file_get_contents(SAYFA."email-verify.php");
            $str = str_replace('$verify', $verification_code, $str);
            $str = str_replace('$isim', $adsoyad, $str);

            $mail ->Body =  $str;
            
            
            
            $mail->send();

      
          $yukle=$VT->upload("resim","assets/images/profilfotolari/");
				   if($yukle!=false)
				   {
					   $ekle=$VT->SorguCalistir("INSERT INTO musteriler","SET isimsoyisim=?, seflink=?, email=?, password=?, telefon=?, adress=?, image=?, verification_code=?, email_verified_at=?, durum=?, tarih=?",array($adsoyad,$seflink,$email,$password,$telefon,$adress,$yukle,$verification_code,NULL,0,date("Y-m-d")));
				   }
				   else
				   {
            $ekle=false;
					    ?>
                   <div class="alert alert-info">Resim yükleme işleminiz başarısız.</div>
                   <?php
				   }

          ?>

          <meta http-equiv="refresh" content="2;url=<?=SITE?>hesap-dogrula/<?=$email?>">

          <?php
        }catch(Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
        }


          if($ekle!=false) {
           ?>
           <div class="alert alert-success">
            <i class="fa-solid fa-check-circle"></i> Müşteri Başarıyla Eklendi
          </div>
          
          <?php
        }
        else {
         ?>
         <div class="alert alert-danger">
         <i class="fa-solid fa-times-circle"></i> Müşteri eklenirken bir hata ile karşılaşıldı
        </div>
        <?php
      }
    }
    else {
      ?>
      <div class="alert alert-danger">
        <i class="fa-solid fa-triangle-exclamation"></i> Boş bıraktığınız alanları doldurunuz.
      </div>
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
                <input type="text" class="form-control" placeholder="İsim Soyisim" name="adsoyad" autocomplete="off">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Şifre</label>
                <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>E-mail</label>
                <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Telefon</label>
                <input type="text" class="form-control" placeholder="Telefon numarası" name="telefon" autocomplete="off">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Adres</label>
                <input type="text" class="form-control" placeholder="Adress" name="adress" autocomplete="off">
              </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                <label>Profil Fotoğrafı</label>
                <input type="file" class="form-control" placeholder="Resim Seçiniz ..." name="resim">
                </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
               <button type="submit" class="btn btn-block btn-info">Müşteri Ekle</button>
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
 