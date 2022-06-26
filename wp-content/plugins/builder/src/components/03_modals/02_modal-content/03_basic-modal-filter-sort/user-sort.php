<div id="UserStorySortBasic" class="Dropdown Column Basic_Dropdown Fade_In">
  <div class="Column Gap_16">
   <div class="Panel_Title">
    <div class="Heading">Sort Stories</div>
   </div>
   <div class="Column Gap_0">
       <!-- data-name, data-publish-date data-size data-price Story_Card -->
         <input onclick="sort_children('data-publish-date', '#User_Story_Target .Story_Size', false);" class="Single_Select" type="radio" id="User_Publish_New_Old">
         <label class="Single_Select" for="User_Publish_New_Old">
         Publish Date: New to Old
         </label>
         <input onclick="sort_children('data-publish-date', '#User_Story_Target .Story_Size', true);" class="Single_Select" type="radio" id="User_Publish_Old_New">
         <label class="Single_Select" for="User_Publish_Old_New">
         Publish Date: Old to New
         </label>
         <input onclick="sort_children('data-price', '#User_Story_Target .Story_Size', false);" class="Single_Select" type="radio" id="User_Price_High_Low">
         <label class="Single_Select" for="User_Price_High_Low">
         Story Price: High to Low
         </label>
         <input onclick="sort_children('data-price', '#User_Story_Target .Story_Size', true);" class="Single_Select" type="radio" id="User_Price_Low_High">
         <label class="Single_Select" for="User_Price_Low_High">
         Story Price: Low to High
         </label>
         <input onclick="sort_children('data-size', '#User_Story_Target .Story_Size', true);" class="Single_Select" type="radio" id="User_Size_Small_Large">
         <label class="Single_Select" for="User_Size_Small_Large">
         Story Size: Small to Large
         </label>
         <input onclick="sort_children('data-size', '#User_Story_Target .Story_Size', false);" class="Single_Select" type="radio" id="User_Size_Large_Small">
         <label class="Single_Select" for="User_Size_Large_Small">
         Story Size: Large to Small
         </label>
         <input onclick="sort_children('data-name', '#User_Story_Target .Story_Size', true);" class="Single_Select" type="radio" id="User_Name_A_Z">
         <label class="Single_Select" for="User_Name_A_Z">
         Name: A to Z
         </label>
         <input onclick="sort_children('data-name', '#User_Story_Target .Story_Size', false);" class="Single_Select" type="radio" id="User_Name_Z_A">
         <label class="Single_Select" for="User_Name_Z_A">
         Name: Z to A
         </label>
     </div>

  </div>

</div>
