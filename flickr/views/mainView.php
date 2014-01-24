<html>
  <head>
    <title><?php echo $this->title; ?></title>
  </head>
  <body>
  	<h1><?php echo $this->title; ?></h1>
  	<?php if($this->messageText): ?>
    	<div id='message' class="<?php echo $this->messageCSS; ?>"><?php echo $this->messageText; ?></div>
    <?php endif; ?>
    <div id='content'>
    	<?php $this->form->render(); ?>
    	<?php $this->content ? $this->content->render() : ''; ?>
    </div>
    <div id="navigation">
    	<?php $this->navigation ? $this->navigation->render() : ''; ?>
    </div>
  </body>
</html>