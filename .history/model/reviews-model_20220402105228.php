<?php
//This is the reviews model 

function getReviewItemInfo($reviewId){
    $db = phpmotorsConnect();
    $sql = 'SELECT * FROM reviews WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $invInfo;
   }
   
function addReview($reviewText, $invId, $clientId){
$db = phpmotorsConnect();
$sql = 'INSERT INTO reviews (reviewText, invId, clientId)
    VALUES (:reviewText, :invId, :clientId)';
$stmt = $db->prepare($sql);
$stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
$stmt->bindValue(':invId', $invId, PDO::PARAM_STR);
$stmt->bindValue(':clientId', $clientId, PDO::PARAM_STR);
$stmt->execute();
$rowsChanged = $stmt->rowCount();
$stmt->closeCursor();
return $rowsChanged;
      
}


function getReviewInfo($invId){
    
// echo $invId;
$db = phpmotorsConnect();
 $sql = 'SELECT * FROM reviews INNER JOIN client ON reviews.clientId = client.clientId WHERE invId = :invId  ORDER BY reviewDate DESC';
$stmt = $db->prepare($sql);
$stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
$stmt->execute();
$rowsChanged = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();
return $rowsChanged;

}


function getReviewInfoClient($clientId){
    
    // echo $invId;
    $db = phpmotorsConnect();
     $sql = 'SELECT * FROM reviews INNER JOIN inventory ON reviews.invId = inventory.invId WHERE clientId = :clientId  ORDER BY reviewDate DESC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $rowsChanged;
    
    }


    function deleteReview($reviewId) {
        $db = phpmotorsConnect();
        $sql = 'DELETE FROM reviews WHERE reviewId = :reviewId';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
        $stmt->execute();
        $rowsChanged = $stmt->rowCount();
        $stmt->closeCursor();
        return $rowsChanged;
        }



function updateReview($reviewId, $reviewText) {
    $db = phpmotorsConnect();
    $sql = 'UPDATE reviews SET reviewText = :reviewText  WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
    }


    


    function getInvItemInfoRew($invId){
        $db = phpmotorsConnect();
        $sql = 'SELECT * FROM inventory WHERE invId = :invId';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
        $stmt->execute();
        $invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $invInfo;
       }
    
    
    

?>