<?php

/**
 * Created by PhpStorm.
 * User: celine
 * Date: 13/09/16
 * Time: 12:08
 */
require_once "Page.php";

class Article extends Page
{

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function exists()
    {

        return file_exists($this->file_name());
    }

    /**
     * @return string
     */
    public function file_name()
    {
        return "content/" . $_SERVER['category'] . "/" . $this->name . ".html";
    }

    protected function content()
    {

        $cards = $this->get_cards();
        $card = $cards[$this->name];
        unset($cards);

        $str = "
            <section class=\"container-fluid content\">
        
                <div class=\"row\">";

        $str .= "
                    <div class=\"col-md-12 col-sm-12\">
                        <div class=\"thumbnail\">
                            <div class=\"caption\">
                                <h1>" . $card['title'] . "</h1>
                                <strong>" . $card['sub-title'] . "</strong>
                                <hr/>
                                ";

        $str .= file_get_contents($this->file_name());

        $str .= "
                            </div>
                        </div>
                    </div>";
        $str .= "
                </div>
            </section>";

        return $str;
    }

}