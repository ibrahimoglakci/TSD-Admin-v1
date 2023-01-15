<?php
if(!empty($_GET["ID"]))
{
	$ID=$VT->filter($_GET["ID"]);
	
		$veri=$VT->VeriGetir("musteriler","WHERE ID=?",array($ID),"ORDER BY ID ASC",1);
		if($veri!=false)
		{
			$resim=$veri[0]["image"];
			if(file_exists("assets/images/profilfotolari/".$resim))
			{
				unlink("assets/images/profilfotolari/".$resim);
			}
			$sil=$VT->SorguCalistir("DELETE FROM musteriler","WHERE ID=?",array($ID),1);

			
			
			?>
        <meta http-equiv="refresh" content="1;url=<?=SITE?>rehber">
        <?php
		}
		else
		{
			?>
        <meta http-equiv="refresh" content="0;url=<?=SITE?>rehber">
        <?php
		}
}
else
{
	?>
        <meta http-equiv="refresh" content="0;url=<?=SITE?>">
        <?php
}
 ?>