<?php

require(ROOT . 'model/TasksListModel.php');
require(ROOT . 'model/ToDoListModel.php');

function index($id) {
	$sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
	render('tasksList/index', array(
		'tasks' => getAllTasks($id, $sort),
		'todolistname' => getToDoItem($id),
		'sort' => $sort
		));
}

function create() {
	render('tasksList/create');
}

function createSave() {
	$id = isset($_POST['ToDoListId']) ? $_POST['ToDoListId'] : null;
	if (!createTask() || !$id) {
		header('Location:' . URL . 'error/index');
		exit();
	}
	header('Location:' . URL . 'tasksList/index/' . $id);

}

function edit($id) {
	render('tasksList/edit', array(
		'task' => getTask($id),
		'toDoLists' => getAllToDoItems()
		));
}

function editSave() {
	$id = isset($_POST['ToDoListId']) ? $_POST['ToDoListId'] : null;
	if (!editTask() || !$id) {
		header('Location:' . URL . 'error/index');
		exit();
	}
	header('Location:' . URL . 'tasksList/index/' . $id);
}

function delete($id) {
	$task = getTask($id);
	$listId = $task['ToDo_ID'];
	if (!deleteTask($id)) {
		header('Location:' . URL . 'error/index');
		exit();
	}
	header('Location:' . URL . 'tasksList/index/' . $listId);
}

function deleteAll($listId) {
	if (!deleteAllTasks($listId)) {
		header('Location:' . URL . 'error/index');
		exit();
	}
	header('Location:' . URL . 'tasksList/index/' . $listId);
}