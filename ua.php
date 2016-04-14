<?php

use BrowscapPHP\Browscap;
use Symfony\Component\Stopwatch\Stopwatch;

require_once __DIR__.'/vendor/autoload.php';

$ua = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36';

$stopwatch = new Stopwatch();

$timer = $stopwatch->start('ua');

$browsercap = new Browscap();
$adapter = new \WurflCache\Adapter\File(['dir' => __DIR__.'/resources/browsercap']);
$browsercap->setCache($adapter);

$timer->lap();
echo json_encode([$timer->getDuration(), $timer->getMemory()], JSON_PRETTY_PRINT);

for ($i = 0; $i < 1000; $i++) {
    // 1 call — around 150 millisecond (0.15 sec.). More calls work better.
    $record = $browsercap->getBrowser($ua);
}

$timer->stop();
echo json_encode([$timer->getDuration(), $timer->getMemory()], JSON_PRETTY_PRINT);

/*

{
    "browser_name_regex": "\/^mozilla\\\/5\\.0 \\(.*mac os x 10.11.*\\) applewebkit\\\/.* \\(khtml, like gecko\\) chrome\\\/49\\..*safari\\\/.*$\/",
    "browser_name_pattern": "mozilla\/5.0 (*mac os x 10?11*) applewebkit\/* (khtml, like gecko) chrome\/49.*safari\/*",
    "parent": "Chrome 49.0",
    "comment": "Chrome 49.0",
    "browser": "Chrome",
    "browser_type": "Browser",
    "browser_bits": "32",
    "browser_maker": "Google Inc",
    "browser_modus": "unknown",
    "version": "49.0",
    "majorver": "49",
    "minorver": "0",
    "platform": "MacOSX",
    "platform_version": "10.11",
    "platform_description": "Mac OS X",
    "platform_bits": "32",
    "platform_maker": "Apple Inc",
    "alpha": false,
    "beta": false,
    "win16": false,
    "win32": false,
    "win64": false,
    "frames": true,
    "iframes": true,
    "tables": true,
    "cookies": true,
    "backgroundsounds": false,
    "javascript": true,
    "vbscript": false,
    "javaapplets": false,
    "activexcontrols": false,
    "ismobiledevice": false,
    "istablet": false,
    "issyndicationreader": false,
    "crawler": false,
    "cssversion": "3",
    "aolversion": "0",
    "device_name": "Macintosh",
    "device_maker": "Apple Inc",
    "device_type": "Desktop",
    "device_pointing_method": "mouse",
    "device_code_name": "Macintosh",
    "device_brand_name": "Apple",
    "renderingengine_name": "Blink",
    "renderingengine_version": "unknown",
    "renderingengine_description": "a WebKit Fork by Google",
    "renderingengine_maker": "Google Inc"
}

*/
