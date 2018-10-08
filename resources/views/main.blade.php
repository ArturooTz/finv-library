<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
		<link rel="stylesheet" href="css/styles.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <title>FINV Library 1.0</title>

    </head>
    <body>
        <div class="flex-center">

            <div class="content">
				<h1>Test</h1>
                <div class="items-container">
					<div class="item">
						<a href="#" class="card-link">
							<div class="card-wrap">
								<div class="info-element">
									<span>URL: www.testsite.com</span>
									<span>Units: 1, 2, 4, 5</span>
									<span>Preview</span>
								</div>
							</div>
						</a>
					</div>
					<div class="item">
						<a href="#" class="card-link">
							<div class="card-wrap">
								<div class="info-element">
									<span>URL: www.testsite.com</span>
									<span>Units: 1, 2, 4, 5</span>
									<span>Preview</span>
								</div>
							</div>
						</a>
					</div>
					<div class="item">
						<a href="#" class="card-link">
							<div class="card-wrap">
								<div class="info-element">
									<span>URL: www.testsite.com</span>
									<span>Units: 1, 2, 4, 5</span>
									<span>Preview</span>
								</div>
							</div>
						</a>
					</div>
					<div class="item">
						<a href="#" class="card-link">
							<div class="card-wrap">
								<div class="info-element">
									<span>URL: www.testsite.com</span>
									<span>Units: 1, 2, 4, 5</span>
									<span>Preview</span>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script>
	
		$(".card-link").click(function(){
			//$(this).css("transform","scale(0.95)");
			//myVar = setTimeout(myFunc(), 400);
			//clearTimeout(myVar);
		});

		function myFunc(){
			$(this).css("transform","" );
		}
	</script>
</html>
