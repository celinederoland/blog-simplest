<?php

/**
 * Created by PhpStorm.
 * User: celine
 * Date: 13/09/16
 * Time: 12:07
 */
require_once "Page.php";

class Home extends Page {

    private $error;

    public function __construct($error = false) {

        $this->error = $error;
    }

    protected function content() {

        $cards = $this->get_cards();
        $str = "<section class=\"container-fluid content\">";

        if ($this->error) {
            $str .= "<div class=\"row\">"
                    . "<div class=\"col-md-12 col-sm-12\">"
                    . "<strong>"
                    . $this->error
                    . "</strong>"
                    . "</div>"
                    . "</div>";
        }

        //Début du contenu
        $str .= "<div class=\"row\">";
        //Colonne gauche : articles
        $str .= "<div class=\"col-md-9\">";
        //Ligne de titre
        $str .= "<div class=\"row\">";
        $str .= "<div class=\"col-md-12\">";
        $str .= "<div class=\"section-title\">";
        $str .= "Articles";
        $str .= "</div>";
        $str .= "</div>";
        $str .= "</div>";
        //Fin ligne de titre

        //Ligne des articles
        $str .= "<div class=\"row\">";

        $cnt = 0;
        foreach ($cards as $card) {

            require_once "CardViewFactory.php";
            $view = CardViewFactory::get($card);
            $str .= $view->display_short();
            if(++$cnt == 3) {
                $str .= "</div>";
                $str .= "<div class=\"row\">";
                $cnt = 0;
            }
        }

        $str .= "</div>";
        //Fin ligne des articles
        $str .= "</div>";
        //Fin Colonne gauche

        //Colonne droite : trucs et astuces
        $str .= "<div class=\"col-md-3\">";
        //Ligne de titres
        $str .= "<div class=\"row\">";
        $str .= "<div class=\"col-md-12\">";
        $str .= "<div class=\"section-title\">";
        $str .= "Trucs et astuces";
        $str .= "</div>";
        $str .= "</div>";
        $str .= "</div>";

        //Ligne des trucs et astuces
        $str .= "<div class=\"row\">";

        $todays = $this->get_todaytips();
        foreach ($todays as $today) {

            require_once "CardViewFactory.php";
            $view = CardViewFactory::get($today);
            $str .= $view->display_long();
        }

        $str .= "</div>";
        //Fin ligne des trucs et astuces

        $str .= "</div>";
        //Fin Colonne droite

        //Fin du contenu
        $str .= "</div>"

                . "</section>";

        return $str;
    }

    /**
     * @return mixed
     */
    protected function get_todaytips() {

        return json_decode(file_get_contents("content/today/cards.json"), true);
    }
}