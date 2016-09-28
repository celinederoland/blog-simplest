<?php

require_once "ICardView.php";
class TipView implements ICardView {

    private $tip;

    public function __construct($tip) {

        $this->tip = $tip;
    }

    public function display_short() {

        return "<div class=\"col-md-4 col-sm-6 fixed-col\">"
               . "<div class=\"thumbnail\">"
               . "<div class=\"caption\">"
               . "<h1>"
               . $this->tip['short-name']
               . "</h1>"
               . "<strong>"
               . $this->link()
               . "</strong>"
               . "<hr/>"
               . "<p>"
               . $this->content()
               . "</p>"
               . "</div>"
               . "</div>"
               . "</div>";
    }

    public function display_long() {

        return "<div class=\"col-md-12 tip\">"
               /*. "<div class=\"thumbnail\">"*/
               /*. "<div class=\"caption\">"*/
               . "<h1>"
               . $this->link()
               . "</h1>"
               /*. "<strong>"
               . $this->link()
               . "</strong>"*/
               . "<hr/>"
               . "<div class='tip_content'>"
               . $this->content()
               . "</div>"
               /*. "</div>"*/
               /*. "</div>"*/
               . "</div>";
    }

    private function link() {

        return "<a target='blank' href='" . $this->tip['link']['href'] . "'>"
        . /*$this->tip['category'] . "&nbsp;" .*/ $this->tip['link']['title']
        . "</a>";
    }

    protected function content() {

        return file_get_contents("content/today/" . $this->tip['name'] . ".html");
    }
}