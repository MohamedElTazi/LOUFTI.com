#  création de la base  MANGA

CREATE DATABASE MANGA DEFAULT CHARACTER SET utf8 COLLATE utf8_swedish_ci;
use MANGA ;

DROP TABLE IF EXISTS oeuvre;
DROP TABLE IF EXISTS mangaka;

CREATE TABLE mangaka
(
NomMangaka VARCHAR( 15 ) NOT NULL ,
PrenomMangaka VARCHAR( 15 ) NOT NULL ,
PRIMARY KEY ( `NomMangaka` ) 
) ENGINE=Innodb;

CREATE TABLE oeuvre
(
NomManga VARCHAR(15) ,
GenreManga VARCHAR(25) ,
DateSortie DATE NOT NULL ,
NomMangaka VARCHAR( 15 ) NOT NULL ,
PrenomMangaka VARCHAR( 15 ) NOT NULL ,
PrixManga DECIMAL(4,2) NOT NULL,
PRIMARY KEY ( NomManga ),
foreign key (NomMangaka) references mangaka (NomMangaka)
) ENGINE=Innodb;

CREATE TABLE mangasujets (
	id int(6) NOT NULL auto_increment,
	auteur VARCHAR(30) NOT NULL,
	titre VARCHAR(30) NOT NULL,
	date_derniere_reponse datetime NOT NULL default '0000-00-00 00:00:00',
	PRIMARY KEY  (id)
) ENGINE=innodb;
	
CREATE TABLE mangareponses (
	id int(6) NOT NULL auto_increment,
	auteur VARCHAR(30) NOT NULL,
	message varchar(150) NOT NULL,
	date_reponse datetime NOT NULL default '0000-00-00 00:00:00',
	correspondance_sujet int(6) NOT NULL,
	PRIMARY KEY  (id),
	FOREIGN KEY (correspondance_sujet) REFERENCES sujets(id)
) ENGINE=innodb;


#   création du jeu d essai de la base manga

INSERT INTO mangaka values ('Toriyama', 'Akira');
INSERT INTO mangaka values ('Obata', 'Takeshi');
INSERT INTO mangaka values ('Murata', 'Yusuke'); 
INSERT INTO mangaka values ('Oda', 'Eiichiro'); 
INSERT INTO mangaka values ('Inoue', 'Takehiko'); 
INSERT INTO mangaka values ('Sorachi', 'Hideaki');
INSERT INTO mangaka values ('Araki', 'Hirohiko');
INSERT INTO mangaka values ('Hojo', 'Tsukasa');
INSERT INTO mangaka values ('Togashi', 'Yoshiro');
INSERT INTO mangaka values ('Katsura', 'Masakazu');
INSERT INTO mangaka values ('Kishimoto', 'Masashi');
INSERT INTO mangaka values ('Hara', 'Tetsuo');
INSERT INTO mangaka values ('Kubo', 'Tite');

INSERT INTO oeuvre values ('Dragon Ball', 'Nekketsu', '1984-11-20', 'Toriyama','Akira',6.90);
INSERT INTO oeuvre values ('Eyeshield 21', 'Nekketsu', '2002-07-23', 'Murata','Yusuke',6.90);
INSERT INTO oeuvre values ('Death Note', 'Policier', '2003-12-01', 'Obata','Takeshi',6.90);
INSERT INTO oeuvre values ('One Piece', 'Nekketsu', '1997-07-22', 'Oda','Eiichiro',6.90);
INSERT INTO oeuvre values ('Slam Dunk', 'Sport', '1990-10-01', 'Inoue','Takehiko',6.90);
INSERT INTO oeuvre values ('Gintama', 'Action', '2003-12-08', 'Sorachi','Hideaki',6.90);
INSERT INTO oeuvre values ('JoJo', 'Action', '1986-12-02', 'Araki','Hirohiko',6.90);
INSERT INTO oeuvre values ('City Hunter', 'Action', '1985-02-26', 'Hojo','Tsukasa',6.90);
INSERT INTO oeuvre values ('HunterxHunter', 'Nekketsu', '1998-03-03', 'Togashi','Yoshiro',6.90);
INSERT INTO oeuvre values ('Zetman', 'Science Fiction', '2002-10-31', 'Katsura','Masakazu',6.90);
INSERT INTO oeuvre values ('Naruto', 'Nekketsu', '1999-09-20', 'Kishimoto','Masashi',6.90);
INSERT INTO oeuvre values ('Hokuto No Ken', 'Post-Apocalyptique', '1983-09-13', 'Hara','Tetsuo',6.90);
INSERT INTO oeuvre values ('Bleach', 'Nekketsu', '2001-08-07', 'Kubo','Tite',6.90);




DROP TABLE IF EXISTS manga_sujets;
