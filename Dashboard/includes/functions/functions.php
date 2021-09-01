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
  insert new committee By/ Amr Mohamed
==========================
*/
 
function insert_committee ($name, $abbreviation, $describtion){
    global $con;
    $stmt = $con->prepare("INSERT INTO commity(name,abbreviation,describtion) Value(:name,:abbreviation,:describtion)");
    $stmt->execute(
    array(
        ":name"       => $name,
        ":abbreviation"        => $abbreviation,
        ":describtion"            => $describtion
    ));
    echo "
    <script>
        toastr.success('Great , Committee has been successfully added .')
    </script>";
    header("Refresh:3;url=commities.php");
}


/*
==========================  
  insert new Season
==========================
*/

function addSeason($year, $active_season){
    global $con;
    $stmCheck = $con->prepare("SELECT * FROM season WHERE year=?");
    $stmCheck->execute(array($year));
    $rowsStmCheck = $stmCheck->fetchAll(PDO::FETCH_ASSOC);

    if(empty( $rowsStmCheck )){
        $stmt = $con->prepare("INSERT INTO season(year, active_season) Value(:year, :active_season)");
        $stmt->execute(
        array(
            ":year"       => $year,
            ":active_season"        => $active_season
        ));
        echo "
        <script>
            toastr.success('Great , Season has been successfully added .')
        </script>";
        header("Refresh:3;url=season.php");
    } else {
        echo "
        <script>
            toastr.error('Failed , Season year has alread been used.')
        </script>";
    }
}

/*
==========================  
  insert new Collage
==========================
*/

function addCollage($name){
    global $con;
    $stmCheck = $con->prepare("SELECT * FROM collage WHERE name=?");
    $stmCheck->execute(array($name));
    $rowsStmCheck = $stmCheck->fetchAll(PDO::FETCH_ASSOC);

    if(empty( $rowsStmCheck )){
        $stmt = $con->prepare("INSERT INTO collage(name) Value(:name)");
        $stmt->execute(
        array(
            ":name"  => $name
        ));
        echo "
        <script>
            toastr.success('Great , College has been successfully added.')
        </script>";
        header("Refresh:3;url=college.php");
    } else {
        echo "
        <script>
            toastr.error('Failed , College name has alread been used.')
        </script>";
    }
}


/*
==========================  
  insert new Opinion
==========================
*/

function addOpinion($first_name, $last_name, $email, $commity, $position, $opinion){
    global $con;
    
    $stmt = $con->prepare("INSERT INTO opinion(first_name, last_name, email, commity, position, opinion) Value(:first_name, :last_name, :email, :commity, :position, :opinion)");
    $stmt->execute(
    array(
        ":first_name" => $first_name, 
        ":last_name" => $last_name, 
        ":email" => $email, 
        ":commity" => $commity, 
        ":position" => $position, 
        ":opinion" => $opinion
    ));
    echo "
    <script>
        toastr.success('Great , Opinion has been successfully added.')
    </script>";
    header("Refresh:3;url=get_opinion.php");
}

/*
==========================  
  update Season
==========================
*/

function updateSeason($year, $active_season, $seasonId){
    global $con;
    $stmCheck = $con->prepare("SELECT * FROM season WHERE year=? AND Not id = ?");
    $stmCheck->execute(array($year, $seasonId));
    $rowsStmCheck = $stmCheck->fetchAll(PDO::FETCH_ASSOC);

    if(count($rowsStmCheck) == 0){
        // echo "yes update " . count($rowsStmCheck) . " id = " . $collageId;
        $stmt = $con->prepare("UPDATE season SET year = ?,active_season = ? WHERE id =?");
        $stmt->execute(
            array($year, $active_season, $seasonId)
        );
        echo "
        <script>
            toastr.success('Update , Season INFO has Been Successfully Update.')
        </script>";
        header("Refresh:3;url=season.php");
    } else if(count($rowsStmCheck) == 1) {
        // echo "no update " . count($rowsStmCheck);
        echo "
        <script>
            toastr.error('Failed , Season name has alread been used.')
        </script>";
    }
}

/*
==========================  
  update Collage
==========================
*/

function updateCollage($name, $collageId){
    global $con;
    $stmCheck = $con->prepare("SELECT * FROM collage WHERE name=? AND Not id = ?");
    $stmCheck->execute(array($name, $collageId));
    $rowsStmCheck = $stmCheck->fetchAll(PDO::FETCH_ASSOC);

    if(count($rowsStmCheck) == 0){
        // echo "yes update " . count($rowsStmCheck) . " id = " . $collageId;
        $stmt = $con->prepare("UPDATE collage SET name = ? WHERE id =?");
        $stmt->execute(
            array($name, $collageId)
        );
        echo "
        <script>
            toastr.success('Update , College INFO has Been Successfully Update.')
        </script>";
        header("Refresh:3;url=college.php");
    } else if(count($rowsStmCheck) == 1) {
        // echo "no update " . count($rowsStmCheck);
        echo "
        <script>
            toastr.error('Failed , College name has alread been used.')
        </script>";
    }
}

/*
==========================  
  update Opinion
==========================
*/

function updateOpinion($first_name, $last_name, $email, $commity, $position, $opinion, $opinionId){
    global $con;
    $stmt = $con->prepare("UPDATE opinion SET first_name = ?, last_name = ?, email = ?, commity = ?, position = ?, opinion = ? WHERE id =?");
    $stmt->execute(
        array($first_name, $last_name, $email, $commity, $position, $opinion, $opinionId)
    );
    echo "
    <script>
        toastr.success('Update , Opinion INFO has Been Successfully Update.')
    </script>";
    header("Refresh:3;url=get_opinion.php");
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
        toastr.success('Update , Member INFO has Been Successfully Update.')
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
    $stmtActiveSeason = $con->prepare("SELECT * FROM season WHERE active_season=1");
    $stmtActiveSeason->execute();
    $activeSeasonData = $stmtActiveSeason->fetch(PDO::FETCH_ASSOC);
    $activeSeasonYear = $activeSeasonData['year'];

    $stmt = $con->prepare("SELECT * FROM hosters WHERE season_year ='" . trim($activeSeasonYear) . "' AND old = 0");
    $stmt->execute();
    return $stmt->fetchAll();
}

// select HighBoard
function newBoardWithActiveSeason(){
    global $con; 
    $stmtActiveSeason = $con->prepare("SELECT * FROM season WHERE active_season=1");
    $stmtActiveSeason->execute();
    $activeSeasonData = $stmtActiveSeason->fetch(PDO::FETCH_ASSOC);
    $activeSeasonYear = $activeSeasonData['year'];

    $stmt = $con->prepare("SELECT * FROM hosters WHERE ((position_name = 'Head' OR position_name = 'President' OR position_name = 'Vice President' OR position_name = 'Project Director') AND season_year ='" . trim($activeSeasonYear) . "' AND old = 0)");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}



// select HighBoardOld
function selectHighBoardOld(){
    global $con; 
    $stmt = $con->prepare("SELECT * FROM hosters WHERE old=1");
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
    insert new Opinion
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
    insert new Message
==========================
*/

function insertMessage ($firstName, $lastName, $email ,$subject ,$message){  
    global $con;
    $stmt = $con->prepare("INSERT INTO contact(name,email,subject,message) Value(:name,:email,:subject,:message)");
    $stmt->execute(
    array(
        ":name"             => $firstName . " " . $lastName,
        ":email"            => $email,
        ":subject"          => $subject,
        ":message"           => $message
    ));
    echo "
    <script>
        toastr.success('Thanks for Your Time , Your Message Has been Send Successfully.')
    </script>";
    // header("Refresh:3;url=contactUs.php");
}


/*
==========================  
  count Members By/ Amr Mohamed
==========================
*/

function count_comittee_members($colume,$databname,$commity){
    global $con;
    $stmt = $con->prepare("SELECT COUNT($colume) From $databname WHERE commity = ?");
    // $stmt2 = $con->prepare("SELECT COUNT($colume) From hosters WHERE commity_name = ?");
    $stmt->execute(array($commity));
    // $stmt2->execute(array($commity));
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
    // $stmt2 = $con->prepare("SELECT * FROM hosters WHERE commity_name = ?");
    $stmt->execute(array($commity));
    // $stmt2->execute(array($commity));
    // $rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // $rows = $rows2;
    // $rows

    /*foreach($rows1 as $rows1_data){
        // echo "<pre>";
        // print_r($rows1_data);
        array_push($rows2,$rows1_data);
        // echo "</pre>";
    }*/

    // $rows = $rows2;
    // $rows = array();

    // array_push($rows,$rows2,$rows1);
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


function updateEvent( $name, $year, $mainImg, $img_1, $img_2, $img_3, $img_4, $driveLink, $speaker_1, $speaker_1_link, $speaker_2, $speaker_2_link, $speaker_3, $speaker_3_link, $speaker_4, $speaker_4_link, $speaker_5, $speaker_5_link, $speaker_6, $speaker_6_link, $speaker_7, $speaker_7_link, $speaker_8, $speaker_8_link, $speaker_9, $speaker_9_link, $speaker_10, $speaker_10_link, $eventLocation, $desc, $event_id){
    global $con;
    $stmt = $con->prepare("UPDATE event SET e_name = ?, e_season = ?, main_img = ?, imgs_link = ?, img_1 = ?, img_2 = ?, img_3 = ?, img_4 = ?, speaker_1 = ?, speaker_1_link = ?, speaker_2 = ?, speaker_2_link = ?, speaker_3 = ?, speaker_3_link = ?, speaker_4 = ?, speaker_4_link = ?, speaker_5 = ?, speaker_5_link = ?, speaker_6 = ?, speaker_6_link = ?, speaker_7 = ?, speaker_7_link = ?, speaker_8 = ?, speaker_8_link = ?, speaker_9 = ?, speaker_9_link = ?, speaker_10 = ?, speaker_10_link = ?, e_location = ?,
        descrip = ? 
    WHERE id =?");
    $stmt->execute(
    array(
        $name, $year, $mainImg, $driveLink, $img_1, $img_2, $img_3, $img_4, $speaker_1, $speaker_1_link, $speaker_2, $speaker_2_link, $speaker_3, $speaker_3_link, $speaker_4, $speaker_4_link, $speaker_5, $speaker_5_link, $speaker_6, $speaker_6_link, $speaker_7, $speaker_7_link, $speaker_8, $speaker_8_link, $speaker_9, $speaker_9_link, $speaker_10, $speaker_10_link, $eventLocation, $desc, $event_id));
    echo "
    <script>
        toastr.success('Update , Event INFO has Been Successfully Updated.')
    </script>";
    header("Refresh:3;url=event.php");
}


/*
==========================  
  update updateCommitte
==========================
*/

function updateCommitte($name, $abbreviation, $describtion,$committeId){
    global $con;
    $stmt = $con->prepare("UPDATE commity SET name = ?,abbreviation = ?,describtion = ? WHERE id = ?");
    $stmt->execute(
    array(
        $name,
        $abbreviation,
        $describtion,
        $committeId
    )); 
    echo "
    <script>
        toastr.success('Update , Committe INFO has Been Successfully Update.')
    </script>";
    header("Refresh:1;url=commities.php");
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