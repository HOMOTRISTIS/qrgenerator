<?php
/**
 * Created by PhpStorm.
 * User: Alexandr Akhtyrskyi
 * Date: 08.06.2018
 * Time: 12:02
 */

namespace QRender\Generator;

use GuzzleHttp\ClientInterface;

/**
 * Class Generator
 * @package QRender\Generator
 */
class Generator implements GeneratorInterface{

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var string
     */
    private $endpoint;

    /**
     * Generator constructor.
     * @param ClientInterface $client
     * @param $endpoint string
     */
    public function __construct(ClientInterface $client, string $endpoint)
    {
        $this->endpoint = $endpoint;
        $this->client = $client;
    }

    /**
     * @param $text string
     * @param $width int
     * @param $height int
     * @return binary image
     */
    public function generate(string $text, int $width, int $height)
    {
        $response = $this->client->request('get', $this->endpoint, ['query' => [
            'cht' => 'qr',
            'chs' => sprintf('%dx%d', $width, $height),
            'chl' => $text,
        ]]);
        return $response->getBody()->getContents();
    }

}