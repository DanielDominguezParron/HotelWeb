<?php


function conecta(){
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbname = "pcore";
    $conn = new mysqli($servername, $user,$password,$dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Error: " . $conn->connect_error);
    }
    return $conn;
   
}
function conteo(){
    $con=conecta();
    $query= "Select count(*) as numero from productos ";
    
         $datoProd =  $con->query($query);
    
       
        while($row= $datoProd->fetch_assoc()){
            $num=$row["numero"];
        }
    return $num;
    


}
function login(){
    $con=conecta();
    $query= "Select count(*) as numero from productos ";
    
         $datoProd =  $con->query($query);
    
       
        while($row= $datoProd->fetch_assoc()){
            $num=$row["numero"];
        }
    return $num;
    


}
function recogeDatos($tabla){
    $con = conecta();
    $query= "Select * from productos where Categoria  like '%$tabla%'";
    if($tabla == "todos"){
        $query= "Select * from productos";
    }
        
    
        $result = $con->query($query);

    return $result;

}
function producto($ident){
    $con = conecta();
    $query= "Select * from productos where idProductos = $ident";     
    
        $result = $con->query($query);

    return $result;
    
}

?>