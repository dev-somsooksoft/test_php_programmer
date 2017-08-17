<?php

class Person{

  public static function query($minLine = null,$maxLine = null){

    if($minLine == null || $maxLine == null) return null;
    $arrayPushDataPerson = array(
     array('id'=>1,'fullname'=>'ทรงชชัย งามพรข้อม','gender'=>'ชาย','age'=>30),
     array('id'=>2,'fullname'=>'มนฤดี คนดี','gender'=>'หญิง','age'=>45),
     array('id'=>3,'fullname'=>'ทศพล เกิดงาม','gender'=>'ชาย','age'=>32),
     array('id'=>4,'fullname'=>'ดวงใจ ไพรสน','gender'=>'หญิง','age'=>28),
     array('id'=>5,'fullname'=>'อมร สูงส่ง','gender'=>'ชาย','age'=>44)
     );

    $resultArrayFilterPerson = array();
    foreach($arrayPushDataPerson as $rows){
      if($rows['id'] >= $minLine && $rows['id'] <= $maxLine){
        $resultArrayFilterPerson[]=array(
          'id'=> $rows['id'],
          'fullname'=> $rows['fullname'],
          'gender'=> $rows['gender'],
          'age'=> $rows['age']
          );
      }
    }
    return $resultArrayFilterPerson;
    unset($arrayPushDataPerson);
    unset($resultArrayFilterPerson);   
  }

}
$beginline = trim($_POST['beginline']);
$endline = trim($_POST['endline']);
sleep(2);
$resultSearch = Person::query((int)$beginline,(int)$endline);

if(count($resultSearch)==0){
 echo '<span style="color:red;">ไม่พบข้อมูล...</span>';
 exit;
}

?>

<table class="table table-bordered">
 <thead>
   <tr>
     <th>#</th>
     <th>ชื่อ-นามสกุล</th>
     <th>เพศ</th>
     <th>อายุ</th>
   </tr>
 </thead>
 <tbody>
   <?php
   foreach($resultSearch as $rows){
     ?>
     <tr style="background:<?php echo ($rows['gender']=='หญิง')?'pink':'';?>;">
       <td><?php echo $rows['id'];?></td>
       <td><?php echo $rows['fullname'];?></td>
       <td><?php echo $rows['gender'];?></td>
       <td><?php echo $rows['age'];?></td>
     </tr>
     <?php }?>
   </tbody>
 </table>