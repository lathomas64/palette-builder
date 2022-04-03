$(document).ready(function (event) {
  shadow_story = new Vue({
    el:"Story_Grid",
    data: {
      "shadows": [],
      "width": 3,
      "height": 3,
    },
    computed: {},
    methods: {
      reset: function() {},
      resize: function(height, width) {},
    }
  });
}
//empty shadows get pan size 26 , pan shape round, Invisible
//look at this for guidance: https://stackoverflow.com/questions/48455909/condition-in-v-bindstyle
