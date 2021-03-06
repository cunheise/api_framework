<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/17
 * Time: 13:33
 */

namespace App;


use Go\Core\AspectContainer;
use Go\Core\AspectKernel as BaseAspectKernel;
use Pimple\Container;

/**
 * Class AspectKernel
 * @package App
 */
class AspectKernel extends BaseAspectKernel
{
    /**
     * @var Container $diContainer
     */
    protected $diContainer;

    /**
     * @param array $options
     */
    public function init(array $options = [])
    {
        $this->diContainer = $options['diContainer'];
        unset($options['diContainer']);
        return parent::init($options); // TODO: Change the autogenerated stub
    }


    /**
     * @param AspectContainer $container
     */
    protected function configureAop(AspectContainer $container)
    {
    }

}