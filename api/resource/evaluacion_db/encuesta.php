<?php /** 
* Generated by
* 
*      _____ _          __  __      _     _
*     / ____| |        / _|/ _|    | |   | |
*    | (___ | | ____ _| |_| |_ ___ | | __| | ___ _ __
*     \___ \| |/ / _` |  _|  _/ _ \| |/ _` |/ _ \ '__|
*     ____) |   < (_| | | | || (_) | | (_| |  __/ |
*    |_____/|_|\_\__,_|_| |_| \___/|_|\__,_|\___|_|
*
* The code generator that works in many programming languages
*
*			https://www.skaffolder.com
*
*
* You can generate the code from the command-line
*       https://npmjs.com/package/skaffolder-cli
*
*       npm install -g skaffodler-cli
*
*   *   *   *   *   *   *   *   *   *   *   *   *   *   *   *
*
* To remove this comment please upgrade your plan here: 
*      https://app.skaffolder.com/#!/upgrade
*
* Or get up to 70% discount sharing your unique link:
*       https://app.skaffolder.com/#!/register?friend=5d1e567d0e8b622e6162666b
*
* You will get 10% discount for each one of your friends
* 
*/
?>
<?php
	require_once './db/dbevaluacion_dbManager.php';
	
/*
 * SCHEMA DB encuesta
 * 
	{
		materia: {
			type: 'Integer'
		},
		periodo: {
			type: 'Date', 
			required : true
		},
		//RELAZIONI
		
		
		//RELAZIONI ESTERNE
		
		
	}
 * 
 */


//CRUD METHODS


//CRUD - CREATE


$app->post('/encuestas',	function () use ($app){

	$body = json_decode($app->request()->getBody());
	
	$params = array (
		'materia'	=> isset($body->materia)?$body->materia:'',
		'periodo'	=> $body->periodo,
			);

	$obj = makeQuery("INSERT INTO encuesta (_id, materia, periodo )  VALUES ( null, :materia, :periodo   )", $params, false);

	
	echo json_encode($body);
	
});
	
//CRUD - REMOVE

$app->delete('/encuestas/:id',	function ($id) use ($app){
	
	$params = array (
		'id'	=> $id,
	);

	makeQuery("DELETE FROM encuesta WHERE _id = :id LIMIT 1", $params);

});
	
//CRUD - GET ONE
	
$app->get('/encuestas/:id',	function ($id) use ($app){
	$params = array (
		'id'	=> $id,
	);
	
	$obj = makeQuery("SELECT * FROM encuesta WHERE _id = :id LIMIT 1", $params, false);
	
	
	
	echo json_encode($obj);
	
});
	
	
//CRUD - GET LIST

$app->get('/encuestas',	function () use ($app){
	makeQuery("SELECT * FROM encuesta");
});


//CRUD - EDIT

$app->post('/encuestas/:id',	function ($id) use ($app){

	$body = json_decode($app->request()->getBody());
	
	$params = array (
		'id'	=> $id,
		'materia'	    => isset($body->materia)?$body->materia:'',
		'periodo'	    => $body->periodo	);

	$obj = makeQuery("UPDATE encuesta SET  materia = :materia,  periodo = :periodo   WHERE _id = :id LIMIT 1", $params, false);

	
	echo json_encode($body);
    	
});


/*
 * CUSTOM SERVICES
 *
 *	These services will be overwritten and implemented in  Custom.js
 */

			
?>