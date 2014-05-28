<?php

/*
 *	IMPORTANT INFO!!!
 *	THIS FILR SHOULD BE ENCRYPTED WITH UTF-8 (without BOM)
 */


// -----------------------------------------------------------------------------
/*
 *	MySQL connection for local datebase
 */
function connect_db()
{
	$db_wynik = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if (mysqli_connect_errno() === 0)
	{
		$db_wynik -> query("SET NAMES 'utf8'");
	}
	else
	{
		throw new Exception(mysqli_connect_error(), mysqli_connect_errno());
	}

	if(!$db_wynik)
	{
		return false;
	}
	return $db_wynik;
}



/*
 * Simple function and call of autoload classes
 */
function __autoload_my_classes($className)
{
	require_once 'classes/'.$className.'.class.php';
}
spl_autoload_register('__autoload_my_classes');



/*
 *	$back_btn 	- oznacza czy ma pokazywać przycisc wstecz (powoduje przeskoczenie o 1 pozycje w historii)
 */
function note($kolor, $tresc, $back_btn=false)
{
	echo "<div class='$kolor' >";
	echo $tresc;
	if($back_btn)
	{
		echo "<form name='Historia'><input type='button' value='Wróć' onClick='history.back()' /></form>";
	}
	echo "</div><!-- $kolor -->";
	echo "<br />";
}

?>
