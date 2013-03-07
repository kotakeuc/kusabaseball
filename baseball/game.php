<?php

echo "require game.php\n";
echo "\n";

$attack = new attack();

$out_count   = 0;
$situation   = 0;
$attack_info = array();

for (; $out_count < 27;) {

	// hit = 0, out = 1,2
	if ($attack_result = rand(0,2)) {

		$out_count++;

	}

	$situation++;

	$attack_info[$situation] = $attack_result;

}

$out_count   = 0;
$inning_count = 0;
$inning = array();

foreach ($attack_info as $info) {

	if ($inning[$inning_count][] = $info) {

		$out_count++;

	}

	if ($out_count > 2) {

		$inning_count++;
		$out_count = 0;

	}

}

$attack_trun   = 0;

foreach ($inning as $inning_number => $inning_content) {

	echo "inning ".($inning_number+1)."\n";

	foreach ($inning_content as $ini_cont) {

		echo "player".($attack_trun+1).":".$attack->attack_result($ini_cont)."\n";

		$attack_trun++;

		if ($attack_trun > 8) {

			$attack_trun = 0;

		}

	}

}

echo "\n";

$attack_trun   = 0;
$player = array();

foreach ($attack_info as $info) {

	$player[$attack_trun][] = $info;
	$attack_trun++;

	if ($attack_trun > 8) {

		$attack_trun = 0;

	}

}

foreach ($player as $trun => $content_number) {

	echo "player".($trun+1).":";

	foreach ($content_number as $content) {

		echo $attack->attack_result($content)." ";

	}

	echo "\n";

}

