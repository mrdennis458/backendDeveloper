
    
INSERT INTO Zaposlenik (ime, prezime, email, telefonski_broj, placa) VALUES
    ('Dennis', 'Jandric', 'denis.jandric@gmail.com', '091234564', 1500.00),
    ('Ana', 'Kovač', 'ana.kovac@gmail.com', '091234565', 1600.00),
    ('Marko' , 'Horvat', 'marko.horvat@gmail.com', '091234566', 1700.00),
    ('Ivana' , 'Babić', 'ivana.babic@gmail.com', '091234567', 1800.00),
    ('Luka' , 'Matić', 'luka.matic@gmail.com', '091234568', 1900.00),
    ('Maja' , 'Novak', 'maja.novak@gmail.com', '091234569', 2000.00),
    ('Ivan' , 'Kovačić', 'ivan.kovacic@gmail.com', '091234570', 2100.00),
    ('Marija' , 'Vuković', 'marija.vukovic@gmail.com', '091234571', 2200.00),
    ('Petar' , 'Božić', 'petar.bozic@gmail.com', '091234572', 2300.00),
    ('Lucija' , 'Jurić', 'lucija.juric@gmail.com', '091234573', 2400.00),
    ('Filip' , 'Perić', 'filip.peric@gmail.com', '091234574', 2500.00);



INSERT INTO Odjel (id,ime_odjela, id_voditelja) VALUES
    (1,'Prodaja', 4),
    (2,'Marketing', 5),
    (3,'Financije', 7),
    (4,'Skladište', 8),
    (5,'IT', 9);

INSERT INTO Pozicija (ime_pozicije) VALUES
    ('junior'),
    ('mid'),
    ('senior'),
    ('lead');

INSERT INTO OdjelZaposlenik (id_zaposlenika, id_odjela) VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 1),
    (6, 2),
    (7, 3),
    (8, 5),
    (9, 3),
    (10, 4),
    (11, 1);
        
    

