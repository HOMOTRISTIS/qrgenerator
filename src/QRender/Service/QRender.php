<?php
/**
 * Created by PhpStorm.
 * User: Alexandr Akhtyrskyi
 * Date: 08.06.2018
 * Time: 11:17
 */

namespace QRender\Service;

use GuzzleHttp\ClientInterface;
use QRender\Generator\Generator;

/**
 * QRCode render service
 */
class QRender {

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var string
     */
    private $endpoint = null;

    /**
     * @var string
     */
    private $data = null;

    /**
     * @var int
     */
    private $w = null;

    /**
     * @var int
     */
    private $h = null;

    /**
     * @param ClientInterface $client
     * @param string $endpoint
     */
    public function init(ClientInterface $client, string $endpoint) {
        $this->client = $client;
        $this->endpoint = $endpoint;
    }

    /**
     * @param string $data
     * @param int $w
     * @param int $h
     */
    public function setData(string $data, int $w, int $h)
    {
        $this->setDimensions($w, $h);
        $this->setData($data);
    }

    /**
     * @return \QRender\Generator\binary
     */
    public function generate() {
        $generator = new Generator($this->client, $this->endpoint);
        return $generator->render($this->data, $this->w, $this->h);
    }

    /**
     * @param $w int
     * @param $h int
     * @return $this
     */
    private function setDimensions(int $w, int $h) {
        $this->w = $w;
        $this->h = $h;
        return $this;
    }
}