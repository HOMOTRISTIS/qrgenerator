<?php
/**
 * Created by PhpStorm.
 * User: Alexandr Akhtyrskyi
 * Date: 08.06.2018
 * Time: 12:02
 */

namespace QRender\Generator;

/**
 * Interface GoogleChartsGeneratorInterface
 * @package QRender\Generator
 */
interface GeneratorInterface {

    /**
     * @param $text string
     * @param $width int
     * @param $height int
     *
     * @return mixed
     */
    public function generate(string $text, int $width, int $height);

}