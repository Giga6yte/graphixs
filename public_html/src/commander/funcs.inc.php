<?
error_reporting(0);
function Message($ssortnG) { 
	echo $ssortnG; 
}

function PutHeader() {	
?>
 <HTML>
 <HEAD>
  <TITLE><? echo $GLOBALS["title"]; ?></TITLE>
  <LINK REL="stylesheet" TYPE="text/css" HREF="style.css">
 </HEAD>
<?
}

function DirCrr($Directory) {	
 return strpos("$Directory",".."); 
}

function ModifDirectory($Directory) {
 $lle = strlen($Directory);
 $i = $lle;
 $fin = 0;
 while((!$fin) || (i > 0)) {
  $i--;
  if($Directory[$i] == "/") $fin = $i;
 }
 $newDirectory = substr($Directory,0,$fin);
 return $newDirectory;
}

function DecDir($Directory,$action,$sort) {
 $lle = strlen($Directory);
 $prt = "";
 $DirDcmp = "<A HREF=../src/commander/index.php?Directory=.&sort=$sort>.</A>";
 if($lle > 1) {
  $aino = ".";
  for($i=2;$i<$lle;$i++) {
   if($Directory[$i] == "/") {
    $aino = "$aino/$prt";
	$ainoencode = rawurlencode($aino);
	$DirDcmp = $DirDcmp."/<A HREF=../src/commander/index.php?sort=$sort&Directory=$ainoencode>$prt</A>";
	$prt = "";
   }
   else $prt = $prt.$Directory[$i];
  }
  $aino = "$aino/$prt";
  $ainoencode = rawurlencode($aino);
  $DirDcmp = $DirDcmp."/<A HREF=../src/commander/index.php?sort=$sort&Directory=$ainoencode>$prt</A>";
 }
 return $DirDcmp;
}

function DirPrepa($DirRel,$empl) {
 $PrtsDirRel  = strlen($DirRel);
 $Prtsempl = strlen($empl);
 $lleng = $Prtsempl-$PrtsDirRel;
 $SubDs = substr($empl,$PrtsDirRel,$lleng);
 $SubDs = ".".$SubDs;
 return $SubDs;
}


function Getthumb($ext) {
 switch($ext) {
  case "jpg"  : $thumb = "fimage.gif";		break;
  case "gif"  : $thumb = "fimage.gif";		break;
  case "png"  : $thumb = "fimage.gif";		break;
  case "bmp"  : $thumb = "fpaint.gif";		break;
  case "tif"  : $thumb = "fpsd.gif";			break;
  case "mdb"  : $thumb = "faccess.gif";		break;
  case "xls"  : $thumb = "fxls.gif";			break;
  case "ppt"  : $thumb = "fpowerp.gif";		break;
  case "doc"  : $thumb = "fdoc.gif";			break;				
  case "dot"  : $thumb = "fdoc.gif";			break;			
  case "txt"  : $thumb = "ftxt.gif";			break;
  case "html" : $thumb = "fhtml.gif";			break;
  case "htm"  : $thumb = "fhtml.gif";			break;
  case "mpg"  : $thumb = "fmedia.gif";		break;
  case "avi"  : $thumb = "fmedia.gif";		break;
  case "mov"  : $thumb = "fmedia.gif";		break;
  case "psd"  : $thumb = "fpsd.gif";			break;		
  case "pdf"  : $thumb = "fimage.gif";		break;
  case "ps"   : $thumb = "fimage.gif";		break;
  case "zip"  : $thumb = "fzip.gif";			break;
  case "tar"  : $thumb = "fzip.gif";			break;
  case "gz"   : $thumb = "fzip.gif";			break;
  case "rtf"   : $thumb = "frtf.gif";			break;		
  case "mp3"  : $thumb = "fsound.gif";			break;
  case "wav"  : $thumb = "fsound.gif";			break;
  case "au"   : $thumb = "fsound.gif";			break;
  case "mid"  : $thumb = "fsound.gif";			break;
  case "exe"  : $thumb = "fexe.gif";			break;
  default     : $thumb = "ffile.gif";		break;
 }
 return $thumb;
}

function GetExtension($strd) {
 $prtt = strlen($strd);
 $i      = $prtt;
 $fin    = 0;
 $boucle = 0;
 while(!$boucle) {
  $i--;
  if($i == 0) $boucle = 1;
  else if($strd[$i] == ".") {
   $fin = $i;
   $boucle = 1;
  }
 }
 $fin++;
 $long = $prtt - $fin;
 $ext = substr($strd,$fin,$long);
 return $ext;
}

function GetTypeAffichageFichier($extension) {
 switch($extension) {
  case "php3" : $type = "Source";			break;
  case "php4" : $type = "Source";			break;
  case "php"  : $type = "Source";			break;
  case "inc"  : $type = "Source";			break;
  case "pps"  : $type = "Source";		    break;
  case "html" : $type = "Source";			break;
  case "htm"  : $type = "Source";			break;
  case "txt"  : $type = "Source";			break;
  case "c"    : $type = "Source";			break;
  case "cpp"  : $type = "Source";			break;
  case "cgi"  : $type = "Source";			break;
  case "js"   : $type = "Source";			break;
  case "jpg"  : $type = "Image";		    break;
  case "gif"  : $type = "Image";		    break;
  case "bmp"  : $type = "Image";		    break;
  default     : $type = "Source";        break;
 }
 switch($type) {
  case "Source"	   : $affichage["Type"]    = "Source";	
   $affichage["Lien"]    = "viewer.php";
   $affichage["Edt"]    = "editor.php";
   break;						 	
  case "Image"       : $affichage["Type"]    = "Image";
   $affichage["Lien"]    = "viewer.php";
   $affichage["Edt"]    = "editor.php";		
   break;
 }	
 return $affichage;
}

function FormatDate($time) {
 $d = getdate($time);
 $cdaysemaine = $d["wday"];
 $date["cday"]     = $d["mday"];
 $date["cmon"]     = $d["mon"];
 $date["cyear"]    = $d["year"];
 return $date;
}

function GetDateStr($time) {
 $date = FormatDate($time);
 return $date["cyear"]."-".$date["cmon"]."-".$date["cday"]." ";
}

//function DateDuJour()
//{
//	 $date = FormatDate(time());
//	 return $date["cday"]." ".$date["nommois"]." ".$date["cyear"];
//}


function FPerms($mode) {
 if($mode & 0x1000) $type='p'; // FIFO pipe
 else if($mode & 0x2000) $type='c'; // Character special
 else if($mode & 0x4000) $type='d'; // Directory
 else if($mode & 0x6000) $type='b'; // Block special
 else if($mode & 0x8000) $type='-'; // Regular
 else if($mode & 0xA000) $type='l'; // Symbolic Link
 else if($mode & 0xC000) $type='s'; // Socket
 else $type='u'; // UNKNOWN

 $owner["read"]    = ($mode & 00400) ? 'r' : '-';
 $owner["write"]   = ($mode & 00200) ? 'w' : '-';
 $owner["execute"] = ($mode & 00100) ? 'x' : '-';
 $group["read"]    = ($mode & 00040) ? 'r' : '-';
 $group["write"]   = ($mode & 00020) ? 'w' : '-';
 $group["execute"] = ($mode & 00010) ? 'x' : '-';
 $world["read"]    = ($mode & 00004) ? 'r' : '-';
 $world["write"]   = ($mode & 00002) ? 'w' : '-';
 $world["execute"] = ($mode & 00001) ? 'x' : '-';

 if( $mode & 0x800 ) $owner["execute"] = ($owner[execute]=='x') ? 's' : 'S';
 if( $mode & 0x400 ) $group["execute"] = ($group[execute]=='x') ? 's' : 'S';
 if( $mode & 0x200 ) $world["execute"] = ($world[execute]=='x') ? 't' : 'T';

 return "$type$owner[read]$owner[write]$owner[execute]$group[read]$group[write]$group[execute]$world[read]$world[write]$world[execute]";
}

function sortNomASCl($elt1,$elt2) {
 $nom1 = $elt1["label"];
 $nom2 = $elt2["label"];
 $val = strcmp($nom1,$nom2);
 return $val;
}

function sortNomDESCl($elt1,$elt2) {
 $nom1 = $elt1["label"];
 $nom2 = $elt2["label"];
 $val = strcmp($nom2,$nom1);
// echo "aaaaa ".$elt1["label"].$elt2["label"]."<BR>";
 return $val;
}

function sortNomASC($elt1,$elt2) {
 $nom1 = $elt1["nom"];
 $nom2 = $elt2["nom"];
 $val = strcmp($nom1,$nom2);
 return $val;
}

function sortNomDESC($elt1,$elt2) {
 $nom1 = $elt1["nom"];
 $nom2 = $elt2["nom"];
 $val = strcmp($nom2,$nom1);
 return $val;
}

function sortPrtsASC($elt1,$elt2) {
 $Prts1 = $elt1["Prts"];
 $Prts2 = $elt2["Prts"];
 if ($Prts1 == $Prts2 ) {
  $nom1 = $elt1["nom"];
  $nom2 = $elt2["nom"];
  $val = strcmp($nom1,$nom2);
 }
 else if ($Prts1 > $Prts2) $val = 1;
 else $val = -1;

 return $val;
}

function sortPrtsDESC($elt1,$elt2) {
 $Prts1 = $elt1["Prts"];
 $Prts2 = $elt2["Prts"];
 if ($Prts1 == $Prts2 ) {
  $nom1 = $elt1["nom"];
  $nom2 = $elt2["nom"];
  $val = strcmp($nom2,$nom1);
 }
 else if ($Prts1 < $Prts2) $val = 1;
 else $val = -1;
 
 return $val;
}

function sortDateASC($elt1,$elt2) {
 $date1 = $elt1["datesort"];
 $date2 = $elt2["datesort"];

 if ($date1["cyear"] == $date2["cyear"]) {
  if($date1["cmon"] == $date2["cmon"]) {
   if($date1["cday"] == $date2["cday"]) $val = 0;
   else if ($date1["cday"] > $date2["cday"]) $val = 1;
   else $val = -1;
  }
  else if ($date1["cmon"] > $date2["cmon"]) $val = 1;
  else $val = -1;
 }
 else if ($date1["cyear"] > $date2["cyear"]) $val = 1;
 else $val = -1;

 return $val;
}

function sortDateDESC($elt1,$elt2){
 $date1 = $elt1["datesort"];
 $date2 = $elt2["datesort"];

 if ($date1["cyear"] == $date2["cyear"]) {
  if($date1["cmon"] == $date2["cmon"]) {
   if($date1["cday"] == $date2["cday"]) $val = 0;
   else if ($date1["cday"] < $date2["cday"]) $val = 1;
   else $val = -1;
  }
  else if ($date1["cmon"] < $date2["cmon"]) $val = 1;
  else $val = -1;
 }
 else if ($date1["cyear"] < $date2["cyear"]) $val = 1;
 else $val = -1;

 return $val;
}


function GetNbRepertoire($Directory) {
 $Nb = 0;

 $handle  = @opendir($Directory);
 $file    = @readdir($handle);
 $file    = @readdir($handle);

 while ($file = @readdir($handle)) if(is_dir("$Directory/$file")) $Nb++;
 @closedir($handle);
 return $Nb;
}

function GetNiveauMax($Directory,$niveau,$max) {
 $niveau++;
 if($max < $niveau) $max = $niveau;

 $handle  = @opendir($Directory);
 $file    = @readdir($handle);   
 $file    = @readdir($handle);   

 while ($file = @readdir($handle)) if(is_dir("$Directory/$file"))	$max = GetNiveauMax("$Directory/$file",$niveau,$max);
 @closedir($handle);
 return $max;
}

function sortRep($rep1,$rep2) {	
 $val = strcmp($rep1,$rep2);	
 return $val; 
}

function SlwDirsRec($Directory) {
 $correct = 1;
 $handle  = @opendir($Directory);
 $file    = @readdir($handle);     
 $file    = @readdir($handle);     

 while($file = @readdir($handle)) {
  if(is_dir("$Directory/$file")) {
   if(EstVide("$Directory/$file")) {
    if(!rmdir("$Directory/$file")) $correct = 0; 
   }
   else $correct = SlwDirsRec("$Directory/$file");
  }
  else unlink("$Directory/$file");
 }
 if(!rmdir($Directory)) $correct = 0;
 @closedir($handle);
 return $correct;
}


function EstVide($Directory) {
 $handle  = @opendir($Directory);
 $file    = @readdir($handle);      // repertoire .
 $file    = @readdir($handle);      // repertoire ..

 if($file = @readdir($handle)) $val = 0;
 else $val = 1;

 @closedir($handle);
 return $val;
}


function CpRepRec($source,$destination) {
 $correct = 1;
 $handle  = @opendir($source);
 $file    = @readdir($handle);      // repertoire .
 $file    = @readdir($handle);      // repertoire ..

 if(mkdir($destination,0777)) {
  while($file = @readdir($handle)) {
   if(is_dir("$source/$file"))	$correct = CpRepRec("$source/$file","$destination/$file");
   else if(!copy("$source/$file","$destination/$file")) $correct = 0;
  }
 }
 else $correct = 0;
 @closedir($handle);
 return $correct;
}


function MvRep($RelDirN,$Directory,$fichier,$place,$Message) {
 $strBtnStrRepertoire  = $Message[0];
 $strBtnStrMsgmove = $Message[1];
 $NouvelEmplacement         = $Message[2];
 $strBtnStrErreur      = $Message[3];
 $strBtnStrAlertSD	   = $Message[4];

 $Directorytotal = $RelDirN."/".$Directory;
 if("$Directory/$fichier" != DirPrepa($RelDirN,"$place/$fichier")) {									
  if(EstVide("$Directorytotal/$fichier")) {
   if(mkdir("$place/$fichier",0777)) {
    if(rmdir("$Directorytotal/$fichier")) {
     $NouvelEmplacement = DirPrepa($RelDirN,"$place/$fichier");
     Message("$strBtnStrRepertoire$Directory/$fichier$strBtnStrMsgmove$NouvelEmplacement");
    }
	else Message("$strBtnStrErreur");
   }
   else Message("$strBtnStrErreur");
  }
  else {
   if(CpRepRec("$Directorytotal/$fichier","$place/$fichier")) {
	if(SlwDirsRec("$Directorytotal/$fichier")) {
 	 $NouvelEmplacement = DirPrepa($RelDirN,"$place/$fichier");
	 Message("$strBtnStrRepertoire$Directory/$fichier$strBtnStrMsgmove$NouvelEmplacement");
    }
	else Message("$strBtnStrErreur");
   }
   else Message("$strBtnStrErreur");
  }
 }
 else Message("$strBtnStrAlertSD");	
}


function copyRep($RelDirN,$Directory,$fichier,$emplacement,$NbRepTotal,$choix,$Message) {
 $strBtnStrRepertoire  = $Message[0];
 $strBtnStrMsgmove = $Message[1];
 $NouvelEmplacement         = $Message[2];
 $strBtnStrErreur      = $Message[3];
 $strBtnStrAlertSD	   = $Message[4];

 $Directorytotal = $RelDirN."/".$Directory;
 if(EstVide("$Directorytotal/$fichier")) {
  for($i=0;$i<$NbRepTotal;$i++) {
   if($choix[$i] == "on") {		
    if("$Directory/$fichier" != DirPrepa($RelDirN,"$emplacement[$i]/$fichier")) {	
     if(mkdir("$emplacement[$i]/$fichier",0777)) {
      $NouvelEmplacement = DirPrepa($RelDirN,"$emplacement[$i]/$fichier");
      ?><B CLASS="Communic"><? echo "$strBtnStrRepertoire$Directory/$fichier$strBtnStrMsgmove$NouvelEmplacement"; ?><BR></B><?
	  $retouralaligne = true;
	 }
     else Message("$strBtnStrErreur");
    }
    else Message("$strBtnStrAlertSD");
   }
  }
 }
 else {
  for($i=0;$i<$NbRepTotal;$i++) {
   if($choix[$i] == "on") {		
    if("$Directory/$fichier" != DirPrepa($RelDirN,"$emplacement[$i]/$fichier")) {	
     if(CpRepRec("$Directorytotal/$fichier","$emplacement[$i]/$fichier")) {
      $NouvelEmplacement = DirPrepa($RelDirN,"$emplacement[$i]/$fichier");
	  ?><B CLASS="Communic"><? echo "$strBtnStrRepertoire$Directory/$fichier$strBtnStrMsgmove$NouvelEmplacement"; ?><BR></B><?
	  $retouralaligne = true;
	 }
	 else Message("$strBtnStrErreur");
	}
	else Message("$strBtnStrAlertSD");
   }
  }
 }
 if($retouralaligne) { ?><BR><? }
}

?>