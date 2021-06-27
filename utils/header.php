<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="./frameworks/css/style.css?v=<?php echo time(); ?>">
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="./frameworks/css/bootstrap.min.css?v=<?php echo time(); ?>">
<!-- Material Design Bootstrap -->
<link rel="stylesheet" href="./frameworks/css/mdb.min.css?v=<?php echo time(); ?>">


<!-- jQuery -->
<script type="text/javascript" src="./frameworks/js/jquery.min.js?v=<?php echo time(); ?>"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="./frameworks/js/popper.min.js?v=<?php echo time(); ?>"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="./frameworks/js/bootstrap.min.js?v=<?php echo time(); ?>"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="./frameworks/js/mdb.min.js?v=<?php echo time(); ?>"></script>

<style>
	body {
		height: 100%;
		width: 100%;
	}

	h1, img{
		-webkit-user-drag: none;
		-webkit-user-select: none;
    	-khtml-user-select: none;
    	-moz-user-select: none;
    	-o-user-select: none;
    	user-select: none;
	}
	.navhead {
		display: flex;
		justify-content: space-between;
		text-align: center;
	}
	.cont{
		height: 60vh;
		width: 100%;
	} 
	
	.view {
		height: 100%;
		width: 100%;
		display: flex;
		align-items: center;
		align-content: center;
	}
	.aol-wrap{
		height: 100%;
		width: 100%;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: space-around;
	}

	.aol-content{
		
		display: flex;
		flex-direction: column;
		align-items: start;
		align-content: center;
		text-align: start;
	}

	.aol-quote{
		font-weight: bold;
		color: #33b3a6;
	}

	footer {
		position: fixed;
		bottom: 0;
		width: 100%
	}
</style>