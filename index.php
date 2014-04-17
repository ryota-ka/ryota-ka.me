<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<style type="text/css">
<?php
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
	array('Skype', 'skype', 'skype:noise0607?userinfo', '00b0f5'),
);
foreach ($sites as $site) {
	echo <<< EOT
	#link-{$site[1]} {
	background-image: url('/img/webicons/{$site[1]}.png');
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
	left: 36px;
	width: 0;
	height: 0;
	border-top: 16px #{$site[3]} solid;
	border-left: 12px solid transparent;
	border-right: 12px solid transparent;
}
EOT;
}
?>
		</style>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
			<section id="ct-logo" class="content">
				<h1>Ryota-ka.me</h1>
			</section>

			<section id="ct-aboutme" class="content">
				<div>
					<p class="name">Name : 亀岡 亮太 (Ryota Kameoka)</p>
				</div>
				<h2>about&nbsp;me</h2>
				<div id="findmeontheweb">
					<?php
					foreach ($sites as $site) {
						echo '					<a id="link-' . $site[1] . '" href="' . $site[2] . '"></a>';
					}
					?>
				</div>
			</section>

			<section id="ct-works" class="content">
				<ul>
					<li><a href="./kyotounivprofile/">KyotoUnivProfile</a> 入力された情報に基づき、Wi-Fi (MIAKO), VPN (KUINS-PPTP), 学生用メール (KUMOI) の設定を一括で行う iPhone 構成プロファイルを作成します。</li>
				</ul>
			</section>

			<section id="ct-music" class="content">
				<article>
					<p>用途未定</p>
				</article>
			</section>

			<section id="ct-contact" class="content">
				<article>
					mail : noise0607@gmail.com
				</article>
			</section>
		</div>
	</body>
</html>