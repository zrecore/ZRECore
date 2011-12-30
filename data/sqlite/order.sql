DROP TABLE IF EXISTS `order`;

CREATE TABLE `order`(
	order_id INTEGER PRIMARY KEY AUTOINCREMENT,
	order_amount_total FLOAT NOT NULL,
	order_date INTEGER NOT NULL,
	order_ip VARCHAR(15) NOT NULL,
	order_email VARCHAR(255) NOT NULL,
	order_address1 VARCHAR(255) NOT NULL,
	order_address2 VARCHAR(255) DEFAULT NULL,
	order_city VARCHAR(255) NOT NULL,
	order_state_province  VARCHAR(255) NOT NULL,
	order_zip_code VARCHAR(16) NOT NULL,
	order_phone1 VARCHAR(32) DEFAULT NULL,
	order_phone2 VARCHAR(32) DEFAULT NULL,
	order_is_draft INTEGER DEFAULT 1,
	order_is_final INTEGER DEFAULT 0,

	order_currency_id_fk INTEGER NOT NULL,
	order_status_id_fk INTEGER NOT NULL,
	order_merchant_gateway_id_fk INTEGER NOT NULL,

	FOREIGN KEY(order_currency_id_fk) REFERENCES currency(currency_id),
	FOREIGN KEY(order_status_id_fk) REFERENCES orderStatus(order_status_id),
	FOREIGN KEY(order_merchant_gateway_id_fk) REFERENCES merchantGateway(merchant_gateway_id)
);

CREATE INDEX idx_order_amount_total ON `order`(order_amount_total);
CREATE INDEX idx_order_date ON `order`(order_date);
CREATE INDEX idx_order_ip ON `order`(order_ip);