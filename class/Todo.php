<?php

namespace WeDevsT2;

class Todo extends Database
{

	protected function todoById($id)
	{
		$sql = "SELECT * FROM todos Where id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);

		$result = $stmt->fetchAll();
		return $result;
	}

	public function todos()
	{
		$sql = "SELECT * FROM todos";
		$stmt = $this->connect()->query($sql);
		$result=$stmt->fetchAll();
		return $result;
	}

	public function activeTodos()
	{
		$sql = "SELECT * FROM todos Where status = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([1]);
		$todos = $stmt->fetchAll();

		return $todos;
	}

	public function completedTodos()
	{
		$sql = "SELECT * FROM todos Where status = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([2]);
		$todos = $stmt->fetchAll();

		return $todos;
	}

	public function CheckAll()
	{
		$todos = $this->todos();
		foreach ($todos as $key => $value) {
			// echo $value['id'];
			$sql = "UPDATE todos SET status = ? WHERE id = ?";
			$stmt = $this->connect()->prepare($sql);
			$result = $stmt->execute([2, $value['id']]);
			//echo $result;
		}
	}
	public function UncheckAll()
	{
		$todos = $this->todos();
		foreach ($todos as $key => $value) {
			//echo $value['id'];
			$sql = "UPDATE todos SET status = ? WHERE id = ?";
			$stmt = $this->connect()->prepare($sql);
			$result = $stmt->execute([1, $value['id']]);
			//echo $result;
		}
	}

	public function CheckSingle($id)
	{
		$sql = "UPDATE todos SET status = ? WHERE id = ?";
		$stmt = $this->connect()->prepare($sql);
		$result = $stmt->execute([2, $id]);
	}
	public function UncheckSingle($id)
	{
		$sql = "UPDATE todos SET status = ? WHERE id = ?";
		$stmt = $this->connect()->prepare($sql);
		$result = $stmt->execute([1, $id]);
	}

	public function addTodos($name)
	{
		// $name = "Learn React";
		$timestamp = date("Y-m-d H:i:s");

		$sql = "INSERT INTO todos (name, created_at)
				VALUES (?, ?);";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$name, $timestamp]);	

	}

	public function deleteTodo($id)
	{
		$id = (int)$id;
		$sql = "DELETE FROM todos WHERE id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
	}

	public function DeleteAllCompleted()
	{
		$data = $this->completedTodos();
		//print_r($data);
		foreach ($data as $key => $value) {
			$sql = "DELETE FROM todos WHERE id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$value['id']]);
			//echo $value['id'];
		}
	}

	public function countcompletedtodos()
	{
		$data1 = $this->todos();
		$all = count($data1);

		$data2 = $this->completedTodos();
		$cmp = count($data2);

		if($all==$cmp){
			return true;
		} else {
			return false;
		}
	}

}

