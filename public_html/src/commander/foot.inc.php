<?
 if($repind > 1)  $NbRepertoires = $srtAproposRepertoires; else $NbRepertoires = $srtAproposRepertoire;
 if($fileind > 1) $NbFichiers    = $srtAproposFichiers;    else $NbFichiers    = $srtAproposFichier; 
?>
</TD></TR></TABLE><BR>
<BR>
</TD>
</TR>
<tr><td colspan=2><? if($AfficherNbFileAndNbRep) { ?><? echo $repind; ?> <? echo $NbRepertoires; ?> / <? echo $fileind; ?> <? echo $NbFichiers; ?> <? } ?></TD></TR></TABLE>