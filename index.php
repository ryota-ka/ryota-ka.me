<!DOCTYPE html>
<html lang="ja" prefix="og: http://ogp.me/ns#">
	<head>
		<meta charset="utf-8">
		<meta property="og:title" content="Ryota-ka.me">
		<meta property="og:type" content="website">
		<meta property="og:url" content="http://ryota-ka.me/">
		<meta property="og:image" content="http://ryota-ka.me/img/ogp_thumbnail.png">
		<meta property="og:description" content="Ryota-ka.me : Ryota Kameoka">
		<meta property="og:site_name" content="Ryota-ka.me">
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
$req = $twObj->OAuthRequest('https://api.twitter.com/1.1/statuses/user_timeline.json', 'GET', array('user_id' => '974006168', 'count' => '10', 'exclude_replies' => true));
$tw_arr = json_decode($req);
/* --- Twitter settings --- */


include_once './css/reset.css';
include_once './css/index.css';

/* --- navigation and sections --- */

$sections = array(
	array('top', 'logo', 'ffcb4c'),
	array('about me', 'aboutme', '45cdab'),
	array('twitter', 'twitter', '55acee'),
	array('works', 'works', '1f789e'),
//	array('music', 'music', 'ff8ed4'),
//	array('photos', 'photos', '5544bb'),
	array('contact', 'contact', 'ff733b'),
);

$i = 1;
foreach ($sections as $section) {
	echo <<< EOT
#section-{$section[1]} {
	background-color: #{$section[2]};
}

nav ul li:nth-child($i) {
	background-image: url('/img/icons/nav/{$section[1]}.png');
	background-color: #{$section[2]};
}
EOT;
	/*
	  nav ul li:nth-child($i):hover::before {
	  content: '{$section[0]}';
	  display: block;
	  position: relative;
	  top: 39px;
	  left: 75px;
	  width: 120px;
	  height: 36px;
	  color: #fff;
	  font-size: 18px;
	  line-height: 36px;
	  text-align: center;
	  background-color: #{$section[2]};
	  }

	  EOT; */
	$i++;
}
/* --- navigation and sections --- */

/* --- find me on the web --- */
$sites = array(
	array('Facebook', 'facebook', 'http://www.facebook.com/kameoka.ryota', '3d569e'),
	array('Twitter', 'twitter', 'http://twitter.com/invendu', '1298f1'),
	array('Foursquare', 'foursquare', 'http://ja.foursquare.com/user/4420704', '00b0f1'),
	array('Last.fm', 'lastfm', 'http://www.last.fm/user/ryotakameoka', 'ed0000'),
	array('YouTube', 'youtube', 'http://www.youtube.com/channel/UC7pkiEXXwH1PiR-2xnHNLmQ', 'fb0d1f'),
//	array('Tumblr', 'tumblr', 'http://syrupandbutter.tumblr.com/', '284d6e'),
	array('Amazon', 'amazon', 'http://www.amazon.co.jp/registry/wishlist/NCRDLUWP5AR5', 'ff9300'),
	array('Skype', 'skype', 'skype:noise0607?userinfo', '00b0f5'),
);
foreach ($sites as $site) {
	echo <<< EOT
#link-{$site[1]} {
	background-image: url('/img/icons/findmeontheweb/{$site[1]}.png');
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
		<script type="text/javascript" src="./js/index.js"></script>
		<title>Ryota-ka.me</title>
	</head>
	<body>
		<nav>
			<ul>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</nav>
		<div id="container">
			<section id="section-logo" class="content">
				<h1>Ryota-ka.me</h1>
			</section>

			<section id="section-aboutme" class="content">
				<div id="myname">
					<p style="font-size: 2.5em; margin-bottom: 12px;">Ryota&nbsp;Kameoka</p>
					<p style="font-size: 1.7em; padding-left: 1em;">亀岡&nbsp;亮太 /&nbsp;カメオカ&nbsp;リョウタ</p>
				</div>
				<div id="profile">
					<div>
						<p style="background-image: url('./img/icons/profile/birthday.png');">birthday</p>
						<p>1993.06.07 (age&nbsp;20)</p>
					</div>
					<div>
						<p style="background-image: url('./img/icons/profile/location.png');">location</p>
						<p>ichijōji, sakyo, kyoto</p>
					</div>
					<div>
						<p style="background-image: url('./img/icons/profile/hometown.png');">hometown</p>
						<p>kishiwada, osaka</p>
					</div>
					<div>
						<p style="background-image: url('./img/icons/profile/education.png');">education</p>
						<p>kyoto&nbsp;university (faculty&nbsp;of&nbsp;economics)</p>
					</div>
				</div>
				<p id="profile_picture"><img src="./img/profile_picture.jpg" width="240" height="240" alt="プロフィール写真"></p>
				<div id="findmeontheweb">
					<?php
					foreach ($sites as $site) {
						echo '					<a id="link-' . $site[1] . '" href="' . $site[2] . '" target="_blank"></a>';
					}
					?>
				</div>

			</section>

			<section id="section-twitter">
				<p id="followmeontwitter"><a href="http://twitter.com/invendu" target="blank">Follow&nbsp;me on&nbsp;Twitter</a></p>
				<div id="timeline">
					<?php
					$pos = array(20, 90, 5, 95, 7, 60, 70, 100, 10, 80);
					if (isset($tw_arr) && !isset($tw_arr->errors)) {
						$i = 0;
						foreach ($tw_arr as $key => $val) {
							echo '<div class="tweet" style="z-index: ' . (10 - $i) . '; '
							. ($pos[$i] > 50 ? 'right' : 'left') . ': ' . ($pos[$i] > 50 ? 100 - $pos[$i] : $pos[$i]) . '%;'
							. ' -webkit-transform:scale(' . (1 - 0.03 * $i) . '); '
							. '-moz-transform:scale(' . (1 - 0.03 * $i) . '); '
							. '-o-transform:scale(' . (1 - 0.03 * $i) . '); '
							. '-ms-transform:scale(' . (1 - 0.03 * $i) . '); '
							. 'transform:scale(' . (1 - 0.03 * $i) . '); '
							. 'box-shadow: 0 ' . (25 - 2 * $i) . 'px ' . (30 - $i) . 'px ' . (15 - $i) . 'px rgba(0, 0, 0, ' . (0.08 + 0.005 * $i) . ');">'
							. '<p class="text">' . $tw_arr[$key]->text . '</p>'
							. '<p class="datetime"><a href="http://twitter.com/' . $tw_arr[$key]->user->screen_name . '/status/' . $tw_arr[$key]->id . '">' . date('Y-m-d H:i:s', strtotime($tw_arr[$key]->created_at)) . '</a></p></div>';
							$i++;
						}
					} else {
						for ($i = 0; $i < 10; $i++) {
							echo '<div class="tweet" style="z-index: ' . (10 - $i) . '; '
							. ($pos[$i] > 50 ? 'right' : 'left') . ': ' . ($pos[$i] > 50 ? 100 - $pos[$i] : $pos[$i]) . '%;'
							. ' -webkit-transform:scale(' . (1 - 0.03 * $i) . '); '
							. 'box-shadow: 0 ' . (25 - 2 * $i) . 'px ' . (30 - $i) . 'px ' . (15 - $i) . 'px rgba(0, 0, 0, ' . (0.08 + 0.005 * $i) . ');">'
							. '<p class="text">Tweet #' . ($i + 1) . ' : Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'
							. '<p class="datetime">1970-01-01 00:00:00</p></div>';
						}
					}
					?>
				</div>
			</section>

			<section id="section-works" class="content">
				<h2>Works</h2>
				<div id="products-row">
					<div class="product-wrapper">
						<div class="product" href="./kyotounivprofile/">
							<p class="image" style="background-image: url('/img/icons/works/kyotounivprofile.png');"></p>
							<p class="name">KyotoUnivProfile</p>
							<p class="description">入力された情報に基づき、Wi-Fi (MIAKO), VPN (KUINS-PPTP), 学生用メール (KUMOI) の設定を一括で行う iPhone 構成プロファイルを作成します。</p>
							<a href="./kyotounivprofile/"></a>
						</div>
					</div>
					<div class="product-wrapper">
						<div class="product">
							<p class="image" style="background-image: url('/img/icons/works/20x20.png');"></p>
							<p class="name">20x20 (準備中)</p>
							<p class="description">20の段までの掛け算の練習ができます。目指せダルシム！</p>
							<a href=""></a>
						</div>
					</div>
					<div class="product-wrapper dummy"><div class="product"></div></div>
					<div class="product-wrapper dummy"><div class="product"></div></div>
				</div>
			</section>
			<?php /*
			  <section id="section-music" class="content">
			  <article>
			  <p>用途未定</p>
			  </article>
			  </section>

			  <section id="section-photos"></section>
			 */
			?>
			<section id="section-contact" class="content">
				<article>
					mail : <a href="mailto:noise0607@gmail.com">noise0607@gmail.com</a><br>
					Twitter : <a href="http://twitter.com/invendu">@invendu</a><br>
					Facebook : <a href="http://www.facebook.com/kameoka.ryota">Ryota Kameoka</a><br>
					Skype : <a href="skype:noise0607?userinfo">noise0607</a>
				</article>
				<div class="add">
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- ryota-ka.me -->
					<ins class="adsbygoogle"
						 style="display:inline-block;width:728px;height:90px"
						 data-ad-client="ca-pub-6807892574075028"
						 data-ad-slot="7583709395"></ins>
					<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
			</section>
		</div>
	</body>
</html>
