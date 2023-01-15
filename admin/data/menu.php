<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=SITE?>" class="brand-link">
      <img src="https://www.srkajans.com/img/logo2.png" alt="" width="220" height="80" style="margin-left: 0px;">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=SITE?>/img/pp.png" class="img-circle elevation-2 pp" alt="User Image">
        </div>
       
        <div class="info">
          <a href="#" class="d-block" style="margin-left: 10px;"><?=$_SESSION["adsoyad"]?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="<?=SITE?>modul-ekle" class="nav-link">
              <i class="nav-icon fas fa-plus"></i>
              <p>
                Modül Ekle
               
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=SITE?>banner-liste" class="nav-link">
            
              <i class="nav-icon fas fa-sign"></i> 
              <p>
                Banner/Slider
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=SITE?>kategori-liste" class="nav-link">
              <i class="nav-icon fas fa-hashtag"></i>
              <p>
                Kategoriler
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=SITE?>urun-liste" class="nav-link">
              <i class="nav-icon fas fa-basket-shopping"></i>
              <p>
                Ürünler
               
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fa-solid fa-users"></i>
              <p>
                Müşteri Yönetimi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                  <a href="<?=SITE?>rehber" class="nav-link">
                      <i class="fa-solid fa-user-tie nav-icon"></i>
                      <p>Rehber</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="<?=SITE?>toplu-mail" class="nav-link">
                      <i class="fa-solid fa-envelopes-bulk nav-icon"></i>
                      <p>Toplu Mail Gönder</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="<?=SITE?>toplu-sms" class="nav-link">
                      <i class="fa-solid fa-comment-sms nav-icon"></i>
                      <p>Toplu Sms Gönder</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="<?=SITE?>bildirim-sablonlari" class="nav-link">
                      <i class="fa-solid fa-bell nav-icon"></i>
                      <p>Bildirim Şablonları</p>
                  </a>
              </li>
                     
                  
            </ul>
          </li>
          <!-- class="menu-open" -->
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa-solid fa-list-check"></i>
              <p>
                Sayfalar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             <?php
			 $moduller=$VT->VeriGetir("moduller","WHERE durum=?",array(1),"ORDER BY ID ASC");
			 if($moduller!=false)
			 {
				 for($i=0;$i<count($moduller);$i++)
				 {
					 ?>
                      <li class="nav-item">
                        <a href="<?=SITE?>liste/<?=$moduller[$i]["tablo"]?>" class="nav-link">
                        <i class="fa-solid fa-circle-dot nav-icon"></i>
                          <p><?=$moduller[$i]["baslik"]?></p>
                        </a>
                      </li>
                     <?php
				 }
			 }
			 ?>
                  
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?=SITE?>isci-yonetim" class="nav-link">
              <i class="nav-icon fa-solid fa-user-gear"></i>
              <p>
                İşçi Yönetimi
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa-solid fa-building-columns"></i>
              <p>
                Banka Yönetimi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                  <a href="<?=SITE?>hesap-ekle" class="nav-link">
                  <i class="nav-icon fa-solid fa-square-plus"></i>
                  <p>Banka Hesabı Ekle</p>
                  </a>
              </li> 
              
              <li class="nav-item">
                  <a href="<?=SITE?>banka-hesaplar" class="nav-link">
                  <i class="fa-solid fa-money-check nav-icon"></i>
                  <p>Banka Hesapları</p>
                  </a>
              </li>

            </ul>
          </li>
          
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fa-solid fa-gears"></i>
              <p>
                Ayarlar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
            <li class="nav-item">
              <a href="<?=SITE?>seo-ayarlari" class="nav-link">
                <i class="nav-icon fa-solid fa-gear"></i>
                <p>
                  Seo Ayarları
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?=SITE?>iletisim-ayarlari" class="nav-link">
                <i class="nav-icon fa-solid fa-phone"></i>
                <p>
                  İletişim Ayarları
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?=SITE?>mail-ayarlari" class="nav-link">
                <i class="nav-icon fa-solid fa-envelope"></i>
                <p>
                  E-Mail Ayarları
                </p>
              </a>
            </li>
                     
                  
            </ul>
          </li>


          
         <li class="nav-item">
            <a href="<?=SITE?>cikis" class="nav-link">
              <i class="nav-icon fa-solid fa-right-from-bracket"></i>
              <p>
                Çıkış Yap
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>