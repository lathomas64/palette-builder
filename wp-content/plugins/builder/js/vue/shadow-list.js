const sort_dict = {
  "price": "price",
  "color": "color-sort",
  "vividness": "vividness-sort",
  "lightness": "lightness-sort",
  "name": "name"
}
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
    results_per_page: 20,
    filters: {}
  },
  computed: {
    ids: function () {
      return this.shadows.map(shadow => shadow.id);
    },
    class: function(shadow) {
      shape = "Pan_Shape_"+shadow.shape;
      size = "Pan_Size_"+shadow.size;
      return {shape: true, size: true}
    }
  },
  methods: {
    add_to_story: function(id) {
      addShadow(currentStory.shadowCount,id);
      updateFooter();
    },
    add_filter: function(key, value) {
      this.filters[key] = value;
      this.load_shadows();
      //make dictionary of filters here.
    },
    remove_filter: function(key) {
      delete this.filters[key];
      this.load_shadows();
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
      console.log(this.page);
      this.updating = true;
      let url = this.url_base;
      url += "&page="+this.page;
      url += "&orderby="+this.sort_field;
      url += "&order="+this.sort_direction;
      // TODO fix this value somewhere
      url += "&per_page="+this.results_per_page;
      Object.entries(this.filters).forEach(([key, value]) => {
        url += "&"+key+"="+value;
      });
      // TODO run through filters dictionary and add to url
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
                  self.shadows.sort((lhs, rhs) => {
                    let left = lhs[sort_dict[self.sort_field]];
                    let right = rhs[sort_dict[self.sort_field]];
                    let mult = 1;
                    if(self.sort_direction == 'desc')
                    {
                      mult = -1;
                    }
                    if (left < right) {
                        return -1 * mult;
                    }
                    if (left > right) {
                        return 1 * mult;
                    }
                    return 0;
                  });
                }
                self.updating = false;
              },
              error: function(errorThrown){
                  console.log(url);
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
