 <?php

	include ('header.php');

	include ('slider.php');

?>
<section id="content">

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<?php 					
			include('connect.php');
			error_reporting(0);
			?>
				<div class="col-lg-12 " style="background:	#fcfcfc;">
				<form id="job_search" name="job_search" method="post" action="index.php">
				
					<div class="col-lg-3 search_3">
					<label>Job Title</label><br>
					 <select name="job_title" id="job_title" >
					<option value="">Select Job Title</option>
					<?php
					$sql = "SELECT * FROM job_post GROUP BY job_title ORDER BY job_title ASC";
					$sql_result = mysqli_query ($conn,$sql) or die ('request "Could not execute SQL query" '.$sql);
					
					while ($row = mysqli_fetch_assoc($sql_result)) 
					{	
					echo "<option value='".$row["job_title"]."'".($row["job_title"]==$_REQUEST["job_title"] ? " selected" : "").">".$row["job_title"]."</option>";
					}
					?>
					</select>
					</div>
					
					<div class="col-lg-3 search_3">
					<label>Industry Type</label><br>
					<select name="industry_type" id="industry">
					<option value="">Select industry type</option>
					<?php
					$sql = "SELECT * FROM job_post GROUP BY industry_type ORDER BY industry_type ASC";
					$sql_result = mysqli_query ($conn,$sql) or die ('request "Could not execute SQL query" '.$sql);
					
					while ($row = mysqli_fetch_assoc($sql_result)) {
					echo "<option value='".$row["industry_type"]."'".($row["industry_type"]==$_REQUEST["industry_type"] ? " selected" : "").">".$row["industry_type"]."</option>";
					}
					?>
					</select>
					</div>

					<div class="col-lg-3 search_3">
					<label>Location</label><br>
					<select name="job_location" id="job_location">
					 <option value="">Select City</option>	
					<?php
					$sql = "SELECT * FROM job_post GROUP BY job_location ORDER BY job_location ASC";
					$sql_result = mysqli_query ($conn,$sql) or die ('request "Could not execute SQL query" '.$sql);
					
					while ($row = mysqli_fetch_assoc($sql_result)) {
					echo "<option value='".$row["job_location"]."'".($row["job_location"]==$_REQUEST["job_location"] ? " selected" : "").">".$row["job_location"]."</option>";
					}
					?>
					</select>
					</div>
					
					<div class="col-lg-2 text-center"><br>
					<div class="btn-group">
					<input type="submit" name="button" id="button" class="btn btn-primary" value="Search" />
					&nbsp;
	
					<a href="index.php" class="btn btn-info">Reset</a>
					
					</div>
					</div>
				</form>
			</div>
			
			
			<div class="col-lg-12 job-block">
			<h3 class="recent-heading">Recent Jobs</h3>
			
			<div class="table-responsive">
			<table class="table table-bordered table-hover tbl-latest1">
				<thead class="thead">
					<tr>
						<td><b>Job Title</b></td>
						<td><b>Industry</b></td>
						<td><b>Location</b></td>
						<td><b>Details</b></td>
						<td><b>Apply</b></td>
					</tr>

				</thead>
			
			<?php
			
			if ($_REQUEST["job_title"]<>'') {
				$search_string = " AND (job_title LIKE '%".mysqli_real_escape_string($conn,$_REQUEST["job_title"])."%')";	
			}
			
			if ($_REQUEST["industry_type"]<>'') {
				$search_industry = " AND industry_type='".mysqli_real_escape_string($conn,$_REQUEST["industry_type"])."'";	
			}
			
			if ($_REQUEST["job_location"]<>'') {
				$search_location = " AND job_location='".mysqli_real_escape_string($conn,$_REQUEST["job_location"])."'";	
			}	
			
			/*
			 if ($_REQUEST["job_location"]<>'') {
				$sql = "SELECT * FROM job_post WHERE job_location >= '".mysqli_real_escape_string($conn,$_REQUEST["job_location"])."'";
			} 
			*/

			if ($_REQUEST["job_id"]<>'') {
				$sql = "SELECT * FROM job_post WHERE job_id >= '".mysqli_real_escape_string($conn,$_REQUEST["job_id"])."'";
			} 
			
			else {
			$sql = "SELECT * FROM job_post WHERE job_id>0 ".$search_string.$search_industry.$search_location;
			}
			
			$sql_result = mysqli_query ($conn,$sql."AND status='Published' ORDER BY job_id DESC LIMIT 15") or die ('request "Could not execute SQL query" '.$sql);
			
							
			
			
			if (mysqli_num_rows($sql_result)>0) {
				while ($row = mysqli_fetch_assoc($sql_result)) {
			?>
			<tr>
				<td><?php echo $row['job_title'];?></td>
				<td><?php echo $row['industry_type'];?></td>
				<td><?php echo $row['job_location'];?></td>									
				<td><?php echo '<a href="view-job-details.php?id='.$row['job_id'].'" title="View" class="button">'.'View'.'</a>';?></td>
				<td><?php echo '<a href="apply-now.php?id='.$row['job_id'].'" title="Apply Now" class="btn btn-warning" name="applyjob" id="applyjob">'.'Apply Now'.'</a>';?></td>		
			</tr> 
			
			
			<?php
				} }
				else {
					echo '<caption align="bottom"> <p class="failed">No results found</p></caption>';
				}
			?>

			</table>
			
			</div>
			
			</div>
		</div>	
		
	</div>	
</div>
</section>	

			



<section id="content" style="color:black; font-size:16px; background:#f7f7f7; margin-bottom:-9px;">

<div class="container">

	<div class="col-lg-12">

		<h2 style="color:black;"><u>Index HR Consultancy</u></h2>

		<p>Index HR Consultancy recruitment based in Mumbai is a giant in manpower outsourcing, renowned amongst Top Job consultants in India for our consulting expertise in recruitment and HR services.</p>

		<p>Index HR Consultancy  of a professional team of Job Placement Consultants in Mumbai, highly skilled in providing human resource solutions that are tailored specially to meet the needs of your company and take it to the next level of the industry's hierarchy. Our team of top job consultants in India renders recruitment and selection services to individuals and companies alike, providing select manpower at various levels of hierarchy and a diverse range of industries.</p>

		<p>Ranked amongst the best HR Consultants in Mumbai our team finds you talent through intense critique and analysis. Being a customer centric firm we match our pace with Top Job Consultants in India by selection processes to meet the need of your company, finding you raw talent and skill employees befitting your requirements accurately.</p>	

		

	</div>



	

</div>

</section>	
	<!-- main section end -->

	

<?php

	include ('footer.php');

?>