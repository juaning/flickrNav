<html>
  <head>
    <title><?= $this->title; ?><title/>
  </head>
  <body>
    <div id='message' class="<? $this->messageCSS; ?>"><? $this->messageText; ?></div>
    <div id='content'>
    	<ul>
    		<? foreach($this->photoList as $key => $photo): ?>
    			<li>
    				<a href="/single/<? $key; ?>" target="_blank"><img src="<? $photo['thumbnail']; ?>" alt="<? $photo['title']; ?>" /></a>
    			</li>
    		<? endforeach; ?>
    	</ul>
    </div>
    <div id="navigation"></div>
  </body>
</html>