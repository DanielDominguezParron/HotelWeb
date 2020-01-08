<?php


function conecta(){
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbname = "hotel_erp";
    $conn = new mysqli($servername, $user,$password,$dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Error: " . $conn->connect_error);
    }
    return $conn;
   
}
function conteo(){
    $con=conecta();
    $query= "Select count(*) as numero from habitaciones ";
    
         $datoProd =  $con->query($query);
    
       
        while($row= $datoProd->fetch_assoc()){
            $num=$row["numero"];
        }
    return $num;
    


}
function login(){
    $con=conecta();
    $query= "Select count(*) as numero from habitaciones ";
    
         $datoProd =  $con->query($query);
    
       
        while($row= $datoProd->fetch_assoc()){
            $num=$row["numero"];
        }
    return $num;
    


}
function recogeDatos(){
    $con = conecta();
    $query= "Select * from habitaciones" ;  
        $result = $con->query($query);

    return $result;

}
function producto($ident){
    $con = conecta();
    $query= "Select * from habitaciones where Id = $ident";     
    
        $result = $con->query($query);

    return $result;
    
}

?>