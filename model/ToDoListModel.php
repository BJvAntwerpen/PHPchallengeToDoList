<?php

function getAllToDoItems() {
	$db = openDatabaseConnection();
	$sql = 'SELECT * FROM todolist';
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

function createToDoItem () {
	$listItem = isset($_POST['todo']) ? $_POST['todo'] : null;

	if (strlen($listItem) == 0) {
		return false;
	}

	$db = openDatabaseConnection();
	$sql = "INSERT INTO todolist(ToDo_listItem) VALUES (:listItem)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':listItem' => $listItem
		));
	return true;
}

function getToDoItem($id) {
	$db = openDatabaseConnection();
	$sql = 'SELECT * FROM todolist WHERE ToDo_ID = :id';
	$query = $db->prepare($sql);
	$query->execute(array(
		':id'=>$id
		));
	$db = null;
	return $query->fetch();
}

function editToDoItem() {
	$toDoItem = isset($_POST['todo']) ? $_POST['todo'] : null;
	$id = isset($_POST['id']) ? $_POST['id'] : null;

	if (strlen($toDoItem) == 0) {
		return false;
	}

	$db = openDatabaseConnection();
	$sql = "UPDATE todolist SET ToDo_listItem = :todo_item WHERE ToDo_ID = :todo_id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':todo_item' => $toDoItem,
		':todo_id' => $id
		));
	return true;
}

function deleteToDoItem($id = null) {
	if (!$id) {
		return false;
	}
	$db = openDatabaseConnection();
	$sql = "DELETE FROM todolist WHERE ToDo_ID = :todo_id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":todo_id" => $id
		));
	$db = null;
	return true;
}