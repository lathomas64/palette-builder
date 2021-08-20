<style>


.tabordion {
  color: #333;
  display: block;
  font-family: arial, sans-serif;
  margin: auto;
  position: relative;
  width: 80%;
}

.tabordion input[name="sections"] {
  left: -9999px;
  position: absolute;
  top: -9999px;
}

.tabordion section {
  display: block;
}

.tabordion section label {
  background: #ccc;
  border:1px solid #fff;
  cursor: pointer;
  display: block;
  font-size: 1.2em;
  font-weight: bold;
  padding: 15px 20px;
  position: relative;
  width: 180px;
  z-index:100;
}

.tabordion section article {
  display: none;
  left: 230px;
  min-width: 300px;
  padding: 0 0 0 21px;
  position: absolute;  
  top: 0;
}

.tabordion section article:after {
  background-color: #ccc;
  bottom: 0;
  content: "";
  display: block;
  left:-229px;
  position: absolute;
  top: 0;
  width: 220px;
  z-index:1;
}

.tabordion input[name="sections"]:checked + label { 
  background: #eee;
  color: #bbb;
}

.tabordion input[name="sections"]:checked ~ article {
  display: block;
}


@media (max-width: 533px) {
  
  h1 {
    width: 100%;
  }

  .tabordion {
    width: 100%;
  }
  
  .tabordion section label {
    font-size: 1em;
    width: 160px;
  }  

 .tabordion section article {
    left: 200px;
    min-width: 270px;
  } 
  
  .tabordion section article:after {
    background-color: #ccc;
    bottom: 0;
    content: "";
    display: block;
    left:-199px;
    position: absolute;
    top: 0;
    width: 200px;

  }  
  
}


@media (max-width: 768px) {
  h1 {
    width: 96%;
  }

  .tabordion {
    width: 96%;
  }
}


@media (min-width: 1366px) {
  h1 {
    width: 70%;
  }

  .tabordion {
    width: 70%;
  }
}


</style>

<div class="tabordion">
  <section id="section1">
    <input type="radio" name="sections" id="option1" checked>
    <label for="option1">Story Size</label>
    	<?php include "story-size.php"; ?>
  </section>
  <section id="section2">
    <input type="radio" name="sections" id="option2">
    <label for="option2">Find Shadows</label>
    	<?php include "shadow-search.php"; ?>
  </section>
  <section id="section3">
    <input type="radio" name="sections" id="option3">
    <label for="option3">Community Stories</label>
    	<?php include "community-stories.php"; ?>
  </section>
  <section id="section4">
    <input type="radio" name="sections" id="option4">
    <label for="option4">Your Stories</label>
    	<?php include "your-stories.php"; ?>
  </section>
</div>