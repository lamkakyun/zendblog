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
- 第三方登录 微信 qq 微博 淘宝 支付宝

#### 可能修改的需求

## 需求分析
- 每个供应商都有自己的域名，所以用户数，订单数，会慢慢变得庞大

## 架构设计

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
    username(delete)
    password(delete)
    status
    create_time
    update_time
}

- 会员表(详细表)
member_detail {
    id
    avatar 头像
    member_id
    email
    qq
    description
    real_name
    idno
    create_ip
    create_time
    update_time
}

- 用户登录表 (一个关联映射，一个用户对应多个第三方登录用户信息)
member_oauth {
    id
    member_id
    identity_type 登录类型（手机号 邮箱 用户名）或第三方应用名称（微信 微博等）
    identifier 标识（手机号 邮箱 用户名或第三方应用的唯一标识）
    credential 密码凭证（站内的保存密码，站外的不保存或保存token）
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
scenic_order_basic {
    id
    member_id(delete)
    orderno
    type_id     产品类型 1普通票 2套票 3联票 7 团体票  8 小团体票
    product_name
    price
    cost
    type 购买，退款
    status
    create_time
    update_time
}

- 会员订单表 详情表
scenic_order_detail {

}

- 用户订单 表
user_order {
    id
    user_id
    user_type 对应不同的用户类型，其实订单是一样的
    order_id
}

- 景区产品表（是否需要新建? 应该在原先的产品表中添加一个字段标识即可）