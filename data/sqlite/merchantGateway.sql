DROP TABLE IF EXISTS merchantGateway;

CREATE TABLE merchantGateway(
	merchant_gateway_id INTEGER PRIMARY KEY AUTOINCREMENT,
	merchant_gateway_name VARCHAR(255) NOT NULL,
	merchant_gateway_class VARCHAR(255) NOT NULL,
	UNIQUE(merchant_gateway_name),
	UNIQUE(merchant_gateway_class)
);

CREATE INDEX idx_merchant_gateway_name ON merchantGateway(merchant_gateway_name);
CREATE INDEX idx_payment_class ON merchantGateway(merchant_gateway_class);

INSERT INTO merchantGateway VALUES(1, 'PayPal', 'Service_Paypal');
INSERT INTO merchantGateway VALUES(2, 'Google Checkout', 'Service_GoogleCheckout');