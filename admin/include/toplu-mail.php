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
          <h1 class="m-0 text-dark">Toplu Mail Gönder</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
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
        </div>
      </div>
      <?php
      if ($_POST) {
        if (!empty($_POST["konu"]) && !empty($_POST["metin"])) {
          $konu = $VT->filter($_POST['konu']);
          $metin = $VT->filter($_POST['metin']);
          $sira = 0;
          if (!empty($_POST["haricimail"])) {
            $hariciler = $_POST["haricimail"];
            $filtrele = explode(',', $hariciler);

        
          }



          $mailsettings = $VT->VeriGetir("mail_ayarlari", "WHERE ID=?", array(1), "ORDER BY ID ASC", 1);
          if ($mailsettings != false) {
            $host = $mailsettings[0]["server"];
            $smtpusername = $mailsettings[0]["mail"];
            $smtppassword = $mailsettings[0]["sifre"];
            $smtpport = $mailsettings[0]["port"];
            $smtpsertifika = $mailsettings[0]["sertifika"];
          }


          $mail = new PHPMailer(true);
          try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->Host = $host;
            $mail->SMTPAuth = true;
            $mail->Username = $smtpusername;
            $mail->Password = $smtppassword;
            $mail->SMTPSecure = $smtpsertifika;
            $mail->Port = $smtpport;
            $mail->setFrom($smtpusername, 'SRK Ajans - Web Yazılım');
            $mail->Subject = $konu;

            $mail->Body =  $metin;
            $mail->isHTML(true);


            $alicilar = $VT->VeriGetir("musteriler", "WHERE toplumail=?", array(1), "ORDER BY ID ASC");
            if ($alicilar != false) {

              foreach ($alicilar as $alacakmailler) {
                if (!empty($_POST["haricimail"])) {
                  if (!in_array($alacakmailler["email"], $filtrele)) {


                    $mail->addBCC($alacakmailler["email"]);
                  }
                } else {
                  $mail->addAddress($alacakmailler["email"], "");
                }
              }


              $mail->send();



              $mail->clearAddresses();
              $mail->clearAttachments();
            } else {
              echo "hata";
            }


      ?>



          <?php
          } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }
        } else {
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
                  <label>E-Posta Konu </label>
                  <input type="text" class="form-control" placeholder="E-posta Konu" name="konu" autocomplete="off">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label style="display: flex; flex-direction: grow;">Harici E-posta Adresleri <p style="color: tomato; margin-left: 4px; margin-top: 3px; font-size: 12px;">virgüller ile ayırınız. Örnek(test@test.com,test2@test.com)</p></label>
                  <textarea id="harici" cols="30" rows="10" class="form-control" placeholder="Harici Mail Adresleri" name="haricimail"></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>İçerik</label>

                  <textarea class="textarea" placeholder="Açıklama alanıdır." name="metin" style="width: 100%; height: 350px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <button type="submit" class="btn btn-block btn-info">Mail Gönder</button>
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