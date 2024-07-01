DELIMITER $$

CREATE PROCEDURE ZaposleniciIPlace()
BEGIN
    SELECT id, ime, prezime, placa
    FROM Zaposlenik;
END $$

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE DohvatiVoditelje()
BEGIN
    SELECT DISTINCT Z.ID, Z.Ime, Z.Prezime, Z.Placa
    FROM Zaposlenik Z
    JOIN Odjel O ON Z.ID = O.ID_voditelja;
END $$

DELIMITER ;

DELIMITER $$

CREATE PROCEDURE prosjecnaPlaca()
BEGIN
    SELECT AVG(placa) AS ProsjecnaPlaca
    FROM Zaposlenik;
END $$

DELIMITER ;


DELIMITER $$

CREATE PROCEDURE ProsjecnaPlacaVoditelja()
BEGIN
    DECLARE prosjecna DECIMAL(10, 2);

    
    CREATE TEMPORARY TABLE IF NOT EXISTS PlaceVoditelja (
        Placa DECIMAL(10, 2)
    );

    
    INSERT INTO PlaceVoditelja (placa)
    SELECT Z.Placa
    FROM Zaposlenik Z
    JOIN Odjel O ON Z.ID = O.ID_voditelja;

    
    SELECT AVG(Placa) INTO prosjecna
    FROM PlaceVoditelja;

    
    DROP TEMPORARY TABLE IF EXISTS PlaceVoditelja;

    
    SELECT prosjecna AS ProsjecnaPlacaVoditelja;
END $$

DELIMITER ;


