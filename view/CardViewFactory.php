<?php

class CardViewFactory {

    /**
     * @param $card
     * @return ICardView
     */
    public static function get($card) {
        require_once "ArticleView.php";
        require_once "TipView.php";
        switch ($card['type']) {
            case "article": return new ArticleView($card); break;
            case "tip": return new TipView($card); break;
        }
    }
}