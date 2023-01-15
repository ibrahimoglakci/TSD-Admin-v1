
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Banka Hesapları</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active">Banka Hesapları</li>
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
       <a href="<?=SITE?>hesap-ekle" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus"></i> HESAP EKLE</a>
       </div>
       </div>
       <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width:50px;">Sıra</th>
                  <th></th>
                  <th>Hesap Adı</th>
                  <th>Banka Adı</th>
                  <th>Hesap Sahibi</th>
                  <th>Şube Kodu/Şube İsmi</th>
                  <th style="width:210px;">İban</th>
                  <th style="width:30px;">Durum</th>
                  <th style="width:80px;">Tarih</th>
                  <th style="width:160px;">İşlem</th>
                </tr>
                </thead>
                <tbody>
                <?php
				$veriler=$VT->VeriGetir("banka_hesaplari","","","ORDER BY ID ASC");
				if($veriler!=false)
				{
					$sira=0;
					for($i=0;$i<count($veriler);$i++)
					{
						$sira++;
						if($veriler[$i]["durum"]==1){$aktifpasif=' checked="checked"';}else{$aktifpasif='';}

            if($veriler[$i]["banka_adi"] == "Ziraat Bankası"){
              $bankalogo=SITE."assets/logolar/ziraat.png";
            }
            if($veriler[$i]["banka_adi"]=="AkBank") {
              $bankalogo=SITE."assets/logolar/akbank.png";
            } 
            if($veriler[$i]["banka_adi"]=="İş Bankası") {
              $bankalogo=SITE."assets/logolar/isbank.png";
            } 
            if($veriler[$i]["banka_adi"]=="Garanti Bankası") {
              $bankalogo=SITE."assets/logolar/garantibank.png";
            }
            if($veriler[$i]["banka_adi"]=="Yapı Kredi") {
              $bankalogo=SITE."assets/logolar/yapikredibank.png";
            }
						?>
                        <tr>
                          <td><?=$sira?></td>
                          <td><img src="<?=$bankalogo?>" alt="" width="150px" height="40px"></td>
                          <td>
                            <?=stripslashes($veriler[$i]["hesap_adi"])?>
                          </td>
                          <td>
                            <?=stripslashes($veriler[$i]["banka_adi"])?>
                          </td>
                          <td>
                            <?=stripslashes($veriler[$i]["hesap_sahibi"])?>
                          </td>
                          <td>
                            <?=stripslashes($veriler[$i]["sube_kodu"])?>
                          </td>
                          <td>
                            <?=stripslashes(chunk_split($veriler[$i]["iban"], 4, ' '))?>
                          </td>
                          <td>
                          <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" class="custom-control-input aktifpasif<?=$veriler[$i]["ID"]?>" id="customSwitch3<?=$veriler[$i]["ID"]?>"<?=$aktifpasif?> value="<?=$veriler[$i]["ID"]?>" onclick="aktifpasif(<?=$veriler[$i]["ID"]?>,'banka_hesaplari');">
                      <label class="custom-control-label" for="customSwitch3<?=$veriler[$i]["ID"]?>"></label>
                    </div>
                          </td>
                          <td><?=$veriler[$i]["tarih"]?></td>
                          <td>
                          <a href="<?=SITE?>hesap-duzenle/<?=$veriler[$i]["ID"]?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-gear"></i> Düzenle</a>
                          <a href="<?=SITE?>hesap-sil/<?=$veriler[$i]["ID"]?>" class="btn btn-danger btn-sm silmeAlani"><i class="fa-solid fa-times-circle"></i> Kaldır</a>
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
                  <th></th>
                  <th>Hesap Adı</th>
                  <th>Banka Adı</th>
                  <th>Hesap Sahibi</th>
                  <th>Şube Kodu/Şube İsmi</th>
                  <th style="width:210px;">İban</th>
                  <th style="width:30px;">Durum</th>
                  <th style="width:80px;">Tarih</th>
                  <th style="width:160px;">İşlem</th>
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
