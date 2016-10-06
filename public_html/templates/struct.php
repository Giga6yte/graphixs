<div class="collapse navbar-collapse">
<table class="table_struct">
	<tr>
		<td width="50%">
<?php
			$path = '../';
			$queue = './';
			$file_id = 100;

			function createDir($path = '.'){
				if ($handle = opendir($path)){
					echo '<ol class="tree">';
					while (false !== ($file = readdir($handle))){
						if (is_dir($path.$file) && $file != '.' && $file !='..')
							printSubDir($file, $path, $queue);
						elseif ($file != '.' && $file !='..')
							$queue[] = $file;
					}
					printQueue($queue, $path);
					echo '</ol>';
				}
			}

			function printQueue($queue, $path){
				if ($queue)
				foreach ($queue as $file){
					printFile($file, $path);
				}
			}

			function printFile($file, $path){
				global $file_id;
				if (!stristr($file, 'default.js') &&
					!stristr($file, 'index.js') &&
					!stristr($file, 'my_sql.php') &&
					!stristr($file, 'json') &&
					!stristr($file, 'fload.php') &&
					!stristr($file, 'fview.php') &&
					!(stristr($file, 'struct.php') && stristr($path, 'templates')))
				{
					echo '<img src="../templates/img/document.png"> <span full="'.$path.$file.'">'.$file.'&emsp;';
					if (stristr($file, '.js') || stristr($file, '.php') || stristr($file, '.htaccess'))
						echo '<img class="view" src="../templates/img/view.png">';
					echo '<img class="download" src="../templates/img/download.png"></span><br/>';
					// echo '<img src="../templates/img/document.png"> <span>'.$file.'</span><br/>';
				}
				$file_id ++;
			}

			function printSubDir($dir, $path){
				echo '<img src="../templates/img/folder.png"> <span class="toggle">'.$dir;
				createDir($path.$dir.'/');
				echo '</span>';
			}

			createDir($path);
?>
		</td>
		<td>
			<code class="listing" style="display:none"></code>
		</td>
	</tr>
	
</table>

</div>