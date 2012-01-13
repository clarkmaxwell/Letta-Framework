<?php
      
	class lettaMethod
	{
		function sonaEkle($dest,$dizi)
		{
			for($i = 0;$i < count($dizi);$i++)
			{
				$dest[count($dest)+ $i] = $dizi[$i];
			}
			return $dest;
		}
		
		function serializePOST($dizi)
		{
		    $i    = 0;
			$alinanlar = array();
			$donus     = array("''");
			    while(@isset($_POST[$dizi[$i]]))
				{
					$alinanlar[$i] = "'".$_POST[$dizi[$i]]."'";
					$i++;
				}
			$donus = $this->sonaEkle($donus,$alinanlar);
			$son   = implode(",",$donus);
			return $son;
		}
	     function serializePOST2($dizi)
		{
		    $i    = 0;
			$alinanlar = array();
			$donus     = array("''");
			    while(@isset($_POST[$dizi[$i]]))
				{
					$alinanlar[$i] = "'".$_POST[$dizi[$i]]."'";
					if(isset($_POST['teslim']))
					{
						$alinanlar[$i] = " ";
						$tarih  = $_POST[$dizi[$i]];
						$alinanlar[$i] ="'"."DATE_FORMAT($tarih,'%Y-%m-%d')"."'";
					}
					
					$i++;
				}
			$donus = $this->sonaEkle($donus,$alinanlar);
			$son   = implode(",",$donus);
			return $son;
		}
		function serializeGET($dizi)
		{
		    $i    = 0;
			$alinanlar = array();
			$donus     = array("''");
			    while(@isset($_GET[$dizi[$i]]))
				{
					$alinanlar[$i] = "'".$_GET[$dizi[$i]]."'";
					$i++;
				}
			$donus = $this->sonaEkle($donus,$alinanlar);
			$son   = implode(",",$donus);
			return $son;
		}
		
	}
?>