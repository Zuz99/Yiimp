-- Dual wallet / multi-coin payouts (merged mining)
-- Adds per-user secondary payout addresses and per-coin balances.

CREATE TABLE IF NOT EXISTS `account_wallets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `coinid` int(11) NOT NULL,
  `address` varchar(128) NOT NULL,
  `created` int(10) UNSIGNED DEFAULT NULL,
  `updated` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_account_coin` (`account_id`,`coinid`),
  KEY `idx_coinid` (`coinid`),
  KEY `idx_account_id` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE IF NOT EXISTS `account_balances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `coinid` int(11) NOT NULL,
  `balance` double NOT NULL DEFAULT 0,
  `updated` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_account_coin` (`account_id`,`coinid`),
  KEY `idx_coinid` (`coinid`),
  KEY `idx_account_id` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
