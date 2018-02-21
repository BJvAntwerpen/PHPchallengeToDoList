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
	$listItem = isset($_POST['todo']) ? $_POST['todo'] : null;
	$id = isset($_POST['id']) ? $_POST['id'] : null;

	if (strlen($listItem) == 0) {
		return false;
	}

	$db = openDatabaseConnection();
	$sql = "INSERT INTO todolist(ToDo_listItem) VALUES (:listItem)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':listItem' => $listItem
		));
}

function deleteToDoItem($id = null) {

}