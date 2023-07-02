<?php
// Obtenemos la URL de la solicitud desde el parámetro "url"
	$requestUrl = isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : '/';

	echo $requestUrl;