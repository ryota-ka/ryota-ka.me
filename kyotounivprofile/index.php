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
				height: 40px;
				margin: 5px auto;
				padding: 2px 5px;
				border: 1px solid #ddd;
				border-radius: 5px;
				display: block;
				font-size: 30px;
			}

			input[type="submit"] {
				background-color: #3af;
				color: #fff;
			}
		</style>
		<script type="text/javascript">
		</script>
        <title>KyotoUnivProfile</title>
    </head>
    <body>
		<form action="file.php" method="post">
			<input id="input-ecsid" type="text" name="ecsid" placeholder="a0123456" />
			<input id="input-localpart" type="text" name="localpart" placeholder="kyodai.taro.01a" />
			<input id="input-name" type="text" name="name" placeholder="京大 太郎, Taro Kyodai, など" />
			<input type="submit" value="ダウンロード" />
		</form>
    </body>
</html>
