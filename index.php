<?php
	header('Access-Control-Allow-Origin: *');
		 
	$host = "";
	$db_name = "";
	$username = "";
	$password = "";
			  
	try {
		$con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
	}
	catch(PDOException $exception){
		echo "Connection error: " . $exception->getMessage();
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="format-detection" content="telephone=no">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <link rel="stylesheet" href="css/index.css">
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap');
			@import url('https://fonts.googleapis.com/css2?family=PT+Serif&display=swap');
		</style>
        <title>Task Timer</title>
    </head>
    <body>
        <div class="app">
			<div class="header">
			  <div>
				<svg
					width="197"
					height="34"
					viewBox="0 0 197 34"
					fill="none"
					xmlns="http://www.w3.org/2000/svg"
				>
					<g filter="url(#filter0_d)">
						<path
						d="M12.4401 24.2432H9.70365V1.49454H4V1.16485H18.1767V1.49454H12.4401V24.2432Z"
						fill="#253147"
						/>
						<path
						d="M17.9181 24.2432H17.5225L27.3802 1.16485L27.7429 1L36.0511 24.2432H33.2487L30.6771 16.99H21.0502L17.9181 24.2432ZM26.3582 4.72551L21.182 16.6603H30.5782L26.3582 4.72551Z"
						fill="#253147"
						/>
						<path
						d="M51.5159 2.54955C49.5158 1.78027 47.6256 1.39563 45.8452 1.39563C44.0869 1.39563 42.7132 1.76928 41.7241 2.51658C40.735 3.26388 40.2405 4.29691 40.2405 5.61567C40.2405 7.22017 41.0757 8.462 42.7461 9.34118C43.4934 9.71483 44.3067 10.0665 45.1859 10.3962C46.087 10.7039 46.9882 11.0556 47.8893 11.4512C48.7905 11.8468 49.6147 12.2974 50.362 12.8029C51.1093 13.3085 51.7137 14.0118 52.1753 14.913C52.6369 15.7921 52.8676 16.9241 52.8676 18.3088C52.8676 19.6715 52.483 20.8364 51.7137 21.8035C50.9445 22.7706 50.0103 23.43 48.9114 23.7816C47.8344 24.1113 46.5706 24.2762 45.1199 24.2762C42.4165 24.2762 40.1086 23.6058 38.1964 22.2651L38.3613 22.0013C39.0866 22.5728 40.0207 23.0453 41.1636 23.419C42.3285 23.7706 43.5154 23.9465 44.7243 23.9465C46.5046 23.9465 48.0212 23.5399 49.274 22.7266C50.5488 21.8914 51.1862 20.6716 51.1862 19.0671C51.1862 17.3087 50.351 15.935 48.6806 14.9459C47.9333 14.5063 47.1091 14.0997 46.2079 13.7261C45.3287 13.3524 44.4386 12.9678 43.5374 12.5721C42.6362 12.1545 41.812 11.693 41.0647 11.1874C39.3943 10.0885 38.5591 8.52794 38.5591 6.50584C38.5591 4.90134 39.0976 3.60456 40.1746 2.61549C41.2515 1.60443 42.867 1.09891 45.021 1.09891C47.197 1.09891 49.4059 1.47256 51.6478 2.21986L51.5159 2.54955Z"
						fill="#253147"
						/>
						<path
						d="M59.0542 1.16485V15.7372L69.7033 1.16485L69.967 1.39563L64.0656 9.44008L72.8353 24.2432H69.7692L62.3841 11.7479L59.0542 16.3306V24.2432H56.3178V1.16485H59.0542Z"
						fill="#253147"
						/>
						<path
						d="M112.796 24.2432H110.06V1.49454H104.356V1.16485H118.533V1.49454H112.796V24.2432Z"
						fill="#253147"
						/>
						<path
						d="M121.837 1.49454V1.16485H127.706V1.49454H126.09V23.9135H127.706V24.2432H121.837V23.9135H123.354V1.49454H121.837Z"
						fill="#253147"
						/>
						<path
						d="M132.597 24.2432H132.169L135.037 1.16485H136.125L143.048 22.4958L149.939 1.16485H151.027L153.895 24.2432H151.159L148.884 5.78052L142.917 24.2432H140.839L134.806 6.0113L132.597 24.2432Z"
						fill="#253147"
						/>
						<path
						d="M171.631 1.16485V1.49454H161.246V11.3853H170.873V11.715H161.246V23.9135H172.356V24.2432H158.509V1.16485H171.631Z"
						fill="#253147"
						/>
						<path
						d="M175.831 1.4286C178.38 1.25276 180.633 1.16485 182.589 1.16485C188.018 1.16485 190.733 2.97814 190.733 6.60474C190.733 8.1433 190.359 9.51701 189.612 10.7259C188.865 11.9347 187.579 12.737 185.754 13.1326L192.348 24.2432H189.282L182.82 13.3304H178.567V24.2432H175.831V1.4286ZM182.589 1.49454C181.315 1.49454 179.974 1.57146 178.567 1.72532V13.0007H183.447C186.546 12.8689 188.095 10.7588 188.095 6.67068C188.095 5.00025 187.634 3.72544 186.711 2.84627C185.787 1.94511 184.414 1.49454 182.589 1.49454Z"
						fill="#253147"
						/>
					</g>
					<g filter="url(#filter1_d)">
						<line
						x1="89.4055"
						y1="4.71558"
						x2="89.4055"
						y2="2.83163"
						stroke="#253147"
						/>
						<line
						x1="87.1581"
						y1="2.33163"
						x2="91.7371"
						y2="2.33163"
						stroke="#253147"
						/>
						<circle cx="89.7747" cy="14.5176" r="10.2047" fill="#D8E1F1" />
						<circle cx="89.7747" cy="14.5176" r="1.56996" fill="#253147" />
						<path
						d="M78 7.45283L89.7747 14.5176L96.8395 11.7702"
						stroke="#253147"
						/>
						<path
						d="M96.6847 18.6383C95.0738 22.1517 91.2772 23.858 88.2047 22.4493"
						stroke="#253147"
						/>
					</g>
					<defs>
						<filter
						id="filter0_d"
						x="0"
						y="1"
						width="196.348"
						height="31.2762"
						filterUnits="userSpaceOnUse"
						color-interpolation-filters="sRGB"
						>
						<feFlood flood-opacity="0" result="BackgroundImageFix" />
						<feColorMatrix
							in="SourceAlpha"
							type="matrix"
							values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
						/>
						<feOffset dy="4" />
						<feGaussianBlur stdDeviation="2" />
						<feColorMatrix
							type="matrix"
							values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"
						/>
						<feBlend
							mode="normal"
							in2="BackgroundImageFix"
							result="effect1_dropShadow"
						/>
						<feBlend
							mode="normal"
							in="SourceGraphic"
							in2="effect1_dropShadow"
							result="shape"
						/>
						</filter>
						<filter
						id="filter1_d"
						x="73.5061"
						y="0.732788"
						width="30.4733"
						height="32.9301"
						filterUnits="userSpaceOnUse"
						color-interpolation-filters="sRGB"
						>
						<feFlood flood-opacity="0" result="BackgroundImageFix" />
						<feColorMatrix
							in="SourceAlpha"
							type="matrix"
							values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
						/>
						<feOffset dy="4" />
						<feGaussianBlur stdDeviation="2" />
						<feColorMatrix
							type="matrix"
							values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"
						/>
						<feBlend
							mode="normal"
							in2="BackgroundImageFix"
							result="effect1_dropShadow"
						/>
						<feBlend
							mode="normal"
							in="SourceGraphic"
							in2="effect1_dropShadow"
							result="shape"
						/>
						</filter>
					</defs>
				</svg>
			  </div>
			</div>
			<div class="current-time">
			  </div>
			  
			  <?php
				$action = isset($_GET['action']) ? $_GET['action'] : "";
				 
				if($action=='deleted'){
					echo "<div id=\"confirmMsg\">Task deleted.</div>";
				}
				?>
				
				<?php
				$action = isset($_GET['action']) ? $_GET['action'] : "";
				 
				if($action=='delFail'){
					echo "<div id=\"confirmMsg\">Unable to delete task...</div>";
				}
				?>
				
				<?php
				$action = isset($_GET['action']) ? $_GET['action'] : "";
				 
				if($action=='new'){
					echo "<div id=\"confirmMsg\">Task created!</div>";
				}
				?>
				
				<?php
				$action = isset($_GET['action']) ? $_GET['action'] : "";
				 
				if($action=='newFail'){
					echo "<div id=\"confirmMsg\">Failed to create task...</div>";
				}
				?>
				
				<?php
				$action = isset($_GET['action']) ? $_GET['action'] : "";
				 
				if($action=='savedTime'){
					echo "<div id=\"confirmMsg\">Task time saved!</div>";
				}
				?>
				
				<?php
				$action = isset($_GET['action']) ? $_GET['action'] : "";
				 
				if($action=='savedTimeFail'){
					echo "<div id=\"confirmMsg\">Task time save failed...</div>";
				}
				?>
			  
			  <a id="addLink" href="newtask.php">
			  <div class="dropzone">
				<svg
				  width="19"
				  height="19"
				  viewBox="0 0 19 19"
				  fill="none"
				  xmlns="http://www.w3.org/2000/svg"
				>
				  <circle cx="9.5" cy="9.5" r="8.5" stroke="#BEBEBE" />
				  <line x1="9.5" y1="5" x2="9.5" y2="14" stroke="#BEBEBE" />
				  <line x1="14" y1="9.5" x2="5" y2="9.5" stroke="#BEBEBE" />
				</svg>
				<span>Add new task</span>
			  </div>
			  </a>
			  <div class="recent-divider">Recent</div>

			  
				<div class="tasks">
						<?php
							$db = mysqli_connect("sql395.main-hosting.eu","u627759572_amanda","Mangiarell1","u627759572_timer");

								if(!$db)
								{
									die("Connection failed: " . mysqli_connect_error());
								}
						
							$records = mysqli_query($db,"SELECT id, name, description, time, todaysDate FROM tasktimer ORDER BY `tasktimer`.`todaysDate` DESC") or die("Error: " . mysqli_error($db));;
							
							while($data = mysqli_fetch_array($records))
							{
							?>
							<a class="nounderline" href="timer.php?id=<?php echo $data['id']; ?>">
							<div class="task">
								<div>
									<span class="title"><?php echo $data['name']; ?></span>
									<span class="description"><?php echo $data['description']; ?></span>
									<span class="description"><strong>Recent Time: </strong><?php echo $data['time']; ?></span>
								</div>
								<div>
									<span class="time"><?php echo $data['todaysDate']; ?></span>
									<svg
										width="9"
										height="27"
										viewBox="0 0 9 27"
										fill="none"
										xmlns="http://www.w3.org/2000/svg"
									  >
									<path d="M9 13.5L0 0.942631L0 26.0574L9 13.5Z" fill="#9AB1DD" />
									</svg>
								</div>
							</div>
							</a>
					<?php
					}
					
					?>
				</div>
						
				<?php mysqli_close($db); // Close connection ?>

			  
        </div>
        <script src="js/index.js"></script>
    </body>
	<script>
		window.onload=init;
		var isOpened = false;
		function init(){
		  // current time
		  var ele = document.getElementsByClassName('current-time')[0]
		  var content = `<span>${moment().format("dddd, MMMM Do")}</span>`
		  content += `<span>${moment().format("h:mm a")}</span>`
		  ele.innerHTML = content
		  // tasks load
		  const tasks = []
		}
		function toggle(){
		  isOpened = !isOpened
		  var nav = document.getElementById('nav-links')
		  if(isOpened){        
			nav.style.height = 'auto'
		  }
		  else{
			nav.style.height = 0
		  }
		}
	</script>
</html>