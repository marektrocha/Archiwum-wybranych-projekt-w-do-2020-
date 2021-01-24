<?php

namespace MarekTrochaRekrutacjaHRtec;

use MarekTrochaRekrutacjaHRtec\Convert;

require_once("convert.php");

if((sizeof($argv)) == 4){								// Return the number of elements in an array (must be 4): type, url, path and addition type

	$type = $argv[1];									// Type of call: csv:simple or csv:extended
	$url = $argv[2];									// Source: URL RSS
	$path = $argv[3];									// Name of file csv
	$addType = null;									// Addition type: overwrite (w+) or add (a+); default: null

	switch($type) {										// What`s to be done, depending on the type: csv:simple or csv:extended?

		case "csv:simple":								// If 'csv:simple' overwrite (w+) all data ($convert) and break switch.
			$addType = "w+";							// Ascription "w+" method (overwrite all in csv)
			$convert = new Convert();					// New object
			$convert->loader($addType, $url, $path);	// Compare with loader method (convert.php)
			break;
		case "csv:extended":							// If 'csv:extended' add (a+) all data ($convert) to new row and break switch.
			$addType = "a+";							// Ascription "a+" method (add new rows in csv)
			$convert = new Convert();					// New object
			$convert->loader($addType, $url, $path);	// Compare with loader method (convert.php)
			break;
		default:										// Else echo "Invalid appeal. There must be 'csv:simple' or 'csv:extended."
		echo "=== ERROR ===\n Invalid appeal.\n There must be 'csv:simple' or 'csv:extended'\n=============";
	}

	} else {											// To few arguments. There must be 4 arguments here: type, url, path and addition type
	echo "=== ERROR ===\n To few arguments.\n There must be 4 arguments here\n=============";
}