<?php

use models\Article;
use controllers\SiteController;

class ArticleController extends SiteController
{
    public function actionList()
    {
        $articles = Article::getArticleList();
        $this->setTitle('Список Статей');
        return $this->render('article/list', ['articles' => $articles]);
    }
    public function actionView($id)
    {
        $article = Article::getArticleById($id);
        $this->setTitle('Статья: '.$article['title']);
        return $this->render('article/view', ['article' => $article]);
    }
}