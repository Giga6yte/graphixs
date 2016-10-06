<?	
require("./config.inc.php");
require("./funcs.inc.php");
//PutHeader();
$bladkom="";
$ext = substr(strrchr($fichier, "."),1);
   foreach(explode(" ", $htmleditablefiles) as $type)
         if ($ext == $type) $ishtmleditable =1;

?>
 <HTML>
 <HEAD>
  <TITLE><? echo $GLOBALS["title"]; ?></TITLE>
  <LINK REL="stylesheet" TYPE="text/css" HREF="style.css">

<!--  aaaaaaaaa -->
<script type="text/javascript" src="htmlarea/htmlarea.js"></script>
<script type="text/javascript" src="htmlarea/dialog.js"></script>
<script type="text/javascript">
HTMLArea.I18N = {
	tooltips: {
		bold:          "<? echo $strEditorBold; ?>",
		italic:         "<? echo $strEditorItalic; ?>",
		underline:      "<? echo $strEditorUnderline; ?>",
		strikethrough:  "<? echo $strEditorStrikethrough; ?>",
		subscript:      "<? echo $strEditorSubscript; ?>",
		superscript:    "<? echo $strEditorSuperscript; ?>",
		justifyleft:    "<? echo $strEditorJustify_Left; ?>",
		justifycenter:  "<? echo $strEditorJustify_Center; ?>",
		justifyright:   "<? echo $strEditorJustify_Right; ?>",
		justifyfull:    "<? echo $strEditorJustify_Full; ?>",
		orderedlist:    "<? echo $strEditorOrdered_List; ?>",
		unorderedlist:  "<? echo $strEditorBulleted_List; ?>",
		outdent:        "<? echo $strEditorDecrease_Indent; ?>",
		indent:         "<? echo $strEditorIncrease_Indent; ?>",
		forecolor:      "<? echo $strEditorFont_Color; ?>",
		backcolor:      "<? echo $strEditorBackground_Color; ?>",
		horizontalrule: "<? echo $strEditorHorizontal_Rule; ?>",
		createlink:     "<? echo $strEditorInsert_Web_Link; ?>",
		insertimage:    "<? echo $strEditorInsert_Image; ?>",
		inserttable:    "<? echo $strEditorInsert_Table; ?>",
		htmlmode:       "<? echo $strEditorToggle_HTML_Source; ?>",
		popupeditor:    "<? echo $strEditorEnlarge_Editor; ?>",
		about:          "<? echo $strEditorAbout_this_editor; ?>",
		help:           "<? echo $strEditorHelp_using_editor; ?>",
		textindicator:  "<? echo $strEditorCurrent_style; ?>"
	}
};
</script>

<style type="text/css">

@import url(htmlarea.css);

html, body {
  font-family: Verdana,sans-serif;
  color: #000;
}
a:link, a:visited { color: #00f; }
a:hover { color: #048; }
a:active { color: #f00; }

textarea { background-color: #fff; border: 1px solid 00f; }
</style>

<script type="text/javascript">
var editor = null;
function initEditor() {
  editor = new HTMLArea("text");
  editor.generate();
}
function insertHTML() {
  var html = prompt("Enter some HTML code here");
  if (html) {
    editor.insertHTML(html);
  }
}
function highlight() {
  editor.surroundHTML('<span style="background:yellow">', '</span>');
}
</script>
<!--  aaaaaaaaaa -->  
 </HEAD>

<BODY BGCOLOR="#D6D3CE" <? if($ishtmleditable==1) echo "onload=\"initEditor()\""; ?> leftmargin=0 topmargin=0 marginheight=0 marginwidth=0 style="{ font-family: Verdana,Helvetica; font-size: 13px; color: #000000; font-weight: normal; text-decoration: none; margin-left: 0px; margin-top: 0px; margin-right: 0px; }" BOTTOMMARGIN="0" ><?

if ($action=="save") { 
 $text = stripslashes($text);
 //echo $text;
 if ($fp = @fopen ($fname, "wb"))
 {
  fwrite($fp, $text);
  fclose($fp);
//  print "<script TYPE=\"\">;</SCRIPT>";  
  print "<script TYPE=\"\">window.close();</SCRIPT>";
 }
 else
  $bladkom = "<font color='#CC0000'>".$strErroSF."</font>";
 
}

?><TABLE BGCOLOR="#D6D3CE" width=100% BORDER="0" cellspacing=0 cellpadding=0>
<TR>
	<TD  ALIGN="left"><table border=1 width=100% height=100% cellspacing=0 cellpadding=1><tr><td>
	
<? 
if (strlen($bladkom)>0)  echo $bladkom."<BR>";
echo $fichier; 
		

?>
<form ACTION="" method=post>
<input TYPE="hidden" name=action value=save>
<input TYPE="hidden" name=fname value="<? echo "$RelDirN/$Directory/$fichier"; ?>">
<INPUT TYPE="Submit" class=btn	 VALUE="<? echo $strSaveExit; ?>" >
<INPUT TYPE="Reset"  class=btn	 VALUE="<? echo $strRestore; ?>" >
<INPUT TYPE="Submit" class=btn	 VALUE="<? echo $strAnnuler; ?>" onClick="window.close()">
<BR><BR>	</td></tr></table></TD>
</TR>
</TABLE><?
   if ($fp = @fopen("$RelDirN/$Directory/$fichier", "rb")) {
    print "<textarea cols=81 rows=25 id=\"text\"  name=\"text\" style=\"{width:100%; height: 100%;}\">";
    print htmlentities(fread($fp, filesize("$RelDirN/$Directory/$fichier")));
    fclose ($fp);
    print "</textarea>";
    if ($ishtmleditable==1) {
	
	}
}
?><TABLE BGCOLOR="#D6D3CE" BORDER="0" cellspacing=0 cellpadding=0 >
<TR>
	<TD  ALIGN="left"><table border=0 cellspacing=0 cellpadding=1><tr><td width=100% height=100% ></form></td></tr></table></TD>
</TR>
</TABLE></BODY>
</HTML>		
