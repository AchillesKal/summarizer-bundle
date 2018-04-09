<?php

namespace AchillesKal\SummarizerBundle\Tests;

use PHPUnit\Framework\TestCase;
use App\Service\TextSummarizer;

class TextSummarizerTest extends TestCase
{

    public function testSummarize()
    {
        $text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin iaculis quis diam sit amet lacinia. Cras iaculis in sapien vitae ullamcorper. Quisque magna libero, blandit sit amet maximus eu, dictum non dolor. Duis vulputate non enim ac condimentum. Cras viverra quam id magna tincidunt, vitae commodo enim fermentum. Proin et massa a nulla suscipit ullamcorper vel ut tortor. Curabitur ex libero, elementum dapibus eros faucibus, varius sodales nisl. Aliquam rutrum fringilla augue in congue. Nam interdum fermentum est, ac semper mauris finibus vitae.";

        $expectedText = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin iaculis quis diam sit amet lacinia. Cras iaculis in sapien vitae ullamcorper. Quisque magna libero, blandit sit amet maximus eu, dictum non dolor. Duis vulputate non enim ac condimentum...";
        $testSummarizer = new TextSummarizer();

        $summary = $testSummarizer->summarize($text);

        $this->assertTrue($expectedText == $summary);
    }

}