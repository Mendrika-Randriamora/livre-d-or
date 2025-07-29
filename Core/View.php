<?php

namespace Core;

class View
{
    public static function render(string $path, array $data = [])
    {
        if ($data) 
            extract($data);

        $view_path = "./views/" . $path . ".php";

        ob_start();
        require_once $view_path;
        $content = ob_get_clean();
        require_once "./elements/layout.php";
    }
}
