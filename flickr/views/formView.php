<?php 
	/**
	 * Partial view for the search form
	 * @author Ian Mignaco
	 */
?>
<div id="form">
	<form method="post" action="index.php">
		Search: <input type="text" name="search" id="search" value="<?php echo $this->searchTerm ? $this->searchTerm : ''; ?>">
		<input type="submit" value="Submit" />
	</form>
</div>