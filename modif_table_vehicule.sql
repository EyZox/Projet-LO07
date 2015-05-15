ALTER TABLE `vehicule` DROP `id`;
ALTER TABLE `vehicule` ADD PRIMARY KEY(`conducteur`);
ALTER TABLE  `vehicule` CHANGE  `couleur`  `couleur` VARCHAR( 7 ) NOT NULL;