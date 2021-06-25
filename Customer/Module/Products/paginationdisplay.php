	<style type="text/css">
		.pagination{
			margin-top: 10px;
			text-align: center;
			margin-bottom: 0px;
			font-size: 20px;
		}
		a{
			text-decoration: none;
		}
	</style>

<div class="pagination">
<?php  
if(isset($_GET['keyword'])){
			if ($current_page >= 1 && $total_page >= 1 && $current_page != 1){
			    echo "<a style = 'color: blue;' href='index.php?module=products&action=".$action."&page=".($current_page-1)."&keyword=".$keyword."'>Trước</a>  ";
				} 
			// Lặp khoảng giữa
			for ($i = 1; $i <= $total_page; $i++){
				if ($i == $current_page){
				   echo "<span style = 'color: red;'>".$i."</span> ";
				}
				else{
					echo "<a style = 'color: black;' href='index.php?module=products&action=".$action."&page=".$i."&keyword=".$keyword."'>".$i."</a>  ";
				}
			} 
				// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
			if ($current_page < $total_page && $total_page > 1){
				echo "<a style = 'color: blue;' href='index.php?module=products&action=".$action."&page=".($current_page+1)."&keyword=".$keyword."'>Tiếp</a>";
				}	
			
				}
				else
				{if ($current_page >= 1 && $total_page >= 1 && $current_page != 1){
			    echo "<a style = 'color: blue;' href='index.php?module=products&action=".$action."&page=".($current_page-1)."'>Trước</a>  ";
				} 
			// Lặp khoảng giữa
			for ($i = 1; $i <= $total_page; $i++){
				if ($i == $current_page){
				   echo "<span style = 'color: red;'>".$i."</span> ";
				}
				else{
					echo "<a style = 'color: black;' href='index.php?module=products&action=".$action."&page=".$i."'>".$i."</a>  ";
				}
			} 
				// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
			if ($current_page < $total_page && $total_page > 1){
				echo "<a style = 'color: blue;' href='index.php?module=products&action=".$action."&page=".($current_page+1)."'>Tiếp</a>";
				}	

				}
?>
 </div><br><br><br><br>