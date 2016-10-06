<?	
require("./config.inc.php");
require("./funcs.inc.php");
PutHeader();
?>  
<BODY>
<?
$strTitre = $strOptionTitre;
include "./head.inc.php";
?>
<FORM METHOD="post" ACTION="./setconfig.php">

<TABLE WIDTH="100%" BORDER="0" CELLPADDING="5"><TR><TD >

<table><tr><td>
<? echo $strOptionLangue; ?> 
</TD><td><select class=btn name=langage>
<?php 
if ($handle = opendir('./langues/')) {
    while (false !== ($file = readdir($handle))) { 
        if ($file != "." && $file != "..") { 
            echo "<option VALUE=\"$file\" ";
			if($LanguageFile == "./langues/".$file) echo "selected";
			echo ">$file</OPTION>"; 
        } 
    }
    closedir($handle); 
}
?>


</SELECT>
</TD></TR>

<TR><TD><? echo $strOptionRelDirN; ?></TD><td><INPUT TYPE="text" class=btntext  NAME="MajRelDirN" SIZE="20" VALUE="<? echo $RelDirN; ?>"></td></TR>
<TR><TD><? echo $strEditableFiles; ?></TD>
<td><INPUT TYPE="text" class=btntext  NAME="edfiles" SIZE="20" VALUE="<? echo $editablefiles; ?>"></td>
</TR>
<TR><TD><? echo $strHTMLEditableFiles; ?></TD>
<td><INPUT TYPE="text" class=btntext  NAME="htmedfiles" SIZE="20" VALUE="<? echo $htmleditablefiles; ?>"></td>
</TR>
</TABLE>
<INPUT TYPE="hidden" NAME="Directoryreptofiles" VALUE="<? echo $Directoryreptofiles; ?>">
<INPUT TYPE="hidden" NAME="Directory" VALUE="<? echo $Directory; ?>">
<INPUT TYPE="hidden" NAME="sort"    VALUE="<? echo $sort; ?>">
<TABLE><TR>
<TD><INPUT TYPE="submit" class=btn  VALUE="<? echo $strValider; ?>"></TD>
</FORM>
<FORM METHOD="post" ACTION="./index.php">
<TD><INPUT TYPE="submit" class=btn VALUE="<? echo $strAnnuler; ?>"></TD>
</TR></TABLE>
<INPUT TYPE="hidden" NAME="Directory" VALUE="<? echo $Directory; ?>">
<INPUT TYPE="hidden" NAME="sort"    VALUE="<? echo $sort; ?>">
</FORM>
</TD></TR></TABLE>
<BR>
<? include "./foot.inc.php"; ?>
</BODY>
</HTML>