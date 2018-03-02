<?php

use models\Comment;
use controllers\SiteController;


class CommentController extends SiteController
{
    public function actionAdd()
    {
        $comment = new Comment($_REQUEST['id_article'], $_REQUEST['name'], $_REQUEST['email'], $_REQUEST['comment']);
        if($comment->validate()) $comment->save();

        $error = json_encode($comment->error, JSON_UNESCAPED_UNICODE);
        echo $error;
        return true;
    }
    public function actionGet()
    {
        $commentList = Comment::getCommentList($_REQUEST['id_article']);
        if(!$commentList) return $this->render('main/404');
        $this->setRenderMain(false);
        return $this->render('comment/getList',['commentList' => $commentList]);
    }
}