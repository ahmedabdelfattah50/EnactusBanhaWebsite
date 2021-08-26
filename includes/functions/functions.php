<?php
 


/*
==========================  
  insert new member By/ Amr Mohamed
==========================
*/
 
function insert_member ($f_name , $l_name , $email , $phone , $birthday ,$commity ,$season ,$university ,$collage_name ,$collage_year ,$about ,$facebook ,$twitter ,$insta ,$linked_in,$old,$img){
    global $con;
    $stmt = $con->prepare("INSERT INTO members(first_name,last_name,email,birthday,phone,commity,season,university,collage_name,collage_year,about,facebook,twitter,insta,linked_in,img,old_member) Value(:first_name,:last_name,:email,:birthday,:phone,:commity,:season,:university,:collage_name,:collage_year,:about,:facebook,:twitter,:insta,:linked_in,:img,:old)");
    $stmt->execute(
    array(
        ":first_name"       => $f_name,
        ":last_name"        => $l_name,
        ":email"            => $email,
        ":birthday"         => $birthday,
        ":phone"            => $phone,
        ":commity"          => $commity,
        ":season"           => $season,
        ":university"       => $university,
        ":collage_name"     => $collage_name,
        ":collage_year"     => $collage_year,
        ":about"            => $about,
        ":facebook"         => $facebook,
        ":twitter"          => $twitter,
        ":insta"            => $insta,
        ":linked_in"        => $linked_in,
        ":img"              => $img,
        ":old"              => $old,
    ));
    echo "
    <script>
        toastr.success('Great , Member has been successfully added .')
    </script>";
    header("Refresh:3;url=members.php");
}


/*
==========================  
  update new member By/ Amr Mohamed
==========================
*/

function  update_member ($member_id,$f_name , $l_name , $email , $phone , $birthday ,$commity ,$season ,$university ,$collage_name ,$collage_year ,$about ,$facebook ,$twitter ,$insta ,$linked_in,$img,$old){
    global $con;
    $stmt = $con->prepare("UPDATE members SET first_name = ?,last_name = ?,email = ?,birthday = ?,phone = ?,commity = ?,season = ?,university = ?,collage_name = ?,collage_year = ?,about = ?,facebook = ?,twitter = ?,insta = ?,linked_in = ?,img = ? , old_member = ? WHERE id =?");
    $stmt->execute(
    array(
        $f_name,
        $l_name,
        $email,
        $birthday,
        $phone,
        $commity,
        $season,
        $university,
        $collage_name,
        $collage_year,
        $about,
        $facebook,
        $twitter,
        $insta,
        $linked_in,
        $img,
        $old,
        $member_id

    ));
    echo "
    <script>
        toastr.success('Great , Member INFO has Been Successfully Update  .')
    </script>";
    header("Refresh:3;url=members.php");
}


/*
==========================  
  get all data  By/ Amr Mohamed
==========================
*/

function getAllData($table){
    global $con;
    $stmt = $con->prepare("SELECT * FROM $table");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


// select newMembers
function selectNewMembers(){
    global $con; 
    $stmt = $con->prepare("SELECT * FROM members Where old_member=0");
    $stmt->execute(array());
    return $stmt->fetchAll();
}


// select oldMembers
function selectOldMembers(){
    global $con; 
    $stmt = $con->prepare("SELECT * FROM members Where old_member=1");
    $stmt->execute(array());
    return $stmt->fetchAll();
}


/*
==========================  
  get all data with id  By/ Amr Mohamed
==========================
*/

function getData_with_id($table,$id){
    global $con;
    $stmt = $con->prepare("SELECT * FROM $table WHERE id = ?");
    $stmt->execute(array($id));
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    return $rows;
}


// select HighBoard
function selectHighBoard(){
    global $con; 
    $stmt = $con->prepare("SELECT * FROM hosters Where old=0");
    $stmt->execute(array());
    return $stmt->fetchAll();
}


// select HighBoardOld
function selectHighBoardOld(){
    global $con; 
    $stmt = $con->prepare("SELECT * FROM hosters Where old=1");
    $stmt->execute(array());
    return $stmt->fetchAll();
}

/**/

/*
==========================  
  insert new Hoster By/ Amr Mohamed
==========================
*/

function  insert_hoster ($first_name , $last_name , $email , $password , $phone , $birthday , $position , $commity ,$season ,$university ,$collage_name ,$collage_year ,$about ,$facebook ,$twitter ,$insta ,$linked_in,$img ,$old){
    global $con;
    $stmt = $con->prepare("INSERT INTO hosters(first_name,last_name,email,password,birthday,phone,position_name,commity_name,season_year,university_name,college_name,college_year,about_hoster,facebook,twitter,instgram,linked_in,photo,old) Value(:first_name,:last_name,:email,:password,:birthday,:phone,:position_name,:commity,:season,:university,:college_name,:collage_year,:about_hoster,:facebook,:twitter,:instgram,:linked_in,:photo,:old)");
    $stmt->execute(
    array(
        ":first_name"       => $first_name,
        ":last_name"        => $last_name,
        ":email"            => $email,
        ":password"         => $password,
        ":birthday"         => $birthday,
        ":phone"            => $phone,
        ":position_name"    => $position,
        ":commity"          => $commity,
        ":season"           => $season,
        ":university"       => $university,
        ":college_name"     => $collage_name,
        ":collage_year"     => $collage_year,
        ":about_hoster"     => $about,
        ":facebook"         => $facebook,
        ":twitter"          => $twitter,
        ":instgram"            => $insta,
        ":linked_in"        => $linked_in,
        ":photo"            => $img,
        ":old"              => $old,
    ));
    echo "
    <script>
        toastr.success('Great , Hoster has been successfully added .')
    </script>";

    if($old == 0){
        header("Refresh:3;url=hosters.php?type=newBoard");
    } else if($old == 1) {
        header("Refresh:3;url=hosters.php?type=oldBoard");
    }
}

/*
==========================  
  update Hoster information By/ Amr Mohamed
==========================
*/

function  update_hoster ($hoster_id,$first_name , $last_name , $email , $password , $phone , $birthday , $position , $commity ,$season ,$university ,$collage_name ,$collage_year ,$about ,$facebook ,$twitter ,$insta ,$linked_in,$img ,$old){
    global $con;
    $stmt = $con->prepare("UPDATE hosters SET first_name = ?,last_name = ?,email = ?,password=?,birthday = ?,phone = ?,commity_name = ?,season_year = ?,position_name =?,university_name = ?,college_name = ?,college_year = ?,about_hoster = ?,facebook = ?,twitter = ?,instgram = ?,linked_in = ?,photo = ? , old = ? WHERE id =?");
    $stmt->execute(
    array(
        $first_name,
        $last_name,
        $email,
        $password,
        $birthday,
        $phone,
        $commity,
        $season,
        $position,
        $university,
        $collage_name,
        $collage_year,
        $about,
        $facebook,
        $twitter,
        $insta,
        $linked_in,
        $img,
        $old,
        $hoster_id

    ));
    echo "
    <script>
        toastr.success('Great , Hoster INFO has Been Successfully Update  .')
    </script>";
    header("Refresh:3;url=hosters.php");
}


/*
==========================  
count Rows from Database By/ Amr Mohamed
==========================
*/

function count_users($colume,$databname){
    global $con;
    $stmt = $con->prepare("SELECT COUNT($colume) From $databname");
    $stmt->execute();
    $rows = $stmt->fetchColumn();
    return $rows;
}

// --- count new Members
function countNewMembers(){
    global $con;
    $stmt = $con->prepare("SELECT COUNT(id) From members Where old_member=0");
    $stmt->execute();
    $rows = $stmt->fetchColumn();
    return $rows;
}

// --- count old Members
function countOldMembers(){
    global $con;
    $stmt = $con->prepare("SELECT COUNT(id) From members Where old_member=1");
    $stmt->execute();
    $rows = $stmt->fetchColumn();
    return $rows;
}

// --- count about us sections
function count_aboutUs_sections(){
    global $con;
    $stmt = $con->prepare("SELECT COUNT(id) From about_us");
    $stmt->execute();
    $rows = $stmt->fetchColumn();
    return $rows;
}

// --- count count_messages sections
function count_messages(){
    global $con;
    $stmt = $con->prepare("SELECT COUNT(id) From contact");
    $stmt->execute();
    $rows = $stmt->fetchColumn();
    return $rows;
}
/*
==========================  
count Rows of old high board from Database By/ Amr Mohamed
==========================
*/

function count_new_highBoard(){
    global $con;
    $stmt = $con->prepare("SELECT COUNT(id) From hosters WHERE old=0");
    $stmt->execute();
    $rows = $stmt->fetchColumn();
    return $rows;
}


/*
==========================  
count Rows of old high board from Database By/ Amr Mohamed
==========================
*/

function count_old_highBoard(){
    global $con;
    $stmt = $con->prepare("SELECT COUNT(id) From hosters WHERE old=1");
    $stmt->execute();
    $rows = $stmt->fetchColumn();
    return $rows;
}

/*
==========================  
    insert new Hoster By/ Amr Mohamed
==========================
*/

function insert_opinion ($name , $email ,$commity ,$season,$opinion){  
    global $con;
    $stmt = $con->prepare("INSERT INTO opinion(name,email,commity,season,current_season,opinion,time) Value(:name,:email,:commity,:season,:current_season,:opinion,:time)");
    date_default_timezone_set('Africa/Cairo');
    $_time = date("Y/m/d . h:i:s");
    $current_season = date("Y");
    $stmt->execute(
    array(
        ":name"             => $name,
        ":email"            => $email,
        ":commity"          => $commity,
        ":season"           => $season,
        ":season"           => $season,
        ":current_season"   => $current_season,
        ":opinion"          => $opinion,
        ":time"             => $_time ,
    ));
    echo "
    <script>
        toastr.success('Thanks for Your Time , Your Opinion Has Been Send Successfully .')
    </script>";
    header("Refresh:3;url=opinion_form.php");
}


/*
==========================  
  count Members By/ Amr Mohamed
==========================
*/

function count_comittee_members($colume,$databname,$commity){
    global $con;
    $stmt = $con->prepare("SELECT COUNT($colume) From $databname WHERE commity = ?");
    $stmt->execute(array($commity));
    $rows = $stmt->fetchColumn();
    return $rows;
}


/*
==========================  
  count Members By/ Amr Mohamed
==========================
*/

function getData_with_committee($table,$commity){
    global $con;
    $stmt = $con->prepare("SELECT * FROM $table WHERE commity = ?");
    $stmt->execute(array($commity));
    $rows = $stmt->fetchAll();
    return $rows;
}

/*
==========================  
  update about us data  By/ Reham Osama
==========================
*/


function  update_about_us ($name , $content,$about_id){
    global $con;
    $stmt = $con->prepare("UPDATE about_us SET section_name = ?, content = ? WHERE id =?");
    $stmt->execute(
    array(
        $name,
        $content,
        $about_id

    ));
    echo "
    <script>
        toastr.success('Great , About US INFO has Been Successfully Update  .')
    </script>";
    header("Refresh:1;url=about.php");
}

/*
==========================  
  update event data  By/ Reham Osama
==========================
*/


function  updateEvent($name ,
                      $year ,
                      $mainImg, 
                      $img_1, 
                      $img_2, 
                      $img_3, 
                      $img_4, 
                      $driveLink, 
                      $speaker_1, 
                      $speaker_1_link, 
                      $speaker_2, 
                      $speaker_2_link, 
                      $speaker_3, 
                      $speaker_3_link, 
                      $speaker_4, 
                      $speaker_4_link, 
                      $speaker_5,
                      $speaker_5_link, 
                      $speaker_6, 
                      $speaker_6_link, 
                      $speaker_7, 
                      $speaker_7_link, 
                      $speaker_8, 
                      $speaker_8_link, 
                      $speaker_9, 
                      $speaker_9_link,
                      $speaker_10, 
                      $speaker_10_link,  
                      $eventLocation, 
                      $desc, 
                      $event_id
    ){
    global $con;
    $stmt = $con->prepare("UPDATE event SET 
        e_name = ?,
        e_season = ?,
        main_img = ?,
        imgs_link = ?,
        img_1 = ?,
        img_2 = ?,
        img_3 = ?,
        img_4 = ?,
        speaker_1 = ?,
        speaker_1_link = ?,
        speaker_2 = ?,
        speaker_2_link = ?,
        speaker_3 = ?,
        speaker_3_link = ?,
        speaker_4 = ?,
        speaker_4_link = ?,
        speaker_5 = ?,
        speaker_5_link = ?, 
        speaker_6 = ?,
        speaker_6_link = ?, 
        speaker_7 = ?,
        speaker_7_link = ?, 
        speaker_8 = ?,
        speaker_8_link = ?, 
        speaker_9 = ?,
        speaker_9_link = ?, 
        speaker_10 = ?,
        speaker_10_link = ?, 
        e_location = ?,
        descrip = ? 
    WHERE id =?");
    $stmt->execute(
    array(
        $name ,
        $year ,
        $mainImg, 
        $img_1, 
        $img_2, 
        $img_3, 
        $img_4, 
        $driveLink, 
        $speaker_1, 
        $speaker_1_link, 
        $speaker_2, 
        $speaker_2_link, 
        $speaker_3, 
        $speaker_3_link, 
        $speaker_4, 
        $speaker_4_link, 
        $speaker_5,
        $speaker_5_link, 
        $speaker_6, 
        $speaker_6_link, 
        $speaker_7, 
        $speaker_7_link, 
        $speaker_8, 
        $speaker_8_link, 
        $speaker_9, 
        $speaker_9_link,
        $speaker_10, 
        $speaker_10_link,  
        $eventLocation, 
        $desc, 
        $event_id
    ));
    echo "
    <script>
        toastr.success('Great , Event INFO has Been Successfully Update  .')
    </script>";
    header("Refresh:3;url=event.php");
}



/*
==========================  
  add new Event By/ Reham Osama
==========================
*/

function addEvent($name ,
                  $year ,
                  $mainImg, 
                  $img_1, 
                  $img_2, 
                  $img_3, 
                  $img_4, 
                  $driveLink, 
                  $speaker_1, 
                  $speaker_1_link, 
                  $speaker_2, 
                  $speaker_2_link, 
                  $speaker_3, 
                  $speaker_3_link, 
                  $speaker_4, 
                  $speaker_4_link, 
                  $speaker_5,
                  $speaker_5_link, 
                  $speaker_6, 
                  $speaker_6_link, 
                  $speaker_7, 
                  $speaker_7_link, 
                  $speaker_8, 
                  $speaker_8_link, 
                  $speaker_9, 
                  $speaker_9_link,
                  $speaker_10, 
                  $speaker_10_link,  
                  $eventLocation, 
                  $desc
                ){
    global $con;
    $stmt = $con->prepare("INSERT INTO event(
        e_name,
        e_season,
        main_img,
        imgs_link,
        img_1,
        img_2,
        img_3,
        img_4,
        speaker_1,
        speaker_1_link,
        speaker_2,
        speaker_2_link,
        speaker_3,
        speaker_3_link,
        speaker_4,
        speaker_4_link,
        speaker_5,
        speaker_5_link, 
        speaker_6,
        speaker_6_link, 
        speaker_7,
        speaker_7_link, 
        speaker_8,
        speaker_8_link, 
        speaker_9,
        speaker_9_link, 
        speaker_10,
        speaker_10_link, 
        e_location,
        descrip
        ) VALUE(
            :e_name, 
            :e_season, 
            :main_img, 
            :imgs_link, 
            :img_1, 
            :img_2, 
            :img_3, 
            :img_4, 
            :speaker_1, 
            :speaker_1_link, 
            :speaker_2, 
            :speaker_2_link, 
            :speaker_3,
            :speaker_3_link, 
            :speaker_4, 
            :speaker_4_link, 
            :speaker_5, 
            :speaker_5_link, 
            :speaker_6, 
            :speaker_6_link, 
            :speaker_7, 
            :speaker_7_link, 
            :speaker_8, 
            :speaker_8_link, 
            :speaker_9, 
            :speaker_9_link, 
            :speaker_10,
            :speaker_10_link, 
            :e_location,
            :descrip) 
            ");
    $stmt->execute(array(
        ":e_name" => $name, 
        ":e_season" => $year, 
        ":main_img" => $mainImg, 
        ":imgs_link" => $img_1, 
        ":img_1" => $img_2, 
        ":img_2" => $img_3, 
        ":img_3" => $img_4, 
        ":img_4" => $driveLink, 
        ":speaker_1" => $speaker_1, 
        ":speaker_1_link" => $speaker_1_link, 
        ":speaker_2" => $speaker_2, 
        ":speaker_2_link" => $speaker_2_link, 
        ":speaker_3" => $speaker_3,
        ":speaker_3_link" => $speaker_3_link, 
        ":speaker_4" => $speaker_4, 
        ":speaker_4_link" => $speaker_4_link, 
        ":speaker_5" => $speaker_5, 
        ":speaker_5_link" => $speaker_5_link, 
        ":speaker_6" => $speaker_6, 
        ":speaker_6_link" => $speaker_6_link, 
        ":speaker_7" => $speaker_7, 
        ":speaker_7_link" => $speaker_7_link, 
        ":speaker_8" => $speaker_8, 
        ":speaker_8_link" => $speaker_8_link, 
        ":speaker_9" => $speaker_9, 
        ":speaker_9_link" => $speaker_9_link, 
        ":speaker_10" => $speaker_10,
        ":speaker_10_link" => $speaker_10_link,
        ":e_location" => $eventLocation, 
        ":descrip" => $desc
    ));

    echo "
    <script>
        toastr.success('Great , Event has been successfully added .')
    </script>";
    header("Refresh:3;url=event.php");
}

// select Collage Name
function selectCollage(){
    global $con; 
    $stmt = $con->prepare("SELECT * FROM collage");
    $stmt->execute(array());
    return $stmt->fetchAll();
}

// select University Name
function selectUniversity(){
    global $con; 
    $stmt = $con->prepare("SELECT * FROM university");
    $stmt->execute(array());
    return $stmt->fetchAll();
}

// select Commity Name
function selectCommity(){
    global $con; 
    $stmt = $con->prepare("SELECT * FROM commity");
    $stmt->execute(array());
    return $stmt->fetchAll();
}

// select Season Name
function selectSeason(){
    global $con; 
    $stmt = $con->prepare("SELECT * FROM season");
    $stmt->execute(array());
    return $stmt->fetchAll();
}

// select Position Name
function selectPosition(){
    global $con; 
    $stmt = $con->prepare("SELECT * FROM position Where name!=?");
    $stmt->execute(array('Member'));
    return $stmt->fetchAll();
}