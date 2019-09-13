<div class="navbar-brand">
     <a href="#" class="df-logo">Lara<span>boi</span></a>
</div>
<div id="navbarMenu" class="navbar-menu-wrapper">
     <div class="navbar-menu-header">
          <a href="#" class="df-logo">Lara<span>boi</span></a>
          <a id="mainMenuClose" href=""><i data-feather="x"></i></a>
     </div>

     @auth
     <ul class="nav navbar-menu">
          <li class="nav-label pd-l-20 pd-lg-l-25 d-lg-none">Main Navigation</li>
          <li class="nav-item">
               <a href="" class="nav-link"><i data-feather="pie-chart"></i> Dashboard</a>
          </li>
          <li class="nav-item with-sub">
               <a href="#" class="nav-link"><i data-feather="package"></i> Apps</a>
               <ul class="navbar-menu-sub">
                    <li class="nav-sub-item">
                         <a href="app-calendar.html" class="nav-sub-link">
                              <i data-feather="calendar"></i>Calendar
                         </a>
                    </li>
                    <li class="nav-sub-item">
                         <a href="app-chat.html" class="nav-sub-link"><i data-feather="message-square"></i>Chat</a>
                    </li>
                    <li class="nav-sub-item">
                         <a href="app-contacts.html" class="nav-sub-link"><i data-feather="users"></i>Contacts</a>
                    </li>
                    <li class="nav-sub-item">
                         <a href="app-file-manager.html" class="nav-sub-link">
                              <i data-feather="file-text"></i>File
                              Manager
                         </a>
                    </li>
                    <li class="nav-sub-item">
                         <a href="app-mail.html" class="nav-sub-link">
                              <i data-feather="mail"></i>Mail
                         </a>
                    </li>
               </ul>
          </li>
          <li class="nav-item with-sub">
               <a href="" class="nav-link"><i data-feather="layers"></i> Administration</a>
               <div class="navbar-menu-sub">
                    <div class="d-lg-flex">
                         <ul>
                              <li class="nav-label">Users & Authorization</li>
                              <li class="nav-sub-item">
                                   <a href="page-groups.html" class="nav-sub-link">
                                        <i data-feather="users"></i> Users
                                   </a>
                              </li>
                              <li class="nav-sub-item">
                                   <a href="page-timeline.html" class="nav-sub-link">
                                        <i data-feather="file-text"></i> Roles
                                   </a>
                              </li>
                              <li class="nav-sub-item">
                                   <a href="page-verify.html" class="nav-sub-link">
                                        <i data-feather="user-check"></i> Permissions
                                   </a>
                              </li>
                         </ul>
                         <ul>
                              <li class="nav-label">Impersonating</li>
                              <li class="nav-sub-item">
                                   <a href="page-404.html" class="nav-sub-link">
                                        <i data-feather="file"></i> Impersonate
                                   </a>
                              </li>
                         </ul>
                    </div>
               </div>
          </li>
     </ul>
     @endauth

</div>