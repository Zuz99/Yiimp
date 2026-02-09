-- Optional cleanup: remove rawcoins data to free DB space
-- Run on yiimp database

-- safest: just truncate
TRUNCATE TABLE rawcoins;

-- if you want to completely remove the feature (will break any code that expects the table to exist)
-- DROP TABLE IF EXISTS rawcoins;
