
<?php foreach($commentList as $comment):?>
    <div class="comment-body">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="title"><h4><?=$comment['name']?>, <small><?=$comment['email']?></small></h4></div>
                <div class="metadata">
                    <span class="date"><?=$comment['date']?></span>
                </div>
            </div>
            <div class="panel-body">
                <div class="media-text text-justify"><?=$comment['comment']?></div>
            </div>
        </div>
    </div>
<?php endforeach;?>
