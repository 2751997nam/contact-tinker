<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->post('/send-email', 'MailController@sendEmail');
$app->get('/send-email', 'MailController@sendEmail');
$app->post('/2.0/send-form', 'MailController@sendForm');
