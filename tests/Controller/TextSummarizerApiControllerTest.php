<?php
/**
 * Created by PhpStorm.
 * User: achilleskal
 * Date: 4/12/18
 * Time: 12:30 AM
 */

namespace AchillesKal\SummarizerBundle\Tests\Controller;


use AchillesKal\SummarizerBundle\AchillesKalSummarizerBundle;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;

class TextSummarizerApiControllerTest extends TestCase
{
    public function testIndex()
    {

    }
}


class AchillesKalSummarizerControllerKernel extends Kernel
{
    public function __construct()
    {
        parent::__construct('test', true);
    }

    public function registerBundles()
    {
        return [
            new AchillesKalSummarizerBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(function(ContainerBuilder $container) {
        });
    }

    public function getCacheDir()
    {
        return __DIR__.'/../cache/'.spl_object_hash($this);
    }
}