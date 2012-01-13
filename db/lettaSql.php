<?php
	  function turkce($dizi)
		{
				$tr = array('Ç', 'ç', 'Ð', 'ð', 'ý', 'Ý', 'Ö', 'ö', 'Þ', 'þ', 'Ü', 'ü');
				$kod = array('&Ccedil;', '&ccedil;', '&#286;', '& #287;', '&#305;', '&#304;', '&Ouml;', '&ouml;', '&#350;', '&#351;', '&Uuml;', '&uuml;');
				$veri = str_replace($tr, $kod, $dizi);
				return $veri;
		}
		function decodeTR($dizi)
		{
			    $tr = array('Ç', 'ç', 'Ð', 'ð', 'ý', 'Ý', 'Ö', 'ö', 'Þ', 'þ', 'Ü', 'ü');
				$kod = array('&Ccedil;', '&ccedil;', '&#286;', '& #287;', '&#305;', '&#304;', '&Ouml;', '&ouml;', '&#350;', '&#351;', '&Uuml;', '&uuml;');
				$veri = str_replace($kod, $tr, $dizi);
				return $veri;
		}
    class veritabani
	{
	    var $server;
        var $user;
		var $pass;
		var $db;
		var $baglanti;
		function __construct($server,$user,$pass,$db)
		{
		    $this->server = $server;
			$this->user   = $user;
			$this->pass   = $pass;
			$this->db     = $db;
			try
			{
			   $this->baglanti = mysql_connect($this->server,$this->user,$this->pass) or die(mysql_error());
			   mysql_query("SET NAMES 'utf8'");
			   mysql_select_db($this->db,$this->baglanti) or die(mysql_error());
			}
			catch(Exception $e)
			{
				echo $e;
			}
		}
		 function __destruct() 
		{
			mysql_close($this->baglanti);
		}
		
		function ekle($tablo,$veri)
		{
			$sql = "INSERT INTO $tablo VALUES($veri)";
			mysql_query($sql) or die(mysql_error());
		}
		function butunElemanlariAl($tablo)
		{
			$indis   = 0;
			$komut   = "SELECT * FROM $tablo";
			$dizi    = array();
			$sql     = mysql_query($komut) or die(mysql_error());
			while($row = mysql_fetch_array($sql))
			{
				$dizi[$indis] = $row;
				$indis++;
			}
			return $dizi;
		}
		function elemanAl($tablo,$kolon,$eleman)
		{
			$indis   = 0;
			$komut   = "SELECT * FROM $tablo WHERE $kolon=$eleman";
			$dizi    = array();
			$sql     = mysql_query($komut) or die(mysql_error());
			while($row = mysql_fetch_array($sql))
			{
				$dizi[$indis] = $row;
				$indis++;
			}
			return $dizi;
		}
		function elemanAl2($tablo,$kolon,$eleman,$kolon2,$eleman2)
		{
			$indis   = 0;
			$komut   = "SELECT * FROM $tablo WHERE $kolon=$eleman AND $kolon2=$eleman2";
			$dizi    = array();
			$sql     = mysql_query($komut) or die(mysql_error());
			while($row = mysql_fetch_array($sql))
			{
				$dizi[$indis] = $row;
				$indis++;
			}
			return $dizi;
		}
        function yazdir($dizi)
		{ 
			foreach($dizi as $i=>$value)
			{
				for($a = 0; isset($value[$a]);$a++)
				{
						echo $value[$a]." ";
				}
				echo "<br>";
			}
		}
		function yazdirXML($dizi)
		{
			echo "<item>";
			foreach($dizi as $i=>$value)
			{
				echo "<urun id='$value[0]'>";
				for($a = 0; isset($value[$a]);$a++)
				{
				    
						echo "<param".$a.">";
							echo turkce($value[$a])." ";
						echo "</param".$a.">";
				}
				echo "</urun>";
			}
			echo "</item>";
		}
	}

	
?>