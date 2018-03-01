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
<h3>Последние 5 комментариев:</h3>
<hr>
<div class="comment" id="comment-list">
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
                        <div class="form-group">
                            <label class="col-md-2 control-label">Имя:</label>
                            <div class="col-md-3">
                                <input type="text" id="name" class="form-control" placeholder="Ваше имя">
                            </div>
                            <div class="help-block" id="name-error"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">E-mail:</label>
                            <div class="col-md-3">
                                <input type="text" id="email" class="form-control" placeholder="Ваш E-mail">
                            </div>
                            <div class="help-block" id="email-error"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Комментарий:</label>
                            <div class="col-md-7">
                                <textarea id="comment" class="form-control" rows="6" placeholder="Комментарий"></textarea>
                            </div>
                            <div class="help-block" id="comment-error"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-offset-2">
                    <button class="btn btn-success" onclick="sentComment(<?= $article['id']?>)">Отправить <span class="glyphicon glyphicon-comment"></button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    getComments(<?= $article['id']?>);
    setInterval(function () {getComments(<?= $article['id']?>)}, 1000*30);
</script>
<!--<pre>
--><?/*= print_r($article)*/?>