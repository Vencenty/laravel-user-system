<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    protected $table = 'ims_ewei_shop_member';

    protected $rememberTokenName = '';

    protected $fillable = ['code'];

    public $timestamps = false;

    public function getAuthPassword()
    {
        return [
            'password' => $this->attributes['pwd'],
            'salt' => $this->attributes['salt']
        ];
    }

    /**
     * 一个用户对应多个转账日志
     */
    public function hasManyTransferLog()
    {
        return $this->hasMany(MemberLog::class, 'openid', 'openid');
    }

    /**
     * 一个用户对应多个奖金信息
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hasManyBonus()
    {
        return $this->hasMany(Bonus::class,'mid','id');
    }

    /**
     * 一个用户关联一个海报
     */
    public function hasOneQR()
    {
        return $this->hasOne(QR::class, 'openid', 'openid');
    }

    /**
     * 一个用户关联多个购物车
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hasManyAddress()
    {
        return $this->hasMany(Address::class, 'openid', 'openid');
    }

    /**
     * 获取当前用户的上级推荐人
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hasOneAgent()
    {
        return $this->hasOne(User::class, 'id', 'pid');
    }
    //-----------------------------以下为业务逻辑代码----------------------------

    /**
     * 返回会员中心所需要的数据
     * 返回会员中心所需要的数据
     * @return array
     */
    static function getCenterData()
    {
        // 获取当前用户ID
        $id = auth()->id();

        // 获取当前用户所有微销订单信息
        $orders = (new static)->getOrderList();

        // 获取当前用户默认地址信息
        //$addressData = auth()->user()->hasManyAddress()->where('isdefault', 1)->first();


        /*address = $addressData->province .
            $addressData->city .
            $addressData->area .
            $addressData->address .
            $addressData->street;
        */


        return [
            'orders' => $orders,
        //    'address' => $address,
        ];
    }


    /**
     * 获取当前用户的所有订单信息
     * @return array
     */
    protected function getOrderList()
    {
        $openid = auth()->user()->openid;

        $orders = Order::where(['openid' => $openid])
            ->where('status', '>=', '0')
            ->orderBy('createtime', 'desc')
            ->get()
            ->toArray();

        $order_goods = OrderGoods::where(['openid' => $openid])
            ->get()
            ->toArray();

        $goods = Goods::whereIn('id', collect($order_goods)->pluck('goodsid'))
            ->get()
            ->toArray();

        $temp = [];

        foreach ($orders as $order) {
            foreach ($order_goods as $item) {
                if ($order['id'] == $item['orderid']) {
                    foreach ($goods as $v) {
                        if ($v['id'] == $item['goodsid']) {
                            $temp[$order['id']]['goods_info'][$v['id']]['title'] = $v['title'];
                            $temp[$order['id']]['goods_info'][$v['id']]['thumb'] = $v['thumb'];
                            $temp[$order['id']]['goods_info'][$v['id']]['total'] = $item['total'];
                            $temp[$order['id']]['goods_info'][$v['id']]['realprice'] = $item['realprice'];
                            $temp[$order['id']]['createtime'] = $order['createtime'];
                            $temp[$order['id']]['ordersn'] = $order['ordersn'];
                            $temp[$order['id']]['goodsprice'] = $order['goodsprice'];
                            $temp[$order['id']]['status'] = $order['status'];
                        }
                    }
                }
            }
        }

        return $temp;

    }

    /**
     * 存储用户支付密码
     * @return array
     */

    static function storePayPassword( $payPassword )
    {

    }

}
