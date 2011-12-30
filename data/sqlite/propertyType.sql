DROP TABLE IF EXISTS propertyType;

CREATE TABLE propertyType(
	property_type_id INTEGER PRIMARY KEY AUTOINCREMENT,
	property_type VARCHAR(255) NOT NULL,

	UNIQUE(property_type)
);

CREATE INDEX idx_property_type ON propertyType(property_type);

INSERT INTO propertyType VALUES(1,'button');
INSERT INTO propertyType VALUES(2,'checkbox');
INSERT INTO propertyType VALUES(3,'file');
INSERT INTO propertyType VALUES(4,'hidden');
INSERT INTO propertyType VALUES(5,'image');
INSERT INTO propertyType VALUES(6,'password');
INSERT INTO propertyType VALUES(7,'radio');
INSERT INTO propertyType VALUES(8,'reset');
INSERT INTO propertyType VALUES(9,'submit');
INSERT INTO propertyType VALUES(10,'text');
INSERT INTO propertyType VALUES(11,'textarea');
INSERT INTO propertyType VALUES(12,'select');
INSERT INTO propertyType VALUES(13,'combo');

INSERT INTO propertyType VALUES(14,'date');
INSERT INTO propertyType VALUES(15,'time');
INSERT INTO propertyType VALUES(16,'daterange');
INSERT INTO propertyType VALUES(17,'timerange');
INSERT INTO propertyType VALUES(18,'datetime');
INSERT INTO propertyType VALUES(19,'datetimerange');