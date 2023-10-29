<?php

namespace Yggverse\Yggdrasilctl;

class Yggdrasil
{
  private static function _exec(
    string $command
  ): mixed
  {
    if (false !== exec(sprintf('yggdrasilctl -json %s', $command), $output))
    {
      $rows = [];

      foreach($output as $row)
      {
        $rows[] = $row;
      }

      if ($result = @json_decode(implode(PHP_EOL, $rows)))
      {
        return $result;
      }
    }

    return false;
  }

  public static function getPeers(
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
  ) : mixed
  {
    if (false === $result = self::_exec('getPeers'))
    {
      return false;
    }

    $peers = [];

    foreach ((object) $result->peers as $i => $peer)
    {
      foreach ($require as $field)
      {
        if (!isset($peer->{$field}))
        {
          $debug[$i][$field] = _('empty');

          continue 2;
        }
      }

      $peers[] = $peer;
    }

    return (object) $peers;
  }
}