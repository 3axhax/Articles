<?php

namespace models;

use components\Db;
use PDO;
use components\Report;

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
        $sql = 'SELECT * FROM '. self::tableName();
        $result = $db->query($sql);
        
        $i = 0;
        while($row = $result->fetch()) {
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
        $sql = 'SELECT * FROM '. self::tableName().' WHERE id = '.$id;
        $result = $db->query($sql);
        return $result->fetch();
    }
}