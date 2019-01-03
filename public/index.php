<?php

namespace App;

// Подключение автозагрузки через composer
require __DIR__ . '/../vendor/autoload.php';

$users = Generator::generate(100);

$configuration = [
	'settings' => [
		'displayErrorDetails' => true,
	],
];

$app = new \Slim\App($configuration);

$container = $app->getContainer();
$container['renderer'] = new \Slim\Views\PhpRenderer(__DIR__ . '/../templates');
$app->get('/', function ($request, $response) {
	return $this->renderer->render($response, 'index.phtml');
});

$app->run();
