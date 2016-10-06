<?php
	$my_sql = new SQL;
	$query = "	SELECT fs.*, ROUND((fs.spam_abs*100/fs.total_abs), 2) as perct
					FROM (	SELECT ABS(st.spam) as spam_abs, ABS(st.total) as total_abs
							 ,ABS(st.reverts) as reverts_abs, ABS(st.complaints) as complaints_abs
							 ,UNIX_TIMESTAMP(st.dt)*1000 as dt
								FROM a8206370_tasks.statistics as st
							WHERE st.dt BETWEEN NOW() - INTERVAL 90 DAY AND NOW()
							GROUP BY CAST(st.dt as DATE)
							) as fs
				ORDER BY fs.dt
			";
	$result = $my_sql -> getResult($query);

	file_put_contents('../src/json/spam.json', "{\r\n");
	file_put_contents('../src/json/total.json', "{\r\n");
	file_put_contents('../src/json/reverts.json', "{\r\n");
	file_put_contents('../src/json/complaints.json', "{\r\n");
	file_put_contents('../src/json/perct.json', "{\r\n");

	$counter = count($result);
	if ($counter != 0){
		foreach ($result as $key=>$val){
			if ($key==($counter-1))	$delim = '';
			else					$delim = ',';
			file_put_contents('../src/json/spam.json', '"'.$val['dt'].'":'.$val['spam_abs'].$delim."\r\n", FILE_APPEND);
			file_put_contents('../src/json/total.json', '"'.$val['dt'].'":'.$val['total_abs'].$delim."\r\n", FILE_APPEND);
			file_put_contents('../src/json/reverts.json', '"'.$val['dt'].'":'.$val['reverts_abs'].$delim."\r\n", FILE_APPEND);
			file_put_contents('../src/json/complaints.json', '"'.$val['dt'].'":'.$val['complaints_abs'].$delim."\r\n", FILE_APPEND);
			file_put_contents('../src/json/perct.json', '"'.$val['dt'].'":'.$val['perct'].$delim."\r\n", FILE_APPEND);
		}
	}

	file_put_contents('../src/json/spam.json', "}\r\n", FILE_APPEND);
	file_put_contents('../src/json/total.json', "}\r\n", FILE_APPEND);
	file_put_contents('../src/json/reverts.json', "}\r\n", FILE_APPEND);
	file_put_contents('../src/json/complaints.json', "}\r\n", FILE_APPEND);
	file_put_contents('../src/json/perct.json', "}\r\n", FILE_APPEND);
?>
<table class="table">
	<tr>
		<td>
			<div class="graph" id="<?=$_SESSION['page_id']?>" style="height: 250px; min-width: 200px"></div>
		</td>
	</tr>
</table>