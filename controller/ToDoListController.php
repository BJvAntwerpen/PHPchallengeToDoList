<?php 

require(ROOT . 'model/ToDoListModel.php');

function index() {
	render('toDoList/index', array(
		'ToDoItems' => getAllToDoItems()
		));
}

function create() {
	render('toDoList/create');
}

function createSave() {
	if (!createToDoItem()) {
		header('Location:' . URL . 'error/index');
		exit();
	}
	header('Location:' . URL . 'toDoList/index');
}

function edit($id) {
	render('toDoList/edit', array(
		'ToDoItem' => getToDoItem($id)
		));
}

function editSave() {
	if (!editToDoItem()) {
		header('Location:' . URL . 'error/index');
		exit();
	}
	header('Location:' . URL . 'toDoList/index');
}

function delete($id) {
	if (!deleteToDoItem($id)) {
		header('Location:' . URL . 'error/index');
		exit();
	}
	header('Location:' . URL . 'toDoList/index');
}