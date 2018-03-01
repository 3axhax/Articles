<div class="article">
    <div class="article-body">
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
<hr>
<div class="comment">
    <div class="comment-body">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="title"><h4>Автор</h4></div>
                <div class="metadata">
                    <span class="date">2018-00-00 13:00:00</span>
                </div>
            </div>
            <div class="panel-body">
                <div class="media-text text-justify">Comment</div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="comment">
    <div class="comment-body">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="title"><h4>Добавить комментарий</h4></div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="form-horizontal col-md-12">
                        <div class="form-group has-feedback">
                            <label class="col-md-2">Имя:</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label class="col-md-2">E-mail:</label>
                            <div class="col-md-3">
                                <input type="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label class="col-md-2">Комментарий:</label>
                            <div class="col-md-7">
                                <textarea type="" class="form-control" rows="6"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-offset-2">
                    <button type="submit" class="btn btn-success">Отправить <span class="glyphicon glyphicon-pencil"></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<pre>
--><?/*= print_r($article)*/?>