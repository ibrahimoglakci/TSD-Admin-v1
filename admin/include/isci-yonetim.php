
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">İşçi Yönetim</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active">İşçi Yönetim</li>
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
       <a href="<?=SITE?>isci-ekle" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus"></i> İŞÇİ EKLE</a>
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
                  <th>Görev</th>
                  <th style="width:50px;">Durum</th>
                  <th style="width:80px;">Tarih</th>
                  <th style="width:250px;">İşlem</th>
                </tr>
                </thead>
                <tbody>
                <?php
				$veriler=$VT->VeriGetir("kullanicilar","","","ORDER BY ID ASC");
				if($veriler!=false)
				{
					$sira=0;
					for($i=0;$i<count($veriler);$i++)
					{
						$sira++;
						if($veriler[$i]["durum"]==1){$aktifpasif=' checked="checked"';}else{$aktifpasif='';}
						?>
                        <tr>
                          <td><?=$sira?></td>
                          <td>
                            <?=stripslashes($veriler[$i]["adsoyad"])?>
                          </td>
                          <td><?=stripslashes($veriler[$i]["gorev"])?></td>
                          <td>
                          <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" class="custom-control-input aktifpasif<?=$veriler[$i]["ID"]?>" id="customSwitch3<?=$veriler[$i]["ID"]?>"<?=$aktifpasif?> value="<?=$veriler[$i]["ID"]?>" onclick="aktifpasif(<?=$veriler[$i]["ID"]?>,'kullanicilar');">
                      <label class="custom-control-label" for="customSwitch3<?=$veriler[$i]["ID"]?>"></label>
                    </div>
                          </td>
                          <td><?=$veriler[$i]["tarih"]?></td>
                          <td>
                          <a href="<?=SITE?>isci-duzenle/<?=$veriler[$i]["ID"]?>" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i> Düzenle</a>
                          <a href="<?=SITE?>isci-sil/<?=$veriler[$i]["ID"]?>" class="btn btn-danger btn-sm silmeAlani"><i class="fas fa-times-circle"></i> Kaldır</a>
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
                  <th>Görev</th>
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
