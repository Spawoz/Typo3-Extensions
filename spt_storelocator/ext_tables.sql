CREATE TABLE tx_sptstorelocator_domain_model_storelocator (
	titel varchar(255) NOT NULL DEFAULT '',
	vorschautext text NOT NULL DEFAULT '',
	bild int(11) unsigned NOT NULL DEFAULT '0',
	kategorie varchar(255) NOT NULL DEFAULT '',
	adresse text NOT NULL DEFAULT '',
	geokoordinaten varchar(255) NOT NULL DEFAULT '',
	moreinfo varchar(255) NOT NULL DEFAULT '',
	latitude varchar(255) DEFAULT '' NOT NULL,
	longitude varchar(255) DEFAULT '' NOT NULL,
);
