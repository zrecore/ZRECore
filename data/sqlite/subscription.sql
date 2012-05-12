DROP TABLE IF EXISTS subscription;

CREATE TABLE subscription(
	subscription_id INTEGER PRIMARY KEY AUTOINCREMENT,

	subscription_currency_id_fk INTEGER NOT NULL,

	subscription_name VARCHAR(255) NOT NULL,
	subscription_description TEXT NOT NULL,
	subscription_terms TEXT NOT NULL,
	subscription_signup_fee FLOAT NOT NULL,
	subscription_is_recurring INTEGER NOT NULL DEFAULT 0,
	subscription_recurs_every_amount INTEGER DEFAULT NULL,
	subscription_recurs_every_unit VARCHAR(32) DEFAULT NULL,
	subscription_recurs_max_amount INTEGER DEFAULT NULL,
	subscription_price_per_unit FLOAT NOT NULL,
	subscription_is_available INTEGER DEFAULT 0,

	UNIQUE(subscription_name),

	FOREIGN KEY(subscription_currency_id_fk) REFERENCES currency(currency_id)
);

CREATE INDEX idx_subscription_currency_id_fk ON subscription(subscription_currency_id_fk);
CREATE INDEX idx_subscription_name ON subscription(subscription_name);
CREATE INDEX idx_subscription_signup_fee ON subscription(subscription_signup_fee);
CREATE INDEX idx_subscription_is_recurring ON subscription(subscription_is_recurring);
CREATE INDEX idx_subscription_recurs_every_amount ON subscription(subscription_recurs_every_amount);
CREATE INDEX idx_subscription_recurs_every_unit ON subscription(subscription_recurs_every_unit);
CREATE INDEX idx_subscription_recurs_max_amount ON subscription(subscription_recurs_max_amount);
CREATE INDEX idx_subscription_price_per_unit ON subscription(subscription_price_per_unit);
CREATE INDEX idx_subscription_is_available ON subscription(subscription_is_available);