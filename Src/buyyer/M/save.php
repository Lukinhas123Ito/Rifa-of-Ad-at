<?php 
include('../../Conexao/conn.php');

$req = $_REQUEST;

//if the variable be null
if(empty($req['name']) || empty($req['cell']) ){

    $data = array(
        "tipo" => 'Error',
        "messagem" =>'Você esqueceu de preencher um campo'   
     );

}else{

//it's ok 

    $id = isset($req['id']) ? $req['id'] : '';
    $op = isset($req['operacao']) ? $req['operacao'] : '';

    
    if($op == "insert"){
        try{
            $stmt = $pdo->prepare('INSERT INTO COMPRADOR(NOME, CELULAR) VALUES (:a,:b)');
            $stmt -> execute(array(
                ':a' => utf8_decode($req['name']),
                ':b' => utf8_decode($req['cell'])
            ));

            $data = array(
                "tipo" => 'Winner',
                "messagem" =>'We are the champions, my friends'
             );

        }catch(PDOException $e){
            $data = array(
                "tipo" => 'Error',
                "messagem" =>'Algo de errado não está certo'.$e 
             );
        }
    }


    else{

        try{
            $stmt = $pdo->prepare('UPDATE COMPRADOR SET (NOME, CELULAR) VALUES (:a,:b) WHERE ID = :id');

            $stmt -> execute(array(
                ':id' => $id,
                ':a' => utf8_decode($req['name']),
                ':b' => utf8_decode($req['cell'])

            ));
            $data = array(
                "tipo" => 'Winner',
                "messagem" =>'We are the champions, my friends'
             );
        }catch(PDOException $e){
            $data = array(
                "tipo" => 'Error',
                "messagem" =>'Algo de errado não está certo'.$e 
             );
        }

    }


}
    
echo json_encode($data);

?>