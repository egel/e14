<?php

// uzyskanie ścieżki URL
// poniższy skrypt może zaowocować różnymi wariantami ale znajdziemy na to szybkie obejście
// Warianty:
//   http://localhost/~maciej/e14/strona/index.php?page=kontakt
//   http://localhost/~maciej/e14/strona/index.php?page=glowna
//   http://localhost/~maciej/e14/strona/index.php
$dir = 'http://'. $_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];
$temp_dir = explode('/', $dir);  // Rodziela ścieżkę na małe elementy rozdzielone znakami /
array_pop($temp_dir);   // usuwa ostatni element z tablicy
$dir = implode('/', $temp_dir);  // łączy ponownie wszystkie elementy


// Uzyskanie ścieżki absolutnej do pliku
// Np:
//    Windows:   C:/jakis/folder/z/obrazkami
//    Linux:     /jakis/folder/z/obrazkami
$current_file_path = __FILE__;
$temp_path = explode('/', $current_file_path);
array_pop($temp_path);   // usuwa ostatni element z tablicy
$absolute_path = implode('/', $temp_path);  // łączy ponownie wszystkie elementy



define('BASEDIR',             $dir.'/');
define('MEDIA_BASEDIR',       $dir.'/./media/');
define('ABS_GALLERY_BASEDIR', $absolute_path.'/media/gallery/');
define('GALLERY_BASEDIR',     $dir.'/media/gallery/');
define('JS_BASEDIR',          $dir.'/js/');
define('CSS_BASEDIR',         $dir.'/css/');

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','ropa');
define('DB_NAME','sklep_lidl');

/*
 * Setting for the local time zone to prevent form warrings
 * in case of using time and date functions
 */
date_default_timezone_set('Europe/Warsaw');

?>
