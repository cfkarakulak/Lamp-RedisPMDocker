<?php

require 'vendor/autoload.php';

$client = new Predis\Client([
  'scheme' => 'tcp',
  'host'   => 'redis',
  'port'   => 6379,
]);

$client->set('foo', 'cemre');

cemre($client->get('foo'));

function cemre($param){
  echo '<code><pre>'.print_r($param,true).'</pre></code>';
}