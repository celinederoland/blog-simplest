<?php

/**
 * Created by PhpStorm.
 * User: celine
 * Date: 13/09/16
 * Time: 12:08
 */
require_once "Page.php";

class Article extends Page {

    private $name;

    public function __construct($name) {

        $this->name = $name;
    }

    protected function content() {

        require_once "CardViewFactory.php";
        return CardViewFactory::get($this->card())->display_long();
    }

    private function card() {

        $cards = $this->get_cards();
        foreach ($cards as &$card) {
            if ($card['name'] == $this->name) {
                return $card;
            }
        }
        return null;
    }

}