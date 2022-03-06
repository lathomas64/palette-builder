const API_SHADOW_BASE="https://pb.rainbowcapitalism.com/?rest_route=/wp/v2/cpt_shadow&status=publish";
$(document).ready(function (event) {
shadow_list = new Vue({
    el:".Results_Container .Grid",
    data: {
    shadows: [{ name: "Foo" }, { name: "Bar" }],
    page: 1,
    sort_field: 'color',
    sort_direction: 'asc',
    updating: false,
    url_base: "https://pb.rainbowcapitalism.com/?rest_route=/wp/v2/cpt_shadow&status=publish",
    results_per_page: 20
  },
  computed: {
    ids: function () {
      return this.shadows.map(shadow => shadow.id);
    }
  },
  methods: {
    add_to_story: function(id) {
      addShadow(currentStory.shadowCount,id);
      updateFooter();
    },
    load_shadows: function (append=false) {
      if(this.updating)
      {
        return;
      }
      if(append)
      {
        this.page += 1;
      } else {
        this.page = 1;
      }
      this.updating = true;
      let url = this.url_base;
      url += "&page="+this.page;
      url += "&orderby="+this.sort_field;
      url += "&order="+this.sort_direction;
      // TODO fix this value somewhere
      url += "&per_page="+this.results_per_page;
      let self = this;
      jQuery.ajax({
              url: url,
              method: 'GET',
              success:function(data) {
                console.log(data);
                console.log(self.shadows);
                if(append){
                  self.shadows = self.shadows.concat(data);
                } else {
                  self.shadows = data;
                }
                self.updating = false;
              },
              error: function(errorThrown){
              	  console.log('ajax error');
                  console.log(errorThrown);
                  self.updating = false;
              }
          });
    },
    sort: function (field, direction='asc') {
      this.sort_field = field;
      this.sort_direction = direction;
      this.load_shadows();
    },
    shadow_loaded: function (id) {
      return id in this.ids;
    }
  }
    }
);
shadow_list.load_shadows();
});
