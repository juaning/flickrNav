<?php 
	/**
	 * View to generate list of images
	 */
?>
<div id="imgList">
	<ul>
		<? foreach($this->photoList as $key => $photo): ?>
			<li>
				<a href="/single/<? $key; ?>" target="_blank"><img src="<? $photo['thumbnail']; ?>" alt="<? $photo['title']; ?>" /></a>
			</li>
		<? endforeach; ?>
	</ul>
</div>