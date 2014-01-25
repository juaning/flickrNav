<?php 
	/**
	 * View to generate list of images
	 */
?>
<div id="imgList">
	<ul>
		<?php foreach($this->photoList as $key => $photo): ?>
			<li>
				<div>
					<a href="/index.php?single=<?php echo $key; ?>" target="_blank">
						<img src="<?php echo $photo['thumbnail']; ?>" alt="<?php echo $photo['title']; ?>" />
						<span><?php echo htmlentities($photo['shortTitle']); ?></span>
					</a>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
<div class="clearfix"></div>