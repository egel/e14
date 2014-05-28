<?php

class Menu
{

  // Lista stron jakie będą na stronach
	protected $pages = array( "glowna" => "Strona Główna",
                            "gazetka" => "Gazetka Promocyjna",
                            "kontakt" => "Strona Kontaktowa");

	/**
	 * Constructors and destructors (default = not declared)
	 */
	public function __construct($show_now=FALSE)
  {
    if ($show_now === TRUE)
    {
      $this->render_menu();
    }
  }

  /**
   *  Zwraca obiekt z listą menu głównego strony
   */
  public function get_menus()
  {
    $result = '<ul id="nav">';
    foreach ($this->pages as $key => $value) {
      $result .= '<li><a href="index.php?page='.$key.'">'.$value.'</a></li>';
    }
    $result .= '</ul>';

    return $result;
  }


  /**
   *  Renderuje na ekranie menu główne
   */
  public function render_menu()
  {
    echo $this->get_menus();
  }

}

?>
