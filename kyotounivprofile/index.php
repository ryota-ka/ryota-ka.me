<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
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
				border-radius: 5px;
				display: block;
				vertical-align: middle;
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
				margin-top: 20px;
				background: #3af;
				color: #fff;
				border-radius: 5px;
			}

			#policy {
				font-size: 12px;
				color: #bbb;
			}
		</style>
		<script type="text/javascript">
			function checkEcsId() {
				var ecsid = document.getElementById('input-ecsid');
				if (ecsid.value.match(/^a0[0-9]{6}$/)) {
					ecsid.style.backgroundColor = '#cfc';
					ecsid.style.borderColor = '#8f8';
					ecsid.style.color = '#000';
				} else {
					ecsid.style.backgroundColor = '#fcc';
					ecsid.style.borderColor = '#f88';
					ecsid.style.color = '#d00';
				}
			}

			function checkLocalpart() {
				var localpart = document.getElementById('input-localpart');
				if (localpart.value.match(/^[a-z]+\.[a-z]+\.[a-z0-9]{3}$/)) {
					localpart.style.backgroundColor = '#cfc';
					localpart.style.borderColor = '#8f8';
					localpart.style.color = '#000';
				} else {
					localpart.style.backgroundColor = '#fcc';
					localpart.style.borderColor = '#f88';
					localpart.style.color = '#d00';
				}
			}
		</script>
        <title>KyotoUnivProfile</title>
    </head>
    <body>
		<h1>KyotoUnivProfile</h1>
		<p class="right">by Ryota Kameoka</p>
		<p>入力された情報に基づいて、Wi-Fi (MIAKO), VPN (KUINS-PPTP), 学生用メール (KUMOI) の設定を一括で行う iPhone 構成プロファイルを作成します。</p>
		<hr />
		<form action="file.php" method="post">
			<p>ECS-ID</p>
			<input id="input-ecsid" type="text" name="ecsid" placeholder="a0123456" onchange="checkEcsId()" />
			<p>学生用メールアドレス</p>
			<input id="input-localpart" type="text" name="localpart" placeholder="kyodai.taro.01a" onchange="checkLocalpart()" />
			<p class="right">@st.kyoto-u.ac.jp</p>
			<p>メールの表示名 (任意)</p>
			<input id="input-name" type="text" name="name" placeholder="京大 太郎, Taro Kyodai, など" />
			<input type="submit" value="ダウンロード" />
		</form>
		<hr />
		<p id="policy">入力されたすべての情報は、iPhone 構成プロファイルの作成のみに使用され、サーバーに保存されたり、第三者に情報が送信されることはありません。</p>
    </body>
</html>
