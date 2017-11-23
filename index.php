<!DOCTYPE html>
<html>
<head>
	<title>Mates academy</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

	<script>
    	var url = "http://mates:8888/";
    </script>
    <style type="text/css">
    	.modal-dialog, .modal-content{
		z-index:1051;
		}
    </style>

    <script src="/js/script.js"></script>
</head>
<body>

	<div class="container">
		<div class="row">
		    <div class="col-lg-12 margin-tb">					
		        <div class="pull-left">
		            <h2>Mates test tast table</h2>
		        </div>
		        <div class="pull-right">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">Add new</button>
		        </div>
		    </div>
		</div>

			  <div class="panel-body">
				<table class="table table-bordered">
					<thead>
					    <tr>
						<th>First name</th>
						<th>Second name</th>
						<th>Email</th>
						<th width="200px">Actions</th>
					    </tr>
					</thead>
					<tbody>
					</tbody>
				</table>

		<!-- <ul id="pagination" class="pagination-sm"></ul> -->
			  </div>

	    <!-- Create Item Modal -->
		<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		      	 <h4 class="modal-title" id="myModalLabel">Add new</h4>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		      </div>

		      <div class="modal-body">
		      		<form data-toggle="validator" action="inc/create.php" method="POST">

		      			<div class="form-group">
							<label class="control-label" for="name">First name:</label>
							<input type="text" name="name" class="form-control" data-error="Please enter first name." required />
							<div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
							<label class="control-label" for="title">Second name:</label>
							<!--<textarea name="description" class="form-control" data-error="Please enter second name." required></textarea> -->
							<input type="text" name="secondname" class="form-control" data-error="Please enter second name." required />

							<div class="help-block with-errors"></div>
						</div>
						
						<div class="form-group">
							<label class="control-label" for="email">Email:</label>
							<input type="text" name="email" class="form-control" data-error="Please enter email." required />
							<div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn crud-submit btn-success">Submit</button>
						</div>

		      		</form>

		      </div>
		    </div>

		  </div>
		</div>

		<!-- Edit Item Modal -->
		<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		      	<h4 class="modal-title" id="myModalLabel">Edit</h4>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		      </div>

		      <div class="modal-body">
		      		<form data-toggle="validator" action="inc/update.php" method="put">
		      			<input type="hidden" name="id" class="edit-id">

		      			<div class="form-group">
							<label class="control-label" for="name">First name:</label>
							<input type="text" name="name" class="form-control" data-error="Please enter first name." required />
							<div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
							<label class="control-label" for="secondname">Second name:</label>
							<input type="text" name="secondname" class="form-control" data-error="Please enter second name." required />
							<div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
							<label class="control-label" for="email">Email:</label>
							<input type="text" name="email" class="form-control" data-error="Please enter email." required />
							<div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-success crud-submit-edit">Submit</button>
						</div>

		      		</form>

		      </div>
		    </div>
		  </div>
		</div>

	</div>
</body>
</html>