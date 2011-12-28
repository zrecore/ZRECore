DROP TABLE IF EXISTS currency;

CREATE TABLE currency(
	currency_id INT PRIMARY KEY AUTOINCREMENT,
	currency_code VARCHAR(3) NOT NULL,
	currency_name VARCHAR(255) NOT NULL
);

CREATE INDEX idx_currency_code ON currency(currency_code);

INSERT INTO currency VALUES(1, 'USD', 'U.S. Dollar');
INSERT INTO currency VALUES(2, 'EUR', 'Euro');
INSERT INTO currency VALUES(3, 'GBP', 'British Pound');
INSERT INTO currency VALUES(4, 'INR', 'Indian Rupee');
INSERT INTO currency VALUES(5, 'AUD', 'Australian Dollar');
INSERT INTO currency VALUES(6, 'CAD', 'Canadian Dollar');
INSERT INTO currency VALUES(7, 'AED', 'Emirati Dirham');
INSERT INTO currency VALUES(8, 'CHF', 'Swiss Franc');

-- Insert your own currency records as you see fit --