<?php 
	/**
	 * View to generate list of images
	 * @author Ian Mignaco
	 */
?>
<div id="imgList">
	<ul>
		<?php foreach($this->photoList as $key => $photo): ?>
			<li>
				<div>
					<a href="<?php echo $photo['large']; ?>" target="_blank">
						<img src="<?php echo $photo['thumbnail']; ?>" alt="<?php echo $photo['title']; ?>" />
						<span><?php echo htmlentities($photo['shortTitle']); ?></span>
					</a>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
<div class="clearfix"></div>