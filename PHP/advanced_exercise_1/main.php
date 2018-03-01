<?php
//https://api.apis.guru/v2/list.json
include __DIR__.'/Loader/Loader.php';
include __DIR__.'/Formatter/Formatter.php';
include __DIR__.'/FileDumper/Filedumper.php';

use function Loader\jsonloader;
use function Formatter\formatter;
use function FileDumper\filedumper;

filedumper(__DIR__.'/Store/dump.csv', formatter(jsonloader('https://api.apis.guru/v2/list.json')));
