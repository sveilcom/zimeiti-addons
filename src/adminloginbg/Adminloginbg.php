<?php

// +----------------------------------------------------------------------
// | Addons for sveil/zimeiti-cms
// +----------------------------------------------------------------------
// | Copyright (c) 2019-2020 KuangJia Inc.
// +----------------------------------------------------------------------
// | Website: https://sveil.com
// +----------------------------------------------------------------------
// | License ( https://mit-license.org )
// +----------------------------------------------------------------------
// | gitee：https://gitee.com/sveil/zimeiti-addons
// | github：https://github.com/sveil/zimeiti-addons
// +----------------------------------------------------------------------

namespace addons\adminloginbg;

use think\Addons;

/**
 * 登录背景图插件
 */
class Adminloginbg extends Addons
{

    /**
     * 插件安装方法
     * @return bool
     */
    public function install()
    {
        return true;
    }

    /**
     * 插件卸载方法
     * @return bool
     */
    public function uninstall()
    {
        return true;
    }

    public function adminLoginInit(\think\Request &$request)
    {
        $config = $this->getConfig();
        if ($config['mode'] == 'random' || $config['mode'] == 'daily') {
            $index      = $config['mode'] == 'random' ? mt_rand(1, 4000) : date("Ymd") % 4000;
            $background = "http://img.infinitynewtab.com/wallpaper/" . $index . ".jpg";
        } else {
            $background = $config['image'];
        }
        \think\View::instance()->assign('background', $background);
    }

}
