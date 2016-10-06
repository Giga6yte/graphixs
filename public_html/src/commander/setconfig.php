<?
require("./config.inc.php"); 
$file = fopen("./config.inc.php", "w");
fputs($file,"<? \n ");
fputs($file,"// Directory \n ");
if(!empty($MajRelDirN)) $valeur = $MajRelDirN; else $valeur = "./"; 

fputs($file,"\$RelDirN   = \"$valeur");
if (substr($valeur,strlen($valeur)-1,1)!="/") fputs($file,"/");

fputs($file,"\";    \n \n ");


fputs($file,"// Language file \n \$LanguageFile     = \"./langues/$langage\"; \n \n ");
fputs($file,"\$title=\"phpCommander\"; \n");
fputs($file,"\$editablefiles=\"$edfiles\"; \n");
fputs($file,"\$htmleditablefiles=\"$htmedfiles\"; \n");
fputs($file,"require(\"./\$LanguageFile\"); \n?>");
fclose($file);

?><META HTTP-EQUIV="refresh" CONTENT="0; URL=./index.php?Directory=<? echo $Directory; ?>&sort=<? echo $sort; ?>"><?

?>
