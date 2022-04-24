$(document).ready(function (event) {
  shadow_story = new Vue({
    el:".Story_Grid",
    data: {
      "shadows": [{'name':'test'}],
      "width": 3,
      "height": 3,
      "shadowCount": 0,
      "overflow": []
    },
    computed: {
      computed_shadows: function () {
        return this.shadows;
      },
      orientation: function() {
        if(this.height >= this.width) {
          return "Portrait_Square";
        }
        else {
          return "Landscape";
        }
      },
      size_class: function() {
        return "Story_Size_"+this.width+"w_"+this.height+"t"
      }

    },
    methods: {
      first_empty_index: function () {
        for(let index = 0; index < this.shadows.length; index++)
        {
          console.log(index);
          if(!this.has_shadow(index))
          {
            return index;
          }
        }
        return -1;
      },
      has_shadow: function(index) {
        console.log(index);
        empty = this.shadows[index].invisible !== undefined;
        return !empty;
      },
      shift_up: function(index){
        row = Math.floor(index / this.width);
    		if(row == 0)
    		{
    			// TODO what do we do if they try to move up on the edge
    			return;
    		} else {
    			this.swap(index, index-this.width);
    		}
      },
      shift_left: function(index) {
        position = index % this.width;
    		if(position == 0)
    		{
    			// TODO what do we do if they try to move left on the edge
    			//target = currentStory.width-1;
    			return;
    		} else {
    			this.swap(index, index-1);
    		}
      },
      shift_down: function(index) {
        row = Math.floor(index / this.width);
    		if(row == this.height-1)
    		{
    			// TODO what do we do if they try to move down on the edge
    			return;
    		} else {
    			this.swap(index, index+parseInt(this.width));
    		}
      },
      shift_right: function(index) {
        position = index % this.width;
    		if(position == this.width-1)
    		{
    			// TODO what do we do if they try to move right on the edge
    			return;
    		} else {
    			this.swap(index, index+1);
    		}
      },
      deleteShadow: function(index, undo=false){
        // TODO handle undoing
        this.updateShadow(index, null);
        this.shadowCount--;
        updateFooter();
      },
      swap: function(index, index2, undo=false)
      {
        shadow1 = this.shadows[index].ID;
        shadow2 = this.shadows[index2].ID;
        this.updateShadow(index, shadow2);
        this.updateShadow(index2, shadow1);
      },
      reset: function() {
        this.shadows = [],
        story_size = this.height * this.width;
        for (var i = 0; i < story_size; i++)
        {
          this.shadows.push({
            "invisible":"Invisible",
            "shape":"Round",
            "size":"26"
          })
        }
      },
      resize: function(width, height) {
        this.height = height;
        this.width = width;
        $(".Palette")[0].setAttribute("class", "Palette "+this.size_class+" Flex_Container " + this.orientation)
        // TODO logic for dropping shadows?
      },
      addShadow: function(index, id)
      {
        //TODO add undo functionality here record original state and push to list
        this.cascadeShadows(index, id);
        this.shadowCount++;
      },
      cascadeShadows: function(index, id)
      {
        /// when we drop a shadow on the story we bump all other
        /// shadows one position higher
        if(index >= this.shadows.length)
        {
          return;
        }
        if(index < this.shadows.length-1 && this.shadows[index].ID != null) {
    			this.cascadeShadows(parseInt(index)+1, this.shadows[index].ID);
    		}
        else if(index == this.shadows.length-1 && this.shadows[index].ID != null) {
    			overflow.push(this.shadows[index].ID);
    		}
        this.updateShadow(index, id);

      },
      updateShadow: function(index, id)
      {
        if(id == null)
        {
          shadow_data = {
            "invisible":"Invisible",
            "shape":"Round",
            "size":"26"
          };
          Vue.set(this.shadows, index, shadow_data);
        } else {
          shadow_data = shadow_list.shadows.filter(shadow=>shadow.ID == id)[0];
          //this.shadows[index] = shadow_data;
          Vue.set(this.shadows, index, shadow_data);
        }

        //shadow_data = $('#'+id)[0];
      },
      drop: function(evt, caller)
      {
        var data = evt.dataTransfer.getData("shadow");
        if(data) //dropping a shadow on here from the list
        {
          index = caller.getAttribute('data-index')
    			id = data;
          this.addShadow(index, id);
          updateFooter();
        }
        else //swap shadows.
        {
          let index = evt.dataTransfer.getData("index");
  				let swap_index = caller.getAttribute('data-index');
  				this.swap(index, swap_index);
        }
      }
    }
  });
  query = window.location.search;
  params = new URLSearchParams(query);
  height = getUrlParam("height", 3);
  width = getUrlParam("width", 3);
  shadow_story.resize(width, height);
  shadow_story.reset();
});
//empty shadows get pan size 26 , pan shape round, Invisible
//look at this for guidance: https://stackoverflow.com/questions/48455909/condition-in-v-bindstyle
