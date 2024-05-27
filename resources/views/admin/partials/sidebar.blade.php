<aside class="main-sidebar sidebar-light-indigo elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/admin/dashboard')}}" class="brand-link text-decoration-none">
      {{-- <img src="#" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">EMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{url('/admin/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-user"></i>
              <p>Users<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/users')}}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>View Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/users/create') }}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>Add User</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-school"></i>
              <p>Finsets<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/finset')}}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>View Finsets</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/finset/create') }}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>Add Finset</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-school"></i>
              <p>Budget Categories<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route( 'budget_categories.index' ) }}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>View Budget Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route( 'budget_categories.create' ) }}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>Add Budget Category</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-school"></i>
              <p>Tags<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route( 'tags.index' ) }}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>View Tags</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route( 'tags.create' ) }}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>Add Tag</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-school"></i>
              <p>Vendors<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route( 'vendors.index' ) }}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>View Vendors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route( 'vendors.create' ) }}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>Add Vendor</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-school"></i>
              <p>Accounts<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route( 'accounts.index' ) }}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>View Accounts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route( 'accounts.create' ) }}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>Add Account</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-school"></i>
              <p>Associate Groups<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route( 'association_groups.index' ) }}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>View Associate Groups</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route( 'association_groups.create' ) }}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>Add Associate Group</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-school"></i>
              <p>Transaction Tag<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route( 'transactiontag.index' ) }}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>View Transaction Tag</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route( 'transactiontag.create' ) }}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>Add New Transaction Tag</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-school"></i>
              <p>Transactions<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route( 'transaction.index' ) }}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>View Transactions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route( 'transaction.create' ) }}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>Add Transaction</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-school"></i>
              <p>Sub-Transaction Tag<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route( 'subtransactiontag.index' ) }}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>View Sub-transactions Tag</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route( 'subtransactiontag.create' ) }}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>Add Sub-transaction Tag</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-school"></i>
              <p>Sub-Transaction<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route( 'subtransactions.index' ) }}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>View Sub-transactions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route( 'subtransactions.create' ) }}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>Add New Sub-transaction</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-school"></i>
              <p>Account Value<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route( 'accountvalue.index' ) }}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>View Account Value</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route( 'accountvalue.create' ) }}" class="nav-link">
                  <i class="nav-icon fas fa"></i>
                  <p>Add New Account Value</p>
                </a>
              </li>
            </ul>
          </li>
          

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>