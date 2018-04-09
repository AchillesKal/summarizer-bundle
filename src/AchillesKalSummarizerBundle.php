<?php

namespace AchillesKal\SummarizerBundle;


use AchillesKal\SummarizerBundle\DependencyInjection\AchillesKalSummarizerExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AchillesKalSummarizerBundle extends Bundle
{
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new AchillesKalSummarizerExtension();
        }
        return $this->extension;
    }

}