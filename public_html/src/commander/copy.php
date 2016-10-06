<?	
require("./config.inc.php");
require("./funcs.inc.php");
PutHeader();
?>
<BODY>
<?
$strTitre = $strcopyTitre;
include "./head.inc.php";

function ExploreRepertoire($Directory,$niveau,$max,$tabniveau,$NbRepTotal,$RelDirN,$source)
{
	$NbRep   = GetNbRepertoire($Directory);
	$repind  = 0;
	$handle  = @opendir($Directory);
	$file    = @readdir($handle);      // repertoire .
	$file    = @readdir($handle);      // repertoire ..
	$niveau++;

	while ($file = @readdir($handle))
	{
		if(is_dir("$Directory/$file"))
		{
			$tabrep[$repind] = $file; 
			$repind++;
		}
	}

	if(count($tabrep)) usort($tabrep,sortRep);

	for($indice=0;$indice<$repind;$indice++)
	{
		$NbRepTotal++;
		?>
		<TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0">
		<TR ><?

		for($i=0;$i<$niveau;$i++) 
		if($tabniveau[$i] == 0) { ?><TD WIDTH="18"><IMG SRC="../src/commander/img/empty.gif" WIDTH="18" HEIGHT="18"></TD><? }
		else { ?><TD WIDTH="18"><IMG SRC="../src/commander/img/clin.gif" WIDTH="18" HEIGHT="22"></TD><? }

		if($indice+1 == $NbRep) { ?> <TD WIDTH="18"><IMG SRC="../src/commander/img/cend.gif" WIDTH="18" HEIGHT="22"></TD><? }
		else { ?><TD WIDTH="18"><IMG SRC="../src/commander/img/ccross.gif" WIDTH="18" HEIGHT="22"></TD><? }
			
		$NbCol = $max - $niveau;
		
		?>
			<TD WIDTH="18" VALIGN="top"><IMG SRC="../src/commander/img/folder.gif" WIDTH="18" HEIGHT="18"></TD>
			<TD VALIGN="bottom" <? if($NbCol > 1) { ?>COLSPAN="<? echo $NbCol; ?>" <? } ?> >
				&nbsp; 
				<? 
					echo $tabrep[$indice];
					$destination = str_replace($RelDirN,".","$Directory/$tabrep[$indice]");
					if(substr($destination,0,strlen($source)) != $source) { ?><INPUT TYPE="checkbox" NAME="choix[<? echo $NbRepTotal; ?>]"><? }

				?>
				<INPUT TYPE="hidden" NAME="emplacement[<? echo $NbRepTotal; ?>]" VALUE="<? echo $Directory; ?>/<? echo $tabrep[$indice]; ?>">
			</TD>
		</TR>
		</TABLE>
		<?

		if($indice+1 < $NbRep) $tabniveau[$niveau] = 1; 
		else $tabniveau[$niveau] = 0; 

		$NbRepTotal = ExploreRepertoire("$Directory/$tabrep[$indice]",$niveau,$max,$tabniveau,$NbRepTotal,$RelDirN,$source);	
	}

	return $NbRepTotal;
}

$source = "$Directory/$fichier";
?>
<TABLE WIDTH="100%" BORDER="0" CELLPADDING="0" cellspacing=0 ><TR><TD ALIGN="left">


<TABLE width=100% width=100%  cellspacing=0 cellpadding=0><TR>
<TD>
<table border=1 width=100% bgcolor="#D6D3CE" cellspacing=0 cellpadding=1><tr><td>
<? echo $strcopyDirectory1; ?> <? echo $source; ?> <? echo $strcopyDirectory2; ?>
</td></tr></table>
</td></tr></table>

<? 

$max = GetNiveauMax($Directorybase,-1,0);
$maxplus1 = $max + 1;
$tabniveau[0] = 1;

?>
<table cellspacing=20><tr><td>
<FORM  ACTION="./index.php" METHOD="post">
<TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0">
<TR HEIGHT="26">
	<TD WIDTH="18" VALIGN="top"><IMG SRC="../src/commander/img/folder.gif" WIDTH="18" HEIGHT="18"></TD>
	<TD COLSPAN="<? echo $maxplus1 ?>" VALIGN="bottom">
		&nbsp; .
		<INPUT TYPE="checkbox" NAME="choix[0]">
		<INPUT TYPE="hidden"   NAME="emplacement[0]" VALUE="<? echo $RelDirN; ?>">
	</TD>
</TR>
</TABLE>
<?
	$NbRepTotal = ExploreRepertoire($RelDirN,-1,$max,$tabniveau,0,$RelDirN,$source);
	$NbRepTotal++;
?>
<P>
<INPUT TYPE="hidden" NAME="NbRepTotal" VALUE="<? echo $NbRepTotal; ?>">
<INPUT TYPE="hidden" NAME="fichier"    VALUE="<? echo $fichier; ?>">
<INPUT TYPE="hidden" NAME="Directory"     VALUE="<? echo $Directory; ?>">
<INPUT TYPE="hidden" NAME="action"     VALUE="<? echo $action; ?>">
<INPUT TYPE="hidden" NAME="sort"        VALUE="<? echo $sort; ?>">

<TABLE><TR>
<TD><INPUT TYPE="Submit" class=btn  VALUE="<? echo $strcopy; ?>"></TD>
</FORM>
<FORM METHOD="post" ACTION="./index.php">
<TD><INPUT TYPE="Submit"  class=btn VALUE="<? echo $strAnnuler; ?>" ></TD>
</TR></TABLE>
<INPUT TYPE="hidden" NAME="Directory"  VALUE="<? echo $Directory; ?>">
<INPUT TYPE="hidden" NAME="sort"     VALUE="<? echo $sort; ?>">
</FORM>
</td></tr></table>
</TD></TR></TABLE>
<BR>
<? include "./foot.inc.php"; ?>
</BODY>
</HTML>