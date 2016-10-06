<?

@set_time_limit(600);
header("Content-disposition: filename=".basename($fichier));
header("Content-type: application/octetstream");
header("Pragma: no-cache");
header("Expires: 0");

require("./config.inc.php");
readfile("$RelDirN/$Directory/$fichier");
exit();

?>