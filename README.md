# yggdrasilctl-php

PHP library for [Yggdrasil](https://github.com/yggdrasil-network/)

### Usage

#### Get peers

```
\Yggverse\Yggdrasilctl\Yggdrasil::getPeers(
  array &$debug  = [],
  array $require = [
    'remote',
    'up',
    'inbound',
    'address',
    'port',
    'key',
    'priority',
    'bytes_recvd',
    'bytes_sent',
    'uptime'
  ]
)
```

##### Attributes

* `debug` - optional array of details for each peer that does not match condition bellow
* `require` - optional array of required fields that peer must to contain or skip in result

##### Example

Returns peers that contain `remote` and `uptime` fields, skip other

```
$debug = [];

if (false === $peers = \Yggverse\Yggdrasilctl\Yggdrasil::getPeers($debug, ['remote', 'uptime']))
{
  var_dump($debug);
}

var_dump($peers);
```

### Compatibility

* 0.5.1
* [0.4.7](https://github.com/YGGverse/yggdrasilctl-php/tree/yggdrasil-0.4.7)
