<?php
    ob_start(); 
    session_start();
    $page_name = "delete";
    require_once "init.php";
    if(isset($_SESSION['first_name'])){
        if ($_GET['from'] == "members" && isset($_GET['id']) && is_numeric($_GET['id'])){
            $member_id = $_GET['id'];
            $stmt = $con->prepare("DELETE FROM members WHERE id = :member_id");
            $stmt->bindParam(":member_id" , $member_id);
            $stmt->execute();
            echo "<h3 class='alert alert-danger'>member has deleted successfuly ... you will return to previous page in 2s</h3>";
            header("refresh:2;url=members.php");
        }else if($_GET['from'] == "hosters" && isset($_GET['id']) && is_numeric($_GET['id'])){
            $hoster_id = $_GET['id'];
            $stmt = $con->prepare("DELETE FROM hosters WHERE id = :hoster_id");
            $stmt->bindParam(":hoster_id" , $hoster_id);
            $stmt->execute();
            echo "<h3 class='alert alert-danger'>member has deleted successfuly ... you will return to previous page in 2s</h3>";
            header("refresh:2;url=hosters.php");
        }else if($_GET['from'] == "messages" && isset($_GET['id']) && is_numeric($_GET['id'])){
            $messages_id = $_GET['id'];
            $stmt = $con->prepare("DELETE FROM contact WHERE id = :messages_id");
            $stmt->bindParam(":messages_id" , $messages_id);
            $stmt->execute();
            echo "<h3 class='alert alert-danger'>Message has deleted successfuly ... you will return to previous page in 2s</h3>";
            header("refresh:2;url=get_messages.php");
        }else if($_GET['from'] == "opinion" && isset($_GET['id']) && is_numeric($_GET['id'])){
            $opinion_id = $_GET['id'];
            $stmt = $con->prepare("DELETE FROM opinion WHERE id = :opinion_id");
            $stmt->bindParam(":opinion_id" , $opinion_id);
            $stmt->execute();
            echo "<h3 class='alert alert-danger'>Opnion has deleted successfuly ... you will return to previous page in 2s</h3>";
            header("refresh:2;url=get_opinion.php");
        }else if($_GET['from'] == "event" && isset($_GET['id']) && is_numeric($_GET['id'])){
            $event_id = $_GET['id'];
            $stmt = $con->prepare("DELETE FROM event WHERE id = :event_id");
            $stmt->bindParam(":event_id" , $event_id);
            $stmt->execute();
            echo "<h3 class='alert alert-danger'>Event has deleted successfuly ... you will return to previous page in 2s</h3>";
            header("refresh:2;url=event.php");
        }
        else{
            header("location:dashboard.php");
        }
    }else{
        header("location:dashboard.php");
    }
    ob_end_flush();