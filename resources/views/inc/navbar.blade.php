<div class="row nav-wrapper">  <!-- opening side bar-->
  <ul id="slide-out" class="side-nav grey darken-2 z-depth-5 col s3 m3 l3" style="width:200px">
    <li><div class="user-view">
      <img style="border-radius: 50%;" src="{{asset('dp.jpg')}}" width="120" height="120" class="z-depth-5">
      <span class="black-text collapsible-header"><h6>Hello User!</h6></span>
      <span class="black-text collapsible-header"><h6>Email Here</h6></span>
    </div>
  </li><br>
  <li class=""><a href="{{url('home')}}" class="collapsible-header"><h5>Dashboard</h5></a></li>
  <li>
    <ul class="collapsible collapsible-accordion">
      <li>
        <a class="collapsible-header" onclick="Materialize.showStaggeredList('#trans')"><h5>Projects</h5></a>
        <div class="collapsible-body grey darken-1">
          <ul id="trans">
            <li><a href="{{url('addprojects')}}">Add Project</a></li>
            <li><a href="{{url('viewprojects')}}">View Project</a></li>
          </ul>
        </div>
      </li>
      <li>
        <a class="collapsible-header" onclick="Materialize.showStaggeredList('#trans2')"><h5>Inventory</h5></a>
        <div class="collapsible-body grey darken-1">
          <ul id="trans2">
            <li><a href="{{url('additem')}}">Add Item</a></li>
            <li><a href="{{url('items')}}">View Item</a></li>
            <li><a href="{{url('borrowitem')}}">Borrow Item</a></li>
          </ul>
        </div>
      </li>
      <li>
        <a class="collapsible-header" onclick="Materialize.showStaggeredList('#trans3')"><h5>Profiles</h5></a>
        <div class="collapsible-body grey darken-1">
          <ul id="trans3">
            <li><a href="{{url('addvolunteer')}}">Add Volunteer</a></li>
            <li><a href="{{url('addstaff')}}">Add Staff</a></li>
            <li><a href="{{url('vols')}}">View Volunteers</a></li>
            <li><a href="{{url('staffs')}}">View Staffs</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </li>
</ul>
</div>
<!-- close sidebar -->
