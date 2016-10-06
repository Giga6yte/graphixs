<?	
require("./config.inc.php");
require("./funcs.inc.php");
PutHeader();
?>
<BODY><?
$strTitre = $strconfirm;
include "./head.inc.php";

?><TABLE width=100% BORDER="0" CELLPADDING="0" cellspacing=0><TR><TD ALIGN="left"><TABLE width=100% BORDER="0" CELLPADDING="0" cellspacing=0><TR><TD width=100%><TABLE width=100% width=100%  cellspacing=0 cellpadding=0><TR>
<TD><table border=1 width=100% bgcolor="#D6D3CE" cellspacing=0 cellpadding=1><tr><td><?

switch($action)
{
	case "deleterimerFichier" : Message("$strconfirmMessageFichier $fichier ?"); 
							  break;

	case "deleterimerRep"     : Message("$strconfirmMessageRep $rep ?");  
						      break;

	case "deleterimerRepNV"   : Message("$strBtnStrRepertoire $fichier $strconfirmMessagePasVide<BR>$strconfirmMessageSure"); 
						      break;
}
?>
</td></tr></table></TD>
</TR></TABLE><BR>



<FORM  ACTION="./index.php" METHOD="POST">
<INPUT TYPE="hidden" NAME="fichier" VALUE="<? echo $fichier; ?>">
<INPUT TYPE="hidden" NAME="action"  VALUE="<? echo $action; ?>">
<INPUT TYPE="hidden" NAME="Directory"  VALUE="<? echo $Directory; ?>">
<INPUT TYPE="hidden" NAME="rep"     VALUE="<? echo $rep; ?>">
<INPUT TYPE="hidden" NAME="sort"     VALUE="<? echo $sort; ?>">

<TABLE><TR>
<TD><INPUT TYPE="Submit" class=btn VALUE="<? echo $strConfirmer; ?>"></TD>
</FORM>
<FORM METHOD="post" ACTION="./index.php">
<TD><INPUT TYPE="Submit" class=btn VALUE="<? echo $strAnnuler; ?>" ></TD>
</TR></TABLE>
<INPUT TYPE="hidden" NAME="Directory" VALUE="<? echo $Directory; ?>">
<INPUT TYPE="hidden" NAME="sort"    VALUE="<? echo $sort; ?>">
</FORM>

</TD></TR></TABLE>
<BR>
<? include "./foot.inc.php"; ?>
</BODY>
</HTML>