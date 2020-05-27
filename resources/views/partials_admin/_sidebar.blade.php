<div class="sidebar">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
  -->
    <div class="sidebar-wrapper">
      <div>
        <a href="javascript:void(0)" class="simple-text logo-mini">
          AT
        </a>
        <a href="javascript:void(0)" class="simple-text logo-normal">
          Assistante Admin
        </a>
      </div>
      <ul class="nav">
      <li class="{{Request::is('admin')?"active":""}}">
          <a href="{{route('admin.index')}}">
            <i class="tim-icons icon-chart-pie-36"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="{{Request::is('admin/services')?"active":""}}">
          <a href="{{route('services.index')}}">
            <i class="tim-icons icon-atom"></i>
            <p>Services</p>
          </a>
        </li>
        <li class="{{Request::is('admin/orders')?"active":""}}">
        <a href="{{route('orders.index')}}">
            <i class="tim-icons icon-pin"></i>
            <p>Orders</p>
          </a>
        </li>
        <li class="{{Request::is('admin/users')?"active":""}}">
        <a href="{{route('admin.users')}}">
            <i class="tim-icons icon-bell-55"></i>
            <p>Users</p>
          </a>
        </li>

      </ul>
    </div>
  </div>

