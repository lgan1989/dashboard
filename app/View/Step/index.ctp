<?php
$this->assign('title' , $data['title']);
?>
<script language="javascript" type="text/javascript">

$(document).ready( function(){    

    $('.editable').editable();

});

</script>
<div id="step">
    <div id="itemlist">
<?php foreach ($steps as $item): 
        $item = $item['Step']
        ?>
        <div class="item">
            <div class="date">
                <span class="title"><a href="#" id="startYear" class='editable' data-type="text" data-pk="<?php echo $item['sid'];?>" data-url="<?php echo $this->Html->url(array('controller' => 'step' , 'action' => 'post' , 'startYear'));?>" data-original-title="Start Year"><?php echo $item['startYear'];?></a>  - <a href="#" id="endYear" class="editable"  data-type="text" data-pk="<?php echo $item['sid'];?>" data-url="<?php echo $this->Html->url(array('controller' => 'step' , 'action' => 'post' , 'endYear'));?>" data-original-title="End Year">  <?php echo $item['endYear'];?></a> </span>
                <div style="clear:both;"></div> 
                <span class="distance"><a href="#" id="distance" class='editable' data-type="text" data-pk="<?php echo $item['sid'];?>" data-url="<?php echo $this->Html->url(array('controller' => 'step' , 'action' => 'post' , 'distance'));?>" data-original-title="Distance"><?php echo $item['distance'];?></a><br>MILES</span>           
            </div>       
            <div class="introduction">
            <span class="title city" >
<a href="#" id="city" class='editable' data-type="text" data-pk="<?php echo $item['sid'];?>" data-url="<?php echo $this->Html->url(array('controller' => 'step' , 'action' => 'post' , 'city'));?>" data-original-title="City">
<?php echo $item['city'];?></a></span>
                <br>
                <div class="city_content">
<a href="#" id="cityDescription" class='editable' data-type="textarea" data-pk="<?php echo $item['sid'];?>" data-url="<?php echo $this->Html->url(array('controller' => 'step' , 'action' => 'post' , 'description'));?>" data-original-title="Description">
                    <?php echo $item['description']; ?>
</a>
                </div>
            </div>
            <div class="map">
                <img src="<?php echo $this->webroot."img/".$item['image'];?>" width="200" alt="alt"/>
            </div>
        </div>
<?php endforeach;?>
    </div>

</div>
