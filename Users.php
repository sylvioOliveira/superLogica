<?php
require_once('Database.php');

class Users extends Database
{
	/**
	 * @param string $where é um parametro para deixar a query mais flexível 	
	 */
	public function select(string $where = null): array
	{
    $where = strlen($where) ? 'WHERE '.$where : '';
		$sql = 'SELECT * FROM users '.$where;
	
		$stmt = $this->execute($sql);

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	/**
	 * @param array $values é um array com os dados passado pelo POST
	 */
	public function insert(array $values): bool
	{
		//checa se o email já existe no BD
		$chekEmail = $this->select('email IN ("'.$values['email'].'")');
		if($chekEmail){
			return false;
		}

		$formFields = array_keys($values);
		$binds = array_pad([], count($formFields), '?');
		
		$sql = 'INSERT INTO  users (' . implode(', ', $formFields) . ') VALUES (' . implode(', ', $binds) . ')';
		$result = $this->execute($sql, array_values($values));

		if(!$result){
			return false;
		}
		return true;
	}	
}
