<?php
	/**
	 * Navigation View
	 * @author Ian Mignaco
	 */
?>
<ul>
	<li><a href="index.php?nav=<?php echo $this->first; ?>&search=<?php echo $this->search; ?>">First</a></li>
	<li><a href="index.php?nav=<?php echo $this->prevL; ?>&search=<?php echo $this->search; ?>">Previous</a></li>
	<li><a href="index.php?nav=<?php echo $this->nextL; ?>&search=<?php echo $this->search; ?>">Next</a></li>
	<li><a href="index.php?nav=<?php echo $this->last; ?>&search=<?php echo $this->search; ?>">Last</a></li>
</ul>