<?php
require_once('Database.php');

class Users extends Database
{
	public function list($where = null)
	{
    $where = strlen($where) ? 'WHERE '.$where : '';
		$sql = 'SELECT * FROM users '.$where;
	
		$stmt = $this->execute($sql);

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function insert($values)
	{
		$chekEmail = $this->list('email IN ("'.$values['email'].'")');
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
