<header class="navbar navbar-fixed-top navbar-inverse">
	<div class="navbar-inner">
		<div class="container">
			<div class="navbar-header">
			<?php
				if(!$is_logged_in) {
					echo "<a href='/' class='navbar-brand'>";
				}
				else {
					echo "<a href='/dashboard' class='navbar-brand'>";
				}
			?>
			Dashboard</a>
			</div>
			<div class="navbar-right">
				<nav>
					<ul class="nav navbar-nav">
						<li>
							<?php
								if(!$is_logged_in) {
									echo "<a href='/''>";
								}
								else {
									echo "<a href='/dashboard'>";
								}
							?>
							Home</a>
						</li>

						<?php
							if(!$is_logged_in) {
								echo "<li><a href='/signin/'>Sign in</a></li>";
							}
							else {
								echo "<li><a href='/users/edit_profile/$signin_user_id'>Profile</a></li>";
								echo "<li><a href='/signout'>Sign out</a></li>";
							}
						?>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</header>