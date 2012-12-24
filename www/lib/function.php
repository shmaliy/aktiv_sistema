<?
error_reporting(1);error_reporting(E_ALL);
function redirect($src) {
    print "<script>document.location.href='".$src."'</script>";
}

function encodestring($st) {
    $st=strtr($st,"àáâãäå¸çèéêëìíîïðñòóôõúûý_", "abvgdeeziyklmnoprstufhiiei");
    $st=strtr($st,"ÀÁÂÃÄÅ¨ÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÚÛÝ_", "ABVGDEEZIYKLMNOPRSTUFHIIEI");

    $st=strtr($st, array(
                                "æ"=>"zh", "ö"=>"ts", "÷"=>"ch", "ø"=>"sh", 
                                "ù"=>"shch","ü"=>"", "þ"=>"yu", "ÿ"=>"ya",
                                "Æ"=>"ZH", "Ö"=>"TS", "×"=>"CH", "Ø"=>"SH", 
                                "Ù"=>"SHCH","Ü"=>"", "Þ"=>"YU", "ß"=>"YA",
                                "¿"=>"i", "¯"=>"Yi", "º"=>"ie", "ª"=>"Ye",
                                " "=>"_", "?"=>"", "!"=>"", "."=>"", ","=>"",
                                "&"=>"_and_"
                        )
             );
    return $st;
}
  


	function parseEditorData($value) {
		$s = @str_replace('\"', '"', $_POST[$value]);
		$s1 = @str_replace("../", "", $s);
		$s2 = @str_replace("images/public/", "/images/public/", $s1);
		return $s2;
	}


    function upload_pricef($url) {
        $fd = fopen($url, "rb");
        $userfile2 = fread($fd, filesize($url));
        fclose ($fd);
        $userfile2 = addslashes($userfile2);
        return $userfile2;
    }
//---------------------------------------Existing check
    function qa($sql) {
        global $d;
        return $d->queryallrecords($sql);
    }
    
    function q($sql) {
        global $d;
        return $d->query($sql);
    }
    
    function q1($sql) {
        global $d;
        $res = $d->queryallrecords($sql);
        return $res[0];
    }
    
    function tpl() {
        return $_SESSION['tpl'];
    }
    
    function __checkICQ($number) {
        $icq=$number;            # Âàø ICQ íîìåð
        $online="ONLINE";            # Ñòàòóñ, åñëè icq â ONLINE
        $offline="OFFLINE";            # Ñòàòóñ, åñëè icq â OFFLINE
        $error="íåâåðíûé íîìåð ICQ";    # Îøèáêà: íåâåðíûé íîìåð ICQ

        $template="ICQ: @icq@ is @status@";    # Øàáëîí

            if(is_numeric($icq))
            {
            $open=fsockopen("status.icq.com",80,$string,$body,5);

                if($open)
                {
                fputs($open,"GET /online.gif?icq=".$icq."&img=5 HTTP/1.1\nHost: status.icq.com\n\n");
                while(!feof($open)){$temp.=fgets($open,1024);}
                fclose($open);

                    if(eregi("online1.gif",$temp)){echo eregi_replace("@icq@",$icq,eregi_replace("@status@",$online,$template));}
                    else{echo eregi_replace("@icq@",$icq,eregi_replace("@status@",$offline,$template));}
                }
            }

//            else{echo $error;}
    }
    
    function EncodeConfig( $valueToEncode )
    {
        $chars = array(
            '&' => '%26',
            '=' => '%3D',
            '"' => '%22' ) ;

        return strtr( $valueToEncode,  $chars ) ;
    }

    
    
    
    //---------------------------------------Analyze address
    function ProcessComandLineArgs() {
        global $a;
        $params = explode('?',str_replace("'","''",$_SERVER['REQUEST_URI']));
        $params = explode('/',$params[0]);
        $result = Array();
        unset($params[0]);
        foreach ($params as $param) {
            $t1 = explode(',',$param);
            $res = Array();
            foreach ($t1 as $sub) {
                $t2 = explode('=',$sub);
                if(!isset($t2[1]) && $t2[1] == '') $res['name'] = $t2[0]; else $res[($t2[0])] = $t2[1];
            }
            $result[] = $res;
        }
        $a = $result;
    }
function Get_Debug_Time()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
function Get_Debug_Timing($debug_time)
{
    list($usec, $sec) = explode(" ", microtime());
    return $time = ((float)$usec + (float)$sec) - $debug_time;
}
function SetDebugInfo($info) {
    global $debug_information;
    $debug_information = $info;
}
function AppendDebugInfo($info) {
    global $debug_information;
    $debug_information .= $info;
}
function GetDebugInfo() {
    global $debug_information;
    return $debug_information;
}
  
?>