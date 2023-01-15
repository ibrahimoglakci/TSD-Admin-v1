<?php 
  if(!empty($_GET["tablo"]) && !empty($_GET["ID"]))
  {

    $tablo=$VT->filter($_GET["tablo"]);
    $ID=$VT->filter($_GET["ID"]);

 ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Resim Yönetimi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active">Resim Yönetimi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">

       <form action="<?=SITE?>ajax.php" method="post" class="dropzone" enctype="multipart/form-data">
        <input type="hidden" name="tablo" value="<?=$tablo?>">
         <input type="hidden" name="ID" value="<?=$ID?>">
       </form>
       
      </div><!-- /.container-fluid -->
    </section>
    <div class="row">
      <div class="col-md-12">
       <a href="<?=SITE?>resimler/<?=$_GET["tablo"]?>/<?=$_GET["ID"]?>" class="btn btn-success onaylaResim" style="width: 100%; height: 60%; margin-bottom:30px; margin-top: 10px; font-weight: 600; font-size: 20px;">Onayla</a>
       </div>
       </div>
  
    <section class="content">
      <div class="container-fluid">
       <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width:50px;">Sıra</th>
                  <th>Resim</th>
                  <th style="width:80px;">Tarih</th>
                  <th style="width:120px;">Kaldır</th>
                </tr>
                </thead>
                <tbody>
                <?php
        $veriler=$VT->VeriGetir("resimler","WHERE tablo=? AND KID=?",array($tablo,$ID),"ORDER BY ID ASC");
        if($veriler!=false)
        {
          $sira=0;
          for($i=0;$i<count($veriler);$i++)
          {
            $sira++;  
            ?>
                        <tr>
                          <td><?=$sira?></td>
                          <td>
                            <img src="<?=SITE?>assets/images/resimler/<?=$veriler[$i]["resim"]?>" style="height: 60px; width: auto; margin-right: 8px; float: left;">
                          </td>
                          
                          <td><?=$veriler[$i]["tarih"]?></td>
                          <td>
                          <a href="<?=SITE?>resim-sil/<?=$tablo?>/<?=$ID?>/<?=$veriler[$i]["ID"]?>" class="btn btn-danger btn-sm silmeAlani"><i class="fas fa-trash-alt"></i></a>
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
                  <th>Resim</th>
                  <th>Durum</th>
                  <th>Tarih</th>
                  <th>Kaldır</th>
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
 
 <?php 

}
  ?>