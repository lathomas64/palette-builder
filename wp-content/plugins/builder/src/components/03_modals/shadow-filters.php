<head>
	<meta charset="UTF-8" />
</head>
<body>
	<div class="Singles_Filter">
		<div class="Column">
			<div class="Content Column Gap_24">
				<div class="Panel_Title Row Space_Between">
					<div class="Heading">Filter Results</div>
					<button class="Text_Button Search" onclick="document.getElementById('Modal_Shadow_Advanced_Filter').style.display = 'block'">Open Advanced Filters</button>
				</div>
				<div class="Filter_Groups Row Gap_24">
					<div class="Left Column Gap_24">
						<div class="Filter_Section Column Gap_8">
							<?php include "components/01_filter-sections/color.php"; ?>
						</div>
						<div class="Filter_Section Column Gap_8">
							<?php include "components/01_filter-sections/finish.php"; ?>
						</div>
						<div class="Filter_Section Column Gap_8">
							<?php include "components/01_filter-sections/price-range.php"; ?></div>
					</div>
					<div class="Right Column Gap_24">
						<div class="Filter_Section Column Gap_8">
							<?php include "components/01_filter-sections/brand-characteristics.php"; ?>
						</div>
						<div class="Filter_Section Column Gap_8"
						><?php include "components/01_filter-sections/shipping-countries.php"; ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
