<?php

function getAllTasks($id, $sort, $filter) {
	$db = openDatabaseConnection();

	$filter = '%'.$filter .'%';

	if ($sort == 'text') {
		$sql = 'SELECT * FROM tasks WHERE ToDo_ID = :todolistid AND (task_text LIKE :filter OR task_duration LIKE :filter OR task_status LIKE :filter) ORDER BY task_text ASC';
	} else if ($sort == 'duration') {
		$sql = 'SELECT * FROM tasks WHERE ToDo_ID = :todolistid AND (task_text LIKE :filter OR task_duration LIKE :filter OR task_status LIKE :filter) ORDER BY task_duration ASC';
	} else if ($sort == 'status') {
		$sql = 'SELECT * FROM tasks WHERE ToDo_ID = :todolistid AND (task_text LIKE :filter OR task_duration LIKE :filter OR task_status LIKE :filter) ORDER BY task_status ASC';
	} else {
		$sql = 'SELECT * FROM tasks WHERE ToDo_ID = :todolistid AND (task_text LIKE :filter OR task_duration LIKE :filter OR task_status LIKE :filter) ORDER BY task_ID ASC';
	}

	$query = $db->prepare($sql);
	$query->execute(array(
		':todolistid' => $id,
		':filter' => $filter
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

function getTask($id) {
	$db = openDatabaseConnection();
	$sql = 'SELECT * FROM tasks WHERE task_ID = :taskid';
	$query = $db->prepare($sql);
	$query->execute(array(
		':taskid' => $id
		));
	$db = null;
	return $query->fetch();
}

function editTask() {
	$taskName = isset($_POST['taskName']) ? $_POST['taskName'] : null;
	$taskDuration = isset($_POST['taskDuration']) ? $_POST['taskDuration'] : null;
	$taskStatus = isset($_POST['taskStatus']) ? $_POST['taskStatus'] : null;
	$ToDoListId = isset($_POST['ToDoListId']) ? $_POST['ToDoListId'] : null;
	$id = isset($_POST['id']) ? $_POST['id'] : null;

	if (strlen($taskName) == 0 || strlen($taskDuration) == 0 || strlen($taskStatus) == 0 || strlen($ToDoListId) == 0) {
		return false;
	}

	$db = openDatabaseConnection();
	$sql = 'UPDATE tasks SET task_text = :taskName, task_duration = :taskDuration, task_status = :taskStatus, ToDo_ID = :toDoListID WHERE task_ID = :id';
	$query = $db->prepare($sql);
	$query->execute(array(
		':taskName' => $taskName,
		':taskDuration' => $taskDuration,
		':taskStatus' => $taskStatus,
		':toDoListID' => $ToDoListId,
		':id' => $id
		));
	$db = null;
	return true;
}

function deleteTask($id = null) {
	if (!$id) {
		return false;
	}

	$db = openDatabaseConnection();
	$sql = 'DELETE FROM tasks WHERE task_ID = :id';
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id
		));
	$db = null;
	return true;
}

function deleteAllTasks($listId = null) {
	if (!$listId) {
		return false;
	}

	$db = openDatabaseConnection();
	$sql = 'DELETE FROM tasks WHERE ToDo_ID = :listId';
	$query = $db->prepare($sql);
	$query->execute(array(
		':listId' => $listId
		));
	$db = null;
	return true;
}
//https://dev.mysql.com/doc/refman/5.7/en/delete.html