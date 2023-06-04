CREATE TABLE Risultati(
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    squadra_casa VARCHAR(30) NOT NULL,
    squadra_ospite VARCHAR(30) NOT NULL,
    gol_casa INT NOT NULL,
    gol_ospite INT NOT NULL
);
