<?php

namespace Fideni\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class FideniUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
