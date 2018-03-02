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
        $this->id_article = (int) $id_article;
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
        $sql = $db->prepare('INSERT INTO `'. self::tableName().'` (`id`, `id_article`, `name`, `email`, `comment`, `date`) VALUES (NULL, :id_article, :name, :email, :comment, :date)');
        $sql->bindParam(':id_article', $this->id_article);
        $sql->bindParam(':name', $this->name);
        $sql->bindParam(':email', $this->email);
        $sql->bindParam(':comment', $this->comment);
        $sql->bindParam(':date', $this->date);
        $sql->execute();
        return $sql;
    }

    static public function getCommentList($id_article)
    {
        if (!is_numeric($id_article)) return false;
        $db = Db::getConnection();
        $commentList = array();
        $sql = $db->prepare('SELECT * FROM '. self::tableName().' WHERE `id_article` = ? ORDER BY `'.self::tableName().'`.`date` DESC LIMIT 5');
        $sql->execute(array($id_article));

        $i = 0;
        while($row = $sql->fetch()) {
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