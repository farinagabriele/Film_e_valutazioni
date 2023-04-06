CREATE TABLE Valutazioni (
    id_valutazione INT AUTO_INCREMENT,
    valutazione INT,
    commento VARCHAR(250),
    data_e_ora DATETIME,
    id_utente INT,
    cod_film CHAR(5),
    PRIMARY KEY (id_valutazione),
    FOREIGN KEY (id_utente) REFERENCES Utente(id_utente),
    FOREIGN KEY (cod_film) REFERENCES Film(cod_film)
);