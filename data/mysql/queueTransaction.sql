DROP TABLE IF EXISTS queueTransaction;

CREATE TABLE IF NOT EXISTS `queueTransaction` (
	  `queue_transaction_id` int(11) NOT NULL AUTO_INCREMENT,
	  `queue_table_name` varchar(255) NOT NULL,
	  `queue_table_values` text NOT NULL,
	  `queue_transaction_is_complete` tinyint(1) NOT NULL DEFAULT '0',
	  `queue_timestamp_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	  `queue_timestamp_completed` timestamp NULL DEFAULT NULL,
	  PRIMARY KEY (`queue_transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE  `queueTransaction` ADD INDEX (  `queue_table_name` );
ALTER TABLE  `queueTransaction` ADD INDEX (  `queue_transaction_is_complete` );
ALTER TABLE  `queueTransaction` ADD INDEX (  `queue_timestamp_added` );
ALTER TABLE  `queueTransaction` ADD INDEX (  `queue_timestamp_completed` );