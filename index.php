<?php

/*
 * Simple script to automate classes loading
 * Ideal sandbox for basic tests
 *
 * Created by egel 2011 - Maciej Sypień
 */

// Order of loading files is important!
include_once 'config.php'; // Load simple local config
include_once 'methods.php'; // Load simple local methods

try
{
  // Testowanie połaczenia MySQL lub pokazanie błedu
  $lacz = connect_db();

  // Sprawdzenie czy jest przekazana strona, jeśli nie to przekieruje na stronę główną
  if(isset($_GET['page']))
  {
    $strona = $_GET['page'];
  }
  else
  {
    $strona = 'glowna';
  }


  // prosta zmieniarka dla stron ( tak prosta że, aż boli ta prostota :P )
  switch ($strona)
  {
    // Strona główna, dodatkowo jest stroną domyślną
    default:
    case 'glowna':
      $page_glowna = new Page("Strona Główna", "To jest super krótki wstęp na stronę główną");
      $page_glowna->render_page();
      break;

    case 'gazetka':
      // Strona poświęcona zoo
      $page_gazetka = new Page("Strona z gazetką promocyjną", "bla bla bla", TRUE);
      break;

    case 'kontakt':
      $page_kontakt = new Page("Kontakt", "To jest strona z kontaktem");
      $page_kontakt->render_page();
  }
}
catch(Exception $e)
{
  echo "<p>";
  echo "Exception occured in " . $e->getFile() . " on line " . $e->getLine() . "<br/>";
  echo "Message: " . $e->getMessage() . "</br>";
  echo "Code of error: " . $e->getCode();
  echo "</p>";
}
?>
