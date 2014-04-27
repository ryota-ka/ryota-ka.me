<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<style type="text/css">
			@charset "utf-8";
			html, body {
				margin: 0;
				padding: 0;
				border: 0;
			}

			body {
				font-family: Arial, sans-serif;
				line-height: 1.5;
				font-size: 16px;
				background: #fff;
				color: #666;
				word-wrap: break-word;
				-webkit-text-size-adjust: none;
			}

			h1 {
				text-align: center;
				width: 100%;
				height: 70px;
				line-height: 70px;
				margin: 0;
				background-color: #3af;
				color: #fff;
			}

			h1 + p {
				margin: 5px 0;
			}

			a {
				color: #bbb;
				text-decoration: underline;
			}

			hr {
				border: 0;
				border-bottom: 1px dashed #ccc;
				background: transparent;
			}

			body > p {
				width: 90%;
				margin-left: auto;
				margin-right: auto;
			}

			input {
				width: 90%;
				height: 28px;
				margin: auto;
				padding: 2px 10px;
				border: 1px solid #ddd;
				border-radius: 7px;
				display: block;
				font-size: 16px;
				vertical-align: middle;
				-webkit-appearance: none;
			}

			#input-ecsid {
				margin-bottom: 20px;
			}

			form {
				padding: 0 5px;
			}

			form p {
				font-size: 18px;
				margin-top: 5px;
				margin-bottom: 3px;
			}

			input + p:not(.right) {
				margin-top: 5px;
			}

			p.right {
				text-align: right;
				font-size: 16px;
				font-style: italic;
				color: #bbb;
			}

			input[type="submit"] {
				width: 70%;
				height: 48px;
				border-width: 0;
				margin-top: 20px;
				background: #3af;
				color: #fff;
			}

			input[disabled="disabled"] {
				background: #bbb;
			}

			#policy {
				font-size: 12px;
				color: #bbb;
				padding-left: 5px;
				padding-right: 5px;
			}

			#policy p {
				text-indent: 1em;
				margin-top: 0;
				margin-bottom: 0;
			}

			.ads {
				text-align: center;
				margin: 10px 0;
				padding: 0;
			}
		</style>
		<script type="text/javascript">
			function validate() {
				var ecsid = document.getElementById('input-ecsid');
				var localpart = document.getElementById('input-localpart');
				var submit = document.getElementById('input-submit');
				var isEcsIdValid, isLocalpartValid;

				if (ecsid.value.match(/^a0[0-9]{6}$/)) {
					ecsid.style.backgroundColor = '#cfc';
					ecsid.style.borderColor = '#8f8';
					ecsid.style.color = '#666';
					isEcsIdValid = true;
				} else {
					if (ecsid.value === '') {
						ecsid.style.backgroundColor = '#fff';
						ecsid.style.borderColor = '#ddd';
						ecsid.style.color = '#666';
					} else {
						ecsid.style.backgroundColor = '#fcc';
						ecsid.style.borderColor = '#f88';
						ecsid.style.color = '#d00';
					}
					isEcsIdValid = false;
				}

				if (localpart.value.match(/^[a-z]+\.[a-z]+\.[a-z0-9]{3}$/)) {
					localpart.style.backgroundColor = '#cfc';
					localpart.style.borderColor = '#8f8';
					localpart.style.color = '#666';
					isLocalpartValid = true;
				} else {
					if (localpart.value === '') {
						localpart.style.backgroundColor = '#fff';
						localpart.style.borderColor = '#ddd';
						localpart.style.color = '#666';
					} else {
						localpart.style.backgroundColor = '#fcc';
						localpart.style.borderColor = '#f88';
						localpart.style.color = '#d00';
					}
					isLocalpartValid = false;
				}

				if ((isEcsIdValid && isLocalpartValid) && submit.attributes.disabled) {
					submit.removeAttribute('disabled');
				} else {
					submit.attributes.disabled = 'disabled';
				}
			}
		</script>
        <title>KyotoUnivProfile</title>
    </head>
    <body>
		<h1>KyotoUnivProfile</h1>
		<p class="right">by <a href="http://ryota-ka.me/">Ryota Kameoka</a></p>
		<p>入力された情報に基づき、Wi-Fi (MIAKO), VPN (KUINS-PPTP), 学生用メール (KUMOI) の設定を一括で行う iPhone 構成プロファイルを作成します。</p>
		<hr>
		<p class="ads">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- kyotounivprofile -->
			<ins class="adsbygoogle"
				 style="display:inline-block;width:320px;height:50px"
				 data-ad-client="ca-pub-6807892574075028"
				 data-ad-slot="4630242999"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</p>
		<hr>
		<p>Safari 以外のブラウザでは正常に動作しませんので、Chrome for iOS, ドルフィンブラウザ などをお使いの方は、Safari でのアクセスをお願いします。</p>
		<hr>
		<form action="file.php" method="post">
			<p>ECS-ID</p>
			<input id="input-ecsid" type="text" name="ecsid" placeholder="a0123456" onblur="validate();">
			<p>学生用メールアドレス</p>
			<input id="input-localpart" type="text" name="localpart" placeholder="kyodai.taro.01a" onblur="validate();">
			<p class="right" style="color: #888;">@st.kyoto-u.ac.jp</p>
			<input id="input-submit" type="submit" value="ダウンロード" disabled="disabled">
		</form>
		<hr>
		<p style="text-align: center; margin-top: 5px; margin-bottom: 5px;">
			ダウンロード後の手順は<a href="./install.php" style="color: #3af;">こちら</a><br>
			プロファイルの削除方法は<a href="./uninstall.php" style="color: #3af;">こちら</a>
		</p>
		<hr>
		<div id="policy">
			<p>入力されたすべての情報は、iPhone 構成プロファイルの作成のみに使用され、サーバーに保存されたり、第三者に情報が送信されることはありません。</p>
			<p>このアプリケーションは一個人が開発したものであり、京都大学当局とは一切関係ありません。</p>
			<p>このアプリケーションを使用することによって生じた、いかなる損害についても、製作者はその責任を負いかねますので、あらかじめご了承ください。</p>
    </body>
</html>
