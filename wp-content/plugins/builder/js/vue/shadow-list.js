const sort_dict = {
  "price": "price",
  "color": "color-sort",
  "vividness": "vividness-sort",
  "lightness": "lightness-sort",
  "name": "name"
}
shipping_options = [];
brand_list = [];
function init_lists(){
  //shipping_list
  shipping_url = "https://"+window.location.host+"/?rest_route=/wp/v2/tax_shipping&per_page=100&_fields=slug,name"
  pull_pages(shipping_url,"shipping_options");
  //brand_list
  brand_url = "https://"+window.location.host+"/?rest_route=/wp/v2/cpt_brand&per_page=100&_fields=id,slug,title"
  pull_pages(brand_url, "brand_list");
}
$(document).ready(function (event) {
shadow_list = new Vue({
    el:".Results_Container .Grid",
    data: {
      shadows: [{ name: "Foo" }, { name: "Bar" }],
      all_shadows: [],
      page: 1,
      waittime: 500,
      search_timer: undefined,
      sort_field: 'color',
      sort_direction: 'asc',
      updating: false,
      url_base: "https://"+window.location.host+"/?rest_route=/wp/v2/cpt_shadow",
      results_per_page: 50,
      filters: {}
    },
    computed: {
      ids: function () {
        return this.all_shadows.map(shadow => shadow.ID);
      },
      shipping_options: function () {
        return paged_data["shipping_options"];
      },
      brand_list: function () {
        return paged_data["brand_list"];
      },
      class: function(shadow) {
        shape = "Pan_Shape_"+shadow.shape;
        size = "Pan_Size_"+shadow.size;
        return {shape: true, size: true}
      }
    },
    methods: {
      pull_shadow_data: function(id, callback) {
        let url = this.url_base;
        let self = this;
        url += "/"+id;
        console.log(url);
        jQuery.ajax({
          url: url,
          method: 'GET',
          success: function(data, status, xhr) {
            self.all_shadows.push(data);
            callback(data);
          },
          error: function(errorThrown){
              console.log(url);
              console.log('ajax error');
              console.log(errorThrown);
          }
        });
      },
      add_to_story: function(id) {
        index = shadow_story.first_empty_index();
        if(index > -1) {
          shadow_story.addShadow(index, id);
          updateFooter();
        }
        else {
          //launch_modal("Story Full", "The current story cannot fit anymore shadows.");
          $("#"+id+" .Pan_Shadow").after('<div id="Story_Full">Story Full</div>');
          setTimeout(() => $("#Story_Full").remove(), 100);
        }
      },
      price_min: function(value) {
        this.filters["price_min"] = new Set();
        if(value > 0)
        {
          this.filters["price_min"].add(value);
        }
        this.load_shadows();
      },
      price_max: function(value) {
        this.filters["price_max"] = new Set();
        if(value > 0)
        {
          this.filters["price_max"].add(value);
        }
        this.load_shadows();
      },
      toggle_filter: function(key, value) {
        $("#Shadow_Count").text("Filtering...");
        if(!this.filters.hasOwnProperty(key))
        {
          this.filters[key] = new Set();
        }
        //If we have the value unset it
        if (this.filters[key].has(value))
        {
          this.filters[key].delete(value);
        }
        else {
          this.filters[key].add(value);
        }
        this.load_shadows();
      },
      reset_filters: function() {
        this.filters = {};
        this.load_shadows();
        filterBtnReset();
      },
      search: function(query) {
        this.query = query;
        clearTimeout(this.search_timer);
        this.search_timer = setTimeout(() => {
          this.load_shadows();
        }, this.waittime);

      },
      load_shadows: function (append=false) {
        if(this.updating && append)
        {
          return;
        }
        clearTimeout(this.load_shadow_timeout);
        if(append)
        {
          this.page += 1;
        } else {
          this.page = 1;
        }
        console.log(this.page);
        this.updating = true;
        let url = this.url_base;
        url += "&status=publish&pb_status=Active";
        url += "&page="+this.page;
        url += "&orderby="+this.sort_field;
        url += "&order="+this.sort_direction;
        // TODO fix this value somewhere
        url += "&per_page="+this.results_per_page;
        if(this.query)
        {
          url += "&search="+this.query;
        }
        Object.entries(this.filters).forEach(([key, value]) => {
          if(value.size > 0)
          {
            url += "&"+key+"="+Array.from(value).join();
          }
        });
        // TODO run through filters dictionary and add to url
        let self = this;
        console.log(url);
        data = {
                url: url,
                method: 'GET',
                success:function(data, status, xhr) {
                  self.total = xhr.getResponseHeader("X-WP-Total");
                  // Hack because i couldn't get updating that inside of
                  // vue to work easily and didn't want to spend a ton
                  // of time figuring out how -IT
                  $("#Shadow_Count").text("Showing "+self.total+" shadows");
                  if (self.total == 0)
                  {
                    $("#EmptyShadowListMessage").removeClass("hidden");
                  } else {
                    $("#EmptyShadowListMessage").addClass("hidden");
                  }
                  self.all_shadows.concat(data);
                  self.all_shadows = unique(self.all_shadows);
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
        };
        this.load_shadow_timeout = setTimeout(jQuery.ajax, this.waittime, data);
      },
      sort: function (field, direction='asc') {
        this.sort_field = field;
        this.sort_direction = direction;
        this.load_shadows();
      },
      shadow_loaded: function (id) {
        return this.ids.includes(id);
      }
    }
});
shadow_list.load_shadows();
init_lists();
});
