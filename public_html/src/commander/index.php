<SCRIPT LANGUAGE="JavaScript">
compatibility=false; 
if(parseInt(navigator.appVersion)>=3.0){compatibility=true}
if(compatibility)
{
 IMG_htmlv_on     = new Image;		IMG_htmlv_on.src      = "../src/commander/img/htmlview_.gif";
 IMG_htmlv_off    = new Image;		IMG_htmlv_off.src    = "../src/commander/img/htmlview.gif";
 IMG_normalv_on     = new Image;		IMG_normalv_on.src      = "../src/commander/img/normalview_.gif";
 IMG_normalv_off    = new Image;		IMG_normalv_off.src    = "../src/commander/img/normalview.gif";
 IMG_normale_on     = new Image;		IMG_normale_on.src     = "../src/commander/img/normaledit_.gif";
 IMG_normale_off    = new Image;		IMG_normale_off.src    = "../src/commander/img/normaledit.gif";
 IMG_hnormale_on     = new Image;		IMG_hnormale_on.src     = "../src/commander/img/hnormaledit_.gif";
 IMG_hnormale_off    = new Image;		IMG_hnormale_off.src    = "../src/commander/img/hnormaledit.gif";
 IMG_delete_on    = new Image;		IMG_delete_on.src    = "../src/commander/img/delete_.gif";
 IMG_delete_off   = new Image;		IMG_delete_off.src   = "../src/commander/img/delete.gif";
 IMG_ren_on       = new Image;		IMG_ren_on.src       = "../src/commander/img/rename_.gif";
 IMG_ren_off      = new Image;		IMG_ren_off.src      = "../src/commander/img/rename.gif";
 IMG_move_on      = new Image;		IMG_move_on.src      = "../src/commander/img/move_.gif";
 IMG_move_off     = new Image;		IMG_move_off.src     = "../src/commander/img/move.gif";
 IMG_copy_on      = new Image;		IMG_copy_on.src      = "../src/commander/img/copy_.gif";
 IMG_copy_off     = new Image;		IMG_copy_off.src     = "../src/commander/img/copy.gif";
 IMG_download_on  = new Image;		IMG_download_on.src  = "../src/commander/img/download_.gif";
 IMG_download_off = new Image;		IMG_download_off.src = "../src/commander/img/download.gif";
} 

function change(x,y) { 
 if(compatibility) {
  document.images[x].src=eval(y+'.src');
 }
}
</SCRIPT>
 
<?	
require("/config.inc.php");
require("/funcs.inc.php");
PutHeader();

$file_key=0;
$fold_key=0;

function GetListFiles($folder,&$all_files){
	$fp=opendir($folder);
	while($cv_file=readdir($fp)) {
		if(is_file($folder."/".$cv_file)) {
			$find_file[$file_key]['nom']			= $cv_file;
			$find_file[$file_key]['Prts']			= filesize($folder."/".$cv_file);
			$find_file[$file_key]['date']			= GetDateStr(filemtime($folder."/".$cv_file));
			$find_file[$file_key]['datesort']		= FormatDate(filemtime($folder."/".$cv_file));
			$find_file[$file_key]['permissions']	= FPerms(fileperms($folder."/".$cv_file));
			
			// $find_file[]			= $cv_file;
			// $find_file[]			= filesize($folder."/".$cv_file);
			// $find_file[]			= GetDateStr(filemtime($folder."/".$cv_file));
			// $find_file[]			= FormatDate(filemtime($folder."/".$cv_file));
			// $find_file[]			= FPerms(fileperms($folder."/".$cv_file));
			$file_key++;

			$all_files[]=$folder."/".$cv_file;
		}elseif($cv_file!="." && $cv_file!=".." && is_dir($folder."/".$cv_file)){
			$find_fold[$fold_key]['nom']			= $cv_file;
			$find_fold[$fold_key]['Prts']			= filesize($folder."/".$cv_file);
			$find_fold[$fold_key]['date']			= GetDateStr(filemtime($folder."/".$cv_file));
			$find_fold[$fold_key]['datesort']		= FormatDate(filemtime($folder."/".$cv_file));
			$find_fold[$fold_key]['permissions']	= FPerms(fileperms($folder."/".$cv_file));
			$fold_key++;

			GetListFiles($folder."/".$cv_file,$all_files);
		}
	}
	closedir($fp);
	print_r_pre($find_file);
	print_r_pre($find_fold);
}

GetListFiles("../", $all_files);
print_r_pre($all_files);
exit();
?>
<BODY BGCOLOR="white" topmargin=0 leftmargin=0 marginwidth=0 marginheight=0><?


if(!empty($newfichier)) $newfichier = stripslashes($newfichier);
if(!empty($Directory))  $Directory  = stripslashes($Directory); else $Directory = ".";
if(!empty($fichier))    $fichier    = stripslashes($fichier);
if(!empty($place))      $place      = stripslashes($place);
if(!empty($rep))        $rep        = stripslashes($rep);
if(empty($sort))        $sort      = "NomASC";


if( DirCrr($Directory) != false)
{
	$Directory = ".";
	unset($action);
	unset($rep);
}

$Directorytotal = $RelDirN."/".$Directory;
// include "/head.inc.php";

// echo "<TABLE BGCOLOR=\"#D6D3CE\" width=100% BORDER=\"0\" cellspacing=0 cellpadding=0><TR><TD  ALIGN=\"left\"><table border=1 width=100% height=100% cellspacing=0 cellpadding=1><tr><td>";
// switch($action){
 
 // case "rename"          :  if(file_exists("$Directorytotal/$newfichier")) Message("$strBtnStrFichier$newfichier$strBtnStrAlertDeja");
							// else if(rename("$Directorytotal/$fichier","$Directorytotal/$newfichier")) Message("$strBtnStrFichier$fichier$strBtnStrMsgrename$newfichier");
						 	// else Message("$strBtnStrErreur");
					 		// break;
 // case "CreerRep"		 :  if(file_exists("$Directorytotal/$rep")) Message("$strBtnStrRepertoire$rep$strBtnStrAlertDeja");
							// else if(mkdir("$Directorytotal/$rep", 0777)) Message("$strBtnStrRepertoire$rep$strBtnStrMsgCreerRep");
							// else Message("$strBtnStrErreur");
							// break;
 // case "CNewFile"		 :  if(file_exists("$Directorytotal/$rep")) Message("$strFileNIE$rep$strBtnStrAlertDeja");
							// else if(touch("$Directorytotal/$rep")) Message("$strFileNIE$rep$strBtnStrMsgCreerRep");
							// else Message("$strBtnStrErreur");
							// break;
							
 // case "deleterimerFichier" : if(unlink("$Directorytotal/$fichier")) Message("$strBtnStrFichier$fichier$strBtnStrMsgdeleterimer");
							 // else Message("$strBtnStrErreur");
							 // break;
 // case "deleterimerRep"     : if(rmdir("$Directorytotal/$rep")) Message("$strBtnStrRepertoire$rep$strBtnStrMsgdeleterimer");
						     // else Message("$strBtnStrErreur");
							 // break;
 // case "deleterimerRepNV"   : if(SlwDirsRec("$Directorytotal/$fichier")) Message("$strBtnStrRepertoire$fichier$strBtnStrMsgdeleterimer");
							 // else Message("$strBtnStrErreur");
							 // break;

 // case "upload"      : if(copy("$fichier","$Directorytotal/$fichier_name")) Message("$strBtnStrFichier$fichier_name$strUploadBtnSize$fichier_size$strBtnStrMsgupload");
						   // else Message("$strBtnStrErreur");
							// break;
 // case "moveFichier"  : if("$Directory/$fichier" != DirPrepa($RelDirN,"$place/$fichier")) {
						    // if(copy("$Directorytotal/$fichier","$place/$fichier")) {
							 // if(unlink("$Directorytotal/$fichier")) {
							  // $NouvelEmplacement = DirPrepa($RelDirN,"$place/$fichier");
							  // Message("$strBtnStrFichier$Directory/$fichier$strBtnStrMsgmove$NouvelEmplacement");
							 // }
							 // else Message("$strBtnStrErreur");
							// }
							// else Message("$strBtnStrErreur");
						   // }
						   // else Message("$strBtnStrAlertSD");
							  // break;
 // case "copyFichier"    : for($i=0;$i<$NbRepTotal;$i++) {
								// if($choix[$i] == "on") {
								 // if("$Directory/$fichier" != DirPrepa($RelDirN,"$emplacement[$i]/$fichier")) {
								  // if(copy("$Directorytotal/$fichier","$emplacement[$i]/$fichier")) { 
								   // $NouvelEmplacement = DirPrepa($RelDirN,"$emplacement[$i]/$fichier");
								   // $retouralaligne = true;
								  // }
								  // else Message("$strBtnStrErreur");
								 // }
								 // else Message("$strBtnStrAlertSD");
								// }				
							   // }
							  // if($retouralaligne) {  }
							  // break;
 // case "MvRep"     : $Message[0] = $strBtnStrRepertoire;
					 // $Message[1] = $strBtnStrMsgmove;
					 // $Message[2] = $NouvelEmplacement;
					 // $Message[3] = $strBtnStrErreur;
					 // $Message[4] = $strBtnStrAlertSD;

					 // MvRep($RelDirN,$Directory,$fichier,$place,$Message);
					 // break;
 // case "copyRep"       : $Message[0] = $strBtnStrRepertoire;
						 // $Message[1] = $strBtnStrMsgcopy;
						 // $Message[2] = $NouvelEmplacement;
						 // $Message[3] = $strBtnStrErreur;
						 // $Message[4] = $strBtnStrAlertSD;

						 // copyRep($RelDirN,$Directory,$fichier,$emplacement,$NbRepTotal,$choix,$Message);
	
						 // break;
// }
// echo "<BR></td></tr></table></TD></TR></TABLE>";						 

$handle  = @opendir($Directorytotal);
$file    = @readdir($handle);      
$file    = @readdir($handle);      
$repind  = 0;
$fileind = 0;

while ($file = @readdir($handle)) {
 if(is_dir("$Directorytotal/$file")) {
  $reptab[$repind]["nom"]           = $file;
  $reptab[$repind]["Prts"]        = filesize("$Directorytotal/$file");
  $reptab[$repind]["date"]          = GetDateStr(filemtime("$Directorytotal/$file"));
  $reptab[$repind]["datesort"]       = FormatDate(filemtime("$Directorytotal/$file"));
  $reptab[$repind]["permissions"]   = FPerms(fileperms("$Directorytotal/$file"));
  $repind++;
 }
 else {
 $filetab[$fileind]["nom"]         = $file;
 $filetab[$fileind]["Prts"]      = filesize("$Directorytotal/$file");
 $filetab[$fileind]["date"]        = GetDateStr(filemtime("$Directorytotal/$file"));
 $filetab[$fileind]["datesort"]     = FormatDate(filemtime("$Directorytotal/$file"));
 $filetab[$fileind]["permissions"] = FPerms(fileperms("$Directorytotal/$file"));
 $fileind++;
 }
}
@closedir($handle);

print_r_pre($reptab);
print_r_pre($filetab);
exit('c');
switch($sort) {
 case "NomASC"      : if(count($reptab))  usort($reptab,sortNomASC);
					     if(count($filetab)) usort($filetab,sortNomASC);
					     break;
 case "NomDESC"     : if(count($reptab))  usort($reptab,sortNomDESC);
					     if(count($filetab)) usort($filetab,sortNomDESC);
					     break;			
 case "PrtsASC"   : if(count($reptab))  usort($reptab,sortPrtsASC);
					     if(count($filetab)) usort($filetab,sortPrtsASC);
					     break;
 case "PrtsDESC"  : if(count($reptab))  usort($reptab,sortPrtsDESC);
					     if(count($filetab)) usort($filetab,sortPrtsDESC);
					     break;
 case "sortDateASC"  : if(count($reptab))  usort($reptab,sortDateASC);
						 if(count($filetab)) usort($filetab,sortDateASC);
			             break;
 case "sortDateDESC" : if(count($reptab))  usort($reptab,sortDateDESC);
						 if(count($filetab)) usort($filetab,sortDateDESC);
			             break;
}

$Directoryencode = rawurlencode($Directory);
$DirectoryDecompose = DecDir($Directory,$action,$sort);
?><TABLE width=100%  BORDER="0" CELLPADDING="0" CELLSPACING="0">
<TR>
	<TD BGCOLOR="#D6D3CE"><table border=1 width=100% height=100% cellspacing=0 cellpadding=1><tr><td>&nbsp;</td></tr></table></TD>
	<TD BGCOLOR="#D6D3CE" ALIGN="center"><table border=1 width=100% height=100% cellspacing=0 cellpadding=1><tr><td><?=$strBtnStrNom?></TD></TR></TABLE></TD>
	<TD BGCOLOR="#D6D3CE" ALIGN="center"><table border=1 width=100% height=100% cellspacing=0 cellpadding=1><tr><td><?=$strBtnStrPrts?></TD></TR></TABLE></TD>
	<TD BGCOLOR="#D6D3CE" ALIGN="center"><table border=1 width=100% height=100% cellspacing=0 cellpadding=1><tr><td><?=$strBtnStrDate?></TD></TR></TABLE></TD>
	<TD BGCOLOR="#D6D3CE" ALIGN="center"><table border=1 width=100% height=100% cellspacing=0 cellpadding=1><tr><td><? echo $strBtnStrPermissions; ?></TD></TR></TABLE></TD>
</TR>


<? 

if($Directory != ".")
{
	$Directoryretour = ModifDirectory($Directory);
	$Directoryretour = rawurlencode($Directoryretour);
    if ($Directoryretour=="%2F") $Directoryretour = "."; 
	?>
	<TR>
		<TD ALIGN="center"><A HREF="../src/commander/index.php?Directory=<? echo $Directoryretour; ?>&sort=<? echo $sort; ?>"><IMG SRC="../src/commander/img/back.gif" BORDER="0"></A></TD>
		<TD ALIGN="left"  ><A HREF="../src/commander/index.php?Directory=<? echo $Directoryretour; ?>&sort=<? echo $sort; ?>">..</A></TD>
	</TR>
	<?
}

$Directoryencode = rawurlencode($Directory);

for($i=0;$i<$repind;$i++)
{
	$nomrep      = $reptab[$i]["nom"];
	$Directoryrep   = rawurlencode($Directory."/".$nomrep);
	$repencode   = rawurlencode($nomrep);
	$IndiceImage = $i;

	?>
	<TR>
		<TD ALIGN="center"><IMG SRC="../src/commander/img/folder.gif" BORDER="0"></TD>
		<TD ALIGN="left"><font color="blue"><?=$nomrep?></font></TD>
		<TD ALIGN="left" ><? echo $reptab[$i]["Prts"];      ?></TD>
		<TD ALIGN="left" ><? echo $reptab[$i]["date"];        ?></TD>
		<TD ALIGN="left"><? echo $reptab[$i]["permissions"]; ?></TD>
	 </TR>
	<?
}

$IndiceImage++;
for($i=0;$i<$fileind;$i++) {
 $nomfic      = $filetab[$i]["nom"];
 $ficencode   = rawurlencode($nomfic);
 $ext         = GetExtension($nomfic);
 $ext         = strtolower($ext);
 $thumb       = Getthumb($ext);
 $affichage   = GetTypeAffichageFichier($ext);
 $type        = $affichage["Type"];
 $lien        = $affichage["Lien"];
 $edt        = $affichage["Edt"]; 
 $IndiceImage += $i;
?>
	<TR>
		<TD ALIGN="center"><IMG SRC ="../src/commander/img/<? echo $thumb ?>" BORDER="0"></TD>
		<TD ALIGN="left"  ><? echo $nomfic; ?></TD>
		<TD ALIGN="left" ><? echo $filetab[$i]["Prts"]; ?></TD>
		<TD ALIGN="left" ><? echo $filetab[$i]["date"]; ?></TD>
		<TD ALIGN="left"><? echo $filetab[$i]["permissions"]; ?></TD>
	</TR>
	<?
	$iseditablehtml=0;
}

if(($repind == "0") && ($fileind == "0")) { ?><TR><TD COLSPAN="9" ALIGN="center"><B CLASS="Communic"><? echo $strBtnStrPasDeFichier; ?></B></TD></TR><? }
?>
<? $AfficherNbFileAndNbRep = 1; ?>
<? include "/foot.inc.php"; ?>
</BODY>
</HTML>
