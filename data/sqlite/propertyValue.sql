DROP TABLE IF EXISTS propertyValue;

CREATE TABLE propertyValue(
	property_value_id INTEGER PRIMARY KEY AUTOINCREMENT,
	property_value_text VARCHAR(255) NOT NULL,
	property_type_id_fk INTEGER NOT NULL,

	UNIQUE(property_value_text, property_type_id_fk),
	FOREIGN KEY(property_type_id_fk) REFERENCES propertyType(property_type_id)
);

CREATE INDEX idx_property_value_text ON propertyValue(property_value_text);
CREATE INDEX idx_property_value_property_type_id_fk ON propertyValue(property_type_id_fk);