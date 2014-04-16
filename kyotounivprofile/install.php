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

			h1 + p {
				margin: 5px 0;
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

			#policy {
				font-size: 12px;
				color: #bbb;
				padding-left: 3px;
				padding-right: 3px;
			}

			#policy p {
				text-indent: 1em;
				margin-top: 0;
				margin-bottom: 0;
			}
		</style>
        <title>KyotoUnivProfile</title>
    </head>
    <body>
		<h1>KyotoUnivProfile</h1>
		<p class="right">by Ryota Kameoka</p>
		<p></p>
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
		<div id="policy">
			<p>入力されたすべての情報は、iPhone 構成プロファイルの作成のみに使用され、サーバーに保存されたり、第三者に情報が送信されることはありません。</p>
			<p>このアプリケーションは一個人が開発したものであり、京都大学当局とは一切関係ありません。</p>
			<p>このアプリケーションを使用することによって生じた、いかなる損害についても、製作者はその責任を負いかねますので、あらかじめご了承ください。</p>
    </body>
</html>
