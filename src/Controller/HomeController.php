<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

class HomeController extends AbstractController
{

    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        // Create a client with a base URI

$client = new \GuzzleHttp\Client(['base_uri' => 'http:/easteregg.wildcodeschool.fr/api/',]);
// Send a request to https://foo.com/api/test
$response = $client->request('GET', 'eggs');
// or
// // Send request https://foo.com/api/test?key=maKey&name=toto
// $response = $client->request('GET', 'test', [
// 'key'  => 'maKey',
// 'name' => 'toto',
// ]
// );

$body = $response->getBody();
$eggs=json_decode($body->getContents());

    var_dump($eggs);

        return $this->twig->render('Home/index.html.twig');
    }
}