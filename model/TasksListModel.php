<?php

function getAllTasks($id) {
	$db = openDatabaseConnection();
	$sql = 'SELECT * FROM tasks WHERE ToDo_ID = :todolistid';
	$query = $db->prepare($sql);
	$query->execute(array(
		':todolistid' => $id
		));
	$db = null;
	return $query->fetchAll();
}

function createTask() {
	$taskName = isset($_POST['taskName']) ? $_POST['taskName'] : null;
	$taskDuration = isset($_POST['taskDuration']) ? $_POST['taskDuration'] : null;
	$taskStatus = isset($_POST['taskStatus']) ? $_POST['taskStatus'] : null;
	$toDoListID = isset($_POST['ToDoListId']) ? $_POST['ToDoListId'] : null;

	if (strlen($taskName) == 0 || strlen($taskDuration) == 0 || strlen($taskStatus) == 0) {
		return false;
	}

	$db = openDatabaseConnection();
	$sql = 'INSERT INTO tasks(task_text, task_duration, task_status, ToDo_ID) VALUES (:taskName, :taskDuration, :taskStatus, :toDoListID)';
	$query = $db->prepare($sql);
	$query->execute(array(
		':taskName' => $taskName,
		':taskDuration' => $taskDuration,
		':taskStatus' => $taskStatus,
		':toDoListID' => $toDoListID
		));
	$db = null;
	return true;
}

function getTask($id) {}
function editTask() {}
function deleteTask($id = null) {}
function deleteAllTasks() {}
//https://dev.mysql.com/doc/refman/5.7/en/delete.html