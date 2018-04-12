<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    // 冻结奖金类型
    const FROZEN_TYPE = [1,2 ];
    const BONUS_LIMIT = 50000;

    protected $table = 'ims_ewei_shop_wxbouns';

    // ---------------下面是业务逻辑----------------------

    /**
     * 获取首页数据
     * @return array
     */
    static function getHomeData()
    {
        // 获取当前登录用户的ID
        $id = auth()->id();

        // 昨天的时间
        $dateArr = explode( '-', date( 'Y-m-d', strtotime( '-1 day' ) ) );

        $yesterday = [
            'datey' => (int)$dateArr[0],
            'datemon' => (int)$dateArr[1],
            'dated' => (int)$dateArr[2],
        ];


        // 总收益(静态)
        $static_total = static::where( 'mid', $id )
            ->where( 'bounstype', 11 )
            ->sum( 'bouns' );

        // 总收入(个人)
        $income = static::where( [ 'mid' => $id ] )
            ->whereIn( 'bounstype', [ 0, 1, 2, 8, 11 ] )
            ->groupBy( 'mid' )
            ->sum( 'bouns' );
        // 前日分红
        $yesterday_share = static::where( 'mid', $id )
            ->where( 'bounstype', 11 )
            ->where( $yesterday )
            ->sum( 'bouns' );

        // 前日奖金
        $yesterday_bonus = static::where( 'mid', $id )
            ->where( 'bouns', '>', 0 )
            ->where( $yesterday )
            ->sum( 'bouns' );


        return [
            'yesterday_share' => $yesterday_share,
            'yesterday_bonus' => $yesterday_bonus,
            'static_total' => $static_total,
            'income' => $income,
        ];

    }

    /**
     * 获取 总收入(个人)
     * @return array
     */
    static function getIncome()
    {
        $id = auth()->id();

        // 冻结奖金
        $frozen = static::where( 'mid', $id )
            ->where( 'bouns', '>', 0 )
            ->whereIn( 'type', self::FROZEN_TYPE )->sum( 'bouns' );

        // 可提
        $bonus = static::where( [ 'mid' => $id, 'type' => 0 ] )
            ->sum( 'bouns' );

        // 提现记录
        $records = MemberLog::where( function ( $query ) {
            $query->where( [ 'openid' => auth()->user()->openid, 'type' => 1 ] )
                ->where( 'status', '>=', 0 );
        } )
            ->Where( function ( $query ) {
                $query->where( 'logmobile', '>', 0 )
                    ->orWhere( 'bankname', '<>', '' );
            } )
            ->OrderBy( 'createtime', 'desc' )
            ->paginate( 20 );

        return [
            'bonus' => $bonus,
            'frozen' => $frozen,
            'records' => $records
        ];

    }

    /**
     * 获取 总收益(静态)
     * @return array
     */
    static function getStaticBonus()
    {
        $id = auth()->id();

        $frozen = static::where( 'mid', $id )->whereIn( 'type', self::FROZEN_TYPE )->where( 'bounstype', 11 )->sum( 'bouns' );
        $unfrozen = static::where( 'mid', $id )->where( 'type', 0 )->where( 'bounstype', 11 )->sum( 'bouns' );

        return [
            'frozen' => $frozen,
            'unfrozen' => $unfrozen
        ];
    }

    /**
     * 获取前日分红
     * @return array
     */
    static function getYesterdayShare()
    {
        $id = auth()->id();

        $dateArr = explode( '-', date( 'Y-m-d', strtotime( '-1 day' ) ) );

        $yesterday = [
            'datey' => (int)$dateArr[0],
            'datemon' => (int)$dateArr[1],
            'dated' => (int)$dateArr[2],
        ];

        $frozen = static::where( 'mid', $id )
            ->where( 'bounstype', 11 )
            ->whereIn( 'type', self::FROZEN_TYPE )
            ->where( $yesterday )
            ->sum( 'bouns' );

        $unfrozen = static::where( 'mid', $id )
            ->where( 'bounstype', 11 )
            ->where( 'type', 0 )
            ->where( $yesterday )
            ->sum( 'bouns' );

        return [
            'frozen' => $frozen,
            'unfrozen' => $unfrozen
        ];
    }

    /**
     * 获取 前日奖金
     * @return array
     */
    static function getYesterdayBonus()
    {
        $id = auth()->id();

        $dateArr = explode( '-', date( 'Y-m-d', strtotime( '-1 day' ) ) );

        $yesterday = [
            'datey' => (int)$dateArr[0],
            'datemon' => (int)$dateArr[1],
            'dated' => (int)$dateArr[2],
        ];
        $frozen = static::where( 'mid', $id )
            ->where( 'bouns', '>', 0 )
            ->whereIn( 'type', self::FROZEN_TYPE )
            ->where( $yesterday )
            ->sum( 'bouns' );
        $unfrozen = static::where( 'mid', $id )
            ->where( 'bouns', '>', 0 )
            ->where( 'type', 0 )
            ->where( $yesterday )
            ->sum( 'bouns' );

        return [
            'frozen' => $frozen,
            'unfrozen' => $unfrozen
        ];
    }

    /**
     * 返回奖金查询里面各类奖金信息
     * @return array
     */
    static function getBonusQueryData()
    {
        $id = auth()->id();

        // 环润积分
        $hrCredit = 0;

        // 冻结奖金
        $frozen = static::where( 'mid', $id  )
            ->whereIn('type',self::FROZEN_TYPE)
            ->sum( 'bouns' );

        // 非冻结总奖金
        $unfrozen = static::where( [ 'type' => 0, 'mid' => $id ] )
            ->where( 'bouns', '>', 0 )
            ->sum( 'bouns' );

        // 商城余额
        $mallBalance = auth()->user()->credit2;

        // 复购余额
        $fgBalance = auth()->user()->fgbouns;

        // 可提奖金
        $bonus = auth()->user()->wxbouns;

        return [
            'hrCredit' => $hrCredit,
            'frozen' => $frozen,
            'unfrozen' => $unfrozen,
            'mallBalance' => $mallBalance,
            'fgBalance' => $fgBalance,
            'bonus' => $bonus
        ];

    }

    /**
     * 返回奖金管理界面数据
     * @return array
     */
    static function getBonusData()
    {
        $user = auth()->user();
        $id = $user->id;

        // 一代的人
        $firstGeneration = User::where( [ 'pid' => $id ] )
            ->where( 'gid', '>', 1 )
            ->get( [ 'id' ] );

        // 二代的人
        $secondGeneration = User::whereIn( 'pid', $firstGeneration->pluck( 'id' ) )
            ->where( 'gid', '>', 1 )
            ->get( [ 'id' ] );

        // 一代总人数
        $firstGenerationPeople = count( $firstGeneration );

        // 二代推荐总人数
        $secondGenerationPeole = count( $secondGeneration );

        // 一代分享总奖金
        $firstGenerationBonus = static::where( [ 'bounstype' => 0, 'mid' => $id ] )
            ->whereIn( 'fromid', $firstGeneration->pluck( 'id' ) )
            ->sum( 'bouns' );

        // 二代分享总额
        $secondGenerationBonus = static::where( [ 'bounstype' => 0, 'mid' => $id ] )
            ->whereIn( 'fromid', $secondGeneration->pluck( 'id' ) )
            ->sum( 'bouns' );

        // 积分明细( 积分总额 )
        $credit = static::where( 'mid', $id )
            ->where( 'bouns', '>', 0 )
            ->sum( 'costprice' );

        // 管理奖金
        $managerBonus = static::whereIn( 'bounstype', [ 1, 2 ] )
            ->where( 'mid', $id )
            ->sum( 'bouns' );

        // 个人网体总业绩(所有)
        $personalNet = static::where( [ 'mid' => $id, 'bounstype' => 1 ] )->sum( 'bouns' );
        // 团队网体业绩(所有)
        $teamNet = static::where( [ 'mid' => $id, 'bounstype' => 2 ] )->sum( 'bouns' );

        return [
            'firstGenerationPeople' => $firstGenerationPeople,
            'secondGenerationPeole' => $secondGenerationPeole,
            'firstGenerationBonus' => $firstGenerationBonus,
            'secondGenerationBonus' => $secondGenerationBonus,
            'managerBonus' => $managerBonus,
            'personalNet' => $personalNet,
            'teamNet' => $teamNet,
            'credit' => $credit
        ];

    }

    /**
     * 一代分享人数数据
     * @return array
     */
    static function getFirstGenerationPeopleData()
    {
        $id = auth()->id();
        // 获得当前用户的一代数据
        $agents1 = User::where( 'pid', $id )
            ->get( [ 'nickname', 'creditotal', 'wxlevel', 'id' ] );

        // 所有的分红
        $share = static::whereIn( 'fromid', $agents1->pluck( 'id' ) )
            ->where( [ 'bounstype' => 0, 'mid' => $id ] )
            ->get();

        if ( !$share->isEmpty() ) {
            foreach ( $agents1 as $key => $agent1 ) {
                foreach ( $share as $item ) {
                    if ( $item['fromid'] == $agent1['id'] ) {
                        $agents1[ $key ]['share'] += $item['bouns'];
                    } else {
                        $agents1[ $key ]['share'] += 0;
                    }
                }
            }
        } else {
            foreach ( $agents1 as $key => $agent1 ) {
                $agents1[ $key ]['share'] = 0;
            }
        }

        return $agents1;
    }

    /**
     * 二代分享人数数据
     * @return array
     */
    static function getSecondGenerationPeopleData()
    {

        $id = auth()->id();

        $agents1 = User::where( 'pid', $id )
            ->get( [ 'id' ] );

        // 获得二代用户
        $agents2 = User::whereIn( 'pid', $agents1->pluck( 'id' ) )
            ->get( [ 'nickname', 'creditotal', 'wxlevel', 'id' ] );

        $share = static::whereIn( 'fromid', $agents2->pluck( 'id' ) )
            ->where( [ 'bounstype' => 0, 'mid' => $id ] )
            ->get( [ 'fromid', 'mid', 'bouns' ] );

        if ( !$share->isEmpty() ) {
            foreach ( $agents2 as $key => $agent2 ) {
                foreach ( $share as $item ) {
                    if ( $item['fromid'] == $agent2['id'] ) {
                        $agents2[ $key ]['share'] += $item['bouns'];
                    } else {
                        $agents2[ $key ]['share'] += 0;
                    }
                }
            }
        } else {
            foreach ( $agents2 as $key => $agent2 ) {
                $agents2[ $key ]['share'] = 0;
            }
        }

        return $agents2;
    }

    /**
     * 二代分享人数数据
     * @return array
     */
    static function getCreditData()
    {
        $id = auth()->id();
        // 消费积分
        $costCredit = User::where( 'id', $id )->first()->costcredit;
        // 环润积分
        $records = Bonus::where( 'mid', $id )
            ->orderBy( 'datey', 'desc' )
            ->orderBy( 'datemon', 'desc' )
            ->orderBy( 'dated', 'desc' )
            ->paginate( 50 );

        return [
            'costCredit' => $costCredit,
            'records' => $records
        ];

    }

    /**
     * 管理奖金数据
     * @return array
     */
    static function getManagerBonusData()
    {
        $id = auth()->id();
        // 倒数五天以内的数据
        $current_time = date( 'Y-m-d', time() );

        $dates = [];
        for ( $i = 1; $i < 6; $i ++ ) {
            $dates[ $i ] = date( 'Y-m-d', strtotime( $current_time ) - $i * 86400 );
        }

        // 当前用户的所有管理奖
        $personal_bouns = Bonus::whereIn( 'bounstype', [ 1, 2 ] )
            ->where( 'mid', $id )
            ->get();

        // 所有的个人网体下级
        $personal_user = User::whereIn( 'id', $personal_bouns->pluck( 'fromid' ) )
            ->get( [ 'nickname', 'realname', 'id', 'wxlevel' ] );

        $temp = [];
        foreach ( $dates as $key => $date ) {
            $date_arr = explode( '-', $date );
            $year = $date_arr[0];
            $month = $date_arr[1];
            $day = $date_arr[2];

            foreach ( $personal_user as $user ) {
                foreach ( $personal_bouns as $bouns ) {
                    if ( $bouns['fromid'] == $user['id'] ) {
                        if ( $bouns['datey'] == $year && $bouns['datemon'] == $month && $bouns['dated'] == $day ) {
                            $temp[ $date ][ $user['id'] ]['nickname'] = $user['nickname'];
                            $temp[ $date ][ $user['id'] ]['wxlevel'] = $user['wxlevel'];
                            if ( isset( $temp[ $date ][ $user['id'] ]['bouns'] ) ) {
                                $temp[ $date ][ $user['id'] ]['bouns'] += $bouns['bouns'];
                            } else {
                                $temp[ $date ][ $user['id'] ]['bouns'] = $bouns['bouns'];
                            }
                        }
                    }
                }
            }
        }


        return $temp;
    }

    /**
     * 个人网体奖金数据
     * @return array
     */
    static function getPersonalNetData()
    {
        $date_arr = explode( '-', date( 'Y-m-d', strtotime( '-1 day' ) ) );
        $year = $date_arr[0];
        $month = $date_arr[1];
        $day = $date_arr[2];
        // 获得当前用户ID
        $id = auth()->id();


        $users = User::where( 'pid', '>', 0 )
            ->get( [ 'id', 'pid' ] )->toArray();

        $temp = [];
        foreach ( $users as $user ) {
            $temp[ $user['id'] ] = $user;
        }


        $users = $temp;
        $temp = [];
        $temp[] = $id;
        $tmp1 = [];
        $tmp1[] = $id;
        $tmp2 = [];
        //       var_dump($temp);
        do {
            $i = 0;
//            $tmp1=[];
            $tmp2 = [];
            foreach ( $users as $userid => $user ) {

                if ( in_array( $user['pid'], $tmp1 ) ) {
                    $tmp2[] = $user['id'];
                    $i = 1;
                    //                  echo $i;
                }

            }
            if ( count( $temp ) == 1 ) {
                $temp = $tmp2;
            } else {
                $temp = array_merge( $temp, $tmp2 );
            }

            $tmp1 = $tmp2;
        } while ( $i == 1 );

        function gettop( $input )
        {
            $tmp = array( 'selftotal' => '0' );
            foreach ( $input as $key => $val ) {
                if ( $val['selftotal'] >= $tmp['selftotal'] ) {
                    $tmp = $val;
                    $tmp['key'] = $key;
                }
            }

            return $tmp;
        }

        function gettopn( $input, $num )
        {
            $top = array();
            for ( $i = 0; $i < $num; $i ++ ) {
                if ( count( $input ) == 0 ) {
                    return $top;
                }
                $top[ $i ] = gettop( $input );
                unset( $input[ $top[ $i ]['key'] ] );
            }
            return $top;
        }

        $users = User::where( 'pid', '>', 0 )
            ->get( [ 'id', 'selftotal', 'nickname' ] )->toArray();
        $use = [];
        foreach ( $users as $user ) {
            $use[ $user['id'] ] = $user;
        }
        $input = [];

        foreach ( $temp as $key => $val ) {
            $input[ $val ] = $use[ $val ];
        }


        if ( count( $input ) == 0 ) {
            $array = [];
        } else {
            $array = gettopn( $input, 5 );
        }

        $totalPeople = count( $input );

        return [
            'totalPeople' => $totalPeople,
            'topFive' => $array
        ];
    }

    /**
     * 团队网体奖金数据
     */
    static function getTeamNetData()
    {
        // 获得用户模型
        $user = auth()->user();
        // 滑落奖
        $slip_bouns = $user->grouptotal - $user->selftotal;

        // 团队网体业绩
        $data = User::where( 'gid', '<>', '0' )
            ->orWhere( 'key1', '<>', '0' )
            ->orWhere( 'key2', '<>', '0' )
            ->get( [ 'key1', 'key2', 'id', 'gid', 'openid', 'selftotal', 'grouptotal' ] )
            ->toArray();

        // 获得所有用户数据
        foreach ( $data as $item ) {
            $data[ $item['id'] ] = $item;
        }


        // 团队网体所有人
        $team_users = static::getTree( $data, $user->id )['array'];


        // 二维数组转化为一维数组
        foreach ( $team_users as $item ) {
            foreach ( $item as $v ) {
                $members[] = $v;
            }
        }

        // 所有的微销会员
        $users = User::whereIn( 'wxlevel', [ 1000, 3000, 6000, 15000, 30000, 60000 ] )
            ->get( [ 'id', 'nickname', 'grouptotal', 'selftotal', 'realname' ] )
            ->toArray();

        $temp = [];

        // 所有的用戶
        $temp = [];
        foreach ( $users as $user ) {
            foreach ( $members as $id ) {
                if ( $user['id'] == $id && $user['grouptotal'] > self::BONUS_LIMIT ) {
                    $temp[ $user['id'] ] = [
                        'selftotal' => $user['selftotal'],
                        'grouptotal' => $user['grouptotal'],
                        'nickname' => $user['nickname'],
                    ];
                }
            }
        }

        $temp = static::sortArr( $temp, 'grouptotal', SORT_DESC );

        return [
            'slipBonus' => $slip_bouns,
            'users' => $temp,
            'totalPeople' => count( $members )
        ];

    }


    static function sortArr( $arrays, $sort_key, $sort_order = SORT_ASC, $sort_type = SORT_NUMERIC )
    {
        foreach ( $arrays as $array ) {
            if ( is_array( $array ) ) {
                $key_arrays[] = $array[ $sort_key ];
            } else {
                return false;
            }
        }

        array_multisort( $key_arrays, $sort_order, $sort_type, $arrays );
        return $arrays;
    }


    // 获取树形结构
    static function getTree( $data, $id )
    {

        function parttree( $tree, $id )
        {
            $tmp[] = array( $id );
            $array[] = $id;
            $floor = "";
            for ( $i = 1; $i < 1000; $i ++ ) {
                $array = getfloor( $tree, $array );
                $echo = "";
                foreach ( $array as $key => $val ) {
                    $echo .= $val . ",";
                }
                $echo = trim( $echo, "," );
                $floor .= count( $array ) . "~~~" . $echo . "</br>";

                $tmp[] = $array;
                if ( count( $array ) > 0 ) {
                    continue;
                } elseif ( count( $array ) == pow( 2, $i ) && $i == 9 ) {
                    $forten = "com";
                } else {
                    $result = find( $tree, $tmp[ $i - 1 ] );
                    //print_r($tmp);
                    break;
                }
            }
            $res = [];
            $res['echo'] = $floor;
            $res['forten'] = @$forten;
            $res['gid'] = $result;
            $res['array'] = $tmp;
            return $res;
        }

        function find( $array, $ids )
        {
            foreach ( $ids as $key => $val ) {
                if ( $array[ $val ]['key1'] == 0 ) {
                    $tmp = $val;
                    break;
                }
                if ( $array[ $val ]['key2'] == 0 ) {
                    $tmp = $val;
                    break;
                }
            }
            unset( $array );
            return $tmp;
        }

        function getfloor( $array, $ids )
        {
            $tmp = [];
            foreach ( $ids as $key => $val ) {
                if ( $array[ $val ]['key1'] > 0 ) {
                    $tmp[] = $array[ $val ]['key1'];
                }
                if ( $array[ $val ]['key2'] > 0 ) {
                    $tmp[] = $array[ $val ]['key2'];
                }
            }
            unset( $array );
            return $tmp;
        }


        return parttree( $data, $id );
    }

    /**
     * 获取福利奖项数据
     */
    static function getIWelfareData()
    {
        $id = auth()->id();

        $grouptotal = auth()->user()->grouptotal;
        // 直推人数. 第一代人数
        $firstGenerationPeople = User::where( [ 'pid' => $id ] )
            ->where( 'gid', '>', 1 )
            ->count( 'id' );

        $progress_car_15 = round( $grouptotal / 2000000, 2 ) * 100;
        // 距离四十万小汽车钱的距离
        $progress_car_40 = round( $grouptotal / 5000000, 2 ) * 100;

        return [
            'progress_car_15' => $progress_car_15,
            'progress_car_40' => $progress_car_40,
            'firstGenerationPeople' => $firstGenerationPeople,
        ];

    }


    /**
     * 福利奖金详情
     * @return array
     */
    static function getWelfareDetail()
    {
        $id = auth()->id();
        // 一推的用户
        $agents = User::where( 'pid', $id )
            ->get( [ 'id', 'nickname', 'pid' ] );

        $temp = [];
        foreach ( $agents as $key => $agent ) {
            $bouns = Bonus::where( 'mid', $agent->id )
                ->where( 'bouns', '>', 0 )
                ->get( [ 'bouns' ] );

            $temp[ $agent['id'] ]['nickname'] = $agent['nickname'];
            $temp[ $agent['id'] ]['id'] = $agent['id'];
            $temp[ $agent['id'] ]['bouns'] = $bouns->sum( 'bouns' );
        }

        if ( count( $temp ) ) {
            function gettop( $input )
            {
                $tmp = array( 'bouns' => '0' );
                foreach ( $input as $key => $val ) {
                    if ( $val['bouns'] >= $tmp['bouns'] ) {
                        $tmp = $val;
                        $tmp['key'] = $key;
                    }
                }

                return $tmp;
            }

            function gettopn( $input, $num )
            {
                $top = array();
                for ( $i = 0; $i < $num; $i ++ ) {
                    if ( count( $input ) == 0 ) {
                        return $top;
                    }
                    $top[ $i ] = gettop( $input );
                    unset( $input[ $top[ $i ]['key'] ] );
                }
                return $top;
            }

            $array = gettopn( $temp, 5 );

            $agents = $array;
        } else {
            $agents = $temp;
        }

        return $agents;

    }
}
