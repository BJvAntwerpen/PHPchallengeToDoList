<?php foreach ($ToDoItems as $ToDoItem) { ?>
	<a class="delete" href="<?php echo URL . 'ToDoList/delete/' . $ToDoItem['ToDo_ID']; ?>">X</a>
	<p class="test"><?php echo $ToDoItem['ToDo_listItem'] ?></p>
	<a class="edit" href="<?php echo URL . 'ToDoList/edit/' . $ToDoItem['ToDo_ID']; ?>">Edit</a><br>
<?php } ?>