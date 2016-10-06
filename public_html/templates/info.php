<div class="collapse navbar-collapse">
	<p align="center" style="margin-bottom: 0cm;">Доброго времени суток!</p>
	<p style="margin-bottom: 0cm; margin-left: 20px">На данном ресурсе находится выполненное задание, порученное в качестве тестового, по заказу Ольги Колесниковой - HR-manager компании Ucoz.</p>
	<p style="margin-bottom: 0cm;">Коротко о структуре:</p>
	<p style="margin-bottom: 0cm; margin-left: 20px">На вкладке &quot;Структура&quot; можно увидеть дерево проекта, а так же просмотреть/скачать интересующие файлы (отображаются не все файлы проекта. Та часть, которая не имеет непосредственного отношения к заданию &mdash; скрыта).</p>
	<p lang="en-US" style="margin-bottom: 0cm;">public:</p>
	<p lang="en-US" style="margin-bottom: 0cm; margin-left: 20px">css	<span lang="ru-RU">стили</span></p>
	<p lang="en-US" style="margin-bottom: 0cm; margin-left: 20px"><span lang="ru-RU">	</span>js - <span lang="ru-RU">относящийся к </span>bootstrap <span lang="ru-RU">и </span>highstock</p>
	<p lang="en-US" style="margin-bottom: 0cm; margin-left: 20px"><span lang="ru-RU">	</span>index.php - <span lang="ru-RU">страница авторизации </span>(<span lang="ru-RU">не смог удержаться и использовал сторонний плагин)</span></p>
	<p lang="en-US" style="margin-bottom: 0cm; margin-left: 20px"><span lang="ru-RU">	</span>default.php &ndash; <span lang="ru-RU">рабочая страница проекта</span></p>
	<p lang="en-US" style="margin-bottom: 0cm;">src:</p>
	<p lang="en-US" style="margin-bottom: 0cm; margin-left: 20px">	<span lang="ru-RU">класс для работы с </span>mySql</p>
	<p lang="en-US" style="margin-bottom: 0cm; margin-left: 20px">	json <span lang="ru-RU">результаты запроса</span></p>
	<p lang="en-US" style="margin-bottom: 0cm; margin-left: 20px"><span lang="ru-RU">	вспомогательный </span>php <span lang="ru-RU">для адресации</span></p>
	<p lang="en-US" style="margin-bottom: 0cm; margin-left: 20px"><span lang="ru-RU">	функции загрузки и отображения файлов</span></p>
	<p lang="en-US" style="margin-bottom: 0cm; margin-left: 20px"><span lang="ru-RU">	вспомогательные ф-ии</span></p>
	<p lang="en-US" style="margin-bottom: 0cm;">templates:</p>
	<p style="margin-bottom: 0cm; margin-left: 20px"><span lang="en-US">	</span><span lang="ru-RU">код, формирующий содержимое страниц</span></p>
	<p style="margin-bottom: 0cm;"><br/></p>
	<p style="margin-bottom: 0cm;"><br/></p>
	<p style="margin-bottom: 0cm;"><span lang="ru-RU">немного кода:</span></p>
	<p style="margin-bottom: 0cm; margin-left: 20px"><span lang="ru-RU">	класс для работы с базой</span></p>
	<code>
		class SQL {</br>
			public static $_instance;</br>
			public $mysql_connection;</br>
			const WHITE_IP_DB = #################</br>
			const WHITE_IP_USER = #################</br>
			const WHITE_IP_PASSWORD = #################</br>
			</br>
			public function __construct() {</br>
				$this->mysql_connection = new \PDO(self::WHITE_IP_DB, self::WHITE_IP_USER, self::WHITE_IP_PASSWORD);</br>
			}</br>
			public function __clone() {</br>
			}</br>
			public static function getInstance() {</br>
				if (is_null(self::$_instance))</br>
					self::$_instance = new self();</br>
				return self::$_instance;</br>
			}</br>
			public function getResult($query) {</br>
			foreach ($this->mysql_connection->query($query) as $row) {</br>
				$result[] = $row;</br>
			}</br>
			 return $result;</br>
			}</br>
		}
	</code>
	<p style="margin-bottom: 0cm;"><br/></p>
	<p style="margin-bottom: 0cm;"><br/></p>
	<p style="margin-bottom: 0cm; margin-left: 20px">	<span lang="ru-RU">запрос на получение данных из БД</span></p>
	<code>
		SELECT fs.*, ROUND((fs.spam_abs*100/fs.total_abs), 2) as perct</br>
			FROM (	SELECT ABS(st.spam) as spam_abs, ABS(st.total) as total_abs</br>
						 ,ABS(st.reverts) as reverts_abs, ABS(st.complaints) as complaints_abs</br>
						 ,UNIX_TIMESTAMP(st.dt)*1000 as dt</br>
							FROM a8206370_tasks.statistics as st</br>
					WHERE st.dt BETWEEN NOW() - INTERVAL 30 DAY AND NOW()</br>
					GROUP BY CAST(st.dt as DATE)</br>
				) as fs</br>
		ORDER BY fs.dt
	</code>
	<p style="margin-bottom: 0cm;"><span lang="ru-RU">Данные были выбраны за последний месяц и сгруппированы по </span><span lang="ru-RU"><u>дням</u></span><span lang="ru-RU">, поэтому точек на графике </span><span lang="ru-RU">маловато</span><span lang="ru-RU">.</span> // 27.09.2016 изменил запрос на 90 дней</p>
	<p style="margin-bottom: 0cm;"><br/></p>
	<p style="margin-bottom: 0cm; margin-left: 20px"><span lang="ru-RU">Ввиду того, что база, предоставляемая хостингом, оказалась не айс &mdash; используется база, расположенная на другом далеком ресурсе и кэширование </span><span lang="en-US">ajax </span><span lang="ru-RU">отключено, поэтому могут возникать коллизии при получении данных. Учитывая этот момент, </span><span lang="en-US">highstock </span> не всегда корректно рисует графики &mdash; </span><span lang="ru-RU">нужно через несколько минут повторно обновлять страницу.</span></p>
	<p style="margin-bottom: 0cm;"><br/></p>
	<p style="margin-bottom: 0cm;"><span lang="ru-RU">	Надеюсь, данный проект служит лишь проверкой знаний и навыков, и не будет использован на проде. По этой самой причине, пункт про отображение графиков на одной странице, намеренно изменен.</span></p>
	<p style="margin-bottom: 0cm;"><br/></p>
	<p style="margin-bottom: 0cm;">	С Уважением, соискатель <a target='_blank' href="https://rostov.hh.ru/resume/46b9224eff006b89750039ed1f736563726574">Лунев Олег</a></br></p>
	<p style="margin-bottom: 0cm;">	к.т. +7(918)-850-34-72 <span lang="en-US">skype: glga6yte</span></p>
</div>