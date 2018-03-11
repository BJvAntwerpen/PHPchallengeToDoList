<?php

require(ROOT . 'model/TasksListModel.php');
require(ROOT . 'model/ToDoListModel.php');

function index($id) {
	render('tasksList/index', array(
		'tasks' => getAllTasks($id),
		'todolistname' => getToDoItem($id)
		));
}

function create() {
	render('tasksList/create');
}

function createSave() {
	$id = $_POST['ToDoListId'];
	if (!createTask() || !$id) {
		header('Location:' . URL . 'error/index');
		exit();
	}
	header('Location:' . URL . 'tasksList/index/' . $id);

}

function edit($id) {}
function editSave() {}
function delete($id) {}
function deleteAll() {echo 'lel del';}