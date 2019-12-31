<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\UploadedFile;

// Routes

//$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
//    // Sample log message
//    $this->logger->info("Slim-Skeleton '/' route");
//
//    // Render index view
//    return $this->renderer->render($response, 'index.phtml', $args);
//});
// Load Composer's autoloader
require '../vendor/autoload.php';

$container = $app->getContainer();

$app->get('/test', function (Request $request, Response $response, array $args) {
    // Sample log message
//    $this->logger->info("Slim-Skeleton '/' user");
    $sql = "SELECT TOP 100 * FROM db_SIMPKB.dbo.vWajibUjiList";
    $stmt = odbc_prepare($this->db, $sql);
    $result = [];
    if (odbc_execute($stmt, [])) {
        $i = 0;
        while (odbc_fetch_row($stmt)) {
            array_push($result, odbc_fetch_array($stmt, $i));
            $i++;
        }

    }
    // Render index view
    return $response->withJson(["code" => 1, "status" => "Success", "message" => "You have succesfully calling api", "data" => $result], 200);
//    return $result;
});


$app->get('/wajib_uji_list', function (Request $request, Response $response, array $args) {
    // Sample log message
//    $this->logger->info("Slim-Skeleton '/' user");
    $noUji = $request->getQueryParam("no_uji");
    $sql = "SELECT * FROM db_SIMPKB.dbo.vWajibUjiList where NoUji = '" . $noUji . "'";
    $stmt = odbc_prepare($this->db, $sql);
    $result = [];
    if (odbc_execute($stmt, [])) {
        array_push($result, odbc_fetch_array($stmt));
//        $i = 0;
//        while (odbc_fetch_row($stmt)) {
//            $i++;
//        }

    }
    // Render index view
    return $response->withJson(["code" => 1, "status" => "Success", "data" => $result], 200);
//    return $result;
});
