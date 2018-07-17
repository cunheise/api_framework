<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/13
 * Time: 11:45
 */

namespace Api\Service;


use Medoo\Medoo;

/**
 * Class AbstractService
 * @package Api\Service
 */
abstract class AbstractService
{
    /**
     * @var Medoo
     */
    protected $db;

    /**
     * HomeService constructor.
     * @param Medoo $db
     */
    public function __construct(Medoo $db)
    {
        $this->db = $db;
    }
}