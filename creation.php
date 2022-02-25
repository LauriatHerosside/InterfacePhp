<?php

 if (isset($_POST['btn'])) {
  if (isset($_POST['type']) && isset($_POST['description']) ) {
    if (!empty($_POST['type']) && !empty($_POST['description'])) {
        $type = $_POST['type'];
        $description = $_POST['description'];
        $url = 'http://127.0.0.1:8000/api/chaise'; 

           // creation de la session de cURL
        $curl=curl_init($url); 
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          "Cache-Control: no-cache",
          "content-type:application/json;charset=utf-8"
        ));
        // configaration de cUrl pour faire une requette post
        //curl_setopt($curl,CURLOPT_URL_RETURNTRANSFER,true);
        // faire une une requette pour insertion
        curl_setopt($curl,CURLOPT_POST, true);
        // convertion des données en donnes json
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($_POST));  
        // definition des entete pour l'api
        //curl_setopt($curl, CURLOPT_HTTPHEADER, true);
        // run the curl
        $run = curl_exec($curl); die('jjejdbsbdj');      
        // fermuture de la session 
        curl_close($curl);
      $_SESSION['success'] = 'Chaise crée avec succes!';
      return header("Location: ".'../index.php');
    }

    $_SESSION['error']  = "Veuillez renseigner toutes les informations";
    return header("Location: ".'../create.php');
  }
}
