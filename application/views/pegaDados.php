<?php
	header('Content-Type: application/json');
	echo 'callback({"type":"FeatureCollection","coisas":'.json_encode($coisas).'});'
	?>