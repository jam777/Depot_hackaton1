<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

class ChoiceController extends AbstractController
{

    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function show()
    {

 	return $this->twig->render('Egg/choice.html.twig');
    }

    public function select()
    {
    	$chars=[];
    	for ($i=0; $i <9 ; $i++) { 
    		
    		// Create a client with a base URI

			$client = new \GuzzleHttp\Client(['base_uri' => 'http:/easteregg.wildcodeschool.fr/api/',]);
			// Send a request to https://foo.com/api/test
			$response = $client->request('GET', 'characters/random');
			$body = $response->getBody();
			array_push($chars,json_decode($body->getContents()));

	    	//var_dump($eggs);

        //return $this->twig->render('Home/index.html.twig');
    	} //end for
    	//var_dump($eggs);
 	return $this->twig->render('Egg/choiceimg.html.twig',['chars'=>$chars]);
    }//end select
        


}