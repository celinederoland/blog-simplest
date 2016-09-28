<?php

abstract class Page {

    public function render() {

        $str = $this->header() . $this->content() . $this->footer();
        return $str;
    }

    private function header() {

        $doctype = "<!DOCTYPE html>";

        $header = "<html lang='en'>"
               . "<head>"
               . "<meta charset='UTF-8'>"
               . "<meta name='viewport' content='width=device-width, initial-scale=1'>"
               . "<title>It Passion</title>" .

               "<link rel='stylesheet' type='text/css' href='normalize.css'/>"
               . "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' integrity='sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7' crossorigin='anonymous'>"
               . "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css' integrity='sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r' crossorigin='anonymous'>"
               . "<link rel='stylesheet' type='text/css' href='style.css'/>"
               . "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js' integrity='sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS' crossorigin='anonymous'></script>"
               . "<script type='text/javascript' async
                  src='https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML'>" . "</script>"
               . "</head>"
               . "<body>"
               . "<header class='page-header'>"

                  . "<ul>"
                  . "<li>"
                  . "<a href='home'>"
                  . "<span class='icon'>"
                  . "<span class='glyphicon glyphicon-floppy-disk' aria-hidden='true'>"
                  . "</span>"
                  . "</span>"
                  . "<br/>Informatique"
                  . "</a>"
                  . "</li>"
                  . "<li>"
                  . "<a href='home'>"
                  . "<span class='icon'>"
                  . "<span>\(\alpha^\infty\)</span>"
                  . "</span>"
                  . "<br/>Mathématiques "
                  . "</a>"
                  . "</li>"
                  . "<li>"
                  . "<a href='home'>"
                  . "<span class='icon'>"
                  . "<span class='glyphicon glyphicon-education' aria-hidden='true'>"
                  . "</span>"
                  . "</span>"
                  . "<br/>Qui suis-je ?"
                  . "</a>"
                  . "</li>"
                  . "</ul>"

               . "<h1>"
               . "<a href='home'>"
               . "<span class='glyphicon glyphicon-leaf' aria-hidden='true'>"
               . "</span>"
               . " &nbsp; Céline de Roland  "
               . "</a>"
               . "</h1>"
                . "<strong>La petite phrase qui dit qui je suis</strong>"
               . "</header>"
               /*. "<section class='additional'>"
               . "<h1>"
               . "<span class='hidden-small'>"
               . "Today &nbsp; "
               . "</span>"
               . "<span class='glyphicon glyphicon-pushpin'>"
               . "</span>"
               . "</h1>"
               . "<div>"
               . $this->tipoftheday()
               . "</div>"
               . "</section>"*/;
        return $doctype . $header;
    }

    private function tipoftheday() {

        $todays = $this->get_todaytips();
        $index  = array_rand($todays);
        $tip   = $todays[$index];
        require_once "CardViewFactory.php";
        return CardViewFactory::get($tip)->display_long();
    }

    /**
     * @return mixed
     */
    protected function get_todaytips() {

        return json_decode(file_get_contents("content/today/cards.json"), true);
    }

    protected abstract function content();

    private function footer() {

        return "</body>"
               . "</html>";
    }

    /**
     * @return mixed
     */
    protected function get_cards() {

        return json_decode(file_get_contents("content/" . $_SERVER['category'] . "/cards.json"), true);
    }
}