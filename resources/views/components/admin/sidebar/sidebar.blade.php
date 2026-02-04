<aside x-data="{
    openMenus: [],
    init() {
      // Auto-open menus based on current route
      if (this.isUsers()) this.openMenus.push('users')
      if (this.isEmployees()) this.openMenus.push('employees')
      if (this.isSchedules()) this.openMenus.push('schedules')
      if (this.isShifts()) this.openMenus.push('shifts')
      if (this.isAttendances()) this.openMenus.push('attendances')
    },
    toggle(menu) {
      if (this.openMenus.includes(menu)) {
        this.openMenus = this.openMenus.filter(m => m !== menu)
      } else {
        this.openMenus.push(menu)
      }
    },
    isOpen(menu) {
      return this.openMenus.includes(menu)
    },
    isUsers() {
      return {{ request()->routeIs('admin.users.*') ? 'true' : 'false' }}
    },
    isEmployees() {
      return {{ request()->routeIs('admin.employees.*') || request()->routeIs('admin.management.*') || request()->routeIs('admin.employee-history.*') || request()->routeIs('admin.onsite.*') ? 'true' : 'false' }}
    },
    isSchedules() {
      return {{ request()->routeIs('admin.schedules.*') ? 'true' : 'false' }}
    },
    isShifts() {
      return {{ request()->routeIs('admin.shifts.*') ? 'true' : 'false' }}
    },
    isAttendances() {
      return {{ request()->routeIs('admin.attendances.*') || request()->routeIs('admin.attendance-locations.*') ? 'true' : 'false' }}
    }
  }" class="w-64 min-h-screen bg-gradient-to-b from-white to-sky-50/30 border-r border-sky-100 shadow-sm">

  {{-- HEADER --}}
  <div class="px-6 py-5 border-b border-sky-100/50 backdrop-blur-sm">
    <div class="flex items-center gap-2">
      <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-sky-500 to-sky-600 flex items-center justify-center shadow-sm">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
        </svg>
      </div>
      <h1 class="text-lg font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Admin Panel</h1>
    </div>
  </div>

  {{-- NAV --}}
  <nav class="p-3 space-y-1 text-sm">

    {{-- DASHBOARD --}}
    <a href="{{ route('admin.dashboard') }}" @class([
      'group flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all duration-200',
      'bg-gradient-to-r from-sky-500 to-sky-600 text-white shadow-sm shadow-sky-500/20' => request()->routeIs('admin.dashboard'),
      'text-gray-700 hover:bg-sky-50 hover:text-sky-700' => !request()->routeIs('admin.dashboard')
    ])>
      <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
      </svg>
      <span class="font-medium">Dashboard</span>
    </a>

    {{-- USERS --}}
    <div>
      <button @click="toggle('users')" type="button"
        class="w-full group flex items-center justify-between px-3 py-2.5 rounded-lg transition-all duration-200 hover:bg-sky-50"
        :class="isOpen('users') ? 'text-sky-700 bg-sky-50' : 'text-gray-700'">
        <div class="flex items-center gap-3">
          <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
          </svg>
          <span class="font-medium">Users</span>
        </div>
        <svg class="w-4 h-4 transition-transform duration-200" :class="isOpen('users') ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
      </button>

      <div x-show="isOpen('users')" x-collapse class="ml-8 mt-1 space-y-0.5 border-l-2 border-sky-100 pl-3">
        <a href="{{ route('admin.users.index') }}" @class([
          'block px-3 py-2 rounded-md text-sm transition-all duration-200',
          'text-sky-700 bg-sky-50 font-medium' => request()->routeIs('admin.users.index'),
          'text-gray-600 hover:text-sky-700 hover:bg-sky-50/50' => !request()->routeIs('admin.users.index')
        ])>
          All Users
        </a>

        <a href="{{ route('admin.users.create') }}" @class([
          'block px-3 py-2 rounded-md text-sm transition-all duration-200',
          'text-sky-700 bg-sky-50 font-medium' => request()->routeIs('admin.users.create'),
          'text-gray-600 hover:text-sky-700 hover:bg-sky-50/50' => !request()->routeIs('admin.users.create')
        ])>
          Add User
        </a>
      </div>
    </div>

    {{-- EMPLOYEES --}}
    <div>
      <button @click="toggle('employees')" type="button"
        class="w-full group flex items-center justify-between px-3 py-2.5 rounded-lg transition-all duration-200 hover:bg-sky-50"
        :class="isOpen('employees') ? 'text-sky-700 bg-sky-50' : 'text-gray-700'">
        <div class="flex items-center gap-3">
          <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
          </svg>
          <span class="font-medium">Employees</span>
        </div>
        <svg class="w-4 h-4 transition-transform duration-200" :class="isOpen('employees') ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
      </button>

      <div x-show="isOpen('employees')" x-collapse class="ml-8 mt-1 space-y-0.5 border-l-2 border-sky-100 pl-3">
        <a href="{{ route('admin.employees.index') }}" @class([
          'block px-3 py-2 rounded-md text-sm transition-all duration-200',
          'text-sky-700 bg-sky-50 font-medium' => request()->routeIs('admin.employees.index'),
          'text-gray-600 hover:text-sky-700 hover:bg-sky-50/50' => !request()->routeIs('admin.employees.index')
        ])>
          Employees
        </a>

        <a href="{{ route('admin.employee-history.index') }}" @class([
          'block px-3 py-2 rounded-md text-sm transition-all duration-200',
          'text-sky-700 bg-sky-50 font-medium' => request()->routeIs('admin.employee-history.*'),
          'text-gray-600 hover:text-sky-700 hover:bg-sky-50/50' => !request()->routeIs('admin.employee-history.*')
        ])>
          Employee History
        </a>

        <a href="{{ route('admin.management.index') }}" @class([
          'block px-3 py-2 rounded-md text-sm transition-all duration-200',
          'text-sky-700 bg-sky-50 font-medium' => request()->routeIs('admin.management.*'),
          'text-gray-600 hover:text-sky-700 hover:bg-sky-50/50' => !request()->routeIs('admin.management.*')
        ])>
          Management
        </a>

        <a href="{{ route('admin.onsite.index') }}" @class([
          'block px-3 py-2 rounded-md text-sm transition-all duration-200',
          'text-sky-700 bg-sky-50 font-medium' => request()->routeIs('admin.onsite.*'),
          'text-gray-600 hover:text-sky-700 hover:bg-sky-50/50' => !request()->routeIs('admin.onsite.*')
        ])>
          Onsite-HD
        </a>
      </div>
    </div>

    {{-- SCHEDULES --}}
    <div>
      <button @click="toggle('schedules')" type="button"
        class="w-full group flex items-center justify-between px-3 py-2.5 rounded-lg transition-all duration-200 hover:bg-sky-50"
        :class="isOpen('schedules') ? 'text-sky-700 bg-sky-50' : 'text-gray-700'">
        <div class="flex items-center gap-3">
          <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
          </svg>
          <span class="font-medium">Schedules</span>
        </div>
        <svg class="w-4 h-4 transition-transform duration-200" :class="isOpen('schedules') ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
      </button>

      <div x-show="isOpen('schedules')" x-collapse class="ml-8 mt-1 space-y-0.5 border-l-2 border-sky-100 pl-3">
        <a href="{{ route('admin.schedules.index') }}" @class([
          'block px-3 py-2 rounded-md text-sm transition-all duration-200',
          'text-sky-700 bg-sky-50 font-medium' => request()->routeIs('admin.schedules.index'),
          'text-gray-600 hover:text-sky-700 hover:bg-sky-50/50' => !request()->routeIs('admin.schedules.index')
        ])>
          Manage Schedules
        </a>

        <a href="{{ route('admin.schedules.create') }}" @class([
          'block px-3 py-2 rounded-md text-sm transition-all duration-200',
          'text-sky-700 bg-sky-50 font-medium' => request()->routeIs('admin.schedules.create'),
          'text-gray-600 hover:text-sky-700 hover:bg-sky-50/50' => !request()->routeIs('admin.schedules.create')
        ])>
          Add Schedule
        </a>
      </div>
    </div>

    {{-- SHIFTS --}}
    <div>
      <button @click="toggle('shifts')" type="button"
        class="w-full group flex items-center justify-between px-3 py-2.5 rounded-lg transition-all duration-200 hover:bg-sky-50"
        :class="isOpen('shifts') ? 'text-sky-700 bg-sky-50' : 'text-gray-700'">
        <div class="flex items-center gap-3">
          <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          <span class="font-medium">Shifts</span>
        </div>
        <svg class="w-4 h-4 transition-transform duration-200" :class="isOpen('shifts') ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
      </button>

      <div x-show="isOpen('shifts')" x-collapse class="ml-8 mt-1 space-y-0.5 border-l-2 border-sky-100 pl-3">
        <a href="{{ route('admin.shifts.index') }}" @class([
          'block px-3 py-2 rounded-md text-sm transition-all duration-200',
          'text-sky-700 bg-sky-50 font-medium' => request()->routeIs('admin.shifts.index'),
          'text-gray-600 hover:text-sky-700 hover:bg-sky-50/50' => !request()->routeIs('admin.shifts.index')
        ])>
          Manage Shifts
        </a>

        <a href="{{ route('admin.shifts.create') }}" @class([
          'block px-3 py-2 rounded-md text-sm transition-all duration-200',
          'text-sky-700 bg-sky-50 font-medium' => request()->routeIs('admin.shifts.create'),
          'text-gray-600 hover:text-sky-700 hover:bg-sky-50/50' => !request()->routeIs('admin.shifts.create')
        ])>
          Create Shift
        </a>
      </div>
    </div>

    {{-- ATTENDANCES --}}
    <div>
      <button @click="toggle('attendances')" type="button"
        class="w-full group flex items-center justify-between px-3 py-2.5 rounded-lg transition-all duration-200 hover:bg-sky-50"
        :class="isOpen('attendances') ? 'text-sky-700 bg-sky-50' : 'text-gray-700'">
        <div class="flex items-center gap-3">
          <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
          </svg>
          <span class="font-medium">Attendances</span>
        </div>
        <svg class="w-4 h-4 transition-transform duration-200" :class="isOpen('attendances') ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
      </button>

      <div x-show="isOpen('attendances')" x-collapse class="ml-8 mt-1 space-y-0.5 border-l-2 border-sky-100 pl-3">
        <a href="{{ route('admin.attendances.index') }}" @class([
          'block px-3 py-2 rounded-md text-sm transition-all duration-200',
          'text-sky-700 bg-sky-50 font-medium' => request()->routeIs('admin.attendances.index'),
          'text-gray-600 hover:text-sky-700 hover:bg-sky-50/50' => !request()->routeIs('admin.attendances.index')
        ])>
          Manage Attendances
        </a>

        <a href="{{ route('admin.attendance-locations.create') }}" @class([
          'block px-3 py-2 rounded-md text-sm transition-all duration-200',
          'text-sky-700 bg-sky-50 font-medium' => request()->routeIs('admin.attendance-locations.*'),
          'text-gray-600 hover:text-sky-700 hover:bg-sky-50/50' => !request()->routeIs('admin.attendance-locations.*')
        ])>
          Locations
        </a>
      </div>
    </div>

  </nav>
</aside>
