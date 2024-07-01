DROP DATABASE IF EXISTS parcijalni_ispit;


CREATE DATABASE IF NOT EXISTS parcijalni_ispit DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE parcijalni_ispit;

CREATE TABLE IF NOT EXISTS Zaposlenik (
  id int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  ime varchar(50),
  prezime varchar(50),
  email varchar(100),
  telefonski_broj varchar(20),
  id_pozicije int,
  placa decimal(10,2)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS Odjel (
  id int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  ime_odjela varchar(50),
  id_voditelja INT,
  FOREIGN KEY (ID_voditelja) REFERENCES Zaposlenik(ID) 
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS Pozicija (
  id int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  ime_pozicije varchar(50)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS OdjelZaposlenik (
  id_zaposlenika int NOT NULL,
  id_odjela int NOT NULL,
  PRIMARY KEY (id_zaposlenika, id_odjela),
  FOREIGN KEY (id_zaposlenika) REFERENCES Zaposlenik(id),
  FOREIGN KEY (id_odjela) REFERENCES Odjel(id)
) ENGINE=InnoDB;


ALTER TABLE Zaposlenik
ADD CONSTRAINT FK_pozicija_zaposlenika
FOREIGN KEY (id_pozicije) REFERENCES Pozicija(id);






