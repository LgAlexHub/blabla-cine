<?php 
    namespace App\controllers;
    use App\helpers\MovieDBAgent;

    class MovieController extends Controller {
        public function detail(){
            if(!isset($_GET['id']) || empty($_GET['id'])){
                $this->err(404, "Paramètre id non renseigné");
            }
            $apiRes = (new MovieDBAgent())->getDetail($_GET['id']);
            $this->render(template_path."/movies/movie.php", [
                ...$apiRes,
            ]);
        }

        public function search(){
            if(!isset($_GET['query']) || empty($_GET['query'])){
                header('location: '.base_uri);
            }
            $apiRes = (new MovieDBAgent())->search($_GET['query'] ?? '', $_GET['page'] ?? 1);
            $moviesCardRender = "";
            foreach($apiRes['results'] as $movie){
                $moviesCardRender.= self::addSubView(template_path."/components/movie_card.php", [
                    ...$movie,
                ]);
            }
            $this->render(template_path."/movies/search.php", [
                'query' => $_GET['query'],
                'cards'        => $moviesCardRender,
                'maxPage'     => $apiRes['total_pages'] ?? 0,
                'currentPage' => isset($_GET['page']) && !empty($_GET['page']) ? $_GET['page'] : 1,
            ]);
        }
    }

?>
