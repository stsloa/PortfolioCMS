<?php

$array_images = array(
	"./imgs/bss.png",
	"./imgs/em.png",
	"./imgs/em2.png",
	"./imgs/bss.png",
	"./imgs/em.png",
	"./imgs/em2.png",
);
$images_html = "";

foreach ($array_images as $image) {
	$images_html .= <<<HTMLEND
	<div class="column">
		<img class="ui image" src="{$image}">
	</div>
HTMLEND;
}

$html = <<<HTMLEND
<!DOCTYPE html>
<html>
<head>
	<title>The Best VPN for Gaming | XboxVPN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
</head>
<body>
<div class="ui stackable two column grid container">
{$images_html}
</div>
</body>
</html>
HTMLEND;

echo $html;
