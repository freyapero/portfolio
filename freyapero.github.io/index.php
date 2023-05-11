<?php

//Отредактировать переменные
$site_name_and_path = 'github.com/freyapero/freyapero.github.io.git/'; //Доменное имя сайта (и путь к каталогу с основным скриптом)
$main_title = 'Сайт на "Маркдаун"'; //Основное заглавие сайта

//Отредактировать переменные по необходжимости
$start_document = "START.md";
$default_page = 'index.php';


$src_arg = null;

if(isset($_GET['src']))
	if($_GET['src'] != '')
		$src_arg = htmlspecialchars($_GET['src']);

if( $src_arg != null ) {
	require('markdown.php');

	$src	=	$src_arg;
        $text   =	@file_get_contents($src);

	if( $text != false ){

		$title 	=	$main_title;
		$html	=	Markdown($text);

	} else {

		$title 	=	'Could not find "'.$src.'"';
		$html	=	'<p>The file could not be found; please check that the file directory is correct</p>';

                }

} 
else {

	require('markdown.php');

	$src	=	$start_document;
        $text   =	@file_get_contents($src);

	if( $text != false ){

		$title 	=	$main_title;
		$html	=	Markdown($text);

	} else {

		$title 	=	'Could not find "'.$src.'"';
		$html	=	'<p>The file could not be found; please check that the file directory is correct</p>';

                }

}
?>

<html lang="ru"><head>
<title><?php echo($main_title); ?></title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name=viewport content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="favicon.png" />




	<style>
		body{
			font-family:	Helvetica, Verdana, serif;
			margin:			0;
			padding:		0;
			background:		#EFEFEF;
		}
		header{
			border-bottom:	1px solid #CCC;
			background:		#333;
			box-shadow:		0 0 10px rgba(0,0,0,0.7);
		}
		header p{
			font-size:		2.6em;
			padding:		30px 5px;
			line-height:	        1em;
			margin:			0;
			text-align:		center;
			color:			#EFEFEF;
		}
		
			
	
		article{
			background:		#FFF;	
			width:			80%;
			padding:		1.5em;
			border:			1px solid #EFEFE;
			margin:			2em auto;
			position:			relative;
			background:			#FFF;
			box-shadow:			0 1px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(0, 0, 0, 0.1) inset;
			-moz-border-radius:	2px; 
			border-radius:		2px;
		}
		article:before,
		article:after{
			content:			'';
			position:			absolute; 
			z-index:			-2;
			bottom:				15px;
			left:				10px;
			width:				50%;
			height:				20%;
			max-width:			300px;
			-webkit-box-shadow:	0 15px 10px rgba(0, 0, 0, 0.7);   
			-moz-box-shadow:	0 15px 10px rgba(0, 0, 0, 0.7);
			box-shadow:			0 15px 10px rgba(0, 0, 0, 0.7);
			-webkit-transform:	rotate(-3deg);    
			-moz-transform:		rotate(-3deg);   
			-ms-transform:		rotate(-3deg);   
			-o-transform:		rotate(-3deg);
			transform:			rotate(-3deg);
		}
		article::after {
			right:				10px; 
			left:				auto;
			-webkit-transform:	rotate(3deg);   
			-moz-transform:		rotate(3deg);  
			-ms-transform:		rotate(3deg);  
			-o-transform:		rotate(3deg);
			transform:			rotate(3deg);
		}
		footer{
			font-size:		0.7em;
			border-top		1px solid #CCC;
			text-align:		center;
		}
		footer span{
			font-size:		2em;
			font-family:	serif;
			padding-top:	-2em;
			line-height:	2em	;
			margin:			0 0.3em;
			position:		relative;
			vertical-align:	baseline;
			top: -0.7em;
		}
		
		
	</style>
</head>

<body>

	<header>
		<p><?php echo $title ?></p>

	</header>

	<article>
		<?php echo $html ?>
	</article>

	
	<footer>
		
	</footer>


</body>

</html>
