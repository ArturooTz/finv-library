<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link rel="stylesheet" href="css/sweetalert2.min.css">
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="/js/sweetalert2.min.js"></script>

        <title>FINV Library 1.0</title>

    </head>
    <body class="main-body">
        <div class="flex-center">
		<button type="button" class="sticky-button" data-toggle="modal" data-target="#uploadForm"><i class="fa fa-plus"></i></button>
            <div class="content">
				
				<h1>FINV Library 1.0</h1>
                <div class="items-container">
				@foreach ($finvList as $finvItem)
					<div class="item">
						<a href="#" class="card-link" data-toggle="modal" data-target="#finvInfoModal" data-id="{{ $finvItem->id }}" style="background-image: url('{{ $finvItem->image_url }}');">
							<div class="card-wrap">
								<div class="info-element">
									<span class="button-span">Preview</span>
								</div>
							</div>
						</a>
					</div>
				@endforeach
					
				</div>
			</div>
		</div>

	

	<!-- Modal Form -->
	<div class="modal fade" id="uploadForm" tabindex="-1" role="dialog" aria-labelledby="uploadFormLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="uploadFormLabel">Upload your FINV</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="/upload-finv" method="POST" enctype="multipart/form-data" >
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
							<input type="file" class="form-control-file" id="image-input[]" name="image-input">
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

	<!-- Modal Information Display -->
	<div class="modal fade" id="finvInfoModal" tabindex="-1" role="dialog" aria-labelledby="finvInfoModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="finvInfoModalLabel">FINV Information</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="items-container">
						<div class="info-div">

						</div>
						<div class="image-div">
							<img src="" alt="" id="finvImage">
						</div>
					</div>
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


	<script>
		$('#myModal').on('hidden.bs.modal', function (e) {
			var attrstyle = $(e.relatedTarget).attr('style'); 
			var imgurl1 = attrstyle.replace("background-image: url('", "");
			imgurl1 = imgurl1.replace("');", "");
			$("#finvImage").attr('src', "/"+imgurl1);
		})
		
		$('#finvInfoModal').on('shown.bs.modal', function (e) {
			$.ajax({
				type:'GET',
				url:'/get-finv-info/'+recipient,
				success:function(data){
				var finv_info_array = data;
				}
			});
			var modal = $(this)
		})

		$('#finvInfoModal').on('hidden.bs.modal', function () {
			$("#finvImage").attr('src', "");
		})
	</script>

	<script>
		@if(session()->has('message'))
			@if(session()->get('message') === "success")
				swal("Success", "FINV files uploaded correctly.", "success")
			@endif
		@endif
	</script>
</html>
