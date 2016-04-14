# GeoIP & User-Agent capabilities

## Installation

Dependencies:
```
$ composer install
```

Browsercap DB:
```
$ vendor/bin/browscap-php browscap:update --remote-file Full_PHP_BrowscapINI --cache ./resources/browsercap
```

Free GeoIP DB from MaxMind.
```
$ cd resources
$ wget http://geolite.maxmind.com/download/geoip/database/GeoLite2-City.mmdb.gz
$ gzip -d GeoLite2-City.mmdb.gz
```

## GeoIP databases

Free vs paid: https://www.maxmind.com/en/geoip2-city.

## Useful information about Browscap & ua-parser

* http://markonphp.com/how-to-detect-mobiles-and-tablets-php/#sol2
* https://github.com/jquery/testswarm/issues/169
* https://github.com/ThaDafinser/UserAgentParser#providers
