# yggdrasilctl-php

PHP library for [Yggdrasil](https://github.com/yggdrasil-network/)

### Usage

Get peers

```
$debug = [];

if (false === $peers = \Yggverse\Yggdrasilctl\Yggdrasil::getPeers($debug, ['remote', 'uptime']))
{
  print_r(
    $debug
  );
}

print_r(
  $peers
);
```

### Compatibility

* 0.5.1
* [0.4.7](https://github.com/YGGverse/yggdrasilctl-php/tree/yggdrasil-0.4.7)
