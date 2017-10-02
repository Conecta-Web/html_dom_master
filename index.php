<!doctype html>
<html>
    <head>
		  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Webscrapper</title>
    </head>
    <body>

<form action="" method="post">
Pesquisa: <input type="text" name="pesquisa"><br>
<input type="submit">
</form>  <br/><br/><br/>

<!-- <a href="/simple_html_dom-master">Voltar</a> -->

<table border="0" width="100%">
		<tr>
			<th>Imagem</th>
			<th>Titulo</th>
			<th>Autor</th>
			<th>Views</th>
			<th>Tempo</th>
			<th>Link</th>
		</tr>
<?php
ini_set( 'display_errors', 0 );
require 'simple_html_dom.php';

$pesquisa = $_POST["pesquisa"];

$string = str_replace(" ","%20","$pesquisa");

$html = file_get_html('https://www.youtube.com/results?search_query='.$string);


$results = $html->find('.yt-lockup');

foreach ($results as $video) {
	
	$imagem = $video->find('.yt-thumb-simple img', 0)->attr['src'];
	$tempo = $video->find('.video-time', 0)->plaintext; 
	$link = 'https://www.youtube.com'.$video->find('.yt-lockup-title a', 0)->href;
	$titulo = $video->find('.yt-lockup-title a', 0)->plaintext;
	$autor = $video->find('.yt-lockup-byline a', 0)->plaintext;
	$views = $video->find('.yt-lockup-meta-info li', 1)->plaintext;
	?>
		<tr>
			<td><img src="<?php echo $imagem; ?>" border="0" height="80"/></td>
			<td><?php echo $titulo ?></td>
			<td><?php echo $autor ?></td>
			<td><?php echo $views ?></td>
			<td><?php echo $tempo ?></td>
			<td><a target=“_blank” href="<?php echo $link; ?>"><?php echo $link; ?></a></td>
		</tr>
<?php
}
?>
</table>        

    </body>
</html>
