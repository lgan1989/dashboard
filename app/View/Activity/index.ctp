<?php
    $this->assign('title' , $data['title']);
?>


<div id="activity">

            <div class="navigation_container">
                <div class="navigation">     
                    <span class="label <?php if ($data['type'] == 'track') echo 'current';?>" style="width:300px;"><a href="<?php echo $this->Html->url(array('controller' => 'activity' , 'track'))?>">Listened Tracks</a></span> 
                    <span class="label <?php if ($data['type'] == 'book') echo 'current';?> " style="width:300px;"><a href="<?php echo $this->Html->url(array('controller' => 'activity' , 'book'))?>">Read Books</a></span>
                    <span class="label <?php if ($data['type'] == 'movie') echo 'current';?> " style="width:300px;"><a href="<?php echo $this->Html->url(array('controller' => 'activity' , 'movie'))?>">Watched Movies</a></span>
                    <br><br>
                    <div style="clear:both;"></div>
                    <div class="top-shadow" ></div>
                    <div class="bottom-shadow" ></div>       
                </div>
            </div>
            <div class="recentitem">
                <div class="activitylist" style="margin-top:5px;">
                   <hr>
<?php if ($data['type'] == 'track'){
                    foreach ($trackList as $track):?>
                    <div class="activityitem">
                        <div class="cover">
<?php if ($track->image[1]->text != null){
    $src = $track->image[1]->text;
}
else{
    $src = $this->webroot."img/default_album.png";
} ?>
                        <img src="<?php echo $src;?>">
                        </div>
                        <div class="trackbody">
                        <span class="name"><?php echo $track->name;?></span><br>
                        <span class="album"><?php echo $track->album->text;?></span><br>
                        <span class="artist"><?php echo $track->artist->text;?></span><br>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <hr>
                    <?php endforeach;?>
<?php }else if($data['type'] == 'book'){ 
    foreach ($bookList as $book): 
     $book = $book['ActivityCache'];   
?>
          <div class="activityitem">
                        <div class="cover">
<?php 
    $src = $book['cover'];
    if ($src == null)            
        $src = $this->webroot."img/default_album.png";
?>
                        <img style="height:84px;" src="<?php echo $src;?>">
                        </div>
                        <div class="trackbody">
                        <span class="name"><a href="<?php echo $book['link'];?> " target="_blank"><?php echo $book['title'];?></a></span><br>
                        <span class="artist"><?php echo $book['author'];?></span><br>
                        <span class="comment"><?php echo $book['comment'];?></span><br>   
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <hr>                   
<?php endforeach;

}else if($data['type'] == 'movie'){ 
    foreach ($movieList as $movie):
    $movie = $movie['ActivityCache'];    
?>
          <div class="activityitem">
                        <div class="cover">
<?php 
    $src = $movie['cover'];
    if ($src == null)            
        $src = $this->webroot."img/default_album.png";
?>
                        <img style="height:84px;" src="<?php echo $src;?>">
                        </div>
                        <div class="trackbody">
                        <span class="name"><a href="<?php echo $movie['link'];?>" target="_blank"><?php echo $movie['title'];?></a></span><br>
                        <span class="artist"><?php echo $movie['author'];?></span><br>
                        <span class="comment"><?php echo $movie['comment'];?></span><br>   
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <hr>                   
<?php endforeach; 
}else{
    foreach ($verseList as $verse):
?>
<div class="activityitem">
<div class="versecontent">
<blockquote class="curly-quotes">
    <?php echo $verse['Verse']['content'];?>
</blockquote>
<div class="note">
<?php echo $verse['Verse']['book'].' Chapter '.$verse['Verse']['chapter'].' Verse '.$verse['Verse']['verse'];?><br>
<?php echo date('Y/M/d' , strtotime( $verse['Verse']['date'] )); ?>
</div>
</div>
</div>
<?php endforeach;
}?>               
                </div> 
    </div>

</div>
