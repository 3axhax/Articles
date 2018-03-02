<?php

namespace models;

use components\Db;

class Article
{
    public $id;
    public $title;
    public $content;
    public $date;

    static protected function tableName()
    {
        return 'articles';
    }
    
    static public function getArticleList()
    {
        $db = Db::getConnection();
        $articleList = array();
        $sql = $db->prepare('SELECT * FROM  '.self::tableName());
        $sql->execute();

        $i = 0;
        while($row = $sql->fetch()) {
            $articleList[$i]['id'] = $row['id'];
            $articleList[$i]['title'] = $row['title'];
            $articleList[$i]['content'] = $row['content'];
            $articleList[$i]['date'] = $row['date'];
            $i++;
        }

        return $articleList;
    }

    static public function getArticleById($id)
    {
        $db = Db::getConnection();
        if (!is_numeric($id)) return false;
        $sql = $db->prepare('SELECT * FROM ' . self::tableName() . ' WHERE id = ? ');
        $sql->execute(array($id));
        return $sql->fetch();
    }
}