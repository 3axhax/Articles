<div class="media">
    <div class="media-body">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="title"><h3><?= $article['title'] ?></h3></div>
                <div class="metadata">
                    <span class="date"><?= $article['date']?></span>
                </div>
            </div>
            <div class="panel-body">
                <div class="media-text text-justify"><?= $article['content']?></div>
            </div>
        </div>
        </div>
    </div>
<pre>
<?= print_r($article)?>