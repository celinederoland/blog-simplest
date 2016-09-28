<?php

require_once "ICardView.php";
class ArticleView implements ICardView {

    private $card;

    public function __construct($card) {

        $this->card = $card;
    }

    public function display_short() {

        return "<div class=\"col-md-4 col-sm-6 fixed-col\">"
                . "<div class=\"thumbnail\">"
                . "<div class=\"caption\">"
                . "<h1>"
                . "<a href='" . $this->card['name'] . "'>"
                . $this->card['title']
                . "</a>"
                . "</h1>"
                . "<strong>"
                . $this->card['sub-title']
                . "</strong>"
                . "<hr/>"
                . "<p>"
                . $this->card['message']
                . "</p>"
                . "</div>"
                . "</div>"
                . "</div>";
    }

    public function display_long() {

        if(!$this->exists()) {
            throw new Exception("file_not_found");
        }

        $str = "<section class=\"container-fluid content\">"
               . "<div class=\"row\">";

        $str .= "<div class=\"col-md-12 col-sm-12\">"
                . "<div class=\"thumbnail\">"
                . "<div class=\"caption\">"
                . "<h1>"
                . $this->card['title']
                . "</h1>"
                . "<strong>"
                . $this->card['sub-title']
                . "</strong>"
                . "<hr/>";

        $str .= file_get_contents($this->file_name());

        $str .= "</div>"
                . "</div>"
                . "</div>"
                . "</div>"
                . "</section>";

        return $str;
    }

    private function exists() {

        return file_exists($this->file_name());
    }

    public function file_name() {

        return "content/" . $_SERVER['category'] . "/" . $this->card['name'] . ".html";
    }
}