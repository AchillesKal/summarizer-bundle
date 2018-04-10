<?php

namespace AchillesKal\SummarizerBundle\Tests;


use AchillesKal\SummarizerBundle\AchillesKalSummarizerBundle;
use AchillesKal\SummarizerBundle\TextSummarizer;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Symfony\Component\HttpKernel\Kernel;

class FunctionalTest extends TestCase
{
    public function testServiceWiring()
    {
        $kernel = new AchillesKalTextSummarizerTestingKernel('text', true);
        $kernel->boot();

        $container = $kernel->getContainer();

        $summarizer = $container->get('achilleskal_summarizer.text_summarizer');

        $this->assertInstanceOf(TextSummarizer::class, $summarizer);
    }
}

class AchillesKalTextSummarizerTestingKernel extends Kernel
{
    public function registerBundles()
    {
        return [
            new AchillesKalSummarizerBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {

    }
}