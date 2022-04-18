<div class="Shadow_Controls Grid_Container">
	<div class="Arrow Up_Arrow Row Justify_Content_Center" v-on:click="shadow_story.shift_up(index)">
		<div class="Icon_Container"><?php include "../assets/01_Icons/pan-controls/arrow-up.svg"; ?></div>
	</div>
	<div class="Arrow Left_Arrow Justify_Content_Center Column" v-on:click="shadow_story.shift_left(index)">
		<div class="Icon_Container"><?php include "../assets/01_Icons/pan-controls/arrow-left.svg"; ?>
		</div>
	</div>
	<div class="Shadow_Name_Container Column Justify_Content_Center Align_Items_Center">
		<div class="Shadow_Name">{{shadow.name}}</div>
</div>
	<div class="Arrow Right_Arrow Justify_Content_Center Column" v-on:click="shadow_story.shift_right(index)">
		<div class="Icon_Container"><?php include "../assets/01_Icons/pan-controls/arrow-right.svg"; ?>
		</div>
	</div>
	<div class="Arrow Place_Aside Justify_Content_Center Column" style="display:none;">
		<div class="Icon_Container"><?php include "../assets/01_Icons/pan-controls/arrow-left.svg"; ?>
	</div>
	</div>
	<div class="Arrow Down_Arrow Justify_Content_Center Row" v-on:click="shadow_story.shift_down(index)"><div class="Icon_Container"><?php include "../assets/01_Icons/pan-controls/arrow-down.svg"; ?>
	</div></div>
		<div class="Arrow Remove Justify_Content_Center Column" v-on:click="shadow_story.deleteShadow(index)">
			<div class="Icon_Container"><?php include "../assets/01_Icons/pan-controls/trash.svg"; ?></div>
		</div>
</div>
