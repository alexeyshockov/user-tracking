# GeoIP & User-Agent Capabilities

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
