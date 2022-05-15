<?php 

include ('conexion.php');

$method =$_SERVER['REQUEST_METHOD'];

//continuar si el metodo es POST

if($method == 'POST'){
// recibir parametros
$requestBody = file_get_contents('php://input');
$params = json_decode($requestBody);


// de json a un array

if($params['UserName'] && $params['UserEmail']&& $params['UserPhone']){

$data = [
'UserName' => $params['UserName'],
'UserEmail' => $params['UserEmail'],
'UserName' => $params['UserPhone']

];
$sql = "INSERT INTO tabla_name (UserName, UserEmail,UserPhone) VALUES (:UserName,:UserEMail,:UserPhone)";
$stmt = $conexion->prepare($sql);
$stmt->execute($data);
$last_id = $conexion-> lastInsertId();

}

if($last_id){
echo 'tus datos han sido guardados';
}else{
echo 'no se guardaron tus datos , otra vez';
}

}
