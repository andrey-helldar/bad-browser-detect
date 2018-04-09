<?php

namespace Helldar\BadBrowser\Traits;

trait Services
{
    /**
     * @return $this
     */
    public static function init()
    {
        return new self();
    }
}
