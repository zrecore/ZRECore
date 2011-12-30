DROP TABLE IF EXISTS itemProperty;

CREATE TABLE itemProperty(
	item_id_fk INTEGER NOT NULL,
	property_id_fk INTEGER NOT NULL,

	UNIQUE(item_id_fk, property_id_fk),
	FOREIGN KEY(item_id_fk) REFERENCES item(item_id),
	FOREIGN KEY(property_id_fk) REFERENCES property(property_id)
);

CREATE INDEX idx_item_property_item_id_fk ON itemProperty(item_id_fk);
CREATE INDEX idx_property_id_fk ON itemProperty(property_id_fk);