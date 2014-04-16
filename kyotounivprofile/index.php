<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
		<style type="text/css">
			body {
				-webkit-text-size-adjust: 100%;
			}

			input {
				width: 90%;
				height: 35px;
				margin: 5px auto;
				padding: 2px 5px;
				border: 1px solid #ddd;
				border-radius: 5px;
				display: block;
				font-size: 25px;
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
