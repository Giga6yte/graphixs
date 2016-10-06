<?	
require("./config.inc.php");
require("./funcs.inc.php");
PutHeader();
?>
<SCRIPT LANGUAGE="JavaScript">
function SaisieCorrectNomupload(form)
{
	Prts = form.fichier.value.length;

	if(Prts == 0) 
	{
		alert(<? echo $struploadAlert; ?>);  
		erreur = false;
	}
	else erreur = true;

	return erreur;
}
</SCRIPT>
<BODY><?
$strTitre = $struploadTitre;
include "./head.inc.php";
?><TABLE width=100% BORDER="0" CELLPADDING="0" cellspacing=0><TR><TD ALIGN="left">
<TABLE width=100% BORDER="0" CELLPADDING="0" cellspacing=0><TR><TD width=100%><TABLE width=100% width=100%  cellspacing=0 cellpadding=0><TR>
<TD><table border=1 width=100% bgcolor="#D6D3CE" cellspacing=0 cellpadding=1><tr><td><? echo $struploadDirectory; ?><? echo $Directory; ?></td></tr></table></TD>
</TR></TABLE><BR>
<table cellspacing=20><tr><td>
<FORM ENCTYPE="multipart/form-data" ACTION="./index.php" METHOD=POST>
<INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="5000000">
<? echo $struploadFichier; ?><BR>
<INPUT  class=btn NAME="fichier" TYPE="file" SIZE="60"><P>
<INPUT TYPE="hidden" NAME="Directory" VALUE="<? echo $Directory; ?>">
<INPUT TYPE="hidden" NAME="action" VALUE="<? echo $action; ?>">
<INPUT TYPE="hidden" NAME="sort"    VALUE="<? echo $sort; ?>">

<TABLE><TR>
<TD><INPUT class=btn TYPE="Submit" VALUE="<? echo $strupload; ?>" ONCLICK="return SaisieCorrectNomupload(this.form)"></TD>
</FORM>
<FORM METHOD="post" ACTION="./index.php">
<TD><INPUT TYPE="Submit" class=btn VALUE="<? echo $strAnnuler; ?>" ></TD>
</TR></TABLE>
<INPUT TYPE="hidden" NAME="Directory" VALUE="<? echo $Directory; ?>">
<INPUT TYPE="hidden" NAME="sort"    VALUE="<? echo $sort; ?>">
</FORM>
</TD></TR></TABLE>

</TD></TR></TABLE>
<? include "./foot.inc.php"; ?>
</BODY>
</HTML>