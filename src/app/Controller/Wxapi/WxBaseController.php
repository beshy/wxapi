<?php
/**
 * greentea.
 *
 * Author: wudi <wudi23@baidu.com>
 * Date: 2015/09/21
 */

namespace App\Controller\Wxapi;

use App\Controller\BaseController;

class WxBaseController extends BaseController
{

    protected $container;
    protected $view;
    protected $logger;
    protected $config;

    public function __construct($container)
    {
        $this->container = $container;
        $this->view = $this->container->get('view');
        $this->logger = $this->container->get('logger');
        $this->config = $this->container->get('config');
        $this->logger->alert(__CLASS__.' __constructed');
    }

}
