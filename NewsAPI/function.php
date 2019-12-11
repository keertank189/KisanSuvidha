<?php

function curl_get_contents($url)
{
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

function topArticle() {
  $url = 'https://newsapi.org/v2/everything?q=farming%20farmers%20crops&apiKey=d2f3e838f7a44185bb9dcf19e047474c';
  $urlSources = json_decode(json_encode(curl_get_contents($url)));
  
    $urlSourcesArray = json_decode($urlSources,true);
  $i = 0;
  
  $articlesName = $urlSourcesArray['articles'][$i];
  $published = substr($articlesName['publishedAt'], 0, 10);
    

echo' <div class="flag flag-trending">Top Stories</div>          
 <div style="background-image:url(images/1.png);" class="fh5co_suceefh5co_height"><img src="'.$articlesName['urlToImage'].'" style="width:100%;"/>
                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                <div class="fh5co_suceefh5co_height_position_absolute_font">
                    <div class=""><i class="fa fa-clock-o"> </i>&nbsp;&nbsp;'.substr($articlesName['publishedAt'], 0, 10).'</div>
                    <div class=""><a target="_blank" href="'.$articlesName['url'].'" class="fh5co_good_font">'.$articlesName['title'].'</a></div>
                </div>';
  }


function topArticles() {
  $url = 'https://newsapi.org/v2/everything?q=farming%20farmers%20climate%20crops%20agriculture&apiKey=d2f3e838f7a44185bb9dcf19e047474c';
  $urlSources = json_decode(json_encode(curl_get_contents($url)));
  
    $urlSourcesArray = json_decode($urlSources,true);

for ($i=2; $i < 4 ; $i++) { 
      $articlesName = $urlSourcesArray['articles'][$i];


                  $published = substr($articlesName['publishedAt'], 0, 10);

echo '<div class="col-md-12 col-12 paddding animate-box" data-animate-effect="fadeIn">              
  <div class="col-md-12 col-12 paddding animate-box" data-animate-effect="fadeIn">
                    <div style="background-image:url(images/1.png);" class="fh5co_suceefh5co_height_2"><img src="'.$articlesName['urlToImage'].'" style="width:100%;"/>
                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                        <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                            <div class=""><i class="fa fa-clock-o"></i>&nbsp;&nbsp;'.substr($articlesName['publishedAt'], 0, 10).'</div>
                            <div class=""><a target="_blank" href="'.$articlesName['url'].'" class="fh5co_good_font_2">'.$articlesName['title'].'</a></div>
                        </div>
                    </div>
                    </div>
                    </div>';

    }

} 

function trendingArticles() {
  $url = 'https://newsapi.org/v2/everything?q=government%20farmers%20climate%20farming&apiKey=d2f3e838f7a44185bb9dcf19e047474c';
  $urlSources = json_decode(json_encode(curl_get_contents($url)));
  
    $urlSourcesArray = json_decode($urlSources,true);

$articlesName = $urlSourcesArray['articles'];

for ($i=0; $i < sizeof($articlesName); $i++) { 
      $articlesName = $urlSourcesArray['articles'][$i];


                  $published = substr($articlesName['publishedAt'], 0, 10);

echo '<div class="item px-2">
                <div style="background-image:url(images/1.png);" class="fh5co_latest_trading_img_position_relative">
                <div class="flag flag-trending">Trending</div>
                    <div class="fh5co_latest_trading_img"><img src="'.$articlesName['urlToImage'].'" class="fh5co_img_special_relative"/></div>
                    <div class="fh5co_latest_trading_img_position_absolute"></div>
                    <div class="fh5co_latest_trading_img_position_absolute_1">
                    <div style="color:white";><i class="fa fa-clock-o"> </i>&nbsp;&nbsp;'.substr($articlesName['publishedAt'], 0, 10).'</div>
                        <a target="_blank" href="'.$articlesName['url'].'" class="text-white">'.$articlesName['title'].'</a>
                        <div class="fh5co_latest_trading_date_and_name_color">'.$articlesName['source']['name'].'</div>
                    </div>
                </div>
            </div>';

    }

} 


function worldFarmingArticles() {
  

  $url = 'https://newsapi.org/v2/everything?q=farming%20climate%20practices&apiKey=d2f3e838f7a44185bb9dcf19e047474c';
  $urlSources = json_decode(json_encode(curl_get_contents($url)));
  
    $urlSourcesArray = json_decode($urlSources,true);

$articlesName = $urlSourcesArray['articles'];

for ($i=0; $i < sizeof($articlesName); $i++) { 
      $articlesName = $urlSourcesArray['articles'][$i];


                  $published = substr($articlesName['publishedAt'], 0, 10);

echo '<div class="item px-2">
                <div class="fh5co_latest_trading_img_position_relative">
                    <div class="fh5co_latest_trading_img"><img style="background-image:url(images/1.png);" src="'.$articlesName['urlToImage'].'" class="fh5co_img_special_relative" style="width:100%;"/></div>
                    <div class="fh5co_latest_trading_img_position_absolute"></div>
                    <div class="fh5co_latest_trading_img_position_absolute_1">
                    <div style="color:white";><i class="fa fa-clock-o"> </i>&nbsp;&nbsp;'.substr($articlesName['publishedAt'], 0, 10).'</div>
                        <a target="_blank" href="'.$articlesName['url'].'" class="text-white">'.$articlesName['title'].'</a>
                        <div class="fh5co_latest_trading_date_and_name_color">'.$articlesName['source']['name'].'</div>
                    </div>
                </div>
            </div>';

    }

} 


function farmingIndiaArticles() {


  $url = 'https://newsapi.org/v2/everything?q=farming%20in%20india&from=2019-11-07&to=2019-11-08&apiKey=d2f3e838f7a44185bb9dcf19e047474c';
  $urlSources = json_decode(json_encode(curl_get_contents($url)));
  
    $urlSourcesArray = json_decode($urlSources,true);

$articlesName = $urlSourcesArray['articles'];

for ($i=0; $i < 4; $i++) { 
      $articlesName = $urlSourcesArray['articles'][$i];


                  $published = substr($articlesName['publishedAt'], 0, 10);

echo '                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">

                            <div style="background-image:url(images/1.png);" class="fh5co_news_img"><img src="'.$articlesName['urlToImage'].'" style="width:100%;"/></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box">
                        <a target="_blank" href="'.$articlesName['url'].'" class="fh5co_magna py-2">'.$articlesName['title'].'</a><br>
                        <div><i class="fa fa-clock-o"> </i>&nbsp;&nbsp;'.substr($articlesName['publishedAt'], 0, 10).'</div> 
                        <div  class="fh5co_mini_time py-3">'.$articlesName['source']['name'].'</div>
                        <div class="fh5co_consectetur">'.$articlesName['description'].'</div>
                    </div>
                </div>';
    }
} 

function popularArticles() {

$url = 'https://newsapi.org/v2/top-headlines?q=climate&apiKey=d2f3e838f7a44185bb9dcf19e047474c';
  $urlSources = json_decode(json_encode(curl_get_contents($url)));
  
    $urlSourcesArray = json_decode($urlSources,true);

$articlesName = $urlSourcesArray['articles'];

for ($i=0; $i < 5; $i++) { 
      $articlesName = $urlSourcesArray['articles'][$i];


                  $published = substr($articlesName['publishedAt'], 0, 10);

echo '<div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img  style="background-image:url(images/1.png);" src="'.$articlesName['urlToImage'].'" class="fh5co_most_trading" style="width:100%;"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"><a target="_blank" href="'.$articlesName['url'].'" class="fh5co_magna py-2">'.$articlesName['title'].'</a></div>
                        </div>
                </div>';

    }

} 