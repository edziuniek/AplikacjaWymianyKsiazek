<?php

namespace FrontendBundle;

use FrontendBundle\DependencyInjection\FrontendBundleExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class FrontendBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new FrontendBundleExtension();
    }
}
