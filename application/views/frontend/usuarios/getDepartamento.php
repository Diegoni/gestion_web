<?php
$return=array();
foreach($departamentos as $departamento){
	$return[$departamento->id_departamento] = $departamento->departamento;
}
print_r(json_encode($return));
   
?>