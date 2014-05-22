<?php
$pais= $_GET["pais"];
//Valida que sea numérico el Id
if (is_numeric($pais)) {
$BD = new BD;
$query = "SELECT id, nombre FROM estados WHERE pais_id = $pais";
$estados= $BD->get_results($query);
if ($estados)
echo json_encode($estados);

}