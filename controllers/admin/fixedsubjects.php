<?php
$trackId = $_POST["trackid"];

switch ($trackId) {
	case 'dinh-abm':
	?>
	<option value="" hidden>Choose subject</option>
	<option>Applied Economics</option>
	<option>Business Ethics and Social Responsibility</option>
	<option>Business Math</option>
	<option>Business Finance</option>
	<option>Organization and Management</option>
	<option>Principles of Marketing</option>
	<option> Work Immersion/Research/Career Advocacy/Culminating Activity i.e.
		Business Enterprise Simulation
	</option>
	<?php
	break;

	case 'dinh-hums':
	?>
	<option value="" hidden>Choose subject</option>
	<option>Creative Writing/ Malikhaing Pagsulat</option>
	<option>Creative Nonfiction</option>
	<option>Philippine Politics and Governance</option>
	<option>Community Engagement Solidarity and Citizenship</option>
	<option>Disciples and Ideas in the Soical Sciences</option>
	<option>basic Calculus</option>
	<option>Work Immersion/Research/Career Advocacy/Culminating Activity</option>
	<?php
	break;

	case 'dinh-cbf':
	?>
	<option value="" hidden>Choose subject</option>
	<option>Cookery</option>
	<option>bread and pastires</option>
	<option>food and beverages</option>
	<option> Work Immersion/Research/Career Advocacy/Culminating Activity i.e.
		Business Enterprise Simulation
	</option>
	<?php
	break;

	case 'dinh-flth':
	?>
	<option value="" hidden>Choose subject</option>
	<option>Front Office Services</option>
	<option>Tourism Promotion Services</option>
	<option>Local Guiding services</option>
	<option>Housekeeping Services</option>
	<option> Work Immersion/Research/Career Advocacy/Culminating Activity i.e.
		Business Enterprise Simulation
	</option>
	
	<?php
	break;

	case 'dinh-as':
	?>
	<option value="" hidden>Choose subject</option>
	<option>Mathematics</option>
	<option>Filipino</option>
	<option> Work Immersion/Research/Career Advocacy/Culminating Activity i.e.
		Business Enterprise Simulation
	</option>
	<?php
	break;

	case 'dinh-eim':
	?>
	<option value="" hidden>Choose subject</option>
	<option>Mathematics</option>
	<option>Filipino</option>
	<option>Algebra</option>
	<option>Science</option>
	<option> Work Immersion/Research/Career Advocacy/Culminating Activity i.e.
		Business Enterprise Simulation
	</option>
	<?php
	break;
	
	default:
	echo "Error!";
	break;
}
?>