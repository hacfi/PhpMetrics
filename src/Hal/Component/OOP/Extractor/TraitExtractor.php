<?php

/*
 * (c) Jean-François Lépine <https://twitter.com/Halleck45>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hal\Component\OOP\Extractor;

use Hal\Component\OOP\Reflected\ReflectedTrait;
use Hal\Component\Token\TokenCollection;


/**
 * @author Jean-François Lépine <https://twitter.com/Halleck45>
 */
class TraitExtractor implements ExtractorInterface {

    /**
     * @var Searcher
     */
    private $searcher;

    /**
     * @var string
     */
    private $namespace;

    /**
     * Constructor
     *
     * @param Searcher $searcher
     */
    public function __construct(Searcher $searcher)
    {
        $this->searcher = $searcher;
    }

    /**
     * Extract class from position
     *
     * @param $n
     * @param TokenCollection $tokens
     * @return ReflectedInterface
     */
    public function extract(&$n, TokenCollection $tokens)
    {
        $classname = $this->searcher->getFollowingName($n, $tokens);

        return new ReflectedTrait($this->namespace, trim($classname));
    }

    /**
     * @param string $namespace
     */
    public function setNamespace($namespace)
    {
        $this->namespace = (string) $namespace;
    }

};
