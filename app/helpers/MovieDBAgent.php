<?php
    namespace App\helpers;
    use GuzzleHttp\Client;

    class MovieDBAgent{
        private String $apiToken;
        private static String $basePath = "https://api.themoviedb.org/";
        private Client $guzzleAgent;

        public function __construct(){
            $this->apiToken = $_ENV['API_TOKEN'];
            $this->guzzleAgent = new Client([
                'base_uri' => self::$basePath,
                'timeout'  => 10.0,
                'curl' => [
                    CURLOPT_SSL_VERIFYPEER => false,
                ],
            ]);
        }

        public function getPopular(int $page = 1){
            return $this->sendRequest('/movie/popular', args : [
                'page' => $page,
            ]);
        }

        public function getDetail(int $id){
            return $this->sendRequest('/movie/'.$id);
        }

        public function search(String $query, int $page = 1){
            return $this->sendRequest('/search/movie', args : [
                'page' => $page,
                'query' => $query,
            ]);
        }

        private function sendRequest(String $endPoint ,String $method = "GET", Array $args = []){
            return json_decode($this->guzzleAgent->request($method, '/3'.$endPoint, [
                'query' => [
                    'api_key' => $this->apiToken,
                    'language'=> "fr-FR",
                    'region' => "FR",
                    ...$args,
                ],
            ])->getBody()->getContents(),true);
        }
    }
?>