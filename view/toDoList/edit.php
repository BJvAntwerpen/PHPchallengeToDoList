<a href="<?= URL ?>ToDoList">Return</a>
<form method="POST" action="<?= URL ?>ToDoList/editSave">
	<label>Change your to do list name</label><br>
	<input type="text" name="todo" placeholder="TO DO" value="<?php echo $ToDoItem['ToDo_listItem'] ?>"><br>
	<input type="submit" value="Change the name">
	<input type="hidden" name="id" value="<?= $ToDoItem['ToDo_ID'] ?>">
</form>