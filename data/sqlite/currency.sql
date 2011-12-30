DROP TABLE IF EXISTS currency;

CREATE TABLE currency(
	currency_id INTEGER PRIMARY KEY AUTOINCREMENT,
	currency_code VARCHAR(3) NOT NULL,
	currency_name VARCHAR(255) NOT NULL,
	currency_is_default INTEGER NOT NULL DEFAULT 0
);

CREATE INDEX idx_currency_code ON currency(currency_code);

INSERT INTO currency VALUES(1, 'USD', 'U.S. Dollar', 1);
INSERT INTO currency VALUES(2, 'EUR', 'Euro', 0);
INSERT INTO currency VALUES(3, 'GBP', 'British Pound', 0);
INSERT INTO currency VALUES(4, 'INR', 'Indian Rupee', 0);
INSERT INTO currency VALUES(5, 'AUD', 'Australian Dollar', 0);
INSERT INTO currency VALUES(6, 'CAD', 'Canadian Dollar', 0);
INSERT INTO currency VALUES(7, 'AED', 'Emirati Dirham', 0);
INSERT INTO currency VALUES(8, 'CHF', 'Swiss Franc', 0);

-- Insert your own currency records as you see fit --