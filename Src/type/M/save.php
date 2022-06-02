<?php 
include('../../Conexao/conn.php');

$req = $_REQUEST;

//if the variable be null
if(empty($req['name'])){

    $data = array(
        'tipo' => 'Error',
        'Message'=>'Algo de errado não está certo'   
     );

}else{

//it's ok 

    $id = isset($req['id']) ? $req['id'] : '';
    $op = isset($req['operacao']) ? $req['operacao'] : '';

    
    if($op == "insert"){
        try{
            $stmt = $pdo('INSERT INTO TIPO (NOME) VALUES(:a)');
            $stmt -> execute(array(
                ':a' => utf8_decode($req['name'])
            ));
        }catch(PDOException $e){
            $data = array(
                'tipo' => 'Error',
                'Message'=>'Algo de errado não está certo'.$e 
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
                'tipo' => 'Winner',
                'Message'=>'We are the champions, my friends'
             );
        }catch(PDOException $e){
            $data = array(
                'tipo' => 'Error',
                'Message'=>'Algo de errado não está certo'.$e 
             );
        }

    }


}
    
echo json_encode($data)

?>