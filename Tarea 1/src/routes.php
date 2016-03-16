<?php
// Routes

$app->get('/status', function ($request, $response, $args) {
    return $response->withStatus(201);
});


$app->post('/validarFirma', function ($request, $response, $args){
if (!isset($_POST["mensaje"]) || !isset($_POST["hash"])) {
    return $response->withStatus(400);    
}

$valido = false;
if(strtolower($_POST["hash"]) == strtolower(hash('sha256', $_POST["mensaje"]))){
 $valido = true; 
}
echo json_encode(array("mensaje"=> $_POST["mensaje"], "valido" =>$valido));

});

/*
$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});*/