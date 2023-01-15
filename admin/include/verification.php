<?php 
if(!empty($_GET['email'])) {

  $email=$VT->filter($_GET["email"]);
  $check=$VT->VeriGetir("musteriler","WHERE durum=? AND email=?",array(0,$email),"ORDER BY ID ASC",1);
  if($check!= false) {
   $value=$VT->VeriGetir("musteriler","WHERE email=?",array($email),"ORDER BY ID ASC",1);
   if($value!=false) {


     ?>

     <div class="bg">
       <div class="row" style="margin-left: 12%; padding-bottom: 11%;">
        <div class="col-lg-12 justify-content-center align-items-center">
          <div class="main-verification-input-wrap">
          <?php 
              if($_POST) {
                if(!empty($_POST["verifycode"])) {
                  $verifycode=$VT->filter($_POST['verifycode']);   
                  $add=$VT->SorguCalistir("UPDATE musteriler","SET email_verified_at=?, durum=? WHERE email=? AND verification_code=?",array(date("Y-m-d"),1,$email,$verifycode));

                  if($add!=false) {
                    ?>
                    <div class="alert alert-success">
                     <i class="fa-solid fa-check-circle"></i> Hesap başarıyla doğrulandı. Yönlendiriliyorsunuz...
                    </div>
                    <meta http-equiv="refresh" content="1;url=<?=SITE?>rehber">
                    <?php
                  }
                  else {
                   ?>
                   <div class="alert alert-danger">
                   <i class="fa-solid fa-times-circle"></i> E-posta doğrulanırken bir hata ile karşılaşıldı
                  </div>
                  <?php
                }
              }
              else {
                ?>
                <div class="alert alert-danger">
                <i class="fa-solid fa-triangle-exclamation"></i> Lütfen boş alanları doldurunuz!
                </div>
                <?php
              }
            }

            ?>
            <ul>
              <li>Kayıt olduktan sonra mailinize bir doğrulama kodu gelecek. Bu kodu aşağıya girin.</li>
              <li>Bir şekilde doğrulama e-postasını almadıysanız, <a href="#">doğrulama e-postasını yeniden gönderin</a></li>
            </ul>
            <div class="main-verification-input fl-wrap">
              


            <form action="" method="post">
              <div class="main-verification-input-item">
                <input type="text" name="verifycode" placeholder="Doğrulama Kodunu Giriniz" autocomplete="off"> 
              </div>
              <button class="main-verification-button">Hesabı Doğrula</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>






  <?php 
}
else {
  ?>
  <meta http-equiv="refresh" content="0;url=<?=SITE?>list-user">
  <?php
}

}
else {
  ?>
  <meta http-equiv="refresh" content="0;url=<?=SITE?>">
  <?php

}

}
else {
 ?>
 <meta http-equiv="refresh" content="0;url=<?=SITE?>">
 <?php
}
?>

<style type="text/css">

.bg {
  background: lightgray;
}

.main-verification-input {
 background: #fff;
 padding: 0 120px 0 0;
 border-radius: 1px;
 margin-top: 6px
}

.fl-wrap {
 float: left;
 width: 100%;
 position: relative;
 border-radius: 4px
}

.main-verification-input:before {
 content: '';
 position: absolute;
 bottom: -40px;
 width: 50px;
 height: 1px;
 background: rgba(255, 255, 255, 0.41);
 left: 50%;
 margin-left: -25px
}

.main-verification-input-item {
 float: left;
 width: 100%;
 box-sizing: border-box;
 border-right: 1px solid #eee;
 height: 50px;
 position: relative
}

.main-verification-input-item input:first-child {
 border-radius: 100%
}

.main-verification-input-item input {
 float: left;
 border: none;
 width: 100%;
 height: 50px;
 padding-left: 20px
}

.main-verification-button {
 background: tomato;
}

.main-verification-button {
 position: absolute;
 right: 0px;
 height: 50px;
 width: 120px;
 color: #fff;
 top: 0;
 border: none;
 border-top-right-radius: 4px;
 border-bottom-right-radius: 4px;
 cursor: pointer
}

.main-verification-button:hover {
  opacity: 0.8;
}

.main-verification-input-wrap {
 max-width: 500px;
 margin: 20px auto;
 position: relative;
 margin-top: 129px
}

.main-verification-input-wrap ul {
 background-color: #fff;
 padding: 27px;
 color: #757575;
 border-radius: 4px
}

a {
 text-decoration: none !important;
 color: #9C27B0
}

:focus {
 outline: 0
}

@media only screen and (max-width: 768px) {
 .main-verification-input {
   background: rgba(255, 255, 255, 0.2);
   padding: 14px 20px 10px;
   border-radius: 10px;
   box-shadow: 0px 0px 0px 10px rgba(255, 255, 255, 0.0)
 }

 .main-verification-input-item {
   width: 100%;
   border: 1px solid #eee;
   height: 50px;
   border: none;
   margin-bottom: 10px
 }

 .main-verification-input-item input {
   border-radius: 6px !important;
   background: #fff
 }

 .main-verification-button {
   position: relative;
   float: left;
   width: 100%;
   border-radius: 6px
 }
}
</style>