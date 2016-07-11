<?

session_start();

require __DIR__.'/../vendor/autoload.php';

//$user = new \App\Models\User;

$app = new \Slim\App([

	'settings' => [
		'displayErrorDetails' => true
	]

]);

$container = $app->getContainer();

$container['view'] = function($container){

	$view = new \Slim\Views\Twig(__DIR__.'/../resources/views',[

		'cache' => false

	]);

	$view->addExtension(new \Slim\Views\TwigExtension(

		$container->router,
		$container->request->getUri()

	));

	return $view;

};

$container['HomeController'] = function($container){

	return new \App\Controllers\HomeController($container);

};

require __DIR__.'/../app/routes.php';