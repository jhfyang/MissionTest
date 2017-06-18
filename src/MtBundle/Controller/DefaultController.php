<?php

namespace MtBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
/*    	$dataFile = file_get_contents('https://api.jcdecaux.com/vls/v1/stations?contract=Paris&apiKey=d17222d29a5d856f37d0754acef991ca05ea8ff9');
    	$data = json_decode($dataFile);


        return $this->render('MtBundle:Default:index.html.twig', [
        	'data' => $data,
        ]);*/

	    $dataFile = file_get_contents('https://api.jcdecaux.com/vls/v1/stations?contract=Paris&apiKey=d17222d29a5d856f37d0754acef991ca05ea8ff9');
	    $data = json_decode($dataFile, true);


	    $stations = [];
	    foreach ($data as $station){
	    	$stations[] = [
	    		'address' => $station['address'],
	    		'name' =>$station['name'],
	    		'position' => $station['position'],
		        'bike_stands' => $station['bike_stands'],
		        'available_bike_stands' => $station['available_bike_stands'],
		        'available_bikes' => $station['available_bikes'],
	        ];
	    }


	    return $this->render('MtBundle:Default:index.html.twig', [
		    'stations'  => $stations,
	        'data'      => $data
	    ]);

    }
}
