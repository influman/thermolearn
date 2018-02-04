<?php
	// ***************************************************************
	// *************************** THERMOLEARN V1 ********************
	// ****************************** InfluMan ***********************
	// ******************************  12/2017 ***********************

	// Script d'appel au script déporté depuis l'eedomus
	// Permet de passer le code API de la thermoconsigne de la zone
	
	$xml = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>";   
     	 
	// Lecture des arguments
	$action = getArg("action");
  	$type = getArg("type");
  	$zone = getArg("zone");
	$server = getArg("server");
  	$param = getArg("param");
	$value = getArg("value");
	$periph_id = getArg('eedomus_controller_module_id');
     	
	$url = "http://".$server."/thermolearn.php?action=".$action."&type=".$type."&zone=".$zone."&param=".$param."&value=".$value."&consigne_id=".$periph_id;
    $xml .= httpQuery($url,'GET'); 	

	sdk_header('text/xml');
 	echo $xml;	

?>