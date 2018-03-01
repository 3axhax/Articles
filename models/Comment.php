<?php

namespace models;

use components\Db;

class Comment
{
    public $id;
    public $id_article;
    public $name;
    public $email;
    public $comment;
    public $date;
    public $error = false;

    static protected function tableName()
    {
        return 'comments';
    }

    public function __construct($id_article, $name, $email, $comment)
    {
        $this->id_article = $id_article;
        $this->name = $name;
        $this->email = $email;
        $this->comment = $comment;
        $this->date = date('Y-m-d H:i:s');
    }

    public function validate()
    {
        $name = $this->validateName($this->name);
        $email = $this->validateEmail($this->email);
        $comment = $this->validateComment($this->comment);
        return ($name && $email && $comment);
    }

    private function validateName($name)
    {
        if (!$name) {
            $this->error['name'] = 'Поле должно быть заполнено';
            return false;
        }
        return true;
    }

    private function validateComment($comment)
    {
        if (!$comment) {
            $this->error['comment'] = 'Поле должно быть заполнено';
            return false;
        }
        return true;
    }

    private function validateEmail($email)
    {
        if (!$email) {
            $this->error['email'] = 'Поле должно быть заполнено';
            return false;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->error['email'] = 'Некорректный E-mail';
            return false;
        }
        return true;
    }

    public function save()
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO `'. self::tableName().'` (`id`, `id_article`, `name`, `email`, `comment`, `date`) VALUES (NULL, \''.$this->id_article.'\', \''.$this->name.'\', \''.$this->email.'\', \''.$this->comment.'\', \''.$this->date.'\')';
        $result = $db->query($sql);
        return $result;
    }

    static public function getCommentList($id_article)
    {
        $db = Db::getConnection();
        $commentList = array();
        $sql = 'SELECT * FROM '. self::tableName().' WHERE `id_article` = '.$id_article.' ORDER BY `comments`.`date` DESC LIMIT 5';
        $result = $db->query($sql);

        $i = 0;
        while($row = $result->fetch()) {
            $commentList[$i]['id'] = $row['id'];
            $commentList[$i]['id_article'] = $row['id_article'];
            $commentList[$i]['name'] = $row['name'];
            $commentList[$i]['email'] = $row['email'];
            $commentList[$i]['comment'] = $row['comment'];
            $commentList[$i]['date'] = $row['date'];
            $i++;
        }

        return $commentList;
    }
}