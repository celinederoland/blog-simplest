<?php

/**
 * Created by PhpStorm.
 * User: celine
 * Date: 13/09/16
 * Time: 12:07
 */
require_once "Page.php";

class Home extends Page
{

    private $error;

    public function __construct($error = false)
    {
        $this->error = $error;
    }

    protected function content()
    {

        $cards = $this->get_cards();

        $str = "
            <section class=\"container-fluid content\">
        ";

        if ($this->error) {
            $str .= "
                <div class=\"row\">
                    <div class=\"col-md-12 col-sm-12\">
                        <strong>" . $this->error . "</strong>
                    </div>
                </div>";
        }

        $str .= "
                <div class=\"row\">";

        foreach ($cards as $card) {
            $str .= "
                    <div class=\"col-md-4 col-sm-6 fixed-col\">
                        <div class=\"thumbnail\">
                            <div class=\"caption\">
                                <h1><a href='" . $card['name'] . "'>" . $card['title'] . "</a></h1>
                                <strong>" . $card['sub-title'] . "</strong>
                                <hr/>
                                <p>
                                    " . $card['message'] . "
                                </p>
                            </div>
                        </div>
                    </div>";
        }

        $str .= "
                </div>
            </section>";

        return $str;
    }
}