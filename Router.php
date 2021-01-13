<?php 

require_once 'Database.php';

class Router
{
    public $pages;
    public $db;
    public function __construct()
    {
        $this->pages = [];
        $this->db = new DB();
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
                        header("Location: add");
                        exit;
                }
                elseif($request === '/update'){
                    // echo '<pre>';
                    // var_dump($_REQUEST);
                    // echo '</pre>';
                    // exit;
                    $_SESSION['update_info'] = $this->updateData($_REQUEST);
                    // return '/update.php';
                    header('Location: update');
                    session_write_close();
                    exit;
                }
                elseif($request === '/update_entry'){
                    // echo '<pre>';
                    // var_dump($_REQUEST);
                    // echo '</pre>';
                    // exit;
                    if(strlen($_REQUEST['name']) && strlen($_REQUEST['surname']) && strlen($_REQUEST['age'])){    
                        $this->updateDataInDb($_REQUEST);
                        header("Location: /");
                        exit;
                    }
                    header('Location: update');
                    exit;
                }

                elseif($request === '/delete'){
                    $this->deleteRecord($_REQUEST);
                    header('Location: /');
                    exit;
                }
                header("Location: /");
                exit;
            }
        }
    }
    public function dbData()
    {   
        $result = $this->db->getAll();
        return $result;
    }

    public function addData($data)
    {   
        $this->db->addData($data);
    }

    public function updateData($data)
    {   
        return $this->db->getForUpdate($data);
    }

    public function updateDataInDb($data)
    {   
        $this->db->update($data);
    }

    public function deleteRecord($data)
    {   
        $this->db->delete($data);
    }
}
?>