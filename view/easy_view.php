<?php require('partials/header.php') ?>
<div class="container text-center">
	<div class="jumbotron jumbo-div" id="jumbo">
		<h1>Rock, Paper, Sciccors</h1>
		<a class="info" id="easy"><h2 class="header-easy">Easy <i class="fa fa-info-circle" aria-hidden="true"></i></h2></a>
		<div class="row">
			<div class="rules" style="display: none;">
				<h3>Rules</h3>
				<p>The game is simple. Pick Either rock, paper or sciccors. <br />Rock beats scissors, scissors beats paper, paper beats rock.</p>	
			</div>
		</div>
		<br />
		<div id="parent">
			<h3>Your Choice:</h3>
			<div class="row choice">
				<button type="button" class="btn btn-success" id="rock"><i class="fa fa-hand-rock-o" aria-hidden="true""></i><h5>Rock</h5></button>	
				<button type="button" class="btn btn-success" id="paper"><i class="fa fa-hand-paper-o" aria-hidden="true""></i><h5>Paper</h5></button>	
				<button type="button" class="btn btn-success" id="scissors"><i class="fa fa-hand-scissors-o" aria-hidden="true""></i><h5>Scissors</h5></button>
			</div>
		</div>
		<div class="row game" style="display: none;">
			<a href="easy_view.php" class="btn btn-warning" id="again"><i class="fa fa-repeat" aria-hidden="true"></i> Play Again</a>	
			<a href="hard_view.php" class="btn btn-danger" id="change"><i class="fa fa-level-up" aria-hidden="true"></i> Change Difficulty</a>
		</div>
	</div>
</div>

<script>
	$('.info').click(function() {
		$('.rules').fadeToggle();
	});

	$('button').click(function() {
		var diff = $('.info').attr('id');
		var choice = $(this).attr('id');
		var parent = $('#parent');
		var url = '/rps/' + diff + '.php';
		
		$.ajax({
			url: url,
			data: {data:choice},
			type: 'GET',
			beforeSend: function () {
				$('#parent').empty();
			}, complete: function(json) {
				var data = jQuery.parseJSON(json['responseText']);
                var user_choice = data.user_choice;
                var outcome = data.outcome;
                var result = data.result
				if (result == 'win') {
					$('#parent').html('<h3 style="color:green;">You Win!</h3><div class="row choice"><button type="button" class="btn btn-success" id="' + user_choice + '"><i class="fa fa-hand-' + user_choice + '-o" aria-hidden="true""></i></button><button type="button" class="btn btn-default" id="' + outcome + '"><i class="fa fa-hand-' + outcome + '-o" aria-hidden="true""></i></button></div>');
				} else if (result == 'draw') {
					$('#parent').html('<h3 style="color:green;">It\'s a Draw</h3><div class="row choice"><button type="button" class="btn btn-success" id="' + user_choice + '"><i class="fa fa-hand-' + user_choice + '-o" aria-hidden="true""></i></button><button type="button" class="btn btn-default" id="' + outcome + '"><i class="fa fa-hand-' + outcome + '-o" aria-hidden="true""></i></button></div>');
				} else {
					$('#parent').html('<h3 style="color:red;">You Lose!</h3><div class="row choice"><button type="button" class="btn btn-danger" id="' + user_choice + '"><i class="fa fa-hand-' + user_choice + '-o" aria-hidden="true""></i></button><button type="button" class="btn btn-default" id="' + outcome + '"><i class="fa fa-hand-' + outcome + '-o" aria-hidden="true""></i></button></div>');
				}

				$('.game').show();
			}
		}); 	
	});
</script>
<?php require('partials/footer.php') ?>