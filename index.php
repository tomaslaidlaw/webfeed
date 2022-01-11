<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title> WebRss </title>
        <meta name="description" content="Espacio de recopilacion y divulgacion sobre tecnologia, internet, gaming y tendencias actuales." />
        <meta name="keywords" content="Tecnologia, informatica, gaming, hardware, software, geeks, blog, " />
        <meta name="author" content="tomaslaidlaw" />
        <link rel="shortcut icon" href="ico-news.ico">
        <link rel="stylesheet" type="text/css" href="css/default.css" />
        <link rel="stylesheet" type="text/css" href="css/component.css" />
        <script src="js/modernizr.custom.js"></script>

<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

 <link href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <header class="clearfix">
                <h1> WEB RSS</h1> 
                <span> <img src="lg.infinity-rotate-cycle-loader.gif" width="50px">
                

                </span>
                <br>  C:\FEEDS\> 
                <a href="#Fayerwayer"> #Fayerwayer </a>, 
                <a href="#Genbeta"> #GenBeta </a>, 
                <a href="#Wwwhatsnew"> #Wwwhatsnew </a>, 
                <a href="#Tecnovortex"> #Tecnovortex </a>, 
                <a href="#TecnoGeek"> #TecnoGeek </a>,
                <a href="#Engadget"> #Engadget </a>, 
                <a href="#Gizmodo"> #Gizmodo </a>, 
                <a href="#Applesfera"> #Applesfera </a>, 
                <a href="#niubie"> #niubie </a>, 
                <a href="#Xataca"> #Xataca </a> ,
                <a href="#Muylinux"> #Muylinux </a>,
                <a href="#silicon"> #silicon </a>
                <a href="#nopuedocreer"> #nopuedocreer </a>
                <a href="#vidaextra"> #vidaextra </a>
                <nav>
                    <a href="../index.php" class="material-icons">home </a>
                    <a href="./"  class="material-icons" style="position:fixed;z-index:99;"> update </a>
                    
                </nav>

<style>
.share-btn {
    display: inline-block;
    color: #ffffff;
    border: none;
    padding: 0.5em;
    /*width: 4em;*/
    /*box-shadow: 0 2px 0 0 rgba(0,0,0,0.2);*/
    outline: none;
    text-align: center;
}

 

.share-btn:active {
  position: relative;
  top: 2px;
  box-shadow: none;
  color: #e2e2e2;
  outline: none;
}

/*  .share-btn.twitter     { background: #55acee; }*/
/* .share-btn.facebook    { background: #3B5998; }*/

</style>
            </header>   
            <div class="main">
                <ul class="cbp_tmtimeline">

<?php
  
                    function getContent() {
                        $file = "./feed-cache.txt";
                        $current_time = time();
                        $expire_time = 5 * 60;
                        $file_time = filemtime($file);
                        if(file_exists($file) && ($current_time - $expire_time < $file_time)) {
                            return file_get_contents($file);
                        }
                        else {
                            $content = getFreshContent();
                            file_put_contents($file, $content);
                            return $content;
                        }
                    }
                    function getFreshContent() {
                        $html = "";
                        $newsSource = array(
                            array(
                                "title" => "Fayerwayer",
                                "url" => "https://feeds.feedburner.com/fayerwayer"
                            ),
                            array(
                                "title" => "Genbeta",
                                "url" => "http://feeds.weblogssl.com/genbeta"
                            ),                            
                            array(
                                "title" => "Wwwhatsnew",
                                "url" => "http://feeds2.feedburner.com/Wwwhatsnew"
                            ),                                  
                            array(
                                "title" => "Tecnovortex",
                                "url" => "https://feeds.feedburner.com/tecnovortex"
                            ),
                            array(
                                "title" => "Engadget",
                                "url" => "http://es.engadget.com/rss.xml"
                            ),
                            array(
                                "title" => "Gizmodo",
                                "url" => "https://es.gizmodo.com/rss"
                            ),                            
                            array(
                                "title" => "Applesfera",
                                "url" => "http://feeds.weblogssl.com/applesfera"
                            ),
                            array(
                                "title" => "niubie",
                                "url" => "https://feeds.feedburner.com/niubie"
                            ),
                            array(
                                "title" => "Xataca",
                                "url" => "http://feeds.weblogssl.com/xataka2"
                            ),
                            array(
                                "title" => "TecnoGeek",
                                "url" => "https://www.tecnogeek.com/rss.php"
                            ),                                                    
                            array(
                                "title" => "Muylinux",
                                "url" => "https://www.muylinux.com/feed/"
                            ),
                            array(
                                "title" => "silicon",
                                "url" => "http://feeds.silicon.es/silicon-news/es"
                            ),
                            array(
                                "title" => "nopuedocreer",
                                "url" => "http://feeds.feedburner.com/nopuedocreerquelohayaninventado"
                            ),
                            array(
                                "title" => "vidaextra",
                                "url" => "http://feeds.weblogssl.com/vidaextra"
                            )                                                                                                                           
                        );
    function getFeed($url){
                            $rss = simplexml_load_file($url);
                            $count = 0;
                             /*$html .= '<div class="list-group">'; */
                            foreach($rss->channel->item as$item) {
                                $count++;
                                
                            //Si hay noticias que no son del mes(que son viejas) no las muestro
                                if (date("Y-m")!=date("Y-m", strtotime($item->pubDate))){
                                    break;
                                }
    $html .= '
    <li><time class="cbp_tmtime" ><span> ' . htmlspecialchars($item->source ) . ' </span>
            <span>' . date("H:i", strtotime($item->pubDate)) . '</span></time> <div class="cbp_tmicon cbp_tmicon-phone"></div>
                            <div class="cbp_tmlabel">
                                <a href="'.htmlspecialchars($item->link).'" target=_new>'.htmlspecialchars($item->title).'</a> <br><p>'
                                . date("Y-m-d", strtotime($item->pubDate)) .
                            ' <a href="http://twitter.com/share?url='.htmlspecialchars($item->link).'&text='.htmlspecialchars($item->title).'&via=tomaslaidlaw" target="_blank" > <i class="fa fa-twitter"></i> </a> </p> </div>
                    </li>';
                            }

                            return $html;
                        }
                        foreach($newsSource as $source) {
                            $html .= '<a name="'.$source["title"].'" ><h2 style="color:#8DA2BE;">'.$source["title"].'</h2></a>';
                            $html .= getFeed($source["url"]);
                        }
                        return $html;
                    }
                    print getContent();
                                             
?>                                
                
                </ul>
            </div>

        </div>

        
    </body>
</html>
