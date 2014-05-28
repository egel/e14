DROP database IF EXISTS sklep_lidl;

CREATE database sklep_lidl;
USE sklep_lidl;

ALTER DATABASE `sklep_lidl` DEFAULT CHARACTER SET `utf8` COLLATE `utf8_polish_ci`;


/**
 *	Main menu
 */
DROP TABLE IF EXISTS nowosci;
CREATE TABLE nowosci
(
	id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	author VARCHAR(65) COLLATE utf8_polish_ci NOT NULL,
	title VARCHAR(255) COLLATE utf8_polish_ci NOT NULL,
	content TEXT COLLATE utf8_polish_ci NOT NULL,
	created TIMESTAMP DEFAULT 0,
	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
INSERT INTO nowosci VALUES(1, 'Gal Anonim', 'Kraków najlepszy!', 'Kraków stał się jednym z najwiekszych ośrodków wczasowych w Polsce.', '2013-08-05 18:19:03');
INSERT INTO nowosci VALUES(2, 'Lucjan Szołajski', 'Dobra robota', 'Super stronka. Oby tak dalej! :)', NOW());
INSERT INTO nowosci VALUES(3, 'Marek Starybrat', 'OK', 'Świetnie sobie radzisz, tak przymać!', CURRENT_TIMESTAMP);
INSERT INTO nowosci VALUES(4, 'Maciej Sypień', 'Szacuneczek!', 'Tworzycie niesamowite rzeczy. Wielki szacun.', CURRENT_TIMESTAMP);


/**
 *	Main menu
 */
DROP TABLE IF EXISTS mainmenu;
CREATE TABLE mainmenu
(
	id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	slug VARCHAR(30) COLLATE utf8_polish_ci NOT NULL,
	name TEXT COLLATE utf8_polish_ci NOT NULL,
	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
INSERT INTO mainmenu VALUES(1, 'glowna', 'Strona Główna');
INSERT INTO mainmenu VALUES(2, 'gazetka', 'Gazetka promocyjna');
INSERT INTO mainmenu VALUES(3, 'kontakt', 'Kontakt');
