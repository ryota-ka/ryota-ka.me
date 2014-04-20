<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<style type="text/css">
<?php
date_default_timezone_set('Asia/Tokyo');

/* --- Twitter settings --- */
include_once './libs/twitteroauth/twitteroauth.php';

$consumerKey = $_ENV['TWITTER_CONSUMER_KEY'];
$consumerSecret = $_ENV['TWITTER_CONSUMER_SECRET'];
$accessToken = $_ENV['TWITTER_ACCESS_TOKEN'];
$accessTokenSecret = $_ENV['TWITTER_ACCESS_TOKEN_SECRET'];

$twObj = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
$req = $twObj->OAuthRequest('https://api.twitter.com/1.1/statuses/user_timeline.json', 'GET', array('user_id' => '974006168', 'count' => '10'));
$tw_arr = json_decode($req);
/* --- Twitter settings --- */


include_once './css/reset.css';
include_once './css/index.css';

/* --- find me on the web --- */
$sites = array(
	array('Facebook', 'facebook', 'http://www.facebook.com/kameoka.ryota', '3d569e'),
	array('Twitter', 'twitter', 'http://twitter.com/invendu', '1298f1'),
	array('Foursquare', 'foursquare', 'http://ja.foursquare.com/user/4420704', '00b0f1'),
	array('Last.fm', 'lastfm', 'http://www.last.fm/user/ryotakameoka', 'ed0000'),
	array('YouTube', 'youtube', 'http://www.youtube.com/channel/UC7pkiEXXwH1PiR-2xnHNLmQ', 'fb0d1f'),
	array('Tumblr', 'tumblr', 'http://syrupandbutter.tumblr.com/', '284d6e'),
	array('Amazon', 'amazon', 'http://www.amazon.co.jp/registry/wishlist/NCRDLUWP5AR5', 'ff9300'),
	array('Skype', 'skype', 'skype:noise0607?userinfo', '00b0f5'),
);
foreach ($sites as $site) {
	echo <<< EOT
#link-{$site[1]} {
	background-image: url('/img/webicons/{$site[1]}.png');
}

#link-{$site[1]}-back {
	background-color: #{$site[3]};
}

#link-{$site[1]}:hover::before {
	content: '{$site[0]}';
	display: block;
	position: absolute;
	top: -58px;
	left: -12px;
	width: 120px;
	height: 36px;
	color: #fff;
	font-size: 18px;
	line-height: 36px;
	text-align: center;
	background-color: #{$site[3]};
	border-radius: 5px;
}

#link-{$site[1]}:hover::after {
	content: '';
	position: absolute;
	display: block;
	top: -22px;
	left: 40px;
	width: 0;
	height: 0;
	border-top: 12px #{$site[3]} solid;
	border-left: 8px solid transparent;
	border-right: 8px solid transparent;
}
EOT;
}
?>
		</style>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript" src="./js/jquery.transit.min.js"></script>
		<script type="text/javascript" src="./js/index.js"></script>
		<title>Ryota-ka.me</title>
	</head>
	<body>
		<p id="log" style="position: fixed;top:0;left:0;z-index: 10;">0 : 0</p>
		<nav>
			<ul>
				<li>page top</li>
				<li>about me</li>
				<li>works</li>
				<li>music</li>
				<li>contact</li>
			</ul>
		</nav>
		<div id="container">
			<section id="section-logo" class="content">
				<h1>Ryota-ka.me</h1>
			</section>

			<section id="section-aboutme" class="content">
				<table id="profile">
					<tbody>
						<tr><td>○</td><td>Birthday</td><td>1993.06.07 (Age 20)</td></tr>
						<tr><td>○</td><td>Location</td><td>Sakyo, Kyoto</td></tr>
						<tr><td>○</td><td>Hometown</td><td>Kishiwada, Osaka</td></tr>
						<tr><td>○</td><td>Education</td><td>Kyoto University (Faculty of Economics)</td></tr>
					</tbody>
				</table>
				<h2>about&nbsp;me</h2>
				<div id="findmeontheweb">
					<?php
					foreach ($sites as $site) {
						echo '					<div class="link-wrapper"><a id="link-' . $site[1] . '" href="' . $site[2] . '" class="front" target="_blank"></a><a id="link-' . $site[1] . '-back" class="back">' . $site[0] . '</a></div>';
					}
					?>
				</div>

			</section>

			<section id="section-twitter">
				<p id="followmeontwitter"><a href="http://twitter.com/invendu">Follow me on Twitter !!</a></p>
				<div id="timeline">
					<?php
					$pos = array(20, 90, 5, 95, 10, 60, 90, 30, 50, 85);
					if (isset($tw_arr) && !isset($tw_arr->errors)) {
						$i = 0;
						foreach ($tw_arr as $key => $val) {
							echo '<div class="tweet" style="' . ($pos[$i] > 50 ? 'right' : 'left') . ': ' . ($pos[$i] > 50 ? 100 - $pos[$i] : $pos[$i]) . '%; -webkit-transform:scale(' . (1 - 0.03 * $i) . '); -moz-transform:scale(' . (1 - 0.03 * $i) . '); -o-transform:scale(' . (1 - 0.03 * $i) . '); -ms-transform:scale(' . (1 - 0.03 * $i) . '); transform:scale(' . (1 - 0.03 * $i) . '); "><p class="text">' . $tw_arr[$key]->text . '</p><p class="datetime"><a href="http://twitter.com/' . $tw_arr[$key]->screen_name . '/status/' . $tw_arr[$key]->id . '">' . date('Y-m-d H:i:s', strtotime($tw_arr[$key]->created_at)) . '</a></p></div>';
							$i++;
						}
					} else {
						for ($i = 0; $i < 10; $i++) {
							echo '<div class="tweet" style="z-index: ' . (10 - $i) . ';' . ($pos[$i] > 50 ? 'right' : 'left') . ': ' . ($pos[$i] > 50 ? 100 - $pos[$i] : $pos[$i]) . '%; -webkit-transform:scale(' . (1 - 0.03 * $i) . ')"><p class="text">Tweet #' . ($i + 1) . ' : Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><p class="datetime">1970-01-01 00:00:00</p></div>';
						}
					}
					?>
				</div>
			</section>

			<section id="section-works" class="content">
				<div id="products-row">
					<div class="product-wrapper">
						<div class="product">
							<p class="image"></p>
							<p class="name"><a href="./kyotounivprofile/">KyotoUnivProfile</a></p>
							<p class="description">入力された情報に基づき、Wi-Fi (MIAKO), VPN (KUINS-PPTP), 学生用メール (KUMOI) の設定を一括で行う iPhone 構成プロファイルを作成します。</p>
						</div>
					</div>
					<div class="product-wrapper"><div class="product">
							<p class="image"></p>
							<p class="name"><a href="./20x20/">20x20</a></p>
							<p class="description">20の段までの掛け算の練習ができます。目指せダルシム！</p>
						</div>
					</div>
					<div class="product-wrapper dummy"><div class="product"></div></div>
					<div class="product-wrapper dummy"><div class="product"></div></div>
				</div>
			</section>

			<section id="section-music" class="content">
				<article>
					<p>用途未定</p>
				</article>
			</section>

			<section id="section-contact" class="content">
				<article>
					mail : noise0607@gmail.com
				</article>
			</section>
		</div>
	</body>
</html>