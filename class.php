<?php
require 'db.php';

class employee{
    public $nip;
    public $nama;
    public $grade;
    public $dept;
    public $phone;
    public $username;
    public $password;
    public $password_confirm;

    public function __construct($nip,$nama,$grade,$dept,$phone,$username,$password,$password_confirm){
         $this->nip = $nip;
         $this->nama = $nama;
         $this->grade = $grade;
         $this->dept = $dept;
         $this->phone = $phone;
         $this->username = $username;
         $this->password = $password;
         $this->password_confirm = $password_confirm;
    }


    function getnip(){
        return $this->nip;
    }
    function getnama(){
        return $this->nama;
    }
    function getgrade(){
        return $this->grade;
    }
    function getalamat(){
        return $this->dept;
    }
    function getphone(){
        return $this->phone;
    }
    function getusername(){
        return $this->username;
    }
    function getpassword(){
        return $this->password;
    }
    function getpassword_confirm(){
        return $this->password_confirm;
    }

    function checkusername(){
        global $conn;
        $check_username = "SELECT * FROM user WHERE username = :username LIMIT 1";
        $prepare_check = $conn->prepare($check_username);
        $result = $prepare_check->execute(array(":username" => htmlspecialchars($this->username)));
        $data = $prepare_check->fetch(PDO::FETCH_ASSOC);
        if ($_POST['username'] == $data['username']) {
            $status_username = false;
        } else {
            $status_username = true;
        }
        return $status_username;
    }

    function checkpasswordregist(){
        if ($this->password == $this->password_confirm){
            $status = true;
        } else {
            $status = false;
        }
        return $status;
    }

    function password_enc(){
        $password_encrypted = password_hash($this->password, PASSWORD_DEFAULT);
        return $password_encrypted;
    }
    

    function arrayemployee(){
        return array(
         ":username" => htmlspecialchars($this->username),
         ":password" => htmlspecialchars($this->password_enc()),
         ":nama" => htmlspecialchars($this->nama),
         ":nip" => htmlspecialchars($this->nip),
         ":phone" => htmlspecialchars($this->phone),
         ":grade" => htmlspecialchars($this->grade),
         ":dept" => htmlspecialchars($this->dept)
        );
    }

    function arrayupdate(){
        return array(
         ":nama" => htmlspecialchars($this->nama),
         ":nip" => htmlspecialchars($this->nip),
         ":phone" => htmlspecialchars($this->phone),
         ":grade" => htmlspecialchars($this->grade),
         ":dept" => htmlspecialchars($this->dept),
         ":username" => htmlspecialchars($this->username)
        );
    }

    function insertuser(){
        global $conn;
        $sql = "INSERT INTO user (username,password,nama,nip,phone,grade,dept) VALUES (:username,:password,:nama,:nip,:phone,:grade,:dept)";
        $insertuser = $conn->prepare($sql);
        $status_query = $insertuser->execute($this->arrayemployee());
    }

    function showuserdata($username){
        global $conn;
        $showdatauser = "SELECT * FROM user WHERE username = :username";
        $prepare_showuser = $conn->prepare($showdatauser);
        $result = $prepare_showuser->execute(array(":username" => htmlspecialchars($username)));
        $data = $prepare_showuser->fetch(PDO::FETCH_ASSOC);
        return $data;
    }


    function updateemployee(){
        global $conn;
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $update_employee = "UPDATE user SET nama = :nama, nip = :nip, phone = :phone, grade = :grade, dept = :dept WHERE username = :username";
        $prepare_update = $conn->prepare($update_employee);
        $status_query = $prepare_update->execute($this->arrayupdate());
        //$a = $status_query.$e->getMessage();
        //return $a;
    }

}

class login extends employee {
    public $username;
    public $password;

    public function __construct($username,$password){
        $this->username = $username;
        $this->password = $password;
    }

    function getusername(){
        return $this->username;
    }
    function getpassword(){
        return $this->password;
    }


    function password_check(){
        global $conn;
        $check_password = "SELECT * FROM user WHERE username = :username";
        $prepare_check = $conn->prepare($check_password);
        $result = $prepare_check->execute(array(":username" => $this->username));
        $data = $prepare_check->fetch(PDO::FETCH_ASSOC);
        if (password_verify($this->password, $data['password'])){
            session_start();
            $_SESSION["login"] = true;
            setcookie('username', $this->username, time()+86400);
            header("Location: index.php");
        } else {
            echo "<script>alert('wrong password/username');</script>";
            echo "<script>javascript:history.go(-1);</script>";
            die();
        }
    }

}

class job{
    public $type;
    public $title;
    public $info;
    public $handle;
    public $req;
    public $startdate;
    public $enddate;
    public $status;
    public $number;
    public $time;
    public $username;

    public function __construct($type,$title,$info,$handle,$req,$startdate,$enddate,$status,$number,$time,$username){
        $this->type = $type;
        $this->title = $title;
        $this->info = $info;
        $this->handle = $handle;
        $this->req = $req;
        $this->startdate = $startdate;
        $this->enddate = $enddate;
        $this->status = $status;
        $this->number = $number;
        $this->time = $time;
        $this->username = $username;
    }

    function gettype(){
        return $this->type;
    }
    function gettitle(){
        return $this->title;
    }
    function getinfo(){
        return $this->info;
    }
    function gethandle(){
        return $this->handle;
    }
    function getreq(){
        return $this->req;
    }
    function getstartdate(){
        return $this->startdate;
    }
    function getenddate(){
        return $this->enddate;
    }
    function getstatus(){
        return $this->status;
    }
    function getnumber(){
        return $this->number;
    }
    function gettime(){
        return $this->time;
    }
    function getusername(){
        return $this->username;
    }

    function datechecker(){
        if ($this->enddate <= $this->startdate) {
            return false;
        } else {
            return true;
        }
        
    }

    function arrayjob(){
        return array(
         ":type" => htmlspecialchars($this->type),
         ":title" => htmlspecialchars($this->title),
         ":info" => htmlspecialchars($this->info),
         ":handled_by" => htmlspecialchars($this->handle),
         ":req_by" => htmlspecialchars($this->req),
         ":start_date" => htmlspecialchars($this->startdate),
         ":end_date" => htmlspecialchars($this->enddate),
         ":status" => htmlspecialchars($this->status),
         ":number" => htmlspecialchars($this->number),
         ":time" => htmlspecialchars($this->time),
         ":username" => htmlspecialchars($this->username)
        );
    }

    function arrayjobinsert(){
        return array(
         ":type" => htmlspecialchars($this->type),
         ":title" => htmlspecialchars($this->title),
         ":info" => htmlspecialchars($this->info),
         ":handled_by" => htmlspecialchars($this->handle),
         ":req_by" => htmlspecialchars($this->req),
         ":start_date" => htmlspecialchars($this->startdate),
         ":end_date" => htmlspecialchars($this->enddate),
         ":status" => htmlspecialchars($this->status),
         ":time" => htmlspecialchars($this->time),
         ":username" => htmlspecialchars($this->username)
        );
    }

    function insertjob(){
        global $conn;
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO jobs (type,title,info,handled_by,req_by,start_date,end_date,status,time,username) VALUES (:type,:title,:info,:handled_by,:req_by,:start_date,:end_date,:status,:time,:username)";
        $insertjob = $conn->prepare($sql);
        $status_query = $insertjob->execute($this->arrayjobinsert());
        //$a = $status_query.$e->getMessage();
        //return $a;
    }

    function showdata($string, $username){
        global $conn;
        $showdata = "SELECT * FROM jobs WHERE status = :status AND username = :username ORDER BY time ASC";
        $prepare_show = $conn->prepare($showdata);
        $result = $prepare_show->execute(array(":status" => htmlspecialchars($string),":username" => htmlspecialchars($username)));
        $data = $prepare_show->fetchall(PDO::FETCH_ASSOC);
        return $data;
    }

    function showdataedit($string){
        global $conn;
        $showdataedit = "SELECT * FROM jobs WHERE number = :number";
        $prepare_showedit = $conn->prepare($showdataedit);
        $result = $prepare_showedit->execute(array(":number" => htmlspecialchars($string)));
        $data = $prepare_showedit->fetch(PDO::FETCH_ASSOC);
        return $data;
    }


    function editdata(){
        global $conn;
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $update_data = "UPDATE jobs SET type = :type, title = :title, info = :info, handled_by = :handled_by, req_by = :req_by, start_date = :start_date, end_date = :end_date, status = :status, time = :time, username = :username WHERE number = :number";
        $prepare_update = $conn->prepare($update_data);
        $status_query = $prepare_update->execute($this->arrayjob());
        //$a = $status_query.$e->getMessage();
        //return $a;
    }

    function deletejob($string){
        global $conn;
        $deletejob = "DELETE FROM jobs WHERE number = :number";
        $prepare_delete = $conn->prepare($deletejob);
        $result = $prepare_delete->execute(array(":number" => htmlspecialchars($string)));

    }

    function checkjob($number){
        global $conn;
        $sql = "SELECT * FROM jobs WHERE number = :number";
        $checkjob = $conn->prepare($sql);  
        $result = $checkjob->execute(array(":number" => htmlspecialchars($number)));
        $data = $checkjob->fetch(PDO::FETCH_ASSOC);
        return $data['username'];
    }

}


class team {
    public $team_name;
    public $team_info;
    public $team_secret;
    public $team_admin;
    public $team_created;
    

    public function __construct($team_name,$team_info,$team_secret,$team_admin,$team_created){
        $this->team_name = $team_name;
        $this->team_info = $team_info;
        $this->team_secret = $team_secret;
        $this->team_admin = $team_admin;
        $this->team_created = $team_created;
        
    }


    function getteam_name(){
        return $this->team_name;
    }
    function getteam_info(){
        return $this->team_info;
    }
    function getteam_secret(){
        return $this->team_secret;
    }
    function getteam_admin(){
        return $this->team_admin;
    }
    function getteam_created(){
        return $this->team_created;
    }
    

    function secret_enc(){
        $team_secret = password_hash($this->team_secret, PASSWORD_DEFAULT);
        return $team_secret;
    }


    function arrayteam(){
        return array(
        ":team_name" => htmlspecialchars($this->team_name),
        ":team_info" => htmlspecialchars($this->team_info),
        ":team_secret" => htmlspecialchars($this->secret_enc()),
        ":team_admin" => htmlspecialchars($this->team_admin),
        ":team_created" => htmlspecialchars($this->team_created)
        
        );
    }

    function arrayadmin(){
        return array(
        ":team_name" => htmlspecialchars($this->team_name),
        ":team_admin" => htmlspecialchars($this->team_admin),
        ":admin_status" => 1
        );
    }

    function arraymember(){
        return array(
        ":team_name" => htmlspecialchars($this->team_name),
        ":team_admin" => htmlspecialchars($this->team_admin),
        ":admin_status" => 0
        );
    }

    function arrayjoin(){
        return array(
        ":team_name" => htmlspecialchars($this->team_name),
        ":team_secret" => htmlspecialchars($this->team_secret)
        );
    }

    function checkadmin(){
        global $conn;
        $showadmin = "SELECT * FROM user WHERE username = :username";
        $prepare_showadmin = $conn->prepare($showadmin);
        $result = $prepare_showadmin->execute(array(":username" => htmlspecialchars($this->team_admin)));
        $data = $prepare_showadmin->fetch(PDO::FETCH_ASSOC);
        return $data;
    }



    function newteam(){
        global $conn;
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO team (team_name,team_pass,team_info,team_admin,team_created) VALUES (:team_name,:team_secret,:team_info,:team_admin,:team_created)";
        $insertteam = $conn->prepare($sql);
        $status_query = $insertteam->execute($this->arrayteam());
        //$a = $status_query.$e->getMessage();
        //return $a;

        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $admin = "UPDATE user SET team = :team_name, team_admin = :admin_status WHERE username = :team_admin";
        $insertadmin = $conn->prepare($admin);
        $status_query_admin = $insertadmin->execute($this->arrayadmin());
        //$a = $status_query_admin.$e->getMessage();
        //return $a;
    }


    function checkmember(){
        global $conn;
        $showmember = "SELECT * FROM user WHERE username = :username";
        $prepare_showmember = $conn->prepare($showmember);
        $result = $prepare_showmember->execute(array(":username" => htmlspecialchars($this->team_admin)));
        $data = $prepare_showmember->fetch(PDO::FETCH_ASSOC);
        return $data;
    }


    function secret_check(){
        global $conn;
        $check_secret = "SELECT * FROM team WHERE team_name = :team_name";
        $prepare_check = $conn->prepare($check_secret);
        $result = $prepare_check->execute(array(":team_name" => htmlspecialchars($this->team_name)));
        $data = $prepare_check->fetch(PDO::FETCH_ASSOC);
        if (password_verify($this->team_secret, $data['team_pass'])){
            //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $member = "UPDATE user SET team = :team_name, team_admin = :admin_status WHERE username = :team_admin";
            $insertadmin = $conn->prepare($member);
            $status_query_admin = $insertadmin->execute($this->arraymember());
            //$a = $status_query_admin.$e->getMessage();
            //return $a;
            echo "<script>alert('You have joined a team!');</script>";
            header("Location: index.php");
        } else {
            echo "<script>alert('wrong team/secret code!');</script>";
            echo "<script>javascript:history.go(-1);</script>";
            die();
        } 
    }



    function showteamjob($team,$status){
        global $conn;
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $showteamjobs = "SELECT jobs.number,jobs.type,jobs.title,jobs.info,jobs.handled_by,jobs.req_by,jobs.start_date,jobs.end_date,jobs.status FROM jobs INNER JOIN user ON jobs.username = user.username LEFT JOIN team ON team.team_name = user.team WHERE user.team = :team AND jobs.status = :status";
        $prepare_showjobs = $conn->prepare($showteamjobs);
        $result = $prepare_showjobs->execute(array(":team" => htmlspecialchars($team),":status" => htmlspecialchars($status)));
        return $prepare_showjobs->fetchall();
        //$data = $prepare_showjobs->fetchall();
        //return $prepare_showjobs->errorInfo();
    }

    function getteam($string){
        global $conn;
        $showmember = "SELECT * FROM user WHERE username = :username";
        $prepare_showmember = $conn->prepare($showmember);  
        $result = $prepare_showmember->execute(array(":username" => htmlspecialchars($string)));
        $data = $prepare_showmember->fetch(PDO::FETCH_ASSOC);
        return $data;
    }


    function leaveteam($username){
        global $conn;
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $leave = "UPDATE user SET team = NULL, team_admin = NULL WHERE username = :team_admin";
        $leaveteam = $conn->prepare($leave);
        $status_query_leave = $leaveteam->execute(array(":team_admin" => htmlspecialchars($username)));
        //return $status_query_leave->getMessage();
    }

    function knowmember($string){
        global $conn;
        $showmember = "SELECT * FROM user WHERE username = :username";
        $prepare_showmember = $conn->prepare($showmember);  
        $result = $prepare_showmember->execute(array(":username" => htmlspecialchars($string)));
        $data = $prepare_showmember->fetch(PDO::FETCH_ASSOC);    


        $member = "SELECT * FROM user WHERE team = :team AND team_admin = :team_admin LIMIT 1";
        $prepare_member = $conn->prepare($member);  
        $result_member = $prepare_member->execute(array(":team" => $data['team'],":team_admin" => 0));
        $data_member = $prepare_member->fetch(PDO::FETCH_ASSOC); 

        if ($data_member['team'] == null){
            $status = true;
        } else {
            $status = false;
        }

        return $status;
    }

}




?>

