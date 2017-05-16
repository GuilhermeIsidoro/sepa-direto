<?php

class cmdGenerica{
	
	private $conn;

 public function executar($request){
	 
	$this->conn = (new DBConnector());
	
	$method = $request->getParameters()['op']; 
	
	return call_user_func(array($this, $method), $request);
	
 }
 
 private function loadClients() {
	 
	$query = "select * from direct.clientes";
	
	
	return self::select($query);
	 
 }
 
  private function loadFilas($request) {
	
	$cliente = $request->getParameters()['cod_cliente'];
	$query = "select cod_filas, nome from direct.filas f where f.id_cliente = ".$cliente." and f.situacao = 1";
	
	return self::select($query);
	 
 }
 
 private function execution_query($query) {
        $this->conn->query($query);
 }
 
private function select($query) {	
    return $this->conn->query($query)->fetchAll(PDO::FETCH_ASSOC);     
}
 
 
}