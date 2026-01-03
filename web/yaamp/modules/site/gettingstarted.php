<?php
// Getting Started guide (English)
$site = YAAMP_SITE_NAME;
$host = YAAMP_SITE_URL;

function h($s){ return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

// Note: This page focuses on mining commands, wallet format, VARDIFF and merged mining.

?>

<div class="gs-container">
	<div class="gs-hero">
		<h1>Getting Started</h1>
		<p>How to mine on <b><?php echo h($site); ?></b> using Yiimp Stratum, including merged mining (AuxPoW).</p>
	</div>

	<div class="gs-card">
		<h2>1) Mining command</h2>
		<p>Your <b>username</b> is your payout address (optionally with a worker name). Your <b>password</b> selects the coin symbol.</p>

		<div class="gs-code">
			<b>Username format</b>
			<pre>WALLET_ADDRESS.WORKER</pre>
		</div>

		<div class="gs-code">
			<b>Password format</b>
			<pre>c=COIN_SYMBOL</pre>
		</div>

		<div class="gs-code">
			<b>Example</b>
			<pre>miner.exe -o stratum+tcp://<?php echo h($host); ?>:ALGO_PORT -u YOUR_WALLET.worker1 -p c=SYMBOL</pre>
		</div>

		<p class="gs-note">Tip: if you want a fixed starting difficulty, add <code>d=VALUE</code> to the password (example: <code>-p c=LTC,d=128</code>).</p>
	</div>

	<!--div class="gs-card">
		<h2>2) Variable difficulty (VARDIFF)</h2>
		<p>Pool-side VARDIFF is configured in the stratum config file. Supported keys:</p>
		<ul>
			<li><code>diff</code> (alias of <code>difficulty</code>)</li>
			<li><code>mindif</code> / <code>mindiff</code> (alias of <code>diff_min</code>)</li>
			<li><code>maxdif</code> / <code>maxdiff</code> (alias of <code>diff_max</code>)</li>
		</ul>

		<!--div class="gs-code">
			<b>Example (stratum config)</b>
			<pre>[STRATUM]
algo = scrypt
diff = 128
mindif = 4
maxdif = 1024</pre>
		</div-->
	</div-->

	<div class="gs-card">
		<h2>2) Merged mining (AuxPoW)</h2>
		<p>Some coins can be merged-mined (AuxPoW). You mine the <b>parent</b> coin normally (example: Litecoin) and optionally set one or more <b>aux</b> coin wallets in the password.</p>

		<div class="gs-code">
			<b>Aux wallet format</b>
			<pre>aw=SYMBOL=WALLET[/SYMBOL2=WALLET2/...]

# Full password example
c=LTC,aw=DOGE=DOGE_WALLET/BELLS=BELLS_WALLET</pre>
		</div>

		<div class="gs-code">
			<b>Example (parent + aux)</b>
			<pre>miner.exe -o stratum+tcp://<?php echo h($host); ?>:ALGO_PORT -u PARENT_WALLET.worker1 -p c=PARENT,aw=AUX=AUX_WALLET</pre>
		</div>

		<p class="gs-note">You can provide multiple aux wallets (up to a few symbols): <code>aw=DOGE=.../BELLS=.../SYS=...</code></p>
	</div>

	<div class="gs-card">
		<h2>3) Quick checklist</h2>
		<ul>
			<li>Use your <b>coin wallet address</b> as the username (<code>WALLET.WORKER</code> optional).</li>
			<li>Select the coin with <code>c=SYMBOL</code> (example: <code>c=RVN</code>).</li>
			<li>For merged mining, add <code>aw=SYMBOL=WALLET</code> entries (AuxPoW only).</li>
		</ul>
		<p class="gs-note">Need the correct port? Check the <b>Pool</b> page (ports are listed per algorithm).</p>
	</div>
</div>
