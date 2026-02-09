<?php
require_once(__DIR__.'/poloniex_trading.php');
require_once(__DIR__.'/binance_trading.php');
require_once(__DIR__.'/exbitron_trading.php');
require_once(__DIR__.'/nestex_trading.php');
require_once(__DIR__.'/kraken_trading.php');
require_once(__DIR__.'/yobit_trading.php');
require_once(__DIR__.'/hitbtc_trading.php');
require_once(__DIR__.'/kucoin_trading.php');
require_once(__DIR__.'/tradeogre_trading.php');
require_once(__DIR__.'/nonkyc_trading.php');

function cancelExchangeOrder($order=false)
{
	if ($order)
		switch ($order->market)
		{
			case 'yobit':
				doYobitCancelOrder($order->uuid);
				break;
			case 'binance':
				doBinanceCancelOrder($order->uuid);
				break;
			case 'hitbtc':
				doHitBTCCancelOrder($order->uuid);
				break;
			case 'kucoin':
				doKuCoinCancelOrder($order->uuid);
				break;
			case 'exbitron':
				doExbitronCancelOrder($order->uuid);
				break;
			case 'nestex':
				doNestexCancelOrder($order->uuid);
				break;
			case 'tradeogre':
				doTradeogreCancelOrder($order->uuid);
				break;
			case 'nonkyc':
				doNonkycCancelOrder($order->uuid);
				break;
		}
}

function runExchange($exchangeName=false)
{
	if (!empty($exchangeName))
	{
		switch($exchangeName)
		{
			case 'binance':
				doBinanceTrading(true);
				updateBinanceMarkets();
				break;

			case 'bitstamp':
				getBitstampBalances();
				break;

			case 'cexio':
				getCexIoBalances();
				break;

			case 'exbitron':
				doExbitronTrading(true);
				updateExbitronMarkets();
				break;
			
			case 'nestex':
				doNestexTrading(true);
				updateNestexMarkets();
				break;
				
			case 'yobit':
				doYobitTrading(true);
				updateYobitMarkets();
				break;

			case 'hitbtc':
				doHitBTCTrading(true);
				updateHitBTCMarkets();
				break;

			case 'kraken':
				doKrakenTrading(true);
				updateKrakenMarkets();
				break;

			case 'kucoin':
				doKuCoinTrading(true);
				updateKucoinMarkets();
				break;

			case 'poloniex':
				doPoloniexTrading(true);
				updatePoloniexMarkets();
				break;

			case 'nonkyc':
				doNonkycTrading(true);
				updateNonkycMarkets();
				break;

			case 'tradeogre':
				doTradeogreTrading(true);
				updateTradeogreMarkets();
				break;
	
			default:
				debuglog(__FUNCTION__.' '.$exchangeName.' not implemented');
		}
	}
}
