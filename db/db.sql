DROP TABLE IF EXISTS properties;

CREATE TABLE properties (
	id INT(4) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	town VARCHAR(50),
	description TEXT,
	address VARCHAR(50),
	imageFull VARCHAR(50),
	numBedrooms TINYINT(1),
	price INT(4),
	propertyType TINYINT(1),
	propertyStatus TINYINT(1) COMMENT '0: NOT AVAILABLE; 1: FOR SALE; 2: FOR RENT',
	create_at VARCHAR(50),
	update_at VARCHAR(50)
);

