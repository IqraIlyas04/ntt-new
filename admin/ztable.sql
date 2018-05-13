CREATE TABLE IF NOT EXISTS contacts
(
	contact_id int unsigned NOT NULL auto_increment,
	first_name varchar(255) NULL,
    last_name varchar(255) NULL,
    phn_no varchar(255)  NULL,
	created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,

	PRIMARY KEY(contact_id)
)

CREATE TABLE IF NOT EXISTS social_media
(
	sm_id int unsigned NOT NULL auto_increment,
	sm_title varchar(255) NULL,
    sm_link varchar(255) NULL,
	created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,

	PRIMARY KEY(sm_id)
)

CREATE TABLE IF NOT EXISTS destination
(
	dest_id int unsigned NOT NULL auto_increment,
	dest_title varchar(255) NULL,
    dest_img varchar(255) NULL,
    dest_duration varchar(255) NULL,
    dest_price varchar(255) NULL,
	created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,

	PRIMARY KEY(dest_id)
)

CREATE TABLE IF NOT EXISTS offers
(
	offer_id int unsigned NOT NULL auto_increment,
	offer_title varchar(255) NULL,
    offer_img varchar(255) NULL,
    offer_duration varchar(255) NULL,
    offer_price varchar(255) NULL,
	created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,

	PRIMARY KEY(offer_id)
)

CREATE TABLE IF NOT EXISTS partner
(
	partner_id int unsigned NOT NULL auto_increment,
	partner_title varchar(255) NULL,
    partner_img text NULL,
	created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,

	PRIMARY KEY(partner_id)
)

CREATE TABLE `City` (
  `city_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) NOT NULL DEFAULT '',
  `CountryCode` varchar(255) NOT NULL DEFAULT '',
  `District` varchar(255) NOT NULL DEFAULT '',
  `Population` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`city_id`)
    )