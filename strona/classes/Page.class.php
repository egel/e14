<?php

class Page
{

  // To są domyślne ustawienia zmiennych
  protected $_title      ="Not set yet";
  protected $_head       ="Not set yet";
  protected $_body       ="Not set yet";
  protected $_mainmenu   ="Not set yet";

  protected $_meta_description = "";
  protected $_meta_keywords = "";
  protected $_meta_author = "Gal Anonim";

	/*
	 * Constructors and destructors (default = not declared)
	 */
	public function __construct($title, $body, $show_now=FALSE)
  {
    // zwykłe przypisanie tytułu
    $this->_title = $title;

    // tworzenie instancji obiektu menu i dopisanie go do zmiennej _mainmenu
    $menu = new Menu();
    $this->_mainmenu = $menu->get_menus();

    // dopisanie informacji z zmiennej $body otrzmanej z zewnątrz,
    // do zmiennej wewnętrznej $_body w klasie Page
    $this->_body = $body;


    // Czy strona ma odrazu się wyrenderować na ekranie
    if ($show_now === TRUE)
    {
      $this->render_page();
    }
  }

  public function get_head()
  {
    return '
    <!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="'.$this->_meta_description.'">
        <meta name="author" content="'.$this->_meta_author.'">
        <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

        <title>'.$this->_title.'</title>

        <!-- CSS -->
        <link href="'.CSS_BASEDIR.'/styles.css" rel="stylesheet">
      </head>
    ';
  }

  public function get_body()
  {
    $tresc = '
      <body>
        <div id="naglowek-strony">
        </div>

        <div id="calosc">
          <div id="menu-nawigacyjne">
          '.$this->_mainmenu.'
          </div>

          <div id="tresc-strony">
          '.$this->_body.'
          </div>

          <div id="nowosci"></div>
        </div><!-- end calosc -->

        <div id="pasek-statusu">
        </div>

        <!-- Core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="'.JS_BASEDIR.'/scripts.js"></script>
      </body>
    </html>
    ';

    return $tresc;
  }

  public function render_page()
  {
    echo $this->get_head();
    echo $this->get_body();
  }
}

?>
