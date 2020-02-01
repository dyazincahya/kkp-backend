<?php
    function j_encode($arr, $mode="pass"){
        header('Content-type: text/html; charset=utf-8');
        if($mode == "pass"){
	        $counter = count($arr);
	        $resp = [
	        	"success" => true,
	        	"message" => "Request Successfully",
	        	"data" => ($counter != 0) ? $arr : [],
	        	"count" => $counter
	        ];
        	echo json_encode($resp, JSON_UNESCAPED_UNICODE);
	    } else {
	    	echo json_encode($arr, JSON_UNESCAPED_UNICODE);
	    }
        exit();
    }

    function raw_body($returnType = "array"){
    	$rawBody = file_get_contents('php://input');
        $decodeBody = json_decode($rawBody);

        if($returnType == "array"){
        	return (array)$decodeBody;
        } else { return $decodeBody; }
    }

    function default_respose($message=""){
    	return [
            "success" => false,
            "message" => (empty($message) ? "Data not found!" : "User access not found!"),
            "data" => [],
            "count" => 0
        ];
    }

