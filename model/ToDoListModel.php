<?php

function getAllToDoItems() {
	$db = openDatabaseConnection();
	$sql = 'SELECT * FROM todolist';
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

function createToDoItem (){}

function getToDoItem(){}

function editToDoItem(){}

function deleteToDoItem(){}