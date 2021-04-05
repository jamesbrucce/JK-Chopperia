<?php 
 $servername = "localhost";
 $database = "jkphp";
 $username = "root";
 $passaword = "";

 // crio uma variavel conn e instancio ela
 $conn = new mysqli($servername,$username,$passaword,$database);
 if (!$conn){
 		// se for diferente de comunicacao, mostrará o erro.
        die ("Conexão falhou:".mysqli_connect_error());
    } 
 ?>