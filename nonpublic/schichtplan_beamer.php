<?php
$title = "Himmel";
$header = "Schichtpl&auml;ne f&uuml;r Beamer";
$Page["Public"] = "Y";
$Page["ShowTabel"] = "N";
$Page["AutoReload"] = 30;

include ("./inc/header.php");
include ("./inc/funktion_user.php");
include ("./inc/funktionen.php");
include ("./inc/funktion_schichtplan_beamer.php");

$Time = time()+3600+3600;

echo "<table border=\"1\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" frame=\"void\">\n";

echo "<colgroup span=\"4\" valign=\"center\">
	<col width=\"30\">
	<col width=\"3*\">
	<col width=\"3*\">
	<col width=\"3*\">
      </colgroup>\n";

echo "<tr align=\"center\">\n".
//	"\t<td>&nbsp;</td>\n".
	"\t<td>". gmdate("d.m.y", $Time). "</td>\n".
	"\t<td>". gmdate("H", $Time-3600). ":00</td>\n".
	"\t<td>". gmdate("H", $Time+0).    ":00</td>\n".
	"\t<td>". gmdate("H", $Time+3600). ":00</td>\n".
	"</tr>\n";

foreach( $Room as $RoomEntry  )
{
	
	//var-init
	$AnzahlEintraege = 0;
	
	$Out = ausgabe_Zeile( $RoomEntry["RID"], $Time-3600, $AnzahlEintraege);
	$Out.= ausgabe_Zeile( $RoomEntry["RID"], $Time, $AnzahlEintraege);
	$Out.= ausgabe_Zeile( $RoomEntry["RID"], $Time+3600, $AnzahlEintraege);
	

	//entfernt leere zeilen
	if( $AnzahlEintraege==0 )
		$Out = "";
	else
		$Out = "<tr>\n\t<td>_". $RoomEntry["Name"]. "_</td>\n". $Out . "</tr>\n";
	
	echo $Out;
}

echo "</table>";


include ("./inc/footer.php");
?>