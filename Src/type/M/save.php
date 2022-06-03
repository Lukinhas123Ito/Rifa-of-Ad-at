<?php 
include('../../Conexao/conn.php');

$req = $_REQUEST;

//if the variable be null
if(empty($req['name'])){

    $data = array(
        "type" => 'Error',
        "message" =>'Algo de errado não está certo'   
     );

}else{

//it's ok 

    $id = isset($req['id']) ? $req['id'] : '';
    $op = isset($req['operacao']) ? $req['operacao'] : '';

    
    if($op == "insert"){
        try{
            $stmt = $pdo->prepare('INSERT INTO TIPO (NOME) VALUES(:a)');
            $stmt -> execute(array(
                ':a' => utf8_decode($req['name'])
            ));

            $data = array(
                "type" => 'Winner',
                "message" =>'We are the champions, my friends'
             );

        }catch(PDOException $e){
            $data = array(
                "type" => 'Error',
                "message" =>'Algo de errado não está certo'.$e 
             );
        }
    }


    else{

        try{
            $stmt = $pdo->prepare('UPDATE TIPO SET (NOME) VALUES (:a) WHERE ID = :id');

            $stmt -> execute(array(
                ':id' => $id,
                ':a' => utf8_decode($req['name']),

            ));
            $data = array(
                "type" => 'Winner',
                "message" =>'We are the champions, my friends'
             );
        }catch(PDOException $e){
            $data = array(
                "type" => 'Error',
                "message" =>'Algo de errado não está certo'.$e 
             );
        }

    }


}
    
echo json_encode($data);

?>