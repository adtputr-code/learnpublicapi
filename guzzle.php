<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$response = $client->request('GET', 'http://omdbapi.com', [
  'query' => [
    'apikey' => 'dc2a9e5c',
    's' => 'harry'
  ]
]);

$result = json_decode($response->getBody()->getContents(), true);


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Movie</title>
  </head>
  <body>
    <?php foreach ($result['Search'] as $movie): ?>
    <ul>
      <li>Title : <?=$movie['Title'];?></li>
      <li>Year : <?=$movie['Year'];?></li>
      <li>
        <img src="<?=$movie['Poster'];?>" width="80">
      </li>
    </ul>
    <?php endforeach; ?>
  </body>
</html>
