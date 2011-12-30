DROP TABLE IF EXISTS item;

CREATE TABLE item(
	item_id INTEGER PRIMARY KEY AUTOINCREMENT,
	item_name VARCHAR(255) NOT NULL,
	item_slug VARCHAR(255) NOT NULL,
	item_sku VARCHAR(255) NOT NULL,
	item_description TEXT NOT NULL,
	price FLOAT NOT NULL,
	currency_id_fk INTEGER NOT NULL,
	category_id_fk INTEGER NOT NULL,
	availability_date INTEGER NOT NULL,
	finite_amount_available INTEGER DEFAULT NULL,
	finite_unit_of_measure VARCHAR(255) DEFAULT NULL,
	max_purchase_amount INTEGER NOT NULL,
	metric_unit_of_measure VARCHAR(255) DEFAULT NULL,
	metric_width FLOAT DEFAULT NULL,
	metric_height FLOAT DEFAULT NULL,
	metric_depth FLOAT DEFAULT NULL,
	min_purchase_amount INTEGER NOT NULL,
	perishable_date INTEGER DEFAULT NULL,
	weight FLOAT DEFAULT NULL,
	weight_unit_of_measure VARCHAR(255) DEFAULT NULL,
	is_available INTEGER DEFAULT 0,
	is_finite INTEGER DEFAULT 1,
	is_perishable INTEGER DEFAULT 0,
	is_tangible INTEGER DEFAULT 1,
	UNIQUE(item_name),
	UNIQUE(item_sku),
	
	FOREIGN KEY(category_id_fk) REFERENCES category(category_id)
);

CREATE INDEX idx_item_name ON item(item_name);
CREATE INDEX idx_item_slug ON item(item_slug);
CREATE INDEX idx_item_sku ON item(item_sku);
CREATE INDEX idx_price ON item(price);
CREATE INDEX idx_currency_id_fk ON item(currency_id_fk);
CREATE INDEX idx_category_id_fk ON item(category_id_fk);
CREATE INDEX idx_availability_date ON item(availability_date);
CREATE INDEX idx_finite_amount_available ON item(finite_amount_available);
CREATE INDEX idx_finite_unit_of_measure ON item(finite_unit_of_measure);
CREATE INDEX idx_max_purchase_amout ON item(max_purchase_amount);
CREATE INDEX idx_metric_unit_of_measure ON item(metric_unit_of_measure);
CREATE INDEX idx_metric_width ON item(metric_width);
CREATE INDEX idx_metric_height ON item(metric_height);
CREATE INDEX idx_metric_depth ON item(metric_depth);
CREATE INDEX idx_min_purchase_amount ON item(min_purchase_amount);
CREATE INDEX idx_perishable_date ON item(perishable_date);
CREATE INDEX idx_weight ON item(weight);
CREATE INDEX idx_weight_unit_of_measure ON item(weight_unit_of_measure);
CREATE INDEX idx_is_available ON item(is_available);
CREATE INDEX idx_is_finite ON item(is_finite);
CREATE INDEX idx_is_perishable ON item(is_perishable);
CREATE INDEX idx_is_tangible ON item(is_tangible);