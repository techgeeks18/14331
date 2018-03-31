<?php
require_once 'C:/xampp/htdocs/techgeeks18/AdminPanel/manage/function/connectionClass.php';
class pageClass extends connectionClass{
    public function addPage($name, $details, $sd, $ed,$cd,$dd, $file,$dist,$subd,$adddr,$pin){
        $name= $this->real_escape_string($name);
        $details= $this->real_escape_string($details);
        
     
        $insert="Insert into event (ename, description, district,subdivision,address,pincode10,createdate,removedate,startdate,enddate,image)values('$name','$details','$dist','$subd','$adddr','$pin','$cd','$dd','$sd','$ed','$file')";
        $result= $this->query($insert) or die($this->error);
        if($result)
        {
            return"values are added to our CMS Page";
        }
        else{
            return "some error";
        }
        
    }
        
        
    
    public function listPage(){
        $select="select * from event";
        $result= $this->query($select) or die($this->error);
        $count=$result->num_rows;
        if($count<1)
        {
            return"There is no row";
        }
        else{
            while($row=$result->fetch_array(1)){
                $rows[]=$row;
            }
            return $rows;

        }
    }
    
    public function particularPage($id){
        $select="select * from event where eid='$id'";
        $result= $this->query($select) or die($this->error);
        $count=$result->num_rows;
        if($count<1)
        {
            return"There is no row";
        }
        else{
            return $row=$result->fetch_array(1);

        }
    }
    public function updatePage($name, $details, $sd, $ed,$cd,$dd,$dist,$subd,$adddr,$pin,$id){
        $name= $this->real_escape_string($name);
        $title= $this->real_escape_string($title);
        $details= $this->real_escape_string($details);
        
        $update="update event Set ename='$name',description='$details',district='$dist',subdivision='$subd',address='$adddr',pincode10='$pin',createdate='$cd',removedate='$dd',startdate='$sd',enddate='$ed' Where eid='$id'";
        $result= $this->query($update) or die($this->error);
        if($result)
        {
            return"values are updated to our CMS Page";
        }
        else{
            return "some error";
        }
    }
    public function deletePage($id){
        $delete="delete from event where eid='$id'";
        $result= $this->query($delete) or die($this->error);
        if($result)
        {
            return"values are deleted from our CMS Page";
        }
        else{
            return "some error";
        }
    }
}
        

?>
