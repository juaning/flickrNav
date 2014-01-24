<?php 
	/**
	 * Main view
	 */
?>
<html>
  <head>
    <title><?= $this->title; ?><title/>
  </head>
  <body>
    <div id='message' class="<? $this->messageCSS; ?>"><? $this->messageText; ?></div>
    <div id='content'>
    	<?php $this->form->render(); ?>
    	<?php $this->content ? $this->content->render() : ''; ?>
    </div>
    <div id="navigation"></div>
  </body>
</html>