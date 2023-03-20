<?php 
    namespace App\controllers;

    class Controller{
        private static String $err404DefaultMessage = "Vous vous êtes perdue ?";

        function render(String $file, $args = []){
            $content = self::addSubView($file, $args);
            extract($args);
            $title = $_ENV['APP_NAME']. (isset($args['title']) && !empty($args['title']) 
                ? " - ".$args['title'] 
                : ''
            );
            require_once(root_path.'/app/templates/default.php');
        }

        function err(int $errorCode, String $errorMsg = null){
            $this->render(template_path."/errors/error_template.php", ['title' => $errorCode, 'errorMsg' => $errorMsg  ?? self::$err404DefaultMessage , 'errorCode' => $errorCode]);
        }

        function verifyPost(Array $requiredKeys){
            $keyCheck = '';
            foreach ($requiredKeys as $indexKey => $valueKey){
                if (!isset($_POST[$valueKey]) || empty($_POST[$valueKey])){
                    $keyCheck = $valueKey; 
                    break;
                }
            }
            return $keyCheck;
        }

        static function addSubView(String $file, $args = []){
            if(!file_exists($file)){
                $errorMsg = "Vue introuvable";
                $errorCode = 404;
                ob_start();
                require_once template_path."/errors/error_template.php";
                return ob_get_clean();
            }

            if (is_array($args)){
                extract($args);
            }
            ob_start();
            include $file;
            return ob_get_clean();
        }
    }
?>