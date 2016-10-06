<?	
require("./config.inc.php");
require("./funcs.inc.php");
PutHeader();
?>
<SCRIPT LANGUAGE="JavaScript">
function SaisieCorrectNomFichier(form)
{
	Prts = form.newfichier.value.length

	if(Prts == 0) 
	{
		alert(<? echo $strrenameAlert; ?>);  
		erreur = false;
	}
	else erreur = true;	

	return erreur;
}
</SCRIPT>
<BODY><?
$strTitre = $strrenameTitre;
include "./head.inc.php";

if(!empty($fichier)) $fichier = stripslashes($fichier);
?>

<TABLE BORDER="0" CELLPADDING="5"><TR><TD >
<table cellspacing=20><tr><td>
<FORM  ACTION="./index.php" METHOD="POST"> 
<? echo $strrenameOldFile?><BR>
<INPUT TYPE="text" class=btntext  NAME="oldfichier" SIZE="40" MAXLENGTH="40" VALUE="<? echo $fichier; ?>" ONFOCUS="this.blur()"><P>
<? echo $strrenameNewFile?><BR>
<INPUT class=btntext TYPE="text"   NAME="newfichier" SIZE="40" MAXLENGTH="40" ONFOCUS="this.select();"><P>
<INPUT TYPE="hidden" NAME="fichier" VALUE="<? echo $fichier; ?>"><P>
<INPUT TYPE="hidden" NAME="Directory"  VALUE="<? echo $Directory; ?>">
<INPUT TYPE="hidden" NAME="action"  VALUE="<? echo $action; ?>">
<INPUT TYPE="hidden" NAME="sort"     VALUE="<? echo $sort; ?>">
<TABLE><TR>
<TD><INPUT TYPE="Submit" class=btn VALUE="<? echo $strrename; ?>" ONCLICK="return SaisieCorrectNomFichier(this.form)"></TD>
</FORM>
<FORM METHOD="post" ACTION="./index.php">
<TD><INPUT TYPE="Submit" class=btn	 VALUE="<? echo $strAnnuler; ?>" ></TD>
</TR></TABLE>
</td></tr></table>
<INPUT TYPE="hidden" NAME="Directory" VALUE="<? echo $Directory; ?>">
<INPUT TYPE="hidden" NAME="sort"    VALUE="<? echo $sort; ?>">
</FORM>

</TD></TR></TABLE>
<BR>
<? include "./foot.inc.php"; ?>
</BODY>
</HTML>