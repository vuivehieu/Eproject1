<?php 
$title = "Diary & Planner";
if(isset($_SESSION['user'])){
           require_once("Layout/headerforotherpages2.php");
}else{
	 	   require_once("Layout/headerforotherpages.php");
}
require_once("Config/utility.php");
//so luong result moi page 
// $current_page = 1;
// if(isset($_GET['page'])){
// 	$current_page = $_GET['page'];
// }else{
// 	$current_page = 1;
// }
// $result_per_page = 12;


// $index = ($current_page-1)*$result_per_page;


 $keyword = "";
  if(isset($_GET['keyword'])){
    $keyword = trim(getGET('keyword'));
    $sql ="SELECT COUNT(ID) AS total FROM product  WHERE TITLE LIKE '%$keyword%' OR CATEGORY_ID LIKE '%$keyword%' OR MANUFACTURER LIKE '%$keyword%' OR CATEGORY LIKE '%$keyword%'";
      $result = mysqli_query($conn, $sql);
      require_once('pagination.php');
      // $number = mysqli_num_rows($result);
    $sql = "SELECT * FROM product  WHERE TITLE LIKE '%$keyword%' OR CATEGORY_ID LIKE '%$keyword%' OR MANUFACTURER LIKE '%$keyword%' OR CATEGORY LIKE '%$keyword%' LIMIT $start, $limit";
  }
  else{
  	$sql = "SELECT COUNT(ID) AS total FROM product WHERE CATEGORY LIKE '%Diary%'";

		$result = mysqli_query($conn, $sql);
		require_once('pagination.php');


    $sql = "SELECT * FROM product WHERE CATEGORY = 'Diary & Planner'
    LIMIT $start, $limit";
  }

  $result = mysqli_query($conn, $sql);



  //   if ($result == false) {
  //   echo '<h3 style="margin-left: 400px;">Không có kết quả !</h3>';
  // }
//    if($result !=null && count($result)>0){
//         $number = $result[0]['number'];
// }

?>
<!-- <div class="intro-container">
			<div class="intro-left" style="background-color: #50666d;">
				<div class="intro-content">
					<div class="intro-title">CALENDARS</div>
					<div class="intro-sub">Turn your desk into an inspiring, well-organised space with Ryana Calendar's high-quality stationery and delightful wall and desk calendars. </div>
				</div>
			</div>
			<div class="intro-right">
				<img src="../Images/Front/Thumbnail/calendar.jpg">
			</div>
		</div> -->
		<div class="intro-container">
			<div class="intro-left" style="background-color: #b5d99c;">
				<div class="intro-content">
					<div class="intro-title">PLANNERS</div>
					<div class="intro-sub">Using a planner allows you to schedule each event, appointment, errand, and task, so that you know what to expect and don’t run out of time.</div>
				</div>
			</div>
			<div class="intro-right">
				<img src="../Images/Front/Thumbnail/PLANNER.jpg">
			</div>
		</div>


<?php 
require_once("product_display.php");
require_once("paginationdisplay.php");
if(isset($_SESSION['user'])){
           require_once("Layout/loggedft.php");
}else{
	 	  require_once("Layout/footer.php");
}

?>