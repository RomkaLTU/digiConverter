<?php

use App\Service\Converter;
use App\Service\Random;
use Symfony\Component\DependencyInjection\ContainerBuilder;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$app = new ContainerBuilder();

$app->register('random', Random::class)
    ->addArgument([
        'string_length' => 15,
        'array_length' => 10,
    ]);

$app->register('converter', Converter::class);

foreach ($app->get('random')->array() as $item) {
    var_dump($app->get('converter')->simpleEncode($item));
}

//var_dump( $app->get('random')->strings() );
//var_dump( $app->get('random')->array() );
//var_dump( $app->get('converter')->simpleEncode('axc123') );
//var_dump( $app->get('converter')->rot13Decode("Oūčvnh trevnhfvnf wrvth aroūgh trerfavų") );
