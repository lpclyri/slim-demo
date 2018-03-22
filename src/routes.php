<?php

use Slim\Http\Request;
use Slim\Http\Response;

require_once __DIR__ . '/../app/TestController.php';
// Routes

// $app->get('/{name}', function (Request $request, Response $response, array $args) {
//     // Sample log message
//     $this->logger->info("Slim-Skeleton '/' route");

//     // Render index view
//     return $this->renderer->render($response, 'index.phtml', $args);
// });

$app->get('/users', function(Request $request, Response $response) {
	$test = new TestController();
	$test->index();
});

$app->get('/users/{id}', function(Request $request) {
	$id = $request->getAttribute('id');
	$test = new TestController();
	$test->show($id);
});

$app->post('/users', function($request, $response, $args) {  
    //  添加 store
});  
$app->put('/users/{id}', function($request, $response, $args) {  
    // 更新 update
});  
$app->delete('/users/{id}', function($request, $response, $args) {  
    // 删除 destroy
}); 
