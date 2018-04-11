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
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

class TextSummarizerApiControllerTest extends TestCase
{
    public function testIndex()
    {
        $kernel = new AchillesKalSummarizerControllerKernel();
        $client = new Client($kernel);
        $client->request('GET', '/api/');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
    }
}


class AchillesKalSummarizerControllerKernel extends Kernel
{
    use MicroKernelTrait;

    public function __construct()
    {
        parent::__construct('test', true);
    }

    public function registerBundles()
    {
        return [
            new AchillesKalSummarizerBundle(),
            new FrameworkBundle()
        ];
    }

    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        $routes->import(__DIR__.'/../../src/Resources/config/routes.xml', '/api');
    }

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        $c->loadFromExtension('framework', [
            'secret' => 'F00',
        ]);
    }


    public function getCacheDir()
    {
        return __DIR__.'/../cache/'.spl_object_hash($this);
    }
}