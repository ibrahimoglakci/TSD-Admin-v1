
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Müşteri Rehberi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active">Müşteri Rehberi</li>
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
       <a href="<?=SITE?>musteri-ekle" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus"></i> MÜŞTERİ EKLE</a>
       </div>
       </div>
       <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width:50px;">Sıra</th>
                  <th>Ad Soyad</th>
                  <th>E-Mail</th>
                  <th>Telefon</th>
                  <th>Adres</th>
                  <th>Hesap Durumu</th>
                  <th style="width:50px;">Durum</th>
                  <th style="width:80px;">Tarih</th>
                  <th style="width:250px;">İşlem</th>
                </tr>
                </thead>
                <tbody>
                <?php
				$veriler=$VT->VeriGetir("musteriler","","","ORDER BY ID ASC");
				if($veriler!=false)
				{
					$sira=0;
					for($i=0;$i<count($veriler);$i++)
					{
						$sira++;
						if($veriler[$i]["durum"]==1){$aktifpasif=' checked="checked"';}else{$aktifpasif='';}

            if($veriler[$i]["durum"]==0) {$durum="Doğrulama Gerekiyor..."; $renk="#781C68";} 
            if($veriler[$i]["durum"]==1) {$durum="Aktif."; $renk="#7DCE13";} 
            if($veriler[$i]["durum"]==2) {$durum="Pasif"; $renk="#C21010";} 

						?>
                        <tr>
                          <td><?=$sira?></td>
                          <td><?=stripslashes($veriler[$i]["isimsoyisim"])?></td>
                          <td><?=stripslashes($veriler[$i]["email"])?></td>
                          <td><?=stripslashes($veriler[$i]["telefon"])?></td>
                          <td><?=stripslashes($veriler[$i]["adress"])?></td>
                          <td style="color: <?=$renk?>;"><?=stripslashes($durum)?></td>
                          <td>
                          <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" class="custom-control-input aktifpasif<?=$veriler[$i]["ID"]?>" id="customSwitch3<?=$veriler[$i]["ID"]?>"<?=$aktifpasif?> value="<?=$veriler[$i]["ID"]?>" onclick="aktifpasif(<?=$veriler[$i]["ID"]?>,'musteriler');">
                      <label class="custom-control-label" for="customSwitch3<?=$veriler[$i]["ID"]?>"></label>
                    </div>
                          </td>
                          <td><?=$veriler[$i]["tarih"]?></td>
                          <td>
                          <a href="<?=SITE?>musteri-duzenle/<?=$veriler[$i]["ID"]?>" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i> Düzenle</a>
                          <a href="<?=SITE?>musteri-sil/<?=$veriler[$i]["ID"]?>" class="btn btn-danger btn-sm silmeAlani"><i class="fas fa-times-circle"></i> Kaldır</a>
                          </td>
                        </tr>
                        <?php
					}
				}
				?>               
                </tbody>
                <tfoot>
                <tr>
                  <th>Sıra</th>
                  <th>Ad Soyad</th>
                  <th>E-Mail</th>
                  <th>Telefon</th>
                  <th>Adres</th>
                  <th>Hesap Durumu</th>
                  <th style="width:50px;">Durum</th>
                  <th style="width:80px;">Tarih</th>
                  <th style="width:250px;">İşlem</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
       
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
