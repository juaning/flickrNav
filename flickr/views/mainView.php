<?php 
	/**
	 * Main View 
	 * @author Ian Mignaco
	 */
?>
<html>
  <head>
    <title><?php echo htmlentities($this->title); ?></title>
    <link rel="stylesheet" type="text/css" href="/assets/main.css" media="screen" />
  </head>
  <body>
  	<h1><?php echo htmlentities($this->title); ?></h1>
  	<?php if($this->messageText): ?>
    	<div id='message' class="<?php echo $this->messageCSS; ?>"><?php echo htmlentities($this->messageText); ?></div>
    <?php endif; ?>
    <div id='content'>
    	<?php $this->form ? $this->form->render() : ''; ?>
    	<?php $this->content ? $this->content->render() : ''; ?>
    </div>
    <div id="navigation">
    	<?php $this->navigation ? $this->navigation->render() : ''; ?>
    </div>
  </body>
</html>