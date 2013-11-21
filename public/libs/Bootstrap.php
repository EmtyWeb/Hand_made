<?php

class Bootstrap {

    private $_url = null;
    private $_controller = null;

    private $_controllerPath = 'controllers/'; // Всегда включает слеш
    private $_modelPath = 'models/';  // Всегда включает слеш
    private $_errorFile = 'error.php';
    private $_defaultFile = 'index.php';


     //Запускаем Bootstrap

    public function init()
    {
        // Устанавливает защищен $ _url
        $this->_getUrl();

        //  Загрузка контроллера по умолчанию, если нет ни одного URL
        // Например: Посетить http://localhost он загружает контроллер по умолчанию
        if (empty($this->_url[0])) {
            $this->_loadDefaultController();
            return false;
        }

        $this->_loadExistingController();
        $this->_callControllerMethod();
    }

        // устанавливаем путь к контроллеру
    public function setControllerPath($path)
    {
        $this->_controllerPath = trim($path, '/') . '/';
    }

        //Установка пути к моделям
    public function setModelPath($path)
    {
        $this->_modelPath = trim($path, '/') . '/';
    }


        // Задавание указанием пути к файлу ошибке

    public function setErrorFile($path)
    {
        $this->_errorFile = trim($path, '/');
    }

        //Задавание указанием пути к файлу ошибке
    public function setDefaultFile($path)
    {
        $this->_defaultFile = trim($path, '/');
    }


     // Выбирает из $ _GET "URL"

    private function _getUrl()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }


     // если нет URL параметра

    private function _loadDefaultController()
    {
        require $this->_controllerPath . $this->_defaultFile;
        $this->_controller = new Index();
        $this->_controller->index();
    }


     // Загружается если сушествует URL параметр

    private function _loadExistingController()
    {
        $file = $this->_controllerPath . $this->_url[0] . '.php';

        if (file_exists($file)) {
            require $file;
            $this->_controller = new $this->_url[0];
            $this->_controller->loadModel($this->_url[0], $this->_modelPath);
        } else {
            $this->_error();
            return false;
        }
    }

    /**
     * Если передается параметр URL методом GET
     *
     *  http://localhost/controller/method/(param)/(param)/(param)
     *  url[0] = Controller
     *  url[1] = Method
     *  url[2] = Param
     *  url[3] = Param
     *  url[4] = Param
     */
    private function _callControllerMethod()
    {
        $length = count($this->_url);

        // Есть ли метод который мы вызываем
        if ($length > 1) {
            if (!method_exists($this->_controller, $this->_url[1])) {
                $this->_error();
            }
        }

        // Определяем что загружать
        switch ($length) {
            case 2:
                //Controller->Method(Param1, Param2)
                $this->_controller->{$this->_url[1]}($this->_url[2]);
                break;

            case 1:
                //Controller->Method(Param1, Param2)
                $this->_controller->{$this->_url[1]}();
                break;

            default:
                $this->_controller->index();
                break;
        }
    }


     // Показывает страницу с ошибкой, если ничего не существует

    private function _error() {
        require $this->_controllerPath . $this->_errorFile;
        $this->_controller = new Error();
        $this->_controller->index();
        exit;
    }

}