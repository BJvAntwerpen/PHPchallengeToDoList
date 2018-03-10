<?php

function getAllTasks($id) {
	$db = openDatabaseConnection();
	$sql = 'SELECT * FROM tasks WHERE ToDoList_task = :todolistid';
	$query = $db->prepare($sql);
	$query->execute(array(
		':todolistid' => $id
		));
	$db = null;
	return $query->fetchAll();
}

function createTask() {}
function getTask($id) {}
function editTask() {}
function deleteTask($id = null) {}
function deleteAllTasks() {}
//https://dev.mysql.com/doc/refman/5.7/en/delete.html