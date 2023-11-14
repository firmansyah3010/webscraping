<?php

require 'vendor/autoload.php';

use Goutte\Client;

$client = new Client();

$crawler = $client->request("GET","https://books.toscrape.com/");

echo $crawler->filter('title')->text();