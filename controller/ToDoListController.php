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

function createSave() {}

function edit($id) {}

function editSave() {}

function delete($id) {}

?>