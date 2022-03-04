<?php


class SubjectManager
{
    protected $filepath;

    public function __construct($filepath){
        $this->filepath=$filepath;
    }

    public function loadDataFile(){
        $data = file_get_contents($this->filepath);
        return json_decode($data);
    }

    public function saveDataFile($data){
        $dataJson = json_encode($data);
        file_put_contents($this->filepath,$dataJson);
    }

    public function getAll(){
        $data = $this->loadDataFile();
        $enrollSubjects=[];

        foreach ($data as $item){
            $enrollSubject = new EnrollSubject($item->term, $item->program, $item->status,$item->date);
            $enrollSubject->setId($item->id);
            array_push($enrollSubjects,$enrollSubject);
        }
        return $enrollSubjects;
    }

    public function add($data){
        $dataFile = $this->loadDataFile();
        $lastEnrollSubject = $dataFile[count($dataFile) - 1];
        $data["id"] = $lastEnrollSubject->id + 1;
        array_push($dataFile,$data);
        $this->saveDataFile($dataFile);
    }

    public function getSubjectById($id){
        $data=$this->loadDataFile();
        foreach ($data as $item){
            if ($id == $item->id){
                $enrollSubject = new EnrollSubject($item->term, $item->program, $item->status, $item->date);
                $enrollSubject->setId($item->id);
                return $enrollSubject;
            }
        }
    }

    
}