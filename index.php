<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dolhar Survey</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
	
	<style>
		.emotion-container
		{
			border: 1px solid #ccc;
			width: fit-content;
			border-radius: 10px;
			box-shadow: 0 0 5px 1px #ccc;
		}
		
		.emotion-style 
		{
			margin: 15px!important;
		}
			
	</style>
	
<body>
	
	
	<div class="bg-img1 size1 flex-w flex-c-m p-4" style="background-image: url('images/bg01.jpg');">
		<div class="wsize1 bor1 bg1 p-4 respon1">
			<div class="wrappic1">
				<img src="https://www.doehler.com/typo3conf/ext/mv_template/Resources/Public/images/doehler_pos_2018.svg" style="width: 160px;">
			</div>

			<p class="txt-center m1-txt1 p-t-33 p-b-25">
				Please Rate The Quality of Food In The Resturant
			</p>

			<form class="flex-w flex-c-m contact100-form validate-form p-4 col-md-8 m-auto rating_form">
				
				
				<div class="wrap-input100 validate-input where1 col-md-10" data-validate = "Name is required">
					<input class="s1-txt2 placeholder0 input100" type="text" name="name" placeholder="Your Name" required>
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input where1 col-md-10" data-validate = "HR Code is required">
					<input class="s1-txt2 placeholder0 input100" type="text" name="hr_code" placeholder="HR Code" required>
					<span class="focus-input100"></span>
				</div>
				
				<div class="flex-w flex-c-m col-md-10 m-4">
					<div id="myRating"></div>
				</div>

				<br>
				<div class="clearfix"></div>
				
				<button class="flex-c-m s1-txt3 size3 how-btn trans-04 where1 submit">
					Complete
				</button>
				
			</form>

			
		</div>
	</div>



	
	
	
<!--==========================Start Modal Response ================================-->
<div class="modal fade" id="response_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-light">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Survey</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		
     	 <div id="result" class="modal-body text-center py-5">
			 
      	 </div>
		
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
      
    </div>
  </div>
</div>
	
	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/moment.min.js"></script>
	<script src="vendor/countdowntime/moment-timezone.min.js"></script>
	<script src="vendor/countdowntime/moment-timezone-with-data.min.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	
		<script src="emotions_rate.js"></script>
	

<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	
	
<script>

var emotionsArray = {
    angry:"&#x1F620;",
    disappointed:"&#x1F61E;",
    meh:"&#x1F610;",
    happy:"&#x1F60A;",
    smile:"&#x1F603;",
    wink:"&#x1F609;",
    laughing:"&#x1F606;",
    inLove:"&#x1F60D;",
    heart:"&#x2764;",
    crying:"&#x1F622;",
    star:"&#x2B50;",
};

	
var emotionsArray = ['disappointed','meh','inLove'];
	
	$("#myRating").emotionsRating({
  emotions: emotionsArray
});

	
	$("#myRating").emotionsRating({

  // background emoji
  bgEmotion: "happy",

  // number of emoji
  count: 3,

  // color of emoji
  // gold, red, blue, green, black, 
  // brown, pink, purple, orange
  color: "red",

  // initial rating value
  initialRating: 2,

  // size of emoji
  emotionSize: 30,

  // input name
  inputName: "ratings[]",

//  // callback
//  emotionOnUp<a href="https://www.jqueryscript.net/time-clock/">date</a>: null,

  // if is disabled?
  disabled: false,

  // enable use of images as emoji
  useCustomEmotions: false,

  // if you want to process the images
  transformImages: false
  
});
	
	
	
//==================================	
	
		
	$('.rating_form').submit(function(e)
	{
		
		e.preventDefault();
    	$('.submit').prop('disabled', true);
		
		$('#response_modal').modal('show');
		
		$.ajax({
			url: 		'ajax.php',
			method: 	'POST',
			dataType: 	'text',
			data:		$(this).serialize()	,
			success : function(response)
				 {
					$('#result').html(response);
    				$('.submit').prop('disabled', false);
					 setTimeout(location.reload.bind(location), 6000);

				 }
		});
		
	});
	

</script>


</body>
</html>