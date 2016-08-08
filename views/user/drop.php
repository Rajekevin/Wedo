<?php
/** APP: Drag and Drop Image uploader with progress bar
    Website:packetcode.com
    Author: Krishna TEja G S
    Date: 4th May 2014
***/
	$str =file_get_contents('php://input');
	$filename = md5(time()).'.jpg';
	$path = 'C:\wamp\www\wedo\public\img\avatar'.$filename;
	file_put_contents($path,$str);
	echo $path;