<?php

use yii\helpers\Html;

/* @var $this yii\web\View */


function drawComment($row, $margin=0){
   // var_dump($row);
    $out='
    <div style="margin-left:'.$margin.'px">
        <div class="forComUser">
            <div class="circle" style="display: inline-block; vertical-align: middle"><img src="img/user/'.$row->imge.'"/></div>
            <div class="usernameCom">'.$row->comment_sender_name.'</div>
        </div>
        <p class="commentTxt">'.$row->comment.'</p>
        <div class="dateCom">'.$row->date.'</div>
        <button class="bttn reply" style="width:5.5vw; font-size: 0.75vw; margin-top:-13%; margin-left: 75%"
        id="btnRep'.$row['comment_id'].'" data-cid="'.$row->comment_id.'">Reply</button>
    </div>
        ';
    return $out;
}

function getReply($parent, $margin=0){
    
    $rows = $parent->comments;
    $margin=$margin + 40;
    $out ='';
    if(count($rows)>0){
        foreach($rows as $row){
            $out .=drawComment($row, $margin);
            $out .=getReply($row,$margin);
        }
    
    }
    return $out;
}

$out ='';
foreach($model as $row){
    $out .=drawComment($row);
    $reps=getReply($row);
    if (strlen($reps)>0){
        $out .='<button class="showreply" data-cid="'.$row['comment_id'].'" >Show replies</button>';
        $out .='<div style="display:none" id="resps'.$row['comment_id'].'">';
        $out .=$reps;
        $out .='</div>';
        }
}
echo   $out;
?>

