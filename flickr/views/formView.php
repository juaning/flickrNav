<?php 
	/**
	 * Partial view for the search form
	 */
?>
<div id="form">
	<form method="post" action="">
		Search: <input type="text" name="search" id="search" value="<?php echo $this->searchTerm ? $this->searchTem : ''; ?>">
		<input type="submit" value="Submit" />
	</form>
</div>