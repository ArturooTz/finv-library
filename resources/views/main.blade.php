<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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
				</div>
			</div>
		</div>

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	Launch demo modal
	</button>

	<!-- Modal Form -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Upload your FINV</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
					@csrf
						<div class="form-group">
							<label for="site_shortname">Site shortname:</label>
							<input type="text" class="form-control" id="site_shortname" placeholder="Enter site shortname" name="shortname">
						</div>
						<div class="form-group">
							<label for="site_url">Site URL:</label>
							<input type="text" class="form-control" id="site_url" name="site_url" placeholder="URL">
						</div>
						<div class="form-group">
							<label for="description">Description: (optional)</label>
							<textarea class="form-control" id="description" name="description" rows="3" placeholder="Here you can specify how many vehicles per view are going to be displayed."></textarea>
						</div>
						<div class="form-group">
							<label for="image-input">FINV Preview Image:</label>
							<input type="file" class="form-control-file" id="image-input">
						</div>
						<div class="form-group">
							<div class="custom-file">
								<label for="files-input">FINV HTML & CSS Files:</label>
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="files-input" name="files-input[]" multiple="multiple">
									<label class="custom-file-label" for="files-input">Choose file</label>
								</div>
							</div>
						</div>
						<hr>
						<button type="submit" class="btn btn-primary">Upload</button>
						</form>
				</div>
			</div>
		</div>
	</div>

	</body>
	<script>
	
		$('#files-input').change(function(e){
			var fileName = "";
			if(e.target.files.length == 1){
				fileName = e.target.files[0].name;
            	$(".custom-file-label").html(fileName);
			}
			if(e.target.files.length > 1){
				fileName = (e.target.files.length)+" Files Selected";
				$(".custom-file-label").html(fileName);
			}
			if(e.target.files.length == 0){
				$(".custom-file-label").html("No files chosen");
			}
            
        });

	</script>
</html>
