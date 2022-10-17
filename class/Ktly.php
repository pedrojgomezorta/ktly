<?php
class Ktly{

    public $url;
    public $token;
    private static $url_ktly = "http://ktly.tk";

    public function __construct($url) {
        $this->url = $url;
        if (Helper::isValueExitsInArray($this->url, 'url')){
            $this->token = self::getTokenByUrl($this->url);
        }else{
            do {
                $proposed_token = self::generateToken();
            } while (Helper::isValueExitsInArray($proposed_token, 'token'));
            $this->token = $proposed_token;
            self::addValuesToDatabase($this->url, $this->token);
        }
	}
    
    public static function generateToken(){
        return substr(md5(microtime()),rand(0,26),6);
    }

    public static function getTokenByUrl($url){
        $database = new Database();
        $token = $database->query('select token from url where url like "'.$url.'"')->fetchArray();
        $database->close();
        return $token['token'];
    }

    public static function getOriginUrlByToken($token){
        $database = new Database();
        $url = $database->query('select url from url where token like "'.$token.'"')->fetchArray();
        $database->close();
        return $url['url'];
    }

    public function generateUrl(){
        return self::$url_ktly.'/'.$this->token;
    }

    public static function redirectToKtlyUrl(){
        header('Location: '.self::$url_ktly);
    }

    public static function redirectToUrl($url){
        header('Location: '.$url);
    }

    public static function addValuesToDatabase($url, $token){
        $database = new Database();
        $insert = $database->query('insert into url values (null, "'.$url.'", "'.$token.'")');
        $database->close();
        return $insert->affectedRows();;
    }
    
}
?>