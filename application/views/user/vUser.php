
<div class="content">
	<a href="<?php echo site_url();?>/user/CEvent/viewAllTickets/<?php echo $this->session->userdata['userSession']['userID'];?>"><button>My Tickets</button></a> <br>
	<a href="<?php echo site_url();?>/user/CEvent/displayEvent/"><button>Lists of Event</button></a> <br>
	<a href="<?php echo site_url();?>/user/CUser/search"><button>Search</button></a> <br>
	<a href="<?php echo site_url();?>/user/CEvent/viewPreferenceEvents/"><button>List of Preferences</button></a> <br>
	<a href="<?php echo site_url();?>/event/CEvent/index/"><button>Create Event</button></a> <br>
	<a href="<?php echo site_url();?>/event/CEvent/upcomingEvents/"><button>Upcoming</button></a> <br>
</div>
