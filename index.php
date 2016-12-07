<?php

//including the required files
require './vendor/autoload.php';


use App\Models\Disorders;
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'pgsql',
    'host' => 'ec2-54-235-65-221.compute-1.amazonaws.com',
    'database' => 'd4gel0cbjhq6t2',
    'username' => 'gzdzcztlytezhm',
    'password' => 'NVy-_YpQtHITi-C3UscmJ8i3pa',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$app = new App;

/** @var Container $container */
$container = $app->getContainer();

// To handle all exceptions
$container['errorHandler'] = function () {
    return function (Request $request, Response $response, Exception $exception) {
        return $response->withJson($exception->getMessage());
    };
};

$app->group('/', function () {
    $this->get('', function (Request $request, Response $response, $args) {
        return $response->withJson([
            'disorders' => Disorders::query()->get()
        ]);
    });
});

/*$app->get('/foo', function () {
    // Fetch all books
    $disorder = Disorders::all();
    foreach ($disorder as $disorders) {
        echo $disorders->disordername;
    }
});*/
////Method to display response
//function echoResponse($status_code, $response)
//{
//    //Getting app instance
//    $app = \Slim\Slim::getInstance();
//
//    //Setting Http response code
//    $app->status($status_code);
//
//    //setting response content type to json
//    $app->contentType('application/json');
//
//    //displaying the response in json format
//    echo json_encode($response);
//}
//
//
//function verifyRequiredParams($required_fields)
//{
//    //Assuming there is no error
//    $error = false;
//
//    //Error fields are blank
//    $error_fields = "";
//
//    //Getting the request parameters
//    $request_params = $_REQUEST;
//
//    //Handling PUT request params
//    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
//        //Getting the app instance
//        $app = \Slim\Slim::getInstance();
//
//        //Getting put parameters in request params variable
//        parse_str($app->request()->getBody(), $request_params);
//    }
//
//    //Looping through all the parameters
//    foreach ($required_fields as $field) {
//
//        //if any requred parameter is missing
//        if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
//            //error is true
//            $error = true;
//
//            //Concatnating the missing parameters in error fields
//            $error_fields .= $field . ', ';
//        }
//    }
//
//    //if there is a parameter missing then error is true
//    if ($error) {
//        //Creating response array
//        $response = array();
//
//        //Getting app instance
//        $app = \Slim\Slim::getInstance();
//
//        //Adding values to response array
//        $response["error"] = true;
//        $response["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing or empty';
//
//        //Displaying response with error code 400
//        echoResponse(400, $response);
//
//        //Stopping the app
//        $app->stop();
//    }
//}
//
////Method to authenticate a student
//function authenticateStudent(\Slim\Route $route)
//{
//    //Getting request headers
//    $headers = apache_request_headers();
//    $response = array();
//    $app = \Slim\Slim::getInstance();
//
//    //Verifying the headers
//    if (isset($headers['Authorization'])) {
//
//        //Creating a DatabaseOperation boject
//        $db = new DbOperation();
//
//        //Getting api key from header
//        $api_key = $headers['Authorization'];
//
//        //Validating apikey from database
//        if (!$db->isValidStudent($api_key)) {
//            $response["error"] = true;
//            $response["message"] = "Access Denied. Invalid Api key";
//            echoResponse(401, $response);
//            $app->stop();
//        }
//    } else {
//        // api key is missing in header
//        $response["error"] = true;
//        $response["message"] = "Api key is misssing";
//        echoResponse(400, $response);
//        $app->stop();
//    }
//}

$app->run();