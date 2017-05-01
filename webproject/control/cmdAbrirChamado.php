<?php

class cmdAbrirChamado{

 public function executar($request){ 
	echo $request;
	$query = 'insert into direct.chamados values ( default, sysdate(), sysdate(),sysdate(), 1, 1)';
 }


 //$query = 'INSERT INTO '.$resource.' ('.$this->getColumns($body).') VALUES ('.$this->getValues($body).')';
       
 //       return self::execution_query($query);
		
		

}