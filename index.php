<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/vendor/autoload.php';

use Source\Core\Token;
use Source\Core\Imgur;
use Source\Core\Image;
use Source\Core\Album;

$code = fakeDB();
$token  =  (new Token())->setCode($_GET['code'])->getToken();

echo "<h1>Token</h1>";
var_dump($token);
echo "<hr>";

echo "<h1>Todas Imagens</h1>";
//get images
$imgur = new Imgur($token);
$fotos = $imgur->getImages();
var_dump($fotos);
echo "<hr>";


echo "<h1>Info da Imagem</h1>";
$foto  = $imgur->getImage("fTzTrZ7");
var_dump($foto);
echo "<hr>";



echo "<h1>Novo Album</h1>";
$album = (new Album())->setInfo("Novo Album", "Novo Album")->setCover("XRTZn46");
//$novoal = $imgur->createAlbum($album);
var_dump("iyFiBk9");
echo "<hr>";

echo "<h1>Upload Imagem na Raiz</h1>";
$imagem = (new Image("Titulo", "Mais um Titulo"))->setImageBase64(fakeImg());
//$uploaded  = $imgur->uploadImage($imagem);
var_dump("XRTZn46");
echo "<hr>";


echo "<h1>Upload Imagem no Album</h1>";
$imagem = (new Image("Titulo", "Mais um Titulo"))->setImageBase64(fakeImg())->setAlbum("iyFiBk9");
//$uploaded  = $imgur->uploadImage($imagem);
var_dump("qZm3HPQ");
echo "<hr>";

echo "<h1>Deleta a  Imagem no Album</h1>";
//$deletado = $imgur->deleteImage("XRTZn46");
//var_dump($deletado);
echo "<hr>";

echo "<h1>Altera informação da foto</h1>";
$imagem = new Image("Novo Titulo", "Caramba", "WIxzCBi");
//$updated = $imgur->updateImage($imagem);
var_dump("WIxzCBi");
echo "<hr>";


echo "<h1>Remove Album</h1>";
$deletedAl = $imgur->deleteAlbum("iyFiBk9");
var_dump($deletedAl);
echo "<hr>";
