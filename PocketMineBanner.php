<?php
header("Content-type: image/png");
require __DIR__ . '/MinecraftQuery.class.php';
$Query = new MinecraftQuery();
$font = './minecraft.ttf';
try{
        switch($_REQUEST['id']){
                case 0:
        		$Query->connect($_REQUEST['ip'], $_REQUEST['port'], 1);
        		$info = $Query->GetInfo();
        		$im = imagecreatefrompng("open.png");
        		$white = imagecolorallocate($im, 255, 255, 255);
       			imagefttext($im, 21, 0, 680, 60, $white, $font, $info['Players']);
	        	imagefttext($im, 21, 0, 740, 60, $white, $font, $info['MaxPlayers']);
	        	imagefttext($im, 21, 0, 30, 60, $white, $font, $info['HostName']);
	        	imagepng($im);
	        	imagedestroy($im);
                        break;
                case 1:
	        	$Query->connect($_REQUEST['ip'], $_REQUEST['port'], 1);
	        	$info = $Query->GetInfo();
	        	$im = imagecreatefrompng("banner1.png");
	        	$white = imagecolorallocate($im, 255, 255, 255);
			$green = imagecolorallocate($im, 127, 255, 0);
	        	imagefttext($im, 21, 0, 10, 30, $white, $font, $info['HostName']);
		        imagefttext($im, 13, 0, 10, 50, $white, $font, "IP: ".$_REQUEST['ip']);
		        imagefttext($im, 13, 0, 10, 70, $white, $font, "Port: ".$info['HostPort']);
			imagefttext($im, 13, 0, 10, 90, $green, $font, "Online: ".$info['Players']."/".$info['MaxPlayers']);
		        imagepng($im);
		        imagedestroy($im);
                        break;
                case 2:
		        $Query->connect($_REQUEST['ip'], $_REQUEST['port'], 1);
        		$info = $Query->GetInfo();
        		$im = imagecreatefrompng("banner2.png");
        		$white = imagecolorallocate($im, 255, 255, 255);
			$green = imagecolorallocate($im, 127, 255, 0);
        		imagefttext($im, 21, 0, 10, 30, $white, $font, $info['HostName']);
                        imagefttext($im, 13, 0, 10, 50, $white, $font, "IP: ".$_REQUEST['ip']);
                        imagefttext($im, 13, 0, 10, 70, $white, $font, "Port: ".$info['HostPort']);
                        imagefttext($im, 13, 0, 10, 90, $green, $font, "Online: ".$info['Players']."/".$info['MaxPlayers']);
        		imagepng($im);
        		imagedestroy($im);
                        break;
        }
}
catch(MinecraftQueryException $e){
        switch($_REQUEST['id']){
                case 0:
                        $im = imagecreatefrompng("closed.png");
                        $white = imagecolorallocate($im, 255, 255, 255);
                        imagefttext($im, 21, 0, 690, 60, $white, $font, "-");
                        imagefttext($im, 21, 0, 750, 60, $white, $font, "-");
                        imagefttext($im, 21, 0, 30, 60, $white, $font, $_REQUEST['servername']);
                        imagepng($im);
                        imagedestroy($im);
                        break;
                case 1:
                        $im = imagecreatefrompng("banner1.png");
			$white = imagecolorallocate($im, 255, 255, 255);
			$red = imagecolorallocate($im, 255, 0, 0);
                        imagefttext($im, 21, 0, 10, 30, $white, $font, $_REQUEST['servername']." - Offline");
                        imagefttext($im, 13, 0, 10, 50, $white, $font, "IP: ".$_REQUEST['ip']);
                        imagefttext($im, 13, 0, 10, 70, $white, $font, "Port: ".$_REQUEST['port']);
			imagefttext($im, 13, 0, 10, 90, $red, $font, "Offline: - / -");
                        imagepng($im);
                        imagedestroy($im);
                        break;
                case 2:
                        $im = imagecreatefrompng("banner2.png");
			$white = imagecolorallocate($im, 255, 255, 255);
			$red = imagecolorallocate($im, 255, 0, 0);
                        imagefttext($im, 21, 0, 10, 30, $white, $font, $_REQUEST['servername']." - Offline");
                        imagefttext($im, 13, 0, 10, 50, $white, $font, "IP: ".$_REQUEST['ip']);
                        imagefttext($im, 13, 0, 10, 70, $white, $font, "Port: ".$_REQUEST['port']);
                        imagefttext($im, 13, 0, 10, 90, $red, $font, "Offline: - / -");
                        imagepng($im);
                        imagedestroy($im);
                        break;
        }
}
?>
