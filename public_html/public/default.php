<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="cp-1251">
		<title>Graphics</title>
		<script type="text/javascript" src="js/jquery.js"></script>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
			${demo.css}
		</style>
		<script type="text/javascript">
			$(function () {
				var seriesOptions = [],
					seriesCounter = 0,
					names = ['MSFT', 'AAPL', 'GOOG'];
				/**
				 * Create the chart when all data is loaded
				 * @returns {undefined}
				 */
				function createChart() {

					// mass = [[1253750400000,25.94],[1253836800000,25.55]];
					// console.log(path);


					// document.write(
						// '<a target="_blank" href="data:text/plain;charset=cp-1251,%EF%BB%BF' + encodeURIComponent(data) + '" download="data.json">data.json</a>'
						// '<a target="_blank" href="data:text/plain;charset=cp-1251, ' + data + '" download="data.json">data.json</a>'
					// )


					$('#part1').highcharts('StockChart', {
						rangeSelector: {
							selected: 4
						},
						yAxis: {
							labels: {
								formatter: function () {
									return (this.value > 0 ? ' + ' : '') + this.value + '%';
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
								compare: 'percent'
							}
						},
						tooltip: {
							pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.change}%)<br/>',
							valueDecimals: 2
						},
						series: seriesOptions
					});
					$('#part2').highcharts('StockChart', {
						rangeSelector: {
							selected: 4
						},
						yAxis: {
							labels: {
								formatter: function () {
									return (this.value > 0 ? ' + ' : '') + this.value + '%';
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
								compare: 'percent'
							}
						},
						tooltip: {
							pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.change}%)<br/>',
							valueDecimals: 2
						},
						series: seriesOptions
					});
					$('#part3').highcharts('StockChart', {
						rangeSelector: {
							selected: 4
						},
						yAxis: {
							labels: {
								formatter: function () {
									return (this.value > 0 ? ' + ' : '') + this.value + '%';
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
								compare: 'percent'
							}
						},
						tooltip: {
							pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.change}%)<br/>',
							valueDecimals: 2
						},
						series: seriesOptions
					});
				}

				$.each(names, function (i, name) {
					$.getJSON('https://www.highcharts.com/samples/data/jsonp.php?filename=' + name.toLowerCase() + '-c.json&callback=?',    function (data) {
						seriesOptions[i] = {
							name: name,
							data: data
						};
					// As we're loading the data asynchronously, we don't know what order it will arrive. So
					// we keep a counter and create the chart when all the data is loaded.
						seriesCounter += 1;
						if (seriesCounter === names.length) {
							createChart();
						}
					});
				});
			});
		</script>
	</head>
<?php
	header('Content-Type: text/html; charset=cp-1251');
	setlocale(LC_ALL,'ru_RU.65001','rus_RUS.65001','Russian_Russia.65001','russian');
	require_once('../src/F.php');
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
					<a class="navbar-brand active" href="../src/routes/main.php">Графики</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="../src/routes/struct.php">Структура</a></li>
						<li><a href="../src/routes/cdm.php">Листинг</a></li>
						<li><a href="../src/routes/info.php">Инфо</a></li>
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
						require ('../templates/main.php');
						break;
					case 2:
						require ('../templates/struct.php');
						break;
					case 3:
						require ('../templates/cdm.php');
						break;
					case 4:
						require ('../templates/info.php');
						break;
					default: echo 'хм... странички-то такой нет';
				}
?>
			</div>
		</div>

		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<script src="https://code.highcharts.com/stock/highstock.js"></script>
		<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
	</body>
</html>
<?php
	session_destroy();
?>