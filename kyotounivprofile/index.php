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
				padding:5px;
				color: #000;
				word-wrap: break-word;
				-webkit-text-size-adjust: none;
			}

			input {
				width: 90%;
				height: 30px;
				margin-top: 0;
				margin-bottom: 10px;
				margin-left: auto;
				margin-right: auto;
				padding: 2px 5px;
				border: 1px solid #ddd;
				border-radius: 5px;
				display: block;
				font-size: 20px;
				vertical-align: middle;
			}

			p {
				font-size: 20px;
			}

			p.right {
				text-align: right;
				font-size: 16px;
			}

			input[type="submit"] {
				background: #3af;
				color: #fff;
			}
		</style>
		<script type="text/javascript">
		</script>
        <title>KyotoUnivProfile</title>
    </head>
    <body>
		<form action="file.php" method="post">
			<p>ECS-ID</p>
			<input id="input-ecsid" type="text" name="ecsid" placeholder="a0123456" />
			<p>学生用メールアドレス (@よりも前)</p>
			<input id="input-localpart" type="text" name="localpart" placeholder="kyodai.taro.01a" />
			<p class="right">@st.kyoto-u.ac.jp</p>
			<p>メールの表示名</p>
			<input id="input-name" type="text" name="name" placeholder="京大 太郎, Taro Kyodai, など" />
			<input type="submit" value="ダウンロード" />
		</form>
    </body>
</html>
