# fcache
cache to file, using modified time to controll expire.

## Example

```php
<?php
include "fcache.php";

$cache = fcache('./', 1);

// set cache
// will see file named "name-b068931cc450442b63f5b3d276ea4297" with content 's:5:"value";'
$cache('name', 'value');
// get cache
echo $cache('name');
sleep(1);
// cache expire
echo $cache('name') ?: "\r\ncan not get cache!";

```
