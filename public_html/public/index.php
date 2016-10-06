<?php
	// header('Content-Type: text/html; charset=cp-1251');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Авторизация</title>
		<link rel="stylesheet" href="../public/css/style.css" media="screen" type="text/css" />
		<link rel='stylesheet prefetch' href='../public/css/icons.css' />
	</head>
	<body>
		<div class="bg-wrapper">
			<div class="bg-grad gray active"></div>
			<div class="bg-grad yellow"></div>
		</div>
		<font color=white>
			<div class="login-wrapper">
				<div class="x-wrapper">
					<div class="y-wrapper">
						<div class="title-wrapper">
							<h2>Здравствуйте!</h2>
							<h4>login/pass - произвольные</h4>
						</div>
						<form action="../public/default.php" method="post">
							<div class="input-box">
								<input type="text" id="login" name="login" placeholder="Логин" />
								<input type="password" id="password" name="password" placeholder="Пароль" /><span class="show-pass icon-eye" title="Показать/Скрыть"></span>
							</div>
							<div class="button-wrapper">
								<input type="submit" class="login-btn" value="Войти &raquo;" /><br/><br/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</font>
		<script type="text/javascript" src="../public/js/jquery.js"></script>
		<script src="../public/js/index.js"></script>
	</body>
</html>