<?php
/**
 * Created by PhpStorm.
 * User: achilleskal
 * Date: 4/12/18
 * Time: 7:29 AM
 */

namespace AchillesKal\SummarizerBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class ModifyApiResponseEvent extends Event
{
    private $data;

    public function __construct(string $data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @param string $data
     */
    public function setData(string $data): void
    {
        $this->data = $data;
    }

}