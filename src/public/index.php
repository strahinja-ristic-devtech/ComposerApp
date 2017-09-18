<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../../vendor/autoload.php';

	
$app = new \Slim\App;

$container = $app->getContainer();
$container['view'] = new \Slim\Views\Twig("../templates/");




/*
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig("../templates/", [
        'cache' => 'path/to/cache'
    ]);
    
    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};
*/

$app->get('/',function (Request $request,Response $response){

	$response->getBody->write("Homepage");

	return $response;

});

$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->get('/cats', function (Request $request, Response $response) {
    //$this->logger->addInfo("Ticket list");
    //$mapper = new TicketMapper($this->db);
   // $tickets = $mapper->getTickets();
	$cats = new Acme\models\Cat("ker");

	$nickname = $cats->nickname;


    $response = $this->view->render($response, "cats.phtml", ["nickname" => $nickname]);

    return $response;
});

$app->get('/guests', function (Request $request, Response $response) {
    //$this->logger->addInfo("Ticket list");
    //$mapper = new TicketMapper($this->db);
   // $tickets = $mapper->getTickets();
	$guests =  new Acme\models\Guest("Pera","peric");


	print_r($guests);
	$guestPrintData = print_r($guests, true);



	$name = $guests->name;
	$surname = $guests->surname;

    $response = $this->view->render($response, "guests.phtml",  ["guests"=>$guests,"name" => $name,"surname"=>$surname]);

    return $response;
});


$app->run();