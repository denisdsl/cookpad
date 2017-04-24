<?php
class Response
{
    const HTTP_VERSION = "HTTP/1.1";

    public static function sendResponse($data)
    {
        //获取数据
        if ($data) {
            $code = 200;
            $message = 'OK';
        } else {
            $code = 404;
            $data = array('error' => 'Not Found');
            $message = 'Not Found';
        }

        //输出结果
        header(self::HTTP_VERSION . " " . $code . " " . $message);

        echo self::encodeJson($data);
    }

    //json格式
    private static function encodeJson($responseData)
    {
        return json_encode($responseData);
    }

}
