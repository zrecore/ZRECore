DROP TABLE IF EXISTS property;

CREATE TABLE property(
	property_id INTEGER PRIMARY KEY AUTOINCREMENT,
	property_name VARCHAR(255) NOT NULL,
	property_type_id_fk INTEGER NOT NULL,
	property_is_required INTEGER DEFAULT 0,

	FOREIGN KEY(property_type_id_fk) REFERENCES propertyType(property_type_id)
);

CREATE INDEX idx_property_name ON property(property_name);
CREATE INDEX idx_property_type_id_fk ON property(property_type_id_fk);