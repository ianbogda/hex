<?php
function randomTile() {
// There's probably a way to get this out of the DOM via jQuery
	$choices = array("blue", "brown", "darkgreen", "grey", "white", "lightgreen");
	$num = mt_rand(0,5);

    return $choices[$num];
}


$data = array();
$height = 6;
$width  = 8;
$data['map']['height'] = $height;
$data['map']['width']  = $width;
for ($x = 0; $x < 8; ++$x)
{
	for ($y = 0; $y < 6; ++$y)
	{
//		$data['map'][$x] = $x;
//		$data['map'][$y] = $y;
		$data['map'][$x][$y]['color'] = randomTile();
	}
}
$json = json_encode($data);
echo $json;
