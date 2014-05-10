CREATE TABLE IF NOT EXISTS `#__com_iscrizioni` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`createdate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`nome` VARCHAR(255)  NOT NULL ,
`cognome` VARCHAR(255)  NOT NULL ,
`nome_battaglia` VARCHAR(255)  NOT NULL ,
`foto` VARCHAR(255)  NOT NULL ,
`data_nascita` DATE NOT NULL DEFAULT '0000-00-00',
`luogo_nascita` VARCHAR(255)  NOT NULL ,
`via` VARCHAR(255)  NOT NULL ,
`comune` VARCHAR(255)  NOT NULL ,
`provincia` VARCHAR(255)  NOT NULL ,
`codice_fiscale` VARCHAR(255)  NOT NULL ,
`recapito_telefonico` VARCHAR(255)  NOT NULL ,
`recapito_email` VARCHAR(255)  NOT NULL ,
`percorso` VARCHAR(255)  NOT NULL ,
`gruppo` VARCHAR(255)  NOT NULL ,
`pagato` VARCHAR(30)  NOT NULL ,
`email_conferma` BOOLEAN NOT NULL ,
`canc` BOOLEAN NOT NULL ,
`privacy` BOOLEAN NOT NULL ,
`pubblicita` BOOLEAN NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

