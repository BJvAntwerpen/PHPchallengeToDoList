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

}

function deleteToDoItem($id = null) {

}