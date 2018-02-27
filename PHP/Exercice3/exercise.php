<?php

$winsA = 0;
$winsB = 0;
foreach($input as $turn) {
    list($carda, $cardb) = $turn;
    if ($carda > $cardb) {
        $winsA++;
    } else if ($cardb > $carda) {
        $winsB++;
    }
}
if ($winsA > $winsB) {
    $winner = 'A';
} else {
    $winner = 'B';
}