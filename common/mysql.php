<?php
// +----------------------------------------------------------------------
// | ���ļ���Ҫ�ǲ������ݿ��õİ����������������Ǹ��ӷ���Ĳ������ݿ�
// +----------------------------------------------------------------------


/**����ʹ�øú���
 * ����MYSQL����,ͨ����������ʽ���������ݿ�
 * �Զ��������ļ��������ļ����Զ��峣����������Ҫʹ�õ���Ϣ
 * @return resource
 */
function connect(){ 
    //����mysql
    $link=@mysqli_connect(DB_HOST,DB_USER,DB_PWD) or die ('<h2>���ݿ�����ʧ�ܣ���ȥconfig/config.php��������</h2><br/>ERROR '.mysqli_errno().':'.mysqli_error());
    //�����ַ���
    mysqli_set_charset($link,DB_CHARSET);
    //��ָ�������ݿ�
    mysqli_select_db($link,DB_DBNAME) or die('ָ�������ݿ��ʧ��,��ȥconfig/config.php��������');
    return $link;
}



/* array(
'username'=>'king',
'password'=>'123123',
'email'=>'dh@qq.com'
) */

/**
 * �����¼�Ĳ���
 * @param array $array
 * @param string $table
 * @return boolean
 */
function insert($link,$array,$table){
    $keys=join(',',array_keys($array));
    $values="'".join("','", array_values($array))."'";
    $sql="insert {$table}({$keys}) VALUES ({$values})";
    $res=mysqli_query($link,$sql);
    if($res){
        return mysqli_insert_id($link);
    }else{
        exit(mysqli_error($link));
    }
}


/**
 * MYSQL���²���
 * @param array $array
 * @param string $table
 * @param string $where
 * @return number|boolean
 */
function update($link,$array,$table,$where=null){
    foreach ($array as $key=>$val){
        @$sets.=$key."='".$val."',";
    }
    $sets=rtrim($sets,','); //ȥ��SQL������һ������
    $where=$where==null?'':' WHERE '.$where;
    $sql="UPDATE {$table} SET {$sets} {$where}";
    $res=mysqli_query($link,$sql);
    if ($res){
        return mysqli_affected_rows($link);
    }else {
        return false;
    }
}


/**
 * ɾ����¼�Ĳ���
 * @param string $table
 * @param string $where
 * @return number|boolean
 */
function mysql_delete($link,$table,$where=null){
    $where=$where==null?'':' WHERE '.$where;
    $sql="DELETE FROM {$table}{$where}";
    $res=mysqli_query($link,$sql);
    if ($res){
        return mysqli_affected_rows($link);
    }else {
        return false;
    }
}

/**
 * ��ѯһ����¼
 * @param string $sql
 * @param string $result_type
 * @return boolean
 */
function fetchOne($link,$sql,$result_type=MYSQLI_ASSOC){
    $result=mysqli_query($link,$sql);
    if ($result && mysqli_num_rows($result)>0){
        return mysqli_fetch_array($result,$result_type);
    }else {
        return false;
    }
}

/**
 * �õ����е����м�¼
 * @param string $sql
 * @param string $result_type
 * @return boolean
 */
function fetchAll($link,$sql,$result_type=MYSQLI_ASSOC){
    $result=mysqli_query($link,$sql);
    if ($result && mysqli_num_rows($result)>0){
        while ($row=mysqli_fetch_array($result,$result_type)){
            $rows[]=$row;
        }
        return $rows;
    }else {
        return false;
    }
}


/**ȡ�ý�����еļ�¼������
 * @param string $sql
 * @return number|boolean
 */
function getTotalRows($link,$sql){
    $result=mysqli_query($link,$sql);
    if($result){
        return mysqli_num_rows($result);
    }else {
        return false;
    }
    
}

/**�ͷŽ����
 * @param resource $result
 * @return boolean
 */
function  freeResult($result){
    return  mysqli_free_result($result);
}



/**�Ͽ�MYSQL
 * @param resource $link
 * @return boolean
 */
function close($link=null){
    return mysqli_close($link);
}


/**�õ��ͻ��˵���Ϣ
 * @return string
 */
function getClintInfo($link){
    return mysqli_get_client_info($link);
}


/**�õ�MYSQL�������˵���Ϣ
 * @return string
 */
function getServerInfo($link=null){
    return mysqli_get_server_info($link);
}



/**�õ���������Ϣ
 * @return string
 */
function getHostInfo($link=null){
    return mysqli_get_host_info($link);
}

/**�õ�Э����Ϣ
 * @return string
*/
function getProtoInfo($link=null){
    return mysqli_get_proto_info($link);
}

/**
* �Բ�ѯ�������������
* @access public
* @param array $list ��ѯ���
* @param string $field ������ֶ���
* @param array $sortby ��������
* asc�������� desc�������� nat��Ȼ����
* @return array
*/
function list_sort_by($list,$field, $sortby='asc') {
   if(is_array($list)){
       $refer = $resultSet = array();
       foreach ($list as $i => $data)
           $refer[$i] = &$data[$field];
       switch ($sortby) {
           case 'asc': // ��������
                asort($refer);
                break;
           case 'desc':// ��������
                arsort($refer);
                break;
           case 'nat': // ��Ȼ����
                natcasesort($refer);
                break;
       }
       foreach ( $refer as $key=> $val)
           $resultSet[] = &$list[$key];
       return $resultSet;
   }
   return false;
}




/**
 * �ѷ��ص����ݼ�ת����Tree
 * @param array $list Ҫת�������ݼ�
 * @param string $pid parent����ֶ�
 * @param string $level level����ֶ�
 * @return array
 */
function list_to_tree($list, $pk='id', $pid = 'pid', $child = '_child', $root = 0) {
    // ����Tree
    $tree = array();
 
    if(is_array($list)) {
 
        // ����������������������
        $refer = array();
        foreach ($list as $key => $val) {
            $refer[$val[$pk]] =& $list[$key];
        }
 
 
        foreach ($list as $key => $val) {
            // �ж��Ƿ����parent
            $parentId =  $val[$pid];
            if ($root == $parentId) {
                $tree[] =& $list[$key];
            }else{
                if (isset($refer[$parentId])) {
                    $parent =& $refer[$parentId];
                    $parent[$child][] =& $list[$key];
                }
            }
        }
    }
    return $tree;
}