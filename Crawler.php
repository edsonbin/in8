<?php

$xml = new DOMDocument();

$xml->loadHTMLFile('https://g1.globo.com/');

foreach($xml->getElementsByTagName('a') as $link) {
    $links[] = array('url' => $link->getAttribute('href'), 'text' => $link->nodeValue);
    echo $link;
}