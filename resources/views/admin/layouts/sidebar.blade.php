  <!-- Sidebar -->
  <div id="sidebar" class="sidebar">
      <a href="{{ route('company.dashboard') }}" title="Dashboard"
          class="{{ request()->routeIs('company.dashboard') ? 'active' : '' }}"><span
              class="material-icons">dashboard</span><span class="text">Dashboard</span></a>
      <a href="{{ route('company.roles') }}" class="{{ request()->routeIs('company.roles') ? 'active' : '' }}"
          title="roles"><span class="material-icons">supervisor_account</span><span class="text">Roles</span></a>
      <a href="#" title="projects"><span class="material-icons">folder</span><span
              class="text">Projects</span></a>
      <a href="#" title="tasks"><span class="material-icons">assignment</span><span
              class="text">Tasks</span></a>
      <a href="#" title="Employees"><span class="material-icons">people</span><span
              class="text">Employees</span></a>
      <a href="#" title="Attendance"><span class="material-icons">access_time</span><span
              class="text">Attendance</span></a>
      <a href="#" title="Salary"><span class="material-icons">attach_money</span><span
              class="text">Salary</span></a>
      <a href="#" title="Leaves"><span class="material-icons">event</span><span class="text">Leaves</span></a>
      <a href="#" title="Settings"><span class="material-icons">settings</span><span
              class="text">Settings</span></a>
  </div>
