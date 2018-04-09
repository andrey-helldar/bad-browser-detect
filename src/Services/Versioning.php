<?php

namespace Helldar\BadBrowser\Services;

use Helldar\BadBrowser\Traits\Services;

class Versioning
{
    use Services;

    /**
     * @var string
     */
    protected $public_path = null;

    /**
     * @param $filename
     *
     * @return mixed
     */
    public function mix($filename)
    {
        $dir = $this->publicPath();
        $filename = ltrim($filename, '/');

        return $this->filenameWithHash($dir . $filename);
    }

    /**
     * @param string $path
     *
     * @return bool
     */
    protected function fileExists($path)
    {
        return file_exists(public_path($path));
    }

    /**
     * @return string
     */
    protected function publicPath()
    {
        if (!$this->public_path) {
            $this->public_path = config('bad_browser_constants.assets_public_path', '/');
        }

        return str_finish($this->public_path, '/');
    }

    /**
     * @param string $filename
     *
     * @return string
     */
    protected function getHash($filename)
    {
        return sha1_file($filename);
    }

    /**
     * @param $filename
     *
     * @return mixed
     */
    protected function filenameWithHash($filename)
    {
        $hash = $this->getHash($filename);
        $path = sprintf('%s?id=%s', $filename, $hash);

        return asset($path);
    }
}
