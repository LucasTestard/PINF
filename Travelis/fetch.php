<?php

//fetch.php;

$connect = new PDO("mysql:host=localhost; dbname=travelis", "Yannis", "mysql");

if(isset($_POST['query']))
{
 $query = "
 SELECT immatriculation FROM vehicule 
 WHERE immatriculation LIKE '%".trim($_POST["query"])."%'
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 $output = '';

 foreach($result as $row)
 {
  $output .= '
  <li class="list-group-item contsearch gsearch">
   <a href="javascript:void(0)" style="color:#333;text-decoration:none;">'.$row["immatriculation"].'</a>
  </li>
  ';
 }

 echo $output;
}

?>