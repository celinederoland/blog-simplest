<?php

/**
 * Created by PhpStorm.
 * User: celine
 * Date: 13/09/16
 * Time: 11:56
 */
abstract class Page
{

    public function render()
    {

        $str = $this->header() . $this->content() . $this->footer();
        return $str;
    }

    private function header()
    {

        return "
            <!DOCTYPE html>
            <html lang=\"en\">
            <head>
                <meta charset=\"UTF-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                <title>It Passion</title>
            
                <!-- normalize browser styles -->
                <link rel=\"stylesheet\" type=\"text/css\" href=\"normalize.css\"/>
                <!-- Latest compiled and minified CSS -->
                <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\" integrity=\"sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7\" crossorigin=\"anonymous\">
                <!-- Optional theme -->
                <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css\" integrity=\"sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r\" crossorigin=\"anonymous\">
                <!-- personalize styles -->
                <link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\"/>
                <!-- Latest compiled and minified JavaScript -->
                <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\" integrity=\"sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS\" crossorigin=\"anonymous\"></script>
            
            </head>
            <body>
            
            
                <header class=\"page-header\">
                    <h1><span class=\"glyphicon glyphicon-leaf\" aria-hidden=\"true\"></span> &nbsp; Céline de Roland  </h1>
                </header>
            
                <section class=\"additional\">
                    <h1>Today &nbsp; <span class=\"glyphicon glyphicon-pushpin\"></span></h1>
                    <p>Here I can say some things</p>
                </section>";
    }

    protected abstract function content();

    private function footer()
    {

        return "
            </body>
            </html>";
    }

    /**
     * @return mixed
     */
    protected function get_cards()
    {
        return json_decode(file_get_contents("content/" . $_SERVER['category'] . "/cards.json"), true);
    }


}