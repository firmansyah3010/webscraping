<?php

require 'vendor/autoload.php';

use Goutte\Client;

$client = new Client();

$crawler = $client->request("GET","https://books.toscrape.com/");

$file = fopen("data.csv","a");

$crawler->filter('.product_pod')->each (function ($node) use ($file){
    $title= $node->filter('h3 > a')->attr('title');
    $price= $node->filter('.price_color')->text();
    echo $title.'='.$price.PHP_EOL;
    fputcsv($file,[$title, $price]);
});