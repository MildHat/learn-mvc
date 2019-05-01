<?php

include_once(ROOT . '/models/News.php');

class NewsController
{

    public function actionIndex()
    {
        $newsList = [];
        $newsList = News::getNewsList();
        include_once('views/news/index.php');
        return true;
    }

    public function actionView($id)
    {
        if ($id) {
            $newsItem = News::getNewsItemById($id);

            include_once('views/news/post.php');
        }
        return true;
    }
}