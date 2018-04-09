<?php

namespace AchillesKal\SummarizerBundle;

class TextSummarizer
{
    private $characterLimit;

    public function __construct(int $characterLimit = 100)
    {
        $this->characterLimit = $characterLimit;
    }

    public function summarize(string $text, $length = NULL): string
    {
        if(!$length) {
            $length = $this->characterLimit;
        }

        $summary = trim($text);
        if (strlen($summary) > $length)
        {
            $offset = ($length - 3) - strlen($summary);
            $summary = substr($summary, 0, strrpos($summary, '.', $offset)) . '...';
        }

        return $summary;
    }
}