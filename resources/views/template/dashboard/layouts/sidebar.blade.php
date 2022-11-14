<nav class="sidebar sidebar-offcanvas d-grid gap-3" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="/dashboard">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item mt-3 posts {{ Request::is('dashboard/posts*') ? 'active' : '' }}">
      <a class="nav-link" href="/dashboard/posts">
        <i class="mdi mdi-file-document-box menu-icon"></i>
        <span class="menu-title">My Post</span>
      </a>
    </li>

    @can('admin')
    <li class="nav-item nav-category text-uppercase">administrator</li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon mdi mdi-settings"></i>
        <span class="menu-title">Manage</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">Categories</a></li>
          <li class="nav-item"> <a class="nav-link" href="#">User</a></li>
        </ul>
      </div>
    </li>
    @endcan
  </ul>
</nav>

<script>
  $(document).ready(function () {
      $('.nav li').click(function(e) {

          $('.nav li').removeClass('active');

          var $this = $(this);
          if (!$this.hasClass('active')) {
              $this.addClass('active');
          }
          //e.preventDefault();
      });
  });
</script>