<?php 
    namespace App\controllers;
    use App\helpers\MovieDBAgent;
    class HomeController extends Controller {
        function welcome(){
            $apiRes = (new MovieDBAgent())->getPopular($_GET['page'] ?? 1);
            $moviesCardRender = "";
            foreach($apiRes['results'] as $movie){
                $moviesCardRender.= self::addSubView(template_path."/components/movie_card.php", [
                    ...$movie,
                ]);
            }
            $this->render(template_path."/home.php", [
                'cards'        => $moviesCardRender,
                'maxPage'     => $apiRes['total_pages'] ?? 0,
                'currentPage' => isset($_GET['page']) && !empty($_GET['page']) ? $_GET['page'] : 1,
            ]);
        }
    }
?>