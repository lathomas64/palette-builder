<head>
	<style>
	:root {
  --tabs-v3-border-width: 2px;
  --tabs-v3-radius: 0.25em;
  --tabs-v3-control-gap: 0;
  --tabs-v3-control-radius: 0;
}

.tabs-v3 {
  border: var(--tabs-v3-border-width) solid var(--color-contrast-low);
  padding: var(--component-padding);
  border-radius: var(--tabs-v3-radius);
  background-color: var(--color-bg);
}

.tabs-v3__controls {
  display: flex;
  flex-wrap: wrap;
  margin-bottom: var(--space-xs);
}

.tabs-v3__controls li {
  display: inline-block;
  margin: 0 var(--space-xs) var(--space-xs) 0;
}

.tabs-v3__control {
  display: inline-flex;
  background-color: var(--color-contrast-low);
  padding: var(--space-xs) var(--space-sm);
  white-space: nowrap;
  color: inherit;
  border-radius: var(--tabs-v3-control-radius);
}

.tabs-v3__control:hover {
  background-color: var(--color-contrast-lower);
}

.tabs-v3__panel {
  margin-bottom: var(--space-md);
}

.js .tabs-v3__control {
  text-decoration: none;
}

.js .tabs-v3__control[aria-selected="true"] {
  background-color: var(--color-primary);
  color: var(--color-white);
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.js .tabs-v3__control[aria-selected="true"]:hover {
  background-color: var(--color-primary-light);
}

.js .tabs-v3__panel {
  margin-bottom: 0;
}

.tabs__control {
  text-decoration: none;
  color: var(--color-contrast-medium);
}

.tabs__control:focus {
  outline: 2px solid hsla(var(--color-primary-h), var(--color-primary-s), var(--color-primary-l), 0.2);
  outline-offset: 2px;
}

.tabs__control:hover {
  color: var(--color-contrast-high);
}

.js .tabs__control[aria-selected="true"] {
  color: var(--color-contrast-high);
  text-decoration: underline;
}
	</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		// File#: _1_tabs
// Usage: codyhouse.co/license
(function() {
  var Tab = function(element) {
    this.element = element;
    this.tabList = this.element.getElementsByClassName('js-tabs__controls')[0];
    this.listItems = this.tabList.getElementsByTagName('li');
    this.triggers = this.tabList.getElementsByTagName('a');
    this.panelsList = this.element.getElementsByClassName('js-tabs__panels')[0];
    this.panels = Util.getChildrenByClassName(this.panelsList, 'js-tabs__panel');
    this.hideClass = 'is-hidden';
    this.customShowClass = this.element.getAttribute('data-show-panel-class') ? this.element.getAttribute('data-show-panel-class') : false;
    this.layout = this.element.getAttribute('data-tabs-layout') ? this.element.getAttribute('data-tabs-layout') : 'horizontal';
    // deep linking options
    this.deepLinkOn = this.element.getAttribute('data-deep-link') == 'on';
    // init tabs
    this.initTab();
  };

  Tab.prototype.initTab = function() {
    //set initial aria attributes
    this.tabList.setAttribute('role', 'tablist');
    for( var i = 0; i < this.triggers.length; i++) {
      var bool = (i == 0),
        panelId = this.panels[i].getAttribute('id');
      this.listItems[i].setAttribute('role', 'presentation');
      Util.setAttributes(this.triggers[i], {'role': 'tab', 'aria-selected': bool, 'aria-controls': panelId, 'id': 'tab-'+panelId});
      Util.addClass(this.triggers[i], 'js-tabs__trigger'); 
      Util.setAttributes(this.panels[i], {'role': 'tabpanel', 'aria-labelledby': 'tab-'+panelId});
      Util.toggleClass(this.panels[i], this.hideClass, !bool);

      if(!bool) this.triggers[i].setAttribute('tabindex', '-1'); 
    }

    //listen for Tab events
    this.initTabEvents();

    // check deep linking option
    this.initDeepLink();
  };

  Tab.prototype.initTabEvents = function() {
    var self = this;
    //click on a new tab -> select content
    this.tabList.addEventListener('click', function(event) {
      if( event.target.closest('.js-tabs__trigger') ) self.triggerTab(event.target.closest('.js-tabs__trigger'), event);
    });
    //arrow keys to navigate through tabs 
    this.tabList.addEventListener('keydown', function(event) {
      ;
      if( !event.target.closest('.js-tabs__trigger') ) return;
      if( tabNavigateNext(event, self.layout) ) {
        event.preventDefault();
        self.selectNewTab('next');
      } else if( tabNavigatePrev(event, self.layout) ) {
        event.preventDefault();
        self.selectNewTab('prev');
      }
    });
  };

  Tab.prototype.selectNewTab = function(direction) {
    var selectedTab = this.tabList.querySelector('[aria-selected="true"]'),
      index = Util.getIndexInArray(this.triggers, selectedTab);
    index = (direction == 'next') ? index + 1 : index - 1;
    //make sure index is in the correct interval 
    //-> from last element go to first using the right arrow, from first element go to last using the left arrow
    if(index < 0) index = this.listItems.length - 1;
    if(index >= this.listItems.length) index = 0;	
    this.triggerTab(this.triggers[index]);
    this.triggers[index].focus();
  };

  Tab.prototype.triggerTab = function(tabTrigger, event) {
    var self = this;
    event && event.preventDefault();	
    var index = Util.getIndexInArray(this.triggers, tabTrigger);
    //no need to do anything if tab was already selected
    if(this.triggers[index].getAttribute('aria-selected') == 'true') return;
    
    for( var i = 0; i < this.triggers.length; i++) {
      var bool = (i == index);
      Util.toggleClass(this.panels[i], this.hideClass, !bool);
      if(this.customShowClass) Util.toggleClass(this.panels[i], this.customShowClass, bool);
      this.triggers[i].setAttribute('aria-selected', bool);
      bool ? this.triggers[i].setAttribute('tabindex', '0') : this.triggers[i].setAttribute('tabindex', '-1');
    }

    // update url if deepLink is on
    if(this.deepLinkOn) {
      history.replaceState(null, '', '#'+tabTrigger.getAttribute('aria-controls'));
    }
  };

  Tab.prototype.initDeepLink = function() {
    if(!this.deepLinkOn) return;
    var hash = window.location.hash.substr(1);
    var self = this;
    if(!hash || hash == '') return;
    for(var i = 0; i < this.panels.length; i++) {
      if(this.panels[i].getAttribute('id') == hash) {
        this.triggerTab(this.triggers[i], false);
        setTimeout(function(){self.panels[i].scrollIntoView(true);});
        break;
      }
    };
  };

  function tabNavigateNext(event, layout) {
    if(layout == 'horizontal' && (event.keyCode && event.keyCode == 39 || event.key && event.key == 'ArrowRight')) {return true;}
    else if(layout == 'vertical' && (event.keyCode && event.keyCode == 40 || event.key && event.key == 'ArrowDown')) {return true;}
    else {return false;}
  };

  function tabNavigatePrev(event, layout) {
    if(layout == 'horizontal' && (event.keyCode && event.keyCode == 37 || event.key && event.key == 'ArrowLeft')) {return true;}
    else if(layout == 'vertical' && (event.keyCode && event.keyCode == 38 || event.key && event.key == 'ArrowUp')) {return true;}
    else {return false;}
  };
  
  //initialize the Tab objects
  var tabs = document.getElementsByClassName('js-tabs');
  if( tabs.length > 0 ) {
    for( var i = 0; i < tabs.length; i++) {
      (function(i){new Tab(tabs[i]);})(i);
    }
  }
}());
	</script>
</head>

<div class="tabs js-tabs">
  <ul class="flex flex-wrap gap-sm js-tabs__controls" aria-label="Tabs Interface">
    <li><a href="#tab1Panel1" class="tabs__control" aria-selected="true">Tab 1</a></li>
    <li><a href="#tab1Panel2" class="tabs__control">Tab 2</a></li>
    <li><a href="#tab1Panel3" class="tabs__control">Tab 3</a></li>
    <li><a href="#tab1Panel4" class="tabs__control">Tab 4</a></li>
    <li><a href="#tab1Panel5" class="tabs__control">Tab 5</a></li>
  </ul>

  <div class="js-tabs__panels">
    <section id="tab1Panel1" class="padding-top-md js-tabs__panel">
      <div class="text-component">
        <h1 class="text-lg">Panel 1</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt reprehenderit voluptatibus expedita. Laboriosam maxime aut dolorem eum qui nemo! Ea!</p>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati natus totam assumenda cumque numquam culpa officia, harum vel quibusdam recusandae, blanditiis non quae pariatur? Laborum, animi dolor tempora laboriosam minus nulla sit, hic molestias velit delectus sint aspernatur possimus soluta?</p>
      </div>
    </section>

    <section id="tab1Panel2" class="padding-top-md js-tabs__panel">
      <div class="text-component">
        <h1 class="text-lg">Panel 2</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt, nobis! Vitae quis minus accusantium qui atque? Officiis sunt exercitationem natus, minus sapiente debitis eum animi porro. Ut cupiditate amet expedita!</p>
      </div>
    </section>

    <section id="tab1Panel3" class="padding-top-md js-tabs__panel">
      <div class="text-component">
        <h1 class="text-lg">Panel 3</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, veritatis.</p>
      </div>
    </section>

    <section id="tab1Panel4" class="padding-top-md js-tabs__panel">
      <div class="text-component">
        <h1 class="text-lg">Panel 4</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, ipsa. Maiores sit totam dignissimos perferendis recusandae quis eligendi quos expedita consequatur, natus debitis, deserunt placeat tenetur odit voluptates, ad nihil cum ipsa quae est facere, voluptate sapiente tempora a officiis. Ipsa perspiciatis aut commodi enim expedita. Saepe at cupiditate quaerat explicabo distinctio quae enim, ab impedit! Sunt, omnis, sit magnam id exercitationem mollitia alias pariatur doloremque nulla. Totam quis, animi minus error molestias sit. Quidem, dolor, aspernatur. Voluptates, magni, provident?</p>
      </div>
    </section>

    <section id="tab1Panel5" class="padding-top-md js-tabs__panel">
      <div class="text-component">
        <h1 class="text-lg">Panel 5</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam modi nesciunt eum, dolores corrupti labore assumenda vel? Cupiditate fugit nihil, sunt nulla nisi blanditiis quidem, eos nesciunt. Quidem dolorem laudantium, ex fuga natus nisi error architecto saepe sapiente dolores assumenda.</p>
      </div>
    </section>
  </div>
</div