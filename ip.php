<?php

use GeoIp2\Database\Reader;
use Symfony\Component\Stopwatch\Stopwatch;

require_once __DIR__.'/vendor/autoload.php';

$ip = '93.203.101.163';

$stopwatch = new Stopwatch();

$timer = $stopwatch->start('ip');

$reader = new Reader(__DIR__.'/GeoLite2-City.mmdb');

$timer->lap();
echo json_encode([$timer->getDuration(), $timer->getMemory()], JSON_PRETTY_PRINT);

for ($i = 0; $i < 1000; $i++) {
    // 1 call — around 10 milliseconds (0.01 sec.). More calls work better.
    $record = $reader->city($ip);
}

$timer->stop();
echo json_encode([$timer->getDuration(), $timer->getMemory()], JSON_PRETTY_PRINT);

/*

print($record->country->isoCode . "\n");
print($record->country->name . "\n");
print($record->country->names['zh-CN'] . "\n");

print($record->mostSpecificSubdivision->name . "\n");
print($record->mostSpecificSubdivision->isoCode . "\n");

print($record->city->name . "\n");

print($record->postal->code . "\n");

print($record->location->latitude . "\n");
print($record->location->longitude . "\n");

*/
