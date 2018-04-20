# mkweb是mkserver的配置前端，用于配置mock接口

#运行目录
/var/www/html

#设置mkserver地址
vi mkweb/application/config/config.php

#安装
yum install httpd
yum install php php-devel

#更新项目httpd.conf

service httpd start

#介绍
4.0 服务特性
1、简单请求响应
说明：mock服务不解析请求数据，直接返回响应内容。

2、条件响应
说明：mock服务解析请求数据，匹配请求条件，返回条件下响应。

条件配置格式：

请求数据：
{
    "Call-ID": "auto_call_27b394c8-4cdb-4cd6-b793-d7cc29e6cc8a",
    "Account-ID": "64b2f90a28f4c93cfd38f1cb101fcd88",
    "From": "52288888",
    "From-Realm": "nodomain.com",
    "To": "02884788888",
    "To-Realm": "127.0.0.1",
    "Request": "+610000",
    "Request-Realm": "127.0.0.1",
    "Api-Version": "4.x",
    "Direction": "inbound",
    "Caller-ID-Name": "02884788888",
    "Caller-ID-Number": "02884788888",
    "Language": "en-us",
    "USER-VARS": {
        "collect_dtmf_list": [
            {
                "MT-MENU-DTMF": "keypress"
            }
        ],
        "ccvs_list": [
            {
                "MT-TENANT-UUID": "tenant_id"
            },
            {
                "MT-APP-KEY": "app_uuid"
            },
            {
                "MT-APP-SERVICE-UUID": "app_call_uuid"
            },
            {
                "MT-MENU-ID": "menu_id"
            },
            {
                "mt_user_data": "user_data"
            }
        ],
        "type": "0",
        "http_format": "json",
        "tenant_id": "cc083c47-d8cb-11e7-93fd-186590d434a1",
        "app_uuid": "resv",
        "app_call_uuid": "8149073",
        "menu_id": "e31a745f40e6889b003d7d107f346549",
        "user_data": {"callId":8149073,"templateId":34},
        "keypress": "1"
    }
}
  
条件设置：当请求数据一级json的From值为52291896，并且请求数据二级json的app_uuid值为resv时成立。注意：key前缀冒号
{
    ":From": "52291896",
    ":USER-VARS:app_uuid": "resv"
}
  
条件响应：条件成立时，将响应中部分字段值，替换成请求数据中的值
{
    "status": 0,
    "data": {
        "data":
        {
        "ivr_id": "menuid",
        "key_press": ":USER-VARS:keypress",
        "app_uuid": ":USER-VARS:app_uuid",
        "app_call_uuid": ":USER-VARS:app_call_uuid",
        "tenant_id": ":USER-VARS:tenant_id",
        "dnis": ":To",
        "call_id": ":Call-ID",  
        "type": ":USER-VARS:type",
        "ani": ":From",
        "user_data": ":USER-VARS:user_data"
        }
    }
}
3、支持匹配优先级设置
说明：当同一项目，同一接口路径下存在多个条件匹配时，可以设置条件匹配的优先级，sort值越大，最先匹配。

4、路径模糊匹配
说明：当接口是restful规范时，路径是动态变化的。

事例：

POST /zoos：新建一个动物园
GET /zoos/ID：获取某个指定动物园的信息
PUT /zoos/ID：更新某个指定动物园的信息（提供该动物园的全部信息）
DELETE /zoos/ID：删除某个动物园
GET /zoos/ID/animals：列出某个指定动物园的所有动物
DELETE /zoos/ID/animals/ID：删除某个指定动物园的指定动物

对于以上情况，可以配置模糊路径，动态变化的字段使用$替换，模糊路径配置仍然支持条件匹配。

GET /zoos/$：获取某个指定动物园的信息
PUT /zoos/$：更新某个指定动物园的信息（提供该动物园的全部信息）
DELETE /zoos/$：删除某个动物园
GET /zoos/$/animals：列出某个指定动物园的所有动物
DELETE /zoos/$/animals/$：删除某个指定动物园的指定动物

5、响应值随机生成
配置响应模版：整形|字符串
{
"status":0,
"timestamp":"#integer",
"str_timestamp":"#string"
}
 

4.1 curl 命令配置
1、 项目创建
请求
curl -i -H "Accept: application/json" -H "Content-Type: application/json" -X POST -d '{
    "name":"project_name",
    "mock_type":"http",
    "summary":"create project"
}' http://127.0.0.1:8080/v1/project
2、 修改项目
curl -i -H "Accept: application/json" -H "Content-Type: application/json" -X PUT  -d '{
    "name":"project_name",
    "mock_type":"http",
    "summary":"modify project"
}' http://127.0.0.1:8080/v1/project
3、 项目列表
curl http://127.0.0.1:8080/v1/project
4、 项目删除
curl -X DELETE http://127.0.0.1:8080/v1/project/project_name
5、 mock 接口创建
curl -i -H "Accept: application/json" -H "Content-Type: application/json" -X POST -d '{
    "method":"post",
    "path":"/sync",
    "sort":2,
    "headers":{"Content-Type":"application/json"},
       "condition":{":name":"name", ":data:age": 40},
    "response":{"status":"1", "msg":":data:addr"},
    "httpcode": 200,
    "summary":"create mock interface",
    "extra":{
        "sync": true
    }
}' http://127.0.0.1:8080/v1/project/project_name/config
 
接口测试：
curl -i -H "Accept: application/json" -H "Content-Type: application/json" -X POST -d '{
    "name":"name",
    "data":{"age": 40, "addr":"beijing"}
}' http://127.0.0.1:8080/project_name/sync
6、 支持回调的mock接口创建
curl -i -H "Accept: application/json" -H "Content-Type: application/json" -X POST -d '{
    "method":"post",
    "path":"/async",
    "sort": 3,
    "headers":{"Content-Type":"application/json"},
    "condition":{":name":"name", ":data:age": 40},
    "response":{"status":"1", "age":":data:age"},
    "httpcode": 200,
    "summary":"create mock interface",
    "extra":{
        "sync": false,
        "callback":{
            "method":"post",
            "headers":{"Content-Type":"application/json"},
            "url":"http://127.0.0.1:8080/project_name/sync",
            "reqbody":{"name":"name", "data":{"age": 30}}
            }
    }
}' http://127.0.0.1:8080/v1/project/project_name/config
 
回调接口测试：
curl -i -H "Accept: application/json" -H "Content-Type: application/json" -X POST -d '{
    "name":"name",
    "data":{"age": 40, "addr":"beijing"}
}' http://127.0.0.1:8080/project_name/async
7、 http mock接口优先级修改
优先级sort说明：

同一项目，同一请求方式，同一请求路径下，针对不同的访问请求数据，按照sort从大到小排序，根据condition匹配，返回对应的response。当condition匹配项过多时，可以把有效匹配项sort值增大，增加匹配效率。

curl -i -H "Accept: application/json" -H "Content-Type: application/json" -X POST -d '{
    "id":"de98ad7b9bc72b5dafb33c8a4e78b02c",
    "sort": 10
}' http://127.0.0.1:8080/v1/httpsort
8、 http mock批量创建
curl -i -H "Accept: application/json" -H "Content-Type: application/json" -X POST -d '{
    "method":"post",
    "path":"/async",
    "headers":{"Content-Type":"application/json"},
    "summary":"create mock interface",
    "batch":[
                {"condition":{":name":"name", ":data:age": 50},
                "response":{"status":"1", "age":":data:age"},
                "httpcode": 200,
                "sort": 5},
                {"condition":{":name":"name", ":data:age": 60},
                "response":{"status":"1", "age":":data:age"},
                "httpcode": 201,
                "sort": 6}
    ],
    "extra":{
        "sync": false,
        "callback":{
            "method":"post",
            "headers":{"Content-Type":"application/json"},
            "url":"http://127.0.0.1:8080/project_name/sync",
            "reqbody":{"name":"name", "data":{"age": 30}}
            }
    }
}' http://127.0.0.1:8080/v1/project/project_name/multicfg

