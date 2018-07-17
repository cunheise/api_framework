<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/17
 * Time: 13:47
 */

namespace App\Aspect;

use Go\Aop\Aspect;
use Psr\SimpleCache\CacheInterface;

/**
 * Class CacheAspect
 * @package App\Aspect
 */
class CacheAspect implements Aspect
{
    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * CacheAspect constructor.
     * @param CacheInterface $cache
     */
    public function __construct(CacheInterface $cache)
    {
        $this->cache = $cache;
    }


}