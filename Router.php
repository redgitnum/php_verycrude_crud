<?php 

require_once 'Database.php';

class Router
{
    public $pages;
    public function __construct()
    {
        $this->pages = [];
    }

    public function get($url)
    {
        $this->pages[] .= $url;
    }

    public function resolve()
    {
        foreach ($this->pages as $page) {
            $request = $_SERVER['REQUEST_URI'];
            if($_SERVER['REQUEST_METHOD'] !== 'POST'){
                if($request === '/'){
                    return 'index.php';
                }
                elseif ($request === $page) {
                    return trim($page, '/').'.php';
                }
            } else {
                if($request === '/add'){
                    // echo '<pre>';
                    // var_dump(strlen($_REQUEST['name']));
                    // echo '</pre>';
                    // exit;
                    if(strlen($_REQUEST['name']) && strlen($_REQUEST['surname']) && strlen($_REQUEST['age']))
                        $this->addData($_REQUEST);
                        return '/add.php';
                }
                elseif($request === '/update'){
                    echo '<pre>';
                    var_dump($_REQUEST);
                    echo '</pre>';
                    exit;
                    if(strlen($_REQUEST['name']) && strlen($_REQUEST['surname']) && strlen($_REQUEST['age']))
                        $this->addData($_REQUEST);
                        return '/add.php';
                }
              
            }
        }
    }

    public function dbData()
    {   
        $db = new DB();
        $result = $db->getAll();
        return $result;
    }

    public function addData($data)
    {   
        $db = new DB();
        $db->addData($data);
    }
}
?>