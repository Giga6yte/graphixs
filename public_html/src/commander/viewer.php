<?	
require("./config.inc.php");
require("./funcs.inc.php");
PutHeader();
?>
<BODY leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 style="{ font-family: Verdana,Helvetica; font-size: 13px; color: #000000; font-weight: normal; text-decoration: none; margin-left: 0px; margin-top: 0px; margin-right: 0px; }"><TABLE BGCOLOR="#D6D3CE" width=100% BORDER="0" cellspacing=0 cellpadding=0>
<TR>
	<TD  ALIGN="left"><table border=1 width=100% height=100% cellspacing=0 cellpadding=1><tr><td>
	
<? echo $fichier; ?>	
	</td></tr></table></TD>
</TR>
</TABLE>
<BR>

<?
switch($type)
{
	case "Source"  : show_source("$RelDirN/$Directory/$fichier");	break;						 	
	case "Image"   : { ?><CENTER><IMG SRC="<? echo $RelDirN; ?>/<? echo $Directory; ?>/<? echo $fichier; ?>"><CENTER><? } break;
}	
?>

</BODY>
</HTML>		