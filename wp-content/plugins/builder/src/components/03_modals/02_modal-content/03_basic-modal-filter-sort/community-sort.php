<div id="CommunityStorySortBasic" class="Dropdown Column Basic_Dropdown Fade_In">
  <div class="Column Gap_16">
   <div class="Panel_Title">
    <div class="Heading">Sort Stories</div>
   </div>
     <div class="Column Gap_8">
               <div class="Check_Row Row Align_Items_Center Gap_4">
               <input class="Check_Select" type="checkbox" id="option1" checked="checked">
               <div class="Custom_Checkbox"></div>
               <label class="Check_Select" for="option1">
               Only single-brand stories
               </label>
       </div>
         <div class="Check_Row Row Align_Items_Center Gap_4">
               <input class="Check_Select" type="checkbox" id="option2">
               <label class="Check_Select" for="option2">
               Only same-size stories
               </label>
       </div>
     </div>
   <div class="Column Gap_0">
       <!-- data-name, data-publish-date data-size data-price Story_Card -->
         <input onclick="sort_children('data-publish-date', '#Community_Story_Target .Story_Size', false);" class="Single_Select" type="radio" id="Community_Publish_New_Old">
         <label class="Single_Select" for="Community_Publish_New_Old">
         Publish Date: New to Old
         </label>
         <input onclick="sort_children('data-publish-date', '#Community_Story_Target .Story_Size', true);" class="Single_Select" type="radio" id="Community_Publish_Old_New">
         <label class="Single_Select" for="Community_Publish_Old_New">
         Publish Date: Old to New
         </label>
         <input onclick="sort_children('data-price', '#Community_Story_Target .Story_Size', false);" class="Single_Select" type="radio" id="Community_Price_High_Low">
         <label class="Single_Select" for="Community_Price_High_Low">
         Story Price: High to Low
         </label>
         <input onclick="sort_children('data-price', '#Community_Story_Target .Story_Size', true);" class="Single_Select" type="radio" id="Community_Price_Low_High">
         <label class="Single_Select" for="Community_Price_Low_High">
         Story Price: Low to High
         </label>
         <input onclick="sort_children('data-size', '#Community_Story_Target .Story_Size', true);" class="Single_Select" type="radio" id="Community_Size_Small_Large">
         <label class="Single_Select" for="Community_Size_Small_Large">
         Story Size: Small to Large
         </label>
         <input onclick="sort_children('data-size', '#Community_Story_Target .Story_Size', false);" class="Single_Select" type="radio" id="Community_Size_Large_Small">
         <label class="Single_Select" for="Community_Size_Large_Small">
         Story Size: Large to Small
         </label>
         <input onclick="sort_children('data-name', '#Community_Story_Target .Story_Size', true);" class="Single_Select" type="radio" id="Community_Name_A_Z">
         <label class="Single_Select" for="Community_Name_A_Z">
         Name: A to Z
         </label>
         <input onclick="sort_children('data-name', '#Community_Story_Target .Story_Size', false);" class="Single_Select" type="radio" id="Community_Name_Z_A">
         <label class="Single_Select" for="Community_Name_Z_A">
         Name: Z to A
         </label>
     </div>

  </div>

</div>
