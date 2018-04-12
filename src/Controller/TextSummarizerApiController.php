<?php
/**
 * Created by PhpStorm.
 * User: achilleskal
 * Date: 4/11/18
 * Time: 10:26 PM
 */

namespace AchillesKal\SummarizerBundle\Controller;

use AchillesKal\SummarizerBundle\Event\ModifyApiResponseEvent;
use AchillesKal\SummarizerBundle\TextSummarizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;


class TextSummarizerApiController extends AbstractController
{
    private $textSummarizer;

    private $eventDispatcher;

    public function __construct(TextSummarizer $textSummarizer, EventDispatcherInterface $eventDispatcher = null)
    {
        $this->textSummarizer = $textSummarizer;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function index()
    {

        $data = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin iaculis quis diam sit amet lacinia. Cras iaculis in sapien vitae ullamcorper. Quisque magna libero, blandit sit amet maximus eu, dictum non dolor. Duis vulputate non enim ac condimentum. Cras viverra quam id magna tincidunt, vitae commodo enim fermentum. Proin et massa a nulla suscipit ullamcorper vel ut tortor. Curabitur ex libero, elementum dapibus eros faucibus, varius sodales nisl. Aliquam rutrum fringilla augue in congue. Nam interdum fermentum est, ac semper mauris finibus vitae.";

        $event = new ModifyApiResponseEvent($data);

        if ($this->eventDispatcher) {
            $this->eventDispatcher->dispatch('achilleskal.modify_api', $event);
        }

        return $this->json([
            'summary' => $this->textSummarizer->summarize($event->getData())
        ]);
    }
}