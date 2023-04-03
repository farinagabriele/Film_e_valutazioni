CREATE TABLE Valutazione (
    id_valutazione INT AUTO_INCREMENT,
    valutazione INT,
    commento VARCHAR(250),
    data_e_ora DATETIME,
    cod_utente CHAR(5),
    cod_film CHAR(5),
    PRIMARY KEY (id_valutazione),
    FOREIGN KEY (cod_utente) REFERENCES Utente(cod_utente),
    FOREIGN KEY (cod_film) REFERENCES Film(cod_film)
);