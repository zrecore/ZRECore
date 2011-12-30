DROP TABLE IF EXISTS service;

CREATE TABLE service(
	service_id INTEGER PRIMARY KEY AUTOINCREMENT,

	service_currency_id_fk INTEGER NOT NULL,
	service_requires_subscription INTEGER DEFAULT 0,
	service_name VARCHAR(255) NOT NULL,
	service_description TEXT NOT NULL,
	service_terms TEXT NOT NULL,
	service_price_per_unit FLOAT NOT NULL,
	service_unit_of_measure VARCHAR(32) NOT NULL,
	service_unit_amount FLOAT NOT NULL,
	service_is_on_site INTEGER NOT NULL DEFAULT 0,
	service_is_available INTEGER NOT NULL DEFAULT 0,

	UNIQUE(service_name),
	FOREIGN KEY(service_currency_id_fk) REFERENCES currency(currency_id)
);

CREATE INDEX idx_service_currency_id_fk ON service(service_currency_id_fk);
CREATE INDEX idx_service_requires_subscription ON service(service_requires_subscription);
CREATE INDEX idx_service_name ON service(service_name);
CREATE INDEX idx_service_price_per_unit ON service(service_price_per_unit);
CREATE INDEX idx_service_unit_of_measure ON service(service_unit_of_measure);
CREATE INDEX idx_service_unit_amount ON service(service_unit_amount);
CREATE INDEX idx_service_is_on_site ON service(service_is_on_site);
CREATE INDEX idx_service_is_available ON service(service_is_available);