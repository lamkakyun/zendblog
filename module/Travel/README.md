# 景区官网网站框架

## 需求
1. 会员登录
2. 景区后台登录
3. 景区概况
4. 产品信息
5. 交通指南

## 需求描述

#### 当前需求
- 会员 注册/登录授权
- 会员直接 查看/购买 供应商产品
- 会员 购买/查看/支付 订单
- 景区管理自己的b2c站点,配置站点信息，站点体验效果

#### 之后需求

#### 可能修改的需求

## 表设计
- 景区配置表(最顶级供应商才有)
scenic_basic {
    id
    comp_id
    status
    logo
    banner 背景图片
    intro 介绍
    tel 联系电话
    address 地址
    pos_x 位置信息-经度
    pos_y 位置信息-纬度
    route 景区路线(图片？)
}

- 景区新闻动态
scenic_news {
    id
    comp_id
    title
    content
    create_time
}

- 会员表(基础表)
member_basic {
    id
    phone
    username
    password
    status
    create_time
    update_time
}

- 会员表(详细表)
member_detail {
    id
    member_id
    email
    qq
    description
    real_name
    idno
    create_time
    update_time
}

- 会员景区登录授权映射表
scenic_member_mapping {
    id
    member_id
    scenic_id
    last_login_ip
    last_login_time
    login_count
    create_time
}

- 会员支付记录
pay_log {
    id
    orderno
    user_type 会员，分销商
    pay_time 
    pay_cost
    pay_orderno 支付流水号
    pay_type 微信，支付宝
    create_time
}

- 会员订单表（是否需要新建? b2b 和b2c的订单能放在一起？可参考之前的订单表）
scenic_order {
    id
    orderno
    product_name
    price
    cost
    type 购买，退款
    status
    create_time
    update_time
}

- 景区产品表（是否需要新建? 应该在原先的产品表中添加一个字段标识即可）