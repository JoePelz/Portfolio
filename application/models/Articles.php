<?php

class Articles extends CI_Model
{
    protected $xml;

    public function __construct()
    {
      $this->xml = simplexml_load_file('./assets/articles/articles.xml');
    }

    public function getAllSections()
    {
      $sections = array();
      foreach($this->xml->section as $section)
      {
        $newSection = array();
        $newSection['sectionTitle'] = (string)$section->title;

        $articles = array();
        foreach($section->article as $article)
        {
          $newArticle = array();
          $newArticle['articlePath'] = (string)$article->path;
          $newArticle['articleImage'] = (string)$article->image;
          $newArticle['articleTitle'] = (string)$article->title;

          if (strpos($newArticle['articlePath'], 'http') !== 0)
          {
            $newArticle['articlePath'] = "/articles/" . $newArticle['articlePath'];
          }

          if (!$this->startsWith($newArticle['articleImage'], '/') && strpos($newArticle['articleImage'], 'http') !== 0)
          {
            //neither starts with http nor a /
            $newArticle['articleImage'] = '/assets' . $newArticle['articlePath'] . '/' . $newArticle['articleImage'];
          }

          $articles[] = $newArticle;
        }
        $newSection['articles'] = $articles;
        $sections[] = $newSection;
      }
      return $sections;
    }

    function startsWith($haystack, $needle) {
      // search backwards starting from haystack length characters from the end
      return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
    }

    function getStyles($articlePath) {
      $styles = array();
      foreach($this->xml->section as $section)
      {
        foreach($section->article as $article)
        {
          if (strcmp($articlePath, (string)$article->path) == 0) {
            foreach($article->style as $style)
            {
              $styles[] = (string)$style;
            }
            return $styles;
          }
        }
      }
      return $styles;
    }

    function getScripts($articlePath) {
      $scripts = array();
      foreach($this->xml->section as $section)
      {
        foreach($section->article as $article)
        {
          if (strcmp($articlePath, (string)$article->path) == 0) {
            foreach($article->script as $script)
            {
              $scripts[] = (string)$script;
            }
            return $scripts;
          }
        }
      }
      return $scripts;
    }
}
