<?
$dbn    = 'mysql:host=185.201.11.187;dbname=u919964947_pro';
$user   = 'u919964947_noha';
$pass   = 'Mn33454946';
$option =  array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',);


try {
	$conn = new PDO($dbn, $user, $pass, $option);
	
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
}

catch(PDOException $e) {
	
	echo 'Failed To Connect' . $e->getMessage();
	
}


/*
==================================================================================
==  Count Items Function2 -> Count items from table in database  More Specific
==================================================================================
*/

function countItems2 ($item, $table, $where)
{
	global $conn;
	
	$statement2 = $conn->prepare("SELECT COUNT($item) FROM $table WHERE $item = ? ");
	
	$statement2->execute(array($where));
	
	return $statement2->fetchColumn();
	
}



?>


<!doctype html>
<html>
<head>
     <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
	
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<title>Survey Report</title>
	
	
</head>
	
	
	
	<style>
* {
  font-family: Raleway, sans-serif;
  box-sizing: border-box;
  }

h1, h2, h3, h4, h5, h6, p {font-family: Raleway, sans-serif !important;}

label {cursor: pointer;}

.pointer {cursor: pointer;}

.title1 {
	padding-top: 4%;
    font-weight: bold;
    letter-spacing: 5px;
}

.counters {margin: 50px 0;}

.count-card {
	margin: 10px;
    padding: 15px;
	box-shadow: 0 0 5px 0 #363636;
    border: 1px solid #dadce0;
    border-radius: 20px;
	transition: all 0.3s linear;
	position: relative;
}

.whole_link {
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
}

.counter {
    text-align: center;
}

.counter span {
	font-size: 22pt;
    font-weight: bold;
}

.counter span a {color: #000;}


.icon {
	float: left;
	font-size: 40px;
}
		
.table-responsive
	{
		padding: 10px 5px;
		border: 1px solid #ccc;
		border-radius: 10px;
		box-shadow: 0 0 5px 1px #ccc;
	}
		
	</style>
	
<body>
	
		<h3 class="text-center title1">Survey Report</h3>

	

		<div class="container">
			
		<div class="counters">
				  <div class="row justify-content-center">
					  
				<div class="col-md-3 ">
					<div class="count-card">
						<h5 class="text-center"><strong>Unhappy</strong></h5>
							<div class="counter">
								<div class="icon">&#x1F61E;</div>
								<span><?php echo countItems2('rating', 'dolhar', 1) ?></span>
							</div>
					</div>
				</div>
					  
				<div class="col-md-3 ">
					<div class="count-card">
						<h5 class="text-center"><strong>Natural</strong></h5>
							<div class="counter">
								<div class="icon">&#x1F610;</div>
								<span><?php echo countItems2('rating', 'dolhar', 2) ?></span>
							</div>
					</div>
				</div>
					  
				<div class="col-md-3 ">
					<div class="count-card">
						<h5 class="text-center"><strong>Happy</strong></h5>
							<div class="counter">
								<div class="icon">&#x1F60D;</div>
								<span><?php echo countItems2('rating', 'dolhar', 3) ?></span>
							</div>
					</div>
				</div>
							  
				
				
			</div>
			
		</div>
			
	<hr>		
			
	
	
		
        <div class="col-sm-12 p-2 my-5" id="tabs-list">
        <div class="table-responsive tabs">
                    
                    
            <table class="table table-striped table-hover DataTable">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">HR Code</th>
                  <th scope="col">Rating</th>
                  <th scope="col">Emotion</th>
                  <th scope="col">Date</th>
                </tr>
              </thead>
             
              <tbody>
                          
                <?php


                $stmt = $conn->prepare("SELECT * from dolhar  ");
                $stmt->execute();
                $rows = $stmt->fetchAll();

                $counter = 1;

                 foreach ($rows as $row)

                {

                    ?>

                 <tr>

                  <td> <?php echo $counter++  ?> </td>
                  <td><a ><strong><?php echo $row['name'] ?></strong></a></td>
                  <td><?php echo $row['hr_code']  ?>      </td>
                  <td><?php echo $row['rating']  ?> /3     </td>
                  <td><span style="font-size: 18px; font-weight: bold;"><?php
						if ($row['rating'] == 1){echo '&#x1F61E; Unhappy';}  
					 elseif ($row['rating'] == 2){echo '&#x1F610; Natural';} 
					 elseif ($row['rating'] == 3){echo '&#x1F60D; Happy';} 
					  ?></span></td>
                  <td><?php echo $row['Add_Date']  ?>      </td>
          

                </tr>



                <?php } ?>


                        
                      </tbody>
                </table>
            </div>
    
    </div>
	
	  

</div> 


	
	


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
	
	
	
	
<script>

jQuery(document).ready(function($) {
 "use strict";



$('.DataTable').DataTable();


});

</script>


</body>
</html>