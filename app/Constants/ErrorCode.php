<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Constants;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;

/**
 * @Constants
 */
class ErrorCode extends AbstractConstants
{
    /**
     * @Message("数据验证失败")
     */
    const PARAMS_INVALID_MIDDLEWARE = 200;

    /**
     * @Message("获取二维码失败，请稍后重试")
     */
    const GET_QR_CODE = 2000;

    /**
     * @Message("参数错误,请重试")
     */
    const PARAMS_INVALID = 2001;

    /**
     * @Message("订单错误")
     */
    const ORDER_ERROR = 2002;

    /**
     * @Message("服务繁忙，请稍后再试")
     */
    const SERVER_ERROR = 2003;

    /**
     * @Message("验签失败")
     */
    const SIGN_ERROR = 2004;

    /**
     * @Message("IP验证失败")
     */
    const IP_ERROR = 2005;

    /**
     * @Message("充值金额未设定")
     */
    const ACCOUNT_ERROR = 2006;

    /**
     * @Message("获取用户失败")
     */
    const USER_ERROR = 2007;

    /**
     * @Message("金额列表未设定")
     */
    const AMOUNT_ERROR = 2008;

    /**
     * @Message("配置未设定")
     */
    const CONFIG_ERROR = 2009;

    /**
     * @Message("二维码已过期")
     */
    const EXPIRATION_DATE = 2010;

    /**
     * @Message("该用户未登录")
     */
    const LOGIN_ERROR = 2011;

    /**
     * @Message("该用户不在线")
     */
    const LOGINOUT_ERROR = 2012;

    /**
     * @Message("该用户已在线")
     */
    const ROBOTLOGIN_ERROR = 2013;

    /**
     * @Message("淘口令生成失败,请重新加入")
     */
    const TKL_ERROR = 2014;

    /**
     * @Message("不是淘宝商品,请重试")
     */
    const TAOBAOPRODUCT_ERROR = 2015;

    /**
     * @Message("请进行淘宝授权备案")
     */
    const TAOBAOSHOUQUAN_ERROR = 206;
    /**
     * @Message("最多选中5个群")
     */
    const QUANCOUNT_ERROR = 2017;
    /**
     * @Message("加入发圈队列失败，请重试")
     */
    const SENDONEKEY_FAIL = 2018;
    /**
     * @Message("只允许加入5个")
     */
    const SENDONEKEY_OVERDOSE = 2020;

    /**
     * @Message("用户不存在")
     */
    const USER_NOT_EXIST = 2021;

    /**
     * @Message("同步消息失败")
     */
    const POSTSYNC_ERROR = 2022;

    /**
     * @Message("获取群详情失败")
     */
    const CONTRACTDETAIL_FAIL = 2023;

    /**
     * @Message("获取群列表失败")
     */
    const CHATROOMLIST_FAIL = 2024;

    /**
     * @Message("移除失败")
     */
    const DESTROY_FAIL = 2025;

    /**
     * @Message("订单创建失败，请重试")
     */
    const ORDER_FAIL = 2026;

    /**
     * @Message("图片下载失败，请重试")
     */
    const IMG_FAIL = 2027;

    /**
     * @Message("发送失败，请重试")
     */
    const SEND_FAIL = 2028;

    /**
     * @Message("登陆次数超限，暂不能登录")
     */
    const LOGIN_SUM_FAIL = 2029;
    /**
     * @Message("首次登录微信后，云发单系统将强制保持微信登录6小时进行养号操作，在此期间微信不发单！！！")
     */
    const FIRST_LOGIN_AT = 2030;

    /**
     * @Message("请保持云发单在线3天以上,在此期间微信不发朋友圈！可发群")
     */
    const FIRST_LOGIN_AT_QUAN = 2034;

    /**
     * @Message("本月已领取，暂不能参加该活动")
     */
    const YFD_ADD_TIME = 2031;

    /**
     * @Message("云发单已到期，请充值后使用")
     */
    const TRIAL_AT_END = 2032;

    /**
     * @Message("请先停止发单")
     */
    const SEND_STATUS_TRUE = 2035;

    /**
     * @Message("非法请求")
     */
    const ILLEGAL_REQUEST = 2099;
}
