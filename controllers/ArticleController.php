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
    /*public function actionAddFile()
    {
        if ($_REQUEST)
        {
            $file = $_FILES['importfile']['tmp_name'];
            $xml = new ReadXML($file);
            $xml->getBooksFromFile();
            $ans = Report::instance()->getReportMessage();
        }
        else {$ans = true; $xml_file = '';}
        $this->setTitle('Добавить файл данных');
        return $this->render('books/add_file', ['ans' => $ans]);
    }*/
}