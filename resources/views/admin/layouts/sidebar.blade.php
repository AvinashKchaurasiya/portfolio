  <!-- Sidebar -->
  <div id="sidebar" class="sidebar">
      <a href="{{ route('admin.dashboard') }}" title="Dashboard"
          class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><span
              class="material-icons">dashboard</span><span class="text">Dashboard</span></a>
      <a href="{{ route('admin.clients') }}"
          class="{{ request()->routeIs('admin.clients') || request()->routeIs('admin.editClient') ? 'active' : '' }}"
          title="Clients"><span class="material-icons">supervisor_account</span><span class="text">Clients</span></a>
      <a href="{{ route('admin.projects') }}"
          class="{{ request()->routeIs('admin.projects') || request()->routeIs('admin.createProject') || request()->routeIs('admin.editProject') ? 'active' : '' }}"
          title="projects"><span class="material-icons">folder</span><span class="text">Projects</span></a>
      <a href="{{ route('admin.skills') }}" title="Skills"
          class="{{ request()->routeIs('admin.skills') || request()->routeIs('admin.editSkill') ? 'active' : '' }}">
          <span class="material-icons">psychology</span>
          <span class="text">Skills</span>
      </a>
      <a href="{{ route('admin.technology') }}" title="Technologies"
          class="{{ request()->routeIs('admin.technology') || request()->routeIs('admin.editTechnology') ? 'active' : '' }}">
          <span class="material-icons">developer_mode</span>
          <span class="text">Technologies</span>
      </a>

      <a href="{{ route('admin.services') }}" title="Services"
          class="{{ request()->routeIs('admin.services') || request()->routeIs('admin.editService') ? 'active' : '' }}">
          <span class="material-icons">build_circle</span>
          <span class="text">Services</span>
      </a>

      <a href="{{ route('admin.experiences') }}" title="Experience"
          class="{{ request()->routeIs('admin.experiences') || request()->routeIs('admin.editExperience') || request()->routeIs('admin.createExperience') ? 'active' : '' }}">
          <span class="material-icons">work_history</span>
          <span class="text">Experience</span>
      </a>

      <a href="{{ route('admin.contactFormDetails') }}" title="Contact Details"
          class="{{ request()->routeIs('admin.contactFormDetails') ? 'active' : '' }}">
          <span class="material-icons">contact_phone</span>
          <span class="text">Contact Details</span>
      </a>
      <a href="#" title="Testimonials"><span class="material-icons">rate_review</span><span
              class="text">Testimonials</span></a>
      <!-- Details Link (No Dropdown) -->
      <a href="{{ route('admin.profileDetails') }}"
          class="{{ request()->routeIs('admin.profileDetails') ? 'active' : '' }}" title="Profile Details">
          <span class="material-icons">person</span>
          <span class="text">Profile Details</span>
      </a>
      <!-- Education Menu -->
      <a href="{{ route('admin.educations') }}" title="Education"
          class="{{ request()->routeIs('admin.educations') || request()->routeIs('admin.editEducation') || request()->routeIs('admin.createEducation') ? 'active' : '' }}">
          <span class="material-icons">school</span>
          <span class="text">Education</span>
      </a>
  </div>
