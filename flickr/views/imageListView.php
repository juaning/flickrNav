<?php 
	/**
	 * View to generate list of images
	 */
?>
<div id="imgList">
	<ul>
		<?php foreach($this->photoList as $key => $photo): ?>
			<li>
				<a href="/single/<?php echo $key; ?>" target="_blank"><img src="<?php echo $photo['thumbnail']; ?>" alt="<?php echo $photo['title']; ?>" /></a>
			</li>
		<?php endforeach; ?>
	</ul>
</div>