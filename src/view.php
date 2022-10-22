<?php

declare(strict_types=1);

namespace App;

class viewpor
{
    public function render(?string $page): void
    {
        include_once('./templates/layout.php');
    }
}
