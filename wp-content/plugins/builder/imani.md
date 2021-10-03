### Gina's Notes For Imani
- none presently

### Changes/Additions
- [ ] Need to overwrite, save new saved palette
- [ ] how to remove saved palettes
- [ ] Remember closing help boxes
- [ ] Sort should show which sort is currently active
- [x] When there's no value, default = none (replaces "unknown")

### Bugs
- [ ] Using X to clear search field does not update list
- [x] Vivid/muted and Muted/Vivid sort are switched
- [x] color family, color temperature, and finish display as unknown if multiple values present.
  * Gina changed color family & color temperature to one combined field. Take the first color tag and display here.  
  * just pick the first if we have multiples (for now. Gina may have different schema later)
- [ ] Attempting to load user color story breaks the whole thing
- [X] 2x when building a larger story, clicking on the right side of the palette made the size reset to 3x3
- [ ] Neutral filter button doesn't work. 
      * Gina's note: I've been thinking about adding neutral as a color family taxonomy, if that would make it easier. 

## Tasks
### Imani

#### Airtable
- [x] Data processing: fix Airtable photo export so that it pulls more than 100 images
- [ ] Builder Front-End Interface Data processing: fix Shopify JSON flatten

#### Wordpress/Import/back-end stuff
- [ ] Data import: Brand doesn't seem to be mapping to shadow or series.
  * Addt'l info: In the importer, doesn't show the ACF Brand field as relationship
  - [ ] site siezes up sometimes -- maybe better with cache plugin?
      * Gina note: I'd be interested to see what insight Linode has. The size seizes even if I am just saving settings too often. I wonder if there's a cap on requests to the server.

#### Front-end Builder
- [ ] remap width, height, and shape to pull from new taxonomies.
- [x] Make pink filter functional
- [ ] Advanced filter options activate
- [ ] Populate & map shipping country filters
- [ ] Make maybe pile active/workable
- [ ] Overflow Stories go to
- [ ] Shopping list.
- [x] Close about this panel
- [ ] Sort options
- [ ] Share modal/automatic copy to clipboard.
- [ ] Users.
- [ ] save button behavior if you are not logged in..
- [ ] Calculations for shadow sizes/full palette.
- [ ] arrows being finnicky default.
- [ ] Mouse needs to go with their cursor.

- [ ] remove most console logs before launch


### Gina

#### Airtable
- [ ] Colourpop shade names need fixing
- [ ] Differentiation between yellow and green may need tweaking
- [x] ID #s for brands and series

#### Wordpress/Import/back-end stuff
- [ ] Potential import problem: using same images doesn't map image correctly (Utopia TM & Clionadh)
- [ ] Eyeshadow import sometimes gives a shadow to two series


#### Front-end Builder
##### Needs Build
- [ ] Generic Modal markup/style
- [ ] Disclaimers
- [ ] Help
- [ ] Shopping list modal path
##### Tweaks/Changes
- [ ] Re-factor JS to work so that modals have separate container and content that turns on
- [ ] Make the fact that color filters are selected more visible
- [ ] Revisit how shadows are sized in container. Make consistent/scalable
- [ ] CSS for rotate
- [ ] Figure out a way to make hover panel less intrusive
- [ ] Make filter panels drawers?
- [ ] Advanced Filter just cover right panel?
###### Filters
- [x] Pink Filter button
- [ ] Re-arrange filters so that basic is all shadow info & advanced is brand and such?
- [ ] Clear filters by section and all
- [ ] Scaling pan controls


#### Potential help box info
- [ ] How to get black/white/gray shadows

### Uncategorized
- nothing to see here rn
