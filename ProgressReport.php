<?php
require('util/Connection.php');
require('util/SessionCheck.php');
require('Header.php');

$studentid = "123";

if(isset($_SESSION["studentid"])){

	$studentid = $_SESSION["studentid"];
	echo $studentid;
	$query = "SELECT * FROM profile WHERE studentid='$studentid'";
	$result = mysqli_query($con,$query);
	$numrows = mysqli_num_rows($result);
	if($numrows==1){
		
	}
	else{
		header("Location:../Profile.php");
	}
}
else{
	header("Location:../Profile.php");
}


?>

<!-- <style>
    body {
        font-size: 15px; /* Change the value as needed */
    }
</style> -->

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Progress Report</li>
                </ul>
                <!-- END BREADCRUMB -->


				<!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <div class="row">
                        <div class="col-md-12">

                            <!-- START SIMPLE DATATABLE -->
                            <div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Grades</h3>
							</div>
							<a href="AddGrade.php" style="float:right;margin-top:10px;margin-right:13px" target="_blank"><button type="button" class="btn btn-success">Add Grade Record</button></a>
								<div class="panel-body">
									<div class="row">
									
									<div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
												<th>Subject</th>
                                                <th>Grade</th>
                                                <th>Date</th>
                                                <th>Approved</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php

										$query = "SELECT * FROM grades WHERE studentid='$studentid'";
										$result = mysqli_query($con,$query);
										$numrows = mysqli_num_rows($result);
										while($row = mysqli_fetch_array($result))
										{

											$temp_id = (string)$row['uid'];
											$approved = (string)$row['approved'];
											if($approved==1){
												$approved = "Approved";
											}
											else{
												$approved = "Pending";
											}
											
											echo "<tr><td>{$row['subject']}</td>".
											"<td>{$row['grade']}</td>".
											"<td>{$row['date']}</td>".
											"<td>{$approved}</td>".
											 "<td> <button class='btn btn-warning btn-rounded' onclick=\"edit_entry('grade','{$temp_id}')\">Edit</button></td>".
											 "<td> <button class='btn btn-danger btn-rounded' onclick=\"delete_entry('grade','{$temp_id}')\">Delete</button></td></tr>";

										}

										?>
                                        </tbody>
                                    </table>
                                  </div>
										
                                </div>
                            </div>
                            <!-- END SIMPLE DATATABLE -->

                        </div>
                    </div>

                </div>
				
				<div class="row">
                        <div class="col-md-12">

                            <!-- START SIMPLE DATATABLE -->
                            <div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Journals</h3>
							</div>
							<a href="AddJournals.php" style="float:right;margin-top:10px;margin-right:13px" target="_blank"><button type="button" class="btn btn-success">Add Journal Record</button></a>
								<div class="panel-body">
									<div class="row">
									
									<div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
												<th>Journal Name</th>
                                                <th>Publish Date</th>
                                                <th>Approved</th>
                                                <th>Journal Website</th>
                                                <th>Journal Link</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php

										$query = "SELECT * FROM journals WHERE studentid='$studentid'";
										$result = mysqli_query($con,$query);
										$numrows = mysqli_num_rows($result);
										while($row = mysqli_fetch_array($result))
										{

											$temp_id = (string)$row['uid'];
											$approved = (string)$row['approved'];
											$journal_website = (string)$row['journal_website'];
											$journal_link = (string)$row['journal_link'];
											if($approved==1){
												$approved = "Approved";
											}
											else{
												$approved = "Pending";
											}
											
											echo "<tr><td>{$row['journal_name']}</td>".
											"<td>{$row['publish_date']}</td>".
											"<td>{$approved}</td>".
											"<td><a href='$journal_website' target='_blank'><button class='btn btn-info btn-rounded'>Journal Website</button></a></td>".
											"<td><a href='$journal_link' target='_blank'><button class='btn btn-info btn-rounded'>Journal Link</button></a></td>".
											"<td> <button class='btn btn-warning btn-rounded' onclick=\"edit_entry('journal','{$temp_id}')\">Edit</button></td>".
											"<td> <button class='btn btn-danger btn-rounded' onclick=\"delete_entry('journal','{$temp_id}')\">Delete</button></td></tr>";

										}

										?>
                                        </tbody>
                                    </table>
                                  </div>
										
                                </div>
                            </div>
                            <!-- END SIMPLE DATATABLE -->

                        </div>
                    </div>

                </div>
				
				<div class="row">
                        <div class="col-md-12">

                            <!-- START SIMPLE DATATABLE -->
                            <div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Papers</h3>
							</div>
							<a href="AddPaper.php" style="float:right;margin-top:10px;margin-right:13px" target="_blank"><button type="button" class="btn btn-success">Add Paper Record</button></a>
								<div class="panel-body">
									<div class="row">
									
									<div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
												<th>Paper Title</th>
                                                <th>Presentation Date</th>
                                                <th>Presentation Country</th>
                                                <th>Approved</th>
                                                <th>Paper Website</th>
                                                <th>Paper Link</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php

										$query = "SELECT * FROM papers WHERE studentid='$studentid'";
										$result = mysqli_query($con,$query);
										$numrows = mysqli_num_rows($result);
										while($row = mysqli_fetch_array($result))
										{

											$temp_id = (string)$row['uid'];
											$approved = (string)$row['approved'];
											$paper_website = (string)$row['paper_website'];
											$paper_link = (string)$row['paper_link'];
											if($approved==1){
												$approved = "Approved";
											}
											else{
												$approved = "Pending";
											}
											
											echo "<tr><td>{$row['paper_name']}</td>".
											 "<td>{$row['presentation_date']}</td>".
											 "<td>{$row['presentation_country']}</td>".
											 "<td>{$approved}</td>".
											 "<td><a href='$paper_website' target='_blank'><button class='btn btn-info btn-rounded'>Paper Website</button></a></td>".
											 "<td><a href='$paper_link' target='_blank'><button class='btn btn-info btn-rounded'>Paper Link</button></a></td>".
											 "<td> <button class='btn btn-warning btn-rounded' onclick=\"edit_entry('paper','{$temp_id}')\">Edit</button></td>".
											 "<td> <button class='btn btn-danger btn-rounded' onclick=\"delete_entry('paper','{$temp_id}')\">Delete</button></td></tr>";

										}

										?>
                                        </tbody>
                                    </table>
                                  </div>
										
                                </div>
                            </div>
                            <!-- END SIMPLE DATATABLE -->

                        </div>
                    </div>

                </div>
				
				<div class="row">
                        <div class="col-md-12">

                            <!-- START SIMPLE DATATABLE -->
                            <div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Patents</h3>
							</div>
							<a href="AddPatent.php" style="float:right;margin-top:10px;margin-right:13px" target="_blank"><button type="button" class="btn btn-success">Add Patent Record</button></a>
								<div class="panel-body">
									<div class="row">
									
									<div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
												<th>Patent Title</th>
                                                <th>Patent Grade</th>
                                                <th>Approved</th>
                                                <th>Patent Link</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php

										$query = "SELECT * FROM patent WHERE studentid='$studentid'";
										$result = mysqli_query($con,$query);
										$numrows = mysqli_num_rows($result);
										while($row = mysqli_fetch_array($result))
										{

											$temp_id = (string)$row['uid'];
											$approved = (string)$row['approved'];
											$patent_link = (string)$row['patent_link'];
											if($approved==1){
												$approved = "Approved";
											}
											else{
												$approved = "Pending";
											}
											
											echo "<tr><td>{$row['patent_title']}</td>".
											 "<td>{$row['patent_grade']}</td>".
											 "<td>{$approved}</td>".
											 "<td><a href='$patent_link' target='_blank'><button class='btn btn-info btn-rounded'>Patent Link</button></a></td>".
											 "<td> <button class='btn btn-warning btn-rounded' onclick=\"edit_entry('patent','{$temp_id}')\">Edit</button></td>".
											 "<td> <button class='btn btn-danger btn-rounded' onclick=\"delete_entry('patent','{$temp_id}')\">Delete</button></td></tr>";

										}

										?>
                                        </tbody>
                                    </table>
                                  </div>
										
                                </div>
                            </div>
                            <!-- END SIMPLE DATATABLE -->

                        </div>
                    </div>

                </div>
                <!-- PAGE CONTENT WRAPPER -->
			
				<div class="row">
                        <div class="col-md-12">

                            <!-- START SIMPLE DATATABLE -->
                            <div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Stipend Received</h3>
							</div>
							 
								<h2 style="padding-left:2rem; color:red;">Yes</h2>		
                                
                            </div>
                            <!-- END SIMPLE DATATABLE -->

                        </div>
                    </div>

                </div>




            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->



    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="js/plugins/tableexport/tableExport.js"></script>
		<script type="text/javascript" src="js/plugins/tableexport/jquery.base64.js"></script>
		<script type="text/javascript" src="js/plugins/tableexport/html2canvas.js"></script>
		<script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/sprintf.js"></script>
		<script type="text/javascript" src="js/plugins/tableexport/jspdf/jspdf.js"></script>
		<script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/base64.js"></script>
        <!-- END PAGE PLUGINS -->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/actions.js"></script>
        <!-- END TEMPLATE -->
		
		<script>
		
		function post(params,file) {
			
			method = "post"; 
			path = file;
			
			var form = document.createElement("form");
			form.setAttribute("method", method);
			form.setAttribute("action", path);

			for(var key in params) {
				if(params.hasOwnProperty(key)) {
					var hiddenField = document.createElement("input");
					hiddenField.setAttribute("type", "hidden");
					hiddenField.setAttribute("name", key);
					hiddenField.setAttribute("value", params[key]);

					form.appendChild(hiddenField);
				 }
			}

			document.body.appendChild(form);
			form.submit();
		}
		
		function edit_entry(filename, temp_id){
			if(filename=="patent"){
				post({uid: temp_id} ,"EditPatent.php");				
			}
			else if(filename=="grade"){
				post({uid: temp_id} ,"EditGrade.php");				
			}
			else if(filename=="journal"){
				post({uid: temp_id} ,"EditJournal.php");
			}
			else if(filename=="paper"){
				post({uid: temp_id} ,"EditPaper.php");
			}
		}
		
		function delete_entry(filename, temp_id){
			if(filename=="patent"){
				post({uid: temp_id} ,"api/DeletePatent.php");				
			}
			else if(filename=="grade"){
				post({uid: temp_id} ,"api/DeleteGrade.php");				
			}
			else if(filename=="journal"){
				post({uid: temp_id} ,"api/DeleteJournal.php");
			}
			else if(filename=="paper"){
				post({uid: temp_id} ,"api/DeletePaper.php");
			}
		}
		
		</script>

    </body>
</html>
