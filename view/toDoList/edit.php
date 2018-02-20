<form method="POST" action="<?= URL ?>ToDoList/editSave">
	<label>Input your 'thing' to do</label><br>
	<textarea placeholder="TO DO" name="todo"><?php echo $ToDoItem['ToDo_listItem'] ?></textarea><br>
	<input type="submit" value="Add to the 'To Do List'">
	<input type="hidden" name="id" value="<?= $ToDoItem['ToDo_ID'] ?>">
</form>