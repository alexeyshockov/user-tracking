<?php

use BrowscapPHP\Browscap;
use Symfony\Component\Stopwatch\Stopwatch;

require_once __DIR__.'/vendor/autoload.php';

$ua = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36';

$stopwatch = new Stopwatch();

$timer = $stopwatch->start('ip');

$browsercap = new Browscap();
$adapter = new \WurflCache\Adapter\File(['dir' => __DIR__.'/resources']);
$browsercap->setCache($adapter);

$timer->lap();
echo json_encode([$timer->getDuration(), $timer->getMemory()], JSON_PRETTY_PRINT);

for ($i = 0; $i < 1; $i++) {
    // 1 call — around 5 millisecond (0.005 sec.). More is better.
    $record = $browsercap->getBrowser($ua);
}

$timer->stop();
echo json_encode([$timer->getDuration(), $timer->getMemory()], JSON_PRETTY_PRINT);
