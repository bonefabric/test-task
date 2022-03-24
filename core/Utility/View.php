<?php
declare(strict_types=1);

namespace Core\Utility;

class View
{

    /**
     * Содержимое вида
     * @param string $view Название вида
     * @param string $type Расширение файла
     * @return string
     */
    public static function render(string $view, string $type = 'html'): string
    {
        return file_get_contents(ROOT_PATH . 'assets' .
            DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $view . '.' . $type);
    }
}
