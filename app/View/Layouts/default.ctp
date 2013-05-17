
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

        echo $this->Html->css('style.css');
        echo $this->Html->script('jquery.js');
        echo $this->Html->script('quickedit.js');
        echo $this->Html->script('jquery.poshytip.min.js');
        echo $this->Html->script('jquery-editable-poshytip.min.js');
        echo $this->Html->script('common.js');
        echo $this->Html->script('map.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
    ?>
    <link href='http://fonts.googleapis.com/css?family=Graduate' rel='stylesheet' type='text/css'>
  
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.4/jquery-editable/css/jquery-editable.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.4/jquery-editable/js/jquery-editable-poshytip.min.js"></script>


</head>
<body>
          <div id="header_container">
            <div id="header">
                <div id="menu">
                    <div class="naviitem">
                        <span <?php if ($this->params['controller'] == 'achievement'):?>class="navi_current"<?php endif;?>><a href="<?php echo $this->Html->url(array('controller' => 'achievement'));?>">Achievements</a></span>
                    </div>
                    <div class="naviitem"><span <?php if ($this->params['controller'] == 'step'):?>class="navi_current"<?php endif;?> ><a href="<?php echo $this->Html->url(array('controller' => 'step'));?>">Steps</a></span></div>
                    <div class="naviitem"><span <?php if ($this->params['controller'] == 'activity'):?>class="navi_current"<?php endif;?> ><a href="<?php echo $this->Html->url(array('controller' => 'activity'));?>">Activities</a></span></div>
                    <div class="naviitem">Likes</div>
                    <div class="naviitem">Blog</div> 
                </div>

                <div style="clear:both;"></div>

                <div class="top-shadow" ></div>
                <div class="bottom-shadow" ></div>               
            </div>
            </div>
     <div id="content_container">
        <div id="content">

            <?php echo $this->Session->flash(); ?>

            <?php echo $this->fetch('content'); ?>
        </div>
    </div>
<div id="footer_container">
        <div id="fadebottom"></div>
        <div id="footer">
                 Copyleft, designed by Lu. 
        </div>
</div>
 

</body>
</html>
