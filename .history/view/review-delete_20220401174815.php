<title><?php if(isset($invInfo['invMake'])){ echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?> | PHP Motors</title>



<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>



<nav>
<?php 
 echo $navList?> 
</nav>

<?php
if (isset($message)) {
echo $message;
}
?>


<h1><?php if(isset($invInfo['invMake'])){ echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?></h1>


<?php if (isset($message)) {echo $message;}?>

<h4 class="usethis">Confirm Review Deletion. The delete is permanent</h4>

<form class="deleteForm" method="post" action="/phpmotors/reviews/index.php"><br>
<label for="reviewText">Reviews</label><br>
<textarea id="reviewText" name="reviewText" readonly rows="2" cols="20" required oninvalid="this.setCustomValidity('Please enter a review')" oninput="this.setCustomValidity('')" ><?php if(isset($reviewInfo['reviewText'])) {echo $reviewInfo['reviewText'];}  ?></textarea><br>
<br><input type="hidden" name="action" value="deleteReview">
<input type="hidden" name="invId" value="<?php if(isset($reviewInfo['reviewId'])){ echo $reviewInfo['reviewId'];} elseif(isset($reviewId)){ echo $reviewId; } ?>">
<button type="submit" value="Delete Review">Delete</button>
</form>
  
<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  