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

function createSave() {}
function edit($id) {}
function editSave() {}
function delete($id) {}
function deleteAll() {echo 'lel del';}