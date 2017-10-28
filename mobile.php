<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PHX University - Student Orientation</title>
		<meta name="robots" content="noindex, nofollow">
		<meta name="googlebot" content="noindex, nofollow">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans%7COswald&amp;ver=1.0.0" type="text/css" media="all">
		<link rel="stylesheet" href="dist/css/app.css">
	</head>
	<body>
		<div id="app">
			<div class="container">
				<div class="menu-wrap">
					<nav class="menu">
						<div class="icon-list">
							<a href="#"><i class="fa fa-fw fa-home"></i><span>Home</span></a>
							<a href="#"><i class="fa fa-fw fa-calendar"></i><span>Events</span></a>
							<a href="#"><i class="fa fa-fw fa-envelope-o"></i><span>Contact</span></a>
						</div><!-- /icon-list -->
					</nav><!-- /menu -->

					<button id="close-button" class="close-button">Close Menu</button>
				</div><!-- /menu-wrap -->

				<div class="header clearfix">
					<a class="logo" href="#">PHXU Orientation</a>
					<button id="open-button" class="hamburger hamburger--collapse menu-button" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
						<span class="label">Menu</span>
					</button>
				</div><!-- /header -->

				<div class="content-wrap clearfix">
					<div class="content">
						<div class="events-meta clearfix">
							<span class="events-date">Saturday July 15</span>
							<span class="events-number" v-if="hasEvents"><span class="number">{{ eventsCount }}</span> Events</span>
						</div>

						<div class="events" :class="{ 'active' : hasEvents }">
							<a v-for="event in events" :key="event.id" :href="event.link" class="event" target="_blank">
								<h3 class="event-title"><span v-html="event.title.rendered"></span></h3>
								<span class="event-meta">
									<span class="time">
										<i class="fa fa-clock-o" aria-hidden="true"></i>
										<span class="time-text">{{ event.acf.event_start_time }}</span>
									</span>
									<span class="sep">|</span>
									<span class="location">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
										<span class="location-text">{{ event.location }}</span>
									</span>
								</span>
							</a>
						</div><!-- /events -->

						<div v-if="! hasEvents" class="loading-events">
							<i class="fa fa-circle-o-notch fa-spin left" aria-hidden="true"></i> Loading Events...
						</div><!-- /loading-events -->

					</div><!-- /content -->
				</div><!-- /content-wrap -->

				<div class="footer">&copy; <?php echo date( 'Y' ); ?> PHX University. All rights reserved.</div><!-- /content-wrap -->
			</div><!-- /container -->
		</div><!-- /app -->

		<script type="text/javascript" src="dist/js/app.js"></script>
	</body>
</html>
