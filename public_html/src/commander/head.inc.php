<SCRIPT language="JavaScript"> 
compatibility=false; if(parseInt(navigator.appVersion)>=3.0){compatibility=true}
if(compatibility) {
	b6_on     = new Image;	b6_on.src     = "../src/commander/img/newfile_.gif";
	b6_off    = new Image;	b6_off.src    = "../src/commander/img/newfile.gif";
	b5_on     = new Image;	b5_on.src     = "../src/commander/img/home_.gif";
	b5_off    = new Image;	b5_off.src    = "../src/commander/img/home.gif";
	b2_on     = new Image;	b2_on.src     = "../src/commander/img/newfolder_.gif";
	b2_off    = new Image;	b2_off.src    = "../src/commander/img/newfolder.gif";
	b1_on     = new Image;	b1_on.src     = "../src/commander/img/refresh_.gif";
	b1_off    = new Image;	b1_off.src    = "../src/commander/img/refresh.gif";
	b3_on     = new Image;	b3_on.src     = "../src/commander/img/upload_.gif";
	b3_off    = new Image;	b3_off.src    = "../src/commander/img/upload.gif";
	b4_on     = new Image;	b4_on.src     = "../src/commander/img/help_.gif";
	b4_off    = new Image;	b4_off.src    = "../src/commander/img/help.gif";
	bpref_on  = new Image;	bpref_on.src  = "../src/commander/img/prefs_.gif";
	bpref_off = new Image;	bpref_off.src = "../src/commander/img/prefs.gif";
}
function change(x,y) { if(compatibility) {document.images[x].src=eval(y+'.src');} }
</SCRIPT>
<? $Directoryencode = rawurlencode($Directory);	?>
<table border=1 cellspacing=1 cellpadding=0  bgcolor="#D6D3CE" width=740>
<tr><td colspan=2><table border=0 cellspacing=0 cellpadding=0 bgcolor="#D6D3CE" height=28 width=740>
<tr>
<td WIDTH="13" HEIGHT="28"><IMG SRC="img/ml.gif" WIDTH="13" HEIGHT="28" BORDER="0"></TD>
<td background="img/ms.gif" width=650>
<A  HREF="./newfile.php?Directory=<? echo $Directoryencode; ?>&sort=<? echo $sort; ?>&action=CNewFile" onMouseOver="change('b6','b6_on')" onMouseOut="change('b6','b6_off')"><IMG SRC="../src/commander/img/newfile.gif" BORDER=0 NAME="b6" ALT="<? echo $strTouchBtn; ?>"></A>

<A  HREF="./newfolder.php?Directory=<? echo $Directoryencode; ?>&sort=<? echo $sort; ?>&action=CreerRep" onMouseOver="change('b2','b2_on')" onMouseOut="change('b2','b2_off')"><IMG SRC="../src/commander/img/newfolder.gif" BORDER=0 NAME="b2" ALT="<? echo $strMkdirBtn; ?>"></A>

<A  HREF="./index.php?Directory=<? echo $Directoryencode; ?>&sort=<? echo $sort; ?>" onMouseOver="change('b1','b1_on')" onMouseOut="change('b1','b1_off')"><IMG SRC="../src/commander/img/refresh.gif" BORDER="0" NAME="b1" ALT="<? echo $strRefreshBtn; ?>"></A>

<A  HREF="./upload.php?Directory=<? echo $Directoryencode; ?>&sort=<? echo $sort; ?>&action=upload"  onMouseOver="change('b3','b3_on')" onMouseOut="change('b3','b3_off')"><IMG SRC="../src/commander/img/upload.gif" BORDER=0 NAME="b3" ALT="<? echo $strUploadBtn; ?>"></A>

<A  HREF="<? echo $strCheminRetour; ?>"  onMouseOver="change('b5','b5_on')" onMouseOut="change('b5','b5_off')"><IMG SRC="../src/commander/img/home.gif" BORDER=0 NAME="b5" ALT="<? echo $strBtnStrhome; ?>"></A>


</TD>
<td WIDTH="8" HEIGHT="28"><IMG SRC="img/mr.gif" WIDTH="8" HEIGHT="28" BORDER="0" ></TD>
<td WIDTH="13" HEIGHT="28"><IMG SRC="img/ml.gif" WIDTH="13" HEIGHT="28" BORDER="0"></TD>
<td background="img/ms.gif">

<A  HREF="./preferences.php?Directory=<? echo $Directoryencode; ?>&sort=<? echo $sort; ?>" onMouseOver="change('bpref','bpref_on')" onMouseOut="change('bpref','bpref_off')"><IMG SRC="../src/commander/img/prefs.gif" BORDER=0 NAME="bpref" ALT="<? echo $strBtnStrOptions; ?>"></a>

<A  HREF="#" ONCLICK="res = window.open('help.php','viewer','scrollbars=no,statue=no,width=200,height=130');"  onMouseOver="change('b4','b4_on')" onMouseOut="change('b4','b4_off')"><IMG SRC="../src/commander/img/help.gif" BORDER=0 NAME="b4" ALT="<? echo $strBtnStrhelp; ?>"></A>
</TD>
<td WIDTH="8" HEIGHT="28"><IMG SRC="img/mr.gif" WIDTH="8" HEIGHT="28" BORDER="0" ></TD>
</TR>
</TABLE></TD></TR>
<!--  -->
<tr><td valign=top bgcolor=white width=190 align=left>
<?
 // Tree Generator for PHP
 $myFirstTree = new phpTree;

$iii=0;
$cCHOSEN = 0;
function dirrel($hand,$par) {
 global $myFirstTree, $iii, $Directory,$RelDirN,$cCHOSEN,$sort;
 if ($handle = @opendir($hand)) {
  while (false !== ($file = readdir($handle))) { 
   if ($file != "." && $file != ".." && is_dir($hand)) { 
	$iii++;
	$date = FormatDate(filemtime("$hand/$file"));
	$ttt =GetDateStr(filemtime("$hand/$file"));
	$size = filesize("$hand/$file");

	$nomrep      = $file;

	$Directoryrep   = ".".rawurlencode(substr($hand,strlen($RelDirN))."/".$nomrep);


	$llink = "./index.php?Directory=$Directoryrep&sort=".$sort;
    if (is_dir("$hand/$file")) $myFirstTree->AddValue($iii,"$file","$llink",$par,$size,$date);
    if ("$hand/$file"== "$RelDirN".substr($Directory,1)) {
	 $cCHOSEN = $iii;
	}
	dirrel("$hand/$file",$iii);
   } 
  }
 closedir($handle); 
}
 
 
}
dirrel($RelDirN,0);
//

if(count($myFirstTree->_values))  usort($myFirstTree->_values,sortNomASCl);
//not implemented yet  
/*
switch($sort) {
 case "NomASC"      : if(count($myFirstTree->_values))  usort($myFirstTree->_values,sortNomASCl);
					     break;
 case "NomDESC"     : if(count($myFirstTree->_values)) {
  usort($myFirstTree->_values,sortNomDESCl);
  }
					     break;			
 case "PrtsASC"   : if(count($myFirstTree->_values))  usort($myFirstTree->_values,sortPrtsASC);
					     break;
 case "PrtsDESC"  : if(count($myFirstTree->_values))  usort($myFirstTree->_values,sortPrtsDESC);
					     break;
 case "sortDateASC"  : if(count($myFirstTree->_values))  usort($myFirstTree->_values,sortDateASC);
			             break;
 case "sortDateDESC" : if(count($myFirstTree->_values))  usort($myFirstTree->_values,sortDateDESC);
			             break;
}
*/
///



   $myFirstTree->SetTitle("");
   $myFirstTree->drawTree(0,$cCHOSEN);


class phpTree {
 var $_values;
 var $_title;       
 var $_call = 0;
 function phpTree() {
  $this->_values = array();
 }

 function SetTitle($title) {
  $this->_title = $title;
 }

 function AddValue($identifier, $label, $url, $parent, $size, $date) {
  array_push($this->_values, array("identifier" => $identifier,"label" => $label, "link" => $url,"Prts"=>$size,"datesort"=>$date, "parent" => $parent));
 }
 
 function isNotEmpty($item) {
  foreach($this->_values as $value) 
   if ($value["parent"] == $item) return true;
  
  return false;
 }
 
 
 function isChosenIn($chosen,$current) {
  $weare = $chosen;
  $tmp = array();
  do  {
   foreach($this->_values as $value) {
    if ($value["identifier"] == $weare) break;
   }
   $weare = $value["parent"];
   array_push($tmp,$value["identifier"]);

  }  while ($value["parent"]!=0);
  return in_array($current,$tmp);
 } 

 function nodecount($parent) {
  $i=0;
  foreach($this->_values as $value) {
   if ($value["parent"]==$parent) $i++;
  }
  return $i;
 }
 
  function treecount() {
  $i=0;
  foreach($this->_values as $value) {
    $i++;
  }
  return $i;
 }

 function drawTree($parent,$chosen) {
//  asort($this->_values);
  $i=0;
  $this->_call++;
  echo "<table  border=0	 cellspacing=0 cellpadding=0 align=left valign=top STYLE=\"  clear: left\">";
  if ($this->_call == 1) echo "<tr valign=top ><td valign=top><a HREF=\"index.php\" class=\"treeitemstyle\"><img vspace=0 hspace=0 border=0 align=left SRC=\"img/folder.gif\"></a></td><td   class=\"treeitemstyle\"><a HREF=\"index.php\" class=\"treeitemstyle\">".$this->_title."</a></TD></tr>";
  foreach($this->_values as $value) {
   if ($value["parent"]==$parent) {
    $i++;
    echo "<tr valign=top >";
    echo "<td height=100% valign=top align=left ";
	if ($this->nodecount($parent)!=$i) echo "background=\"img/line-p.gif\"";
	echo ">";
	if ($this->isNotEmpty($value["identifier"])) {
 	 
     // galaz otwarta czy zamknieta
	 if ($chosen!=0 and $this->isChosenIn($chosen,$value["identifier"])) {
	  echo "<img SRC=\"img/minus-";
	  echo $tmp = ($this->nodecount($parent)!=$i ?  "s" : "k");
	  echo ".gif\"  vspace=0 hspace=0></TD>";
	 } 
	 else {  									 
	  echo "<img SRC=\"img/plus-";
 	  echo $tmp = ($this->nodecount($parent)!=$i ?  "s" : "k");	
	  echo ".gif\"  vspace=0 hspace=0></TD>";
	 }	
	
	} else {
 	 echo "<img SRC=\"img/wezel-";
     echo $tmp = ($this->nodecount($parent)!=$i ?  "s" : "k");	 
	 echo ".gif\" vspace=0 hspace=0 align=left></TD>";
	}   
    echo "<td height=100% align=left   valign=middle nowrap>";
	echo "<a HREF=\"".$value["link"]."\" class=\"treeitemstyle\">";
	echo "<img vspace=0 border=0 hspace=0 align=left SRC=\"img/folder.gif\">";
	if ($chosen == $value["identifier"]) echo "<u>";
//    if ($chosen == $value["identifier"]) echo "<B>";
	echo $value["label"];
    if ($chosen == $value["identifier"]) echo "</u>";
	echo "</a>";
    if (($chosen!=0)and($this->isChosenIn($chosen,$value["identifier"]))) $this->drawTree($value["identifier"],$chosen);
	echo "</td>";
    echo "</tr>";   
   }

  }
  echo "</table>";
 } //end of func
 
} //end of class






////////////////
?>
</TD><td  valign=top bgcolor=white>
