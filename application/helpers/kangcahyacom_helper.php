<?php
    function j_encode($arr, $mode="pass"){
        header('Content-type: text/html; charset=utf-8');
        if($mode == "pass"){
	        $counter = count($arr);
	        $resp = [
	        	"success" => true,
	        	"message" => "Request Successfully",
	        	"data" => ($counter != 0) ? $arr : [],
	        	"total" => $counter
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

    function get_raw_body($key=null){
    	$rawBody = file_get_contents('php://input');
        $decodeBody = json_decode($rawBody);

        if($key == null){
        	return $key; 
        } else { 
        	if(count((array)$decodeBody) > 0){
                $z = (array)$decodeBody;
                if(isset($z[$key])){
                    if(empty($z[$key])){
                        return null;
                    } else {
                        return $z[$key];
                    }
                } else {
                    return null;
                }
            } else {
                return null;
            }
        	
        }
    }

    function default_response($message=""){
    	return [
            "success" => false,
            "message" => (empty($message) ? "Data not found!" : "User access not found!"),
            "data" => [],
            "total" => 0
        ];
    }

    function zmailer($m=[]) {
        require_once(APPPATH.'libraries/PHPMailerAutoload.php');

        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = 'lumineon.sg.rapidplex.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kkp@vuspicture.com';
        $mail->Password = '5rkbi5shs3';
        $mail->Port = 587; // 465 | 587

        $mail->setFrom('noreply@vuspicture.com', 'noreply');
        $mail->addAddress($m["to"]);

        if(isset($m['attachments'])){
            $att = $m['attachments'];
            if(count($att) > 0){
                for ($i=0; $i < count($att); $i++) { 
                    $mail->addAttachment($att[$i]);
                }
            }
        }

        $mail->isHTML(true);

        $mail->Subject = $m["subject"];
        $mail->Body    = $m["message"];

        if(!$mail->send()) {
            /*echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;*/
            return false;
        } else {
            // echo 'Message has been sent';
            return true;
        }
    }

