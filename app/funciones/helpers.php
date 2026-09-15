<?
function getTapa($numero){

    if ($numero==0)
        $numero = rand ( 1, 420 );
    $path = "tapas/".$numero.".gif"; 
    if (file_exists($path))
        return $path;
    else
        return "tapas/sintapa.gif";

}

function formatArrayAsList($arrayToFormat, $cols=40){

	$formatedArray =  "";
	for($i=0;$i<count($arrayToFormat);$i++)
		$formatedArray .= $arrayToFormat[$i].",";
	return wordwrap ($formatedArray, 30, "\n", 1);

}

?>
