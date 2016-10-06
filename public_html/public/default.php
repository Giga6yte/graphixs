<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8" />
		<title>Graphics</title>
		<script type="text/javascript" src="js/jquery.js"></script>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<style type="text/css">
			${demo.css}
		</style>
		<script type="text/javascript">
			$(document).ready(function () {
				$.ajaxSetup({cache: false});
				var seriesOptions = [],
					names = [],
					id = $('.graph').attr('id'),
					path = '';

				if(id==1) names = ['spam', 'total'];
				else if(id==2) names = ['reverts', 'complaints'];
				else if(id==3) names = ['perct'];
				function createChart(id_groups) {
					$('#'+id_groups).highcharts('StockChart', {
						rangeSelector: {
							selected: 4,
						},
						yAxis: {
							labels: {
								formatter: function () {
									return (this.value > 0 ? ' + ' : '') + this.value;
								}
							},
							plotLines: [{
								value: 0,
								width: 2,
								color: 'silver'
							}]
						},
						plotOptions: {
							series: {
								compare: 'value'
							}
						},
						tooltip: {
							pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.change}%)<br/>',
							changeDecimals: 2,
							valueDecimals: 2
						},

						series: seriesOptions
					});
				}

				$.each(names, function (i, name) {
					switch (name) {
						case "spam":
							path = '../src/json/spam.json';
							break;
						case "total":
							path = '../src/json/total.json';
							break;
						case "reverts":
							path = '../src/json/reverts.json';
							break;
						case "complaints":
							path = '../src/json/complaints.json';
							break;
						case "perct":
							path = '../src/json/perct.json';
							break;
					}
					$.getJSON(path, function(data) {
						var items = [];

						$.each(data, function(dates, point) {
							var arr = [parseInt(dates),point];
							items.push(arr);
						});
						seriesOptions[i] = {
							name: name,
							data: items
						};
						createChart(id);
					});
				});
			});
		</script>
	</head>
<?php
	header('Content-Type: text/html; charset=utf-8');
	setlocale(LC_ALL,'ru_RU.65001','rus_RUS.65001','Russian_Russia.65001','russian');
	require_once('../src/F.php');
	require_once('../src/classes/my_sql.php');
?>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand " href="../public/index.php">на стартовую</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Графики <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="../src/routes/first.php">spam & total</a></li>
								<li class="divider"></li>
								<li><a href="../src/routes/second.php">reverts & complaints</a></li>
								<li class="divider"></li>
								<li><a href="../src/routes/third.php">spam / total</a></li>
							</ul>
						</li>
						<li><a href="../src/routes/struct.php">Структура</a></li>
						<li><a href="../src/routes/info.php" active>Инфо</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="starter-template">
				<h1></h1>
<?php
				switch ($_SESSION['page_id']){
					case 1:
					case 2:
					case 3:
						require ('../templates/main.php');
						break;
					case 4:
						require ('../templates/struct.php');
						break;
					case 5:
						require ('../templates/info.php');
						break;
					default:
						require ('../templates/info.php');
						break;
				}
?>
			</div>
		</div>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/highstock.js"></script>
		<script type="text/javascript" src="js/default.js"></script>
	</body>
</html>
<?php
	session_destroy();
?>