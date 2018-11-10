<?php  
class qrcode  
{  
    private $data;  
      
    //creating code with link mtadata  
    public function link($url){  
        if (preg_match('/^http:\/\//', $url) || preg_match('/^https:\/\//', $url))   
        {  
            $this->data = $url;  
        }  
        else  
        {  
            $this->data = "http://".$url;  
        }  
    }  
      
    //creating code with bookmark metadata  
    public function bookmark($title, $url){  
        $this->data = "MEBKM:TITLE:".$title.";URL:".$url.";;";  
    }  
      
    //creating text qr code  
    public function text($text){  
        $this->data = $text;  
    }  
      
    //creatng code with sms metadata  
    public function sms($phone, $text){  
        $this->data = "SMSTO:".$phone.":".$text;  
    }  
      
    //creating code with phone   
    public function phone_number($phone){  
        $this->data = "TEL:".$phone;  
    }  
      
    //creating code with mecard metadata  
    public function contact_info($name, $address, $phone, $email){  
        $this->data = "MECARD:N:".$name.";ADR:".$address.";TEL:".$phone.";EMAIL:".$email.";;";  
    }  
      
    //creating code wth email metadata  
    public function email($email, $subject, $message){  
        $this->data = "MATMSG:TO:".$email.";SUB:".$subject.";BODY:".$message.";;";  
    }  
      
      
    //creating code with wifi configuration metadata  
    public function wifi($type, $ssid, $pass){  
        $this->data = "WIFI:T:".$type.";S:".$ssid.";P:".$pass.";;";  
    }    
      
    //getting image  
    public function get_image($size = 220, $EC_level = 'L', $margin = '1'){  
        $ch = curl_init();  
        $this->data = urlencode($this->data);   
        curl_setopt($ch, CURLOPT_URL, 'http://chart.apis.google.com/chart');  
        curl_setopt($ch, CURLOPT_POST, true);  
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'chs='.$size.'x'.$size.'&cht=qr&chld='.$EC_level.'|'.$margin.'&chl='.$this->data);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
        curl_setopt($ch, CURLOPT_HEADER, false);  
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);  

        $response = curl_exec($ch);  
        curl_close($ch);  
        return $response;  
    }  
      
    //getting link for image  
    public function get_link($size = 220, $EC_level = 'L', $margin = '1'){  
        $this->data = urlencode($this->data);   
        return 'http://chart.apis.google.com/chart?chs='.$size.'x'.$size.'&cht=qr&chld='.$EC_level.'|'.$margin.'&chl='.$this->data;  
    }  
      
    //forcing image download 
    public function download_image($file){ 
        header('Content-Disposition: attachment; filename=QRcode.png'); 
        header('Content-Type: image/png'); 
        echo $file; 
    } 
	
	//save image to server
    public function save_image($file, $path = "./QRcode.png"){ 
        file_put_contents($path, $file);
    } 
}  
?>