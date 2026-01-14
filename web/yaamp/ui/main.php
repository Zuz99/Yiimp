<?php

require('misc.php');
echo <<<END

<!doctype html>
<!--[if IE 7 ]>		 <html class="no-js ie ie7 lte7 lte8 lte9" lang="en-US"> <![endif]-->
<!--[if IE 8 ]>		 <html class="no-js ie ie8 lte8 lte9" lang="en-US"> <![endif]-->
<!--[if IE 9 ]>		 <html class="no-js ie ie9 lte9>" lang="en-US"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js" lang="en-US"> <!--<![endif]-->

<head>

<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<meta name="description" content="Yii mining pools for alternative crypto currencies">
<meta name="keywords" content="anonymous,mining,pool,maxcoin,bitcoin,altcoin,auto,switch,exchange,profit,decred,scrypt,x11,x13,x14,x15,lbry,lyra2re,neoscrypt,sha256,quark,skein2">

END;

$pageTitle = empty($this->pageTitle) ? YAAMP_SITE_NAME : YAAMP_SITE_NAME." - ".$this->pageTitle;

echo '<title>'.$pageTitle.'</title>';

echo CHtml::cssFile("/extensions/jquery/themes/ui-lightness/jquery-ui.css");
echo CHtml::cssFile('/yaamp/ui/css/main.css');
echo CHtml::cssFile('/yaamp/ui/css/table.css');
echo CHtml::cssFile('/yaamp/ui/css/custom.css');

//echo CHtml::scriptFile('/extensions/jquery/js/jquery-1.8.3-dev.js');
//echo CHtml::scriptFile('/extensions/jquery/js/jquery-ui-1.9.1.custom.min.js');

$cs = app()->getClientScript();
$cs->registerCoreScript('jquery.ui');
//$cs->registerScriptFile('/yaamp/ui/js/jquery.tablesorter.js', CClientScript::POS_END);

echo CHtml::scriptFile('/yaamp/ui/js/jquery.tablesorter.js');

// if(!controller()->admin)
// echo <<<end
// <script>
// (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
// (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
// m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
// })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

// ga('create', 'UA-58136019-1', 'auto');
// ga('send', 'pageview');

// $(document).ajaxSuccess(function(){ga('send', 'pageview');});

// </script>
// end;

echo "</head>";

///////////////////////////////////////////////////////////////

// Scope the modern "Getting Started" styling to that page only
$action_id = controller()->action->id;
$classic = isset($_GET['classic']) && $_GET['classic'];
$body_class = 'page'.(!$classic ? ' modern' : '').($action_id=='gettingstarted' ? ' gs' : '');
echo '<body class="'.$body_class.'">';
echo '<a href="/site/mainbtc" style="display: none;">main</a>';

showPageHeader();
showPageContent($content);
showPageFooter();

echo "</body></html>";
return;

/////////////////////////////////////////////////////////////////////

function yiimp_nav_svg($icon)
{
	// Inline SVG icons (no external deps). Keep tiny & consistent.
	switch($icon) {
		case 'home':
			return '<svg class="nav-ico" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 10.5L12 3l9 7.5V21a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1z" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
		case 'gettingstarted':
			return '<svg class="nav-ico" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19h16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M7 17V7a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v10" fill="none" stroke="currentColor" stroke-width="2"/><path d="M9 9h6M9 12h6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';
		case 'pool':
			return '<svg class="nav-ico" viewBox="0 0 24 24" aria-hidden="true"><path d="M7 7h10M7 12h10M7 17h10" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';
		case 'wallet':
			return '<svg class="nav-ico" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v3H3z" fill="none" stroke="currentColor" stroke-width="2"/><path d="M3 10v9a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-9" fill="none" stroke="currentColor" stroke-width="2"/><path d="M16 14h5v4h-5a2 2 0 0 1 0-4z" fill="none" stroke="currentColor" stroke-width="2"/></svg>';
		case 'stats':
			return '<svg class="nav-ico" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19V5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M4 19h16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M8 15l3-3 3 2 5-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
		case 'miners':
			return '<svg class="nav-ico" viewBox="0 0 24 24" aria-hidden="true"><path d="M8 21V8l6-5v18" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M2 21h20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M17 21V12h3v9" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
		case 'api':
			return '<svg class="nav-ico" viewBox="0 0 24 24" aria-hidden="true"><path d="M7 8h10v8H7z" fill="none" stroke="currentColor" stroke-width="2"/><path d="M9 3v3M15 3v3M9 18v3M15 18v3M3 10h3M18 10h3M3 14h3M18 14h3" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';
		case 'explorer':
			return '<svg class="nav-ico" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21a9 9 0 1 0-9-9 9 9 0 0 0 9 9z" fill="none" stroke="currentColor" stroke-width="2"/><path d="M15.5 8.5l-2 7-7 2 2-7z" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
		case 'benchmark':
			return '<svg class="nav-ico" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 13a8 8 0 0 1 16 0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M12 13l3-3" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M8 21h8" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';
		case 'rental':
			return '<svg class="nav-ico" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 7h18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M5 7l2 14h10l2-14" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M9 7V5a3 3 0 0 1 6 0v2" fill="none" stroke="currentColor" stroke-width="2"/></svg>';
		case 'admin':
			return '<svg class="nav-ico" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 1l3 6 6 .9-4.5 4.3 1.1 6.1-5.6-3-5.6 3 1.1-6.1L3 7.9 9 7z" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
		case 'logout':
			return '<svg class="nav-ico" viewBox="0 0 24 24" aria-hidden="true"><path d="M10 17l5-5-5-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M15 12H3" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M21 3v18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';
		case 'login':
			return '<svg class="nav-ico" viewBox="0 0 24 24" aria-hidden="true"><path d="M14 7l5 5-5 5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M19 12H9" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M5 3v18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';
		default:
			return '';
	}
}

function showItemHeader($selected, $url, $name, $icon = '')
{
		$classes = 'nav-item'.($icon ? ' nav-'.$icon : '').($selected ? ' selected' : '');
	$svg = $icon ? yiimp_nav_svg($icon) : '';
	echo "<span class='nav-item-wrap'><a class=\"$classes\" href='$url'>".
		"<span class='nav-ico-wrap'>$svg</span><span class='nav-label'>".htmlspecialchars($name)."</span></a></span>";
}

function showPageHeader()
{
	echo '<div class="tabmenu-out">';
	echo '<div class="tabmenu-inner">';

		echo '<a class="nav-brand" href="/">'.YAAMP_SITE_NAME.'</a>';

	$action = controller()->action->id;
	$wallet = user()->getState('yaamp-wallet');
	$ad = isset($_GET['address']);

		showItemHeader(controller()->id=='site' && $action=='index' && !$ad, '/', 'Home', 'home');
		showItemHeader($action=='gettingstarted', '/site/gettingstarted', 'Getting Started', 'gettingstarted');
		showItemHeader($action=='mining', '/site/mining', 'Pool Stats', 'pool');
		showItemHeader(controller()->id=='site'&&($action=='index' || $action=='wallet') && $ad, "/?address=$wallet", 'Wallet', 'wallet');
		showItemHeader(controller()->id=='stats', '/stats', 'Graphs', 'stats');
		showItemHeader($action=='miners', '/site/miners', 'Miners', 'miners');
		showItemHeader(controller()->id=='api', '/site/api', 'API', 'api');
	if (YIIMP_PUBLIC_EXPLORER)
			showItemHeader(controller()->id=='explorer', '/explorer', 'Explorers', 'explorer');

	if (YIIMP_PUBLIC_BENCHMARK)
			showItemHeader(controller()->id=='bench', '/bench', 'Benchs', 'benchmark');

	if (YAAMP_RENTAL)
			showItemHeader(controller()->id=='renting', '/renting', 'Rental', 'rental');

	if (YIIMP_ADMIN_LOGIN) {
		if(controller()->admin)
		{
			if (isAdminIP($_SERVER['REMOTE_ADDR']) === false)
				debuglog("admin {$_SERVER['REMOTE_ADDR']}");

				showItemHeader(controller()->id=='coin', '/coin', 'Coins', 'admin');
				showItemHeader($action=='common', '/admin/dashboard', 'Dashboard', 'admin');
				showItemHeader(controller()->id=='admin'&&$action=='coinwallets', "/admin/coinwallets", 'Wallets', 'wallet');

			if (YAAMP_RENTAL)
					showItemHeader(controller()->id=='renting' && $action=='admin', '/renting/admin', 'Jobs', 'rental');

			if (YAAMP_ALLOW_EXCHANGE)
					showItemHeader(controller()->id=='trading', '/trading', 'Trading', 'stats');

			if (YAAMP_USE_NICEHASH_API)
					showItemHeader(controller()->id=='nicehash', '/nicehash', 'Nicehash', 'api');

				showItemHeader(controller()->id=='logout', '/admin/logout', 'Logout', 'logout');
		}
		else {
			showItemHeader(controller()->id=='login', '/admin/login', 'Login', 'login');
		}
	}

	echo '<span class="nav-right">';
	if(!isset($_GET['classic']))
		echo '<a class="nav-classic" href="'.htmlspecialchars($_SERVER['REQUEST_URI']).(strpos($_SERVER['REQUEST_URI'],'?')!==false?'&':'?').'classic=1">Classic UI</a>';

	$mining = getdbosql('db_mining');
	$nextpayment = date('H:i T', $mining->last_payout+YAAMP_PAYMENTS_FREQ);
	$eta = ($mining->last_payout+YAAMP_PAYMENTS_FREQ) - time();
	$eta_mn = 'in '.round($eta / 60).' minutes';

	echo '<span id="nextpayout" title="'.$eta_mn.'">Next Payout: '.$nextpayment.'</span>';

	echo "</div>";
	echo "</div>";
}

function showPageFooter()
{
	echo '<div class="footer">';
	$year = date("Y", time());

	echo "<p>&copy; $year ".YAAMP_SITE_NAME.' - '.
		'<a href="https://github.com/Kudaraidee/yiimp">Open source Project</a></p>';

	echo '</div><!-- footer -->';
}


