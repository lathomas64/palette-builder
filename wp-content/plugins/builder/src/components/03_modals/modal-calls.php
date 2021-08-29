<!-- Basic Filter Modal -->
		<div id='Modal_Shadow_Filter' class='Modal'>
		<button class="Close" onclick="document.getElementById('Modal_Shadow_Filter').style.display = 'none'">&times
		</button>
	<div class="Modal_Content">
			<?php include "components/03_modals/shadow-filters.php"; ?>
		</div>
	</div>
		
		<!-- Advanced Filter Modal -->
	<div id='Modal_Shadow_Advanced_Filter' class='Modal'>
		<button class="Close" onclick="document.getElementById('Modal_Shadow_Advanced_Filter').style.display = 'none'">&times;</button>
		<div class="Modal_Content">
			<?php include "components/03_modals/overlay-advanced-search.php"; ?>
		</div>
	</div>