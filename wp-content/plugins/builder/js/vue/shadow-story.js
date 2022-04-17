$(document).ready(function (event) {
  shadow_story = new Vue({
    el:".Story_Grid",
    data: {
      "shadows": [{'name':'test'}],
      "width": 3,
      "height": 3,
      "overflow": []
    },
    computed: {
      computed_shadows: function () {
        return this.shadows;
      },
      orientation: function() {
        if(this.height > this.width) {
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
        $(".Palette")[0].setAttribute("class", "Palette "+this.size_class+" Flex_Container")
    		$(".Palette_Container")[0].setAttribute("class", "Palette_Container Flex_Container Column "+this.orientation+" Justify_Content_Center Align_Items_Center")
        // TODO logic for dropping shadows?
      },
      addShadow: function(index, id)
      {
        //TODO add undo functionality here record original state and push to list
        this.cascadeShadows(index, id);
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
    			console.log('overflow');
    			overflow.push(this.shadows[index].ID);
    		}
        this.updateShadow(index, id);

      },
      updateShadow: function(index, id)
      {
        if(id == null)
        {
          this.shadows[index] = {
            "invisible":"Invisible",
            "shape":"Round",
            "size":"26"
          };
        } else {
          shadow_data = shadow_list.shadows.filter(shadow=>shadow.ID == id)[0];
          this.shadows[index] = shadow_data;
          Vue.set(this.shadows, index, shadow_data);
        }

        //shadow_data = $('#'+id)[0];
      },
      drop: function(evt, caller)
      {
        console.log(evt);
        console.log(caller);
        var data = evt.dataTransfer.getData("shadow");
        console.log(data);
        if(data) //dropping a shadow on here from the list
        {
          index = caller.getAttribute('data-index')
    			id = data;
          this.addShadow(index, id);
          updateFooter();
        }
        else //swap shadows.
        {

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
