<?php


class AccountManager
{
    protected $filepath;

    public function __construct($filepath){
        $this->filepath=$filepath;
    }

    public function loadDatafile(){
        $data = file_get_contents($this->filepath);
        return json_decode($data);
    }

    public function saveDataFie($data){
        $dataJson = json_encode($data);
        file_put_contents($this->filepath,$dataJson);
    }

    public function add($data){
        $dataFile = $this->loadDatafile();
        $lastAccount = $dataFile[count($dataFile)-1];
        $data["id"] = $lastAccount->id+1;
        array_push($dataFile,$data);
        $this->saveDataFie($dataFile);
    }

    public function getAccountById($id){
        $data = $this->loadDatafile();
        foreach ($data as $item){
            if ( $id == $item->id){
                $account = new Account($item->account, $item->password);
                $account->setId($item->id);
                return $account;
            }
        }
    }

    public function checkAccount($account,$password){
        $data = $this->loadDatafile();
        foreach($data as $item){
            if ($account == $item->account){
                if ($password == $item->password){
                    $_SESSION["user"]=$item->account;
                    header("location: User.php");
                } else {
                    return "Wrong password";
                }
            }
        }
        return "This account has not been register!";
    }

    public function checkRegister($account){
        $data = $this->loadDatafile();
        foreach ($data as $item){
            if ($account == $item->account){
                return false;
            }
        }
        return true;
    }

}