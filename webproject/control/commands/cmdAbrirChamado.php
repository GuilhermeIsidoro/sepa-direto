<?php

class cmdAbrirChamado{
	
	private $conn;

 public function executar($request){
	 
	$this->conn = (new DBConnector());
		
	$paramsArr = json_decode($request->getBody(), true);	
	
	$keys = array_keys($paramsArr);
    $stringKeys = (implode(",", $keys));	
	
    $values = array_values($paramsArr);
    $stringValues = implode("','", $values);	
	
	print_r ($paramsArr);
	
	$queryChamado = "insert into direct.chamados (dta_abertura, id_usuario, cod_fila) values (sysdate(), 1, ".$paramsArr['fila'].")";    
	
	self::execution_query($queryChamado);
		
	$codChamado = $this->conn->lastInsertId();
	
	$queryTramites = "insert into direct.tramites (cod_chamado,dta_associacao,texto,dta_abertura,sequencia,cod_etapa,id_usuario) VALUES (".$codChamado.", sysdate(), '".$paramsArr['texto']."', sysdate(), 1, 1, 1)";

	self::execution_query($queryTramites);
 }
 
 private function execution_query($query) {
        $this->conn->query($query);
    }
 
 
}