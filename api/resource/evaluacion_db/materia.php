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
 * SCHEMA DB materia
 * 
	{
		creditos: {
			type: 'Integer', 
			required : true
		},
		nombre: {
			type: 'String', 
			required : true
		},
		profesor: {
			type: 'Integer', 
			required : true
		},
		//RELAZIONI
		
		
		//RELAZIONI ESTERNE
		
		
	}
 * 
 */


//CRUD METHODS


//CRUD - CREATE


$app->post('/materias',	function () use ($app){

	$body = json_decode($app->request()->getBody());
	
	$params = array (
		'creditos'	=> $body->creditos,
		'nombre'	=> $body->nombre,
		'profesor'	=> $body->profesor,
			);

	$obj = makeQuery("INSERT INTO materia (_id, creditos, nombre, profesor )  VALUES ( null, :creditos, :nombre, :profesor   )", $params, false);

	
	echo json_encode($body);
	
});
	
//CRUD - REMOVE

$app->delete('/materias/:id',	function ($id) use ($app){
	
	$params = array (
		'id'	=> $id,
	);

	makeQuery("DELETE FROM materia WHERE _id = :id LIMIT 1", $params);

});
	
//CRUD - GET ONE
	
$app->get('/materias/:id',	function ($id) use ($app){
	$params = array (
		'id'	=> $id,
	);
	
	$obj = makeQuery("SELECT * FROM materia WHERE _id = :id LIMIT 1", $params, false);
	
	
	
	echo json_encode($obj);
	
});
	
	
//CRUD - GET LIST

$app->get('/materias',	function () use ($app){
	makeQuery("SELECT * FROM materia");
});


//CRUD - EDIT

$app->post('/materias/:id',	function ($id) use ($app){

	$body = json_decode($app->request()->getBody());
	
	$params = array (
		'id'	=> $id,
		'creditos'	    => $body->creditos,
		'nombre'	    => $body->nombre,
		'profesor'	    => $body->profesor	);

	$obj = makeQuery("UPDATE materia SET  creditos = :creditos,  nombre = :nombre,  profesor = :profesor   WHERE _id = :id LIMIT 1", $params, false);

	
	echo json_encode($body);
    	
});


/*
 * CUSTOM SERVICES
 *
 *	These services will be overwritten and implemented in  Custom.js
 */

			
?>