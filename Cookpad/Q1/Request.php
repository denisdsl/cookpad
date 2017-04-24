<?php

class Request
{
    //allowed request method
    private static $method_type = array('get', 'post', 'put', 'patch', 'delete');

    //test data
    //It is not clear how the user data is stored.
    //Here we use a simple data structure:
    //Use test_user to store the information of users.
    private static $test_user = array(
        1 => array('name' => 'amy', 'id' => 1, 'friends' => [2,3,6,4]),
        2 => array('name' => 'bob', 'id' => 2, 'friends' => [3,4]),
	3 => array('name' => 'catholine', 'id' => 3, 'friends' => []),
        4 => array('name' => 'dennis', 'id' => 4, 'friends' => [1,5]),
        5 => array('name' => 'ellen', 'id' => 5, 'friends' => []),
        6 => array('name' => 'frank', 'id' => 6, 'friends' => []),
    );

    private static function get_username($id)
    {
	for($i=1; $i<=count(self::$test_user); $i=$i+1) {
            if($id == self::$test_user[$i]['id']) {
		return self::$test_user[$i]['name'];
            }
        }
	return 'ID not found';
    }

    private static function get_allfriends($id)
    {
        $all_friends = [ $id ];
        $iter = 0;
	while($iter < count($all_friends)) {
	    $new_friends = self::$test_user[$all_friends[$iter]]['friends'];
            $all_friends = array_values(array_unique(array_merge($all_friends,$new_friends)));
            
	    $iter = $iter+1;
        }
	unset($all_friends[0]);
	$all_friends = array_values($all_friends);
	return $all_friends;
    }

    public static function getRequest()
    {
        //请求方式
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        if (in_array($method, self::$method_type)) {
            //调用请求方式对应的方法
            $data_name = $method . 'Data';
            return self::$data_name($_REQUEST);
        }
        return false;
    }

    //GET: 
    private static function getData($request_data)
    {
        $user_id = (int)$request_data['user'];
        //GET /user/ID：get user information
        if ($user_id > 0) {
            return ['id'=>$user_id,
		    'name'=>self::get_username($user_id),
		    'friends'=>self::get_allfriends($user_id)];
        } else {
            return false;
        }
    }

    //POST：
    private static function postData($request_data)
    {
        return false;
    }

    //PUT：
    private static function putData($request_data)
    {
        return false;
    }

    //PATCH：
    private static function patchData($request_data)
    {
        return false;
    }

    //DELETE：
    private static function deleteData($request_data)
    {
        return false;
    }
}

?>
