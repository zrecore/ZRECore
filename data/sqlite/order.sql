DROP TABLE IF EXISTS `order`;

CREATE TABLE `order`(
	order_id INTEGER PRIMARY KEY AUTOINCREMENT,
	order_amount_total FLOAT NOT NULL,
	order_date INTEGER NOT NULL,
	order_modified_date INTEGER DEFAULT NULL,
	order_ip VARCHAR(15) NOT NULL,
	order_email VARCHAR(255) NOT NULL,
	order_address1 VARCHAR(255) NOT NULL,
	order_address2 VARCHAR(255) DEFAULT NULL,
	order_city VARCHAR(255) NOT NULL,
	order_state_province  VARCHAR(255) NOT NULL,
	order_zip_code VARCHAR(16) NOT NULL,
	order_phone1 VARCHAR(32) DEFAULT NULL,
	order_phone2 VARCHAR(32) DEFAULT NULL,
	order_is_final INTEGER DEFAULT 0,
	order_finalization_date INTEGER DEFAULT NULL,
	order_is_complete INTEGER DEFAULT 0,
	order_completion_date INTEGER DEFAULT NULL,
	order_is_void INTEGER DEFAULT 0,
	order_void_date INTEGER DEFAULT NULL,
	order_is_cancelled INTEGER DEFAULT 0,
	order_cancelled_date DEFAULT NULL,
	order_is_rma_requested INTEGER DEFAULT 0,
	order_rma_request_date INTEGER DEFAULT NULL,
	order_is_rma_sent INTEGER DEFAULT 0,
	order_rma_sent_date INTEGER DEFAULT NULL,
	order_is_rma_returned INTEGER DEFAULT 0,
	order_rma_returned_date INTEGER DEFAULT NULL,
	order_is_rma_complete INTEGER DEFAULT 0,
	order_rma_completion_date INTEGER DEFAULT NULL,
	order_notes TEXT DEFAULT NULL,

	order_creation_user_id_fk INTEGER DEFAULT NULL,
	order_last_modified_by_user_id_fk INTEGER DEFAULT NULL,
	order_currency_id_fk INTEGER NOT NULL,
	order_status_id_fk INTEGER NOT NULL,
	order_merchant_gateway_id_fk INTEGER NOT NULL,

	FOREIGN KEY(order_creation_user_id_fk) REFERENCES user(user_id),
	FOREIGN KEY(order_last_modified_by_user_id_fk) REFERENCES user(user_id),
	FOREIGN KEY(order_currency_id_fk) REFERENCES currency(currency_id),
	FOREIGN KEY(order_status_id_fk) REFERENCES orderStatus(order_status_id),
	FOREIGN KEY(order_merchant_gateway_id_fk) REFERENCES merchantGateway(merchant_gateway_id)
);

CREATE INDEX idx_order_amount_total ON `order`(order_amount_total);
CREATE INDEX idx_order_date ON `order`(order_date);
CREATE INDEX idx_order_modified_date ON `order`(order_modified_date);
CREATE INDEX idx_order_ip ON `order`(order_ip);
CREATE INDEX idx_order_email ON `order`(order_email);
CREATE INDEX idx_order_address1 ON `order`(order_address1);
CREATE INDEX idx_order_address2 ON `order`(order_address2);
CREATE INDEX idx_order_city ON `order`(order_city);
CREATE INDEX idx_order_state_province ON `order`(order_state_province);
CREATE INDEX idx_order_zip_code ON `order`(order_zip_code);
CREATE INDEX idx_order_phone1 ON `order`(order_phone1);
CREATE INDEX idx_order_phone2 ON `order`(order_phone2);
CREATE INDEX idx_order_is_final ON `order`(order_is_final);
CREATE INDEX idx_order_finalization_date ON `order`(order_finalization_date);
CREATE INDEX idx_order_is_complete ON `order`(order_is_complete);
CREATE INDEX idx_order_completion_date ON `order`(order_completion_date);
CREATE INDEX idx_order_is_void ON `order`(order_is_void);
CREATE INDEX idx_order_void_date ON `order`(order_void_date);
CREATE INDEX idx_order_is_cancelled ON `order`(order_is_cancelled);
CREATE INDEX idx_order_cancelled_date ON `order`(order_cancelled_date);

CREATE INDEX idx_order_is_rma_requested ON `order`(order_is_rma_requested);
CREATE INDEX idx_order_rma_request_date ON `order`(order_rma_request_date);
CREATE INDEX idx_order_is_rma_sent ON `order`(order_is_rma_sent);
CREATE INDEX idx_order_rma_sent_date ON `order`(order_rma_sent_date);
CREATE INDEX idx_order_is_rma_returned ON `order`(order_is_rma_returned);
CREATE INDEX idx_order_rma_returned_date ON `order`(order_rma_returned_date);
CREATE INDEX idx_order_is_rma_complete ON `order`(order_is_rma_complete);
CREATE INDEX idx_order_rma_completion_date ON `order`(order_rma_completion_date);

CREATE INDEX idx_order_last_modified_by_user_id_fk ON `order`(order_last_modified_by_user_id_fk);
CREATE INDEX idx_order_creation_user_id_fk ON `order`(order_creation_user_id_fk);
CREATE INDEX idx_order_currency_id_fk ON `order`(order_currency_id_fk);
CREATE INDEX idx_order_status_id_fk ON `order`(order_status_id_fk);
CREATE INDEX idx_order_merchant_gateway_id_fk ON `order`(order_merchant_gateway_id_fk);