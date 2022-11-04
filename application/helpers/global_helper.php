<?php
function pp($data)
{
    echo '<pre style="padding:10px;">';
    print_r($data);
    echo '</pre>';
    exit();
}
function dailyBonusList($item = ''){
    $data =  [
        [
            'streak'=>0,
            'token'=>.6,
            'exp'=>2,
            'earning'=>0.3,
        ],
        [
            'streak'=>1,
            'token'=>.7,
            'exp'=>5,
            'earning'=>0.5,
        ],
        [
            'streak'=>2,
            'token'=>.8,
            'exp'=>7,
            'earning'=>0.7,
        ],
        [
            'streak'=>3,
            'token'=>1,
            'exp'=>9,
            'earning'=>1,
        ],
        [
            'streak'=>4,
            'token'=>1.1,
            'exp'=>11,
            'earning'=>1.5,
        ],
        [
            'streak'=>5,
            'token'=>1.2,
            'exp'=>13,
            'earning'=>2.5,
        ],
        [
            'streak'=>6,
            'token'=>1.3,
            'exp'=>15,
            'earning'=>2.7,
        ],
        [
            'streak'=>7,
            'token'=>1.5,
            'exp'=>18,
            'earning'=>3,
        ],
    ];
    return $data;
}
function dailyBonusSingle($item){
    $data =  [
        [
            'streak'=>0,
            'token'=>.6,
            'exp'=>2,
            'earning'=>0.3,
        ],
        [
            'streak'=>1,
            'token'=>.7,
            'exp'=>5,
            'earning'=>0.5,
        ],
        [
            'streak'=>2,
            'token'=>.8,
            'exp'=>7,
            'earning'=>0.7,
        ],
        [
            'streak'=>3,
            'token'=>1,
            'exp'=>9,
            'earning'=>1,
        ],
        [
            'streak'=>4,
            'token'=>1.1,
            'exp'=>11,
            'earning'=>1.5,
        ],
        [
            'streak'=>5,
            'token'=>1.2,
            'exp'=>13,
            'earning'=>2.5,
        ],
        [
            'streak'=>6,
            'token'=>1.3,
            'exp'=>15,
            'earning'=>2.7,
        ],
        [
            'streak'=>7,
            'token'=>1.5,
            'exp'=>18,
            'earning'=>3,
        ],
    ];
    return  $data[$item];
}
function checkTodayBonusStatus($user){
    $ci = & get_instance();
    $data = $ci->db->where('user_id',$user)->where('date',date('Y-m-d'))->get('bonus_history')->row();
    if (!empty($data)){
        return true;
    }else{
        return false;
    }
}
function checkDailyBonus($user){
    $currentDate = date('Y-m-d');
    $ci =& get_instance();
    if (strtotime($currentDate) !== strtotime($user['last_login'])){

        if (strtotime($currentDate) == strtotime(date('Y-m-d', strtotime($user['last_login']. ' + 1 days')))){
            if ($user['streak'] >= 7){
                $ci->db->where('id',$user['id'])->update('users',['last_login'=>$currentDate]);
            }else{
                $ci->db->where('id',$user['id'])->update('users',['last_login'=>$currentDate,'streak'=>((int)$user['streak'] + 1)]);
            }
        }else{
            $ci->db->where('id',$user['id'])->update('users',['last_login'=>$currentDate,'streak'=>0]);
        }
    }
}
function todayOffwewallClaim($user){
    $ci =& get_instance();
    $exist = $ci->db->where('user_id',$user['id'])->where('date',date('Y-m-d'))->get('offerwall_claim_history')->row();
    if (!empty($exist)){
        return true;
    }else{
        return false;
    }
}