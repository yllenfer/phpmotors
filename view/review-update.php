<title><?php //if(isset($reviewInfo['invMake']) && isset($reviewInfo['invModel'])){ 
	 //echo "Modify $reviewInfo[invMake] $reviewInfo[invModel]";} 
	//elseif(isset($invMake) && isset($invModel)) { 
//echo "Modify $invMake $invModel"; }?> | PHP Motors</title>



<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>



<nav>
<?php 
 echo $navList?> 
 
</nav>
<?php
echo '<h4>Here I am</h4>' .$invInfo['invMake'];
?>


<h1><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
	echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
elseif(isset($invMake) && isset($invModel)) { 
echo "Modify $invMake $invModel";
echo $invInfo; }?>
</h1>

<?php


if (isset($message)) {
 echo $message;
}

?>


  <form class="update-form" method="post" action="/phpmotors/reviews/index.php">
  <!-- date("j F, Y",strtotime($review['reviewDate'])) -->
  <br>
<h4>Reviewed on <?php echo date("j F, Y",strtotime($reviewInfo['reviewDate']));?> </h4>
<label for="reviewText">Review Text</label><br>
<textarea  class="textareaupdate" id="reviewText" name="reviewText" rows="2" cols="20" required oninvalid="this.setCustomValidity('Please enter a review')" oninput="this.setCustomValidity('')" ><?php if(isset($reviewInfo['reviewText'])) {echo $reviewInfo['reviewText'];}  ?></textarea>
<input type="hidden" name="action" value="reviewUpdate">
<input type="hidden" name="reviewId" value="<?php if(isset($reviewInfo['reviewId'])){ echo $reviewInfo['reviewId'];} elseif(isset($reviewId)){ echo $reviewId; } ?>"><br>
<button type="submit" value="reviewUpdate">Update</button><br>
  <p class="lastUpdated">Last updated: </p><br>
</form>
  

<?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>  

