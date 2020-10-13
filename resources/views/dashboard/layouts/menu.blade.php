<ul class="sidebar-menu" data-widget="tree">
         <!--  main -->
         <li class="treeview {{ $title == 'home'?'active': ''}}">
          <a href="#">
            <i class="fa fa-dashboard "></i> <span>@lang('site.main')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
            <ul class="treeview-menu">
                <li class="{{ $title == 'home' ? 'active': ''}}"><a href="{{ route('dashboard.home') }}"><i class="fa fa-dashboard"></i>@lang('site.home')</a></li>
                <li class="{{ $title == 'settings' ? 'active': ''}}"><a href="{{ route('dashboard.settings.edit',$setting->id) }}"><i class="fa fa-dashboard"></i>@lang('site.settings')</a></li>
                <li class="{{ $title == 'pocketlimit' ? 'active': ''}}"><a href="{{ route('dashboard.pocketlimit.edit',$pocketlimit->id) }}"><i class="fa fa-dashboard"></i>@lang('site.pocketlimit')</a></li>
            </ul>
        </li>

        <!-- mailbox -->
        <li class="{{ $title == 'mailboxControl' ? 'active': ''}}">
            <a href="{{ route('dashboard.contact.index')}}">
            <i class="fa fa-envelope"></i> <span>@lang('site.mailbox')</span>
            <span class="pull-right-container">
                <small class="label pull-right bg-info">{{$allMessages->count()}}</small>
                <small class="label pull-right bg-green">{{$newMessages->count()}}</small>
            </span>
            </a>
        </li>

        @if(permission('read_admins'))
        <!-- route admins -->
        <li class="treeview {{ $title == 'adminControl' ? 'active': ''}}">
          <a href="#">
            <i class="fa fa-users"></i> <span>@lang('site.admins')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li class="{{ $title == 'adminControl' ? 'active': ''}}"><a href="{{ route('dashboard.admins.index') }}"><i class="fa fa-circle-o"></i>@lang('site.admins')</a></li>
          </ul>
        </li>
        @endif

        @if (permission('read_works'))
         <!-- route workTimes -->
         <li class="treeview {{ $title == 'workTimesControl' ? 'active': ''}}">
          <a href="#">
            <i class="fa fa-calendar-times-o"></i> <span>@lang('site.workTimes')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $title == 'workTimesControl' ? 'active': ''}}""><a href="{{ route('dashboard.workTime.index') }}"><i class="fa fa-circle-o"></i>@lang('site.workTimes')</a></li>
          </ul>
        </li>
        @endif

        @if (permission('read_employees'))
        <!-- route employees -->
        <li class="treeview {{ $title == 'employeesControl' ? 'active': ''}}">
          <a href="#">
            <i class="fa  fa-user-plus"></i> <span>@lang('site.employees')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $title == 'employeesControl' ? 'active': ''}}"><a href="{{ route('dashboard.employee.index') }}"><i class="fa fa-circle-o"></i>@lang('site.employee_show')</a></li>
          </ul>
        </li>
         @endif 
         
        @if (permission('read_salarys'))
        <!-- route salarys -->
        <li class="treeview  {{ $title == 'salaryControl' ? 'active': ''}}">
          <a href="#">
            <i class="fa fa-money"></i> <span>@lang('site.salarys')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $title == 'salaryControl' ? 'active': ''}}"><a href="{{ route('dashboard.salary.index') }}"><i class="fa fa-circle-o"></i>@lang('site.show_salarys')</a></li>
          </ul>
        </li>
         @endif

        @if (permission('read_pockets'))
        <!-- route pockets -->
        <li class="treeview {{ $title == 'pocketControl' ? 'active': ''}}">
          <a href="#">
            <i class="fa fa-get-pocket"></i> <span>@lang('site.pockets')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $title == 'pocketControl' ? 'active': ''}}"><a href="{{ route('dashboard.pockets.index') }}"><i class="fa fa-circle-o"></i>@lang('site.show_pockets')</a></li>
           </ul>
        </li>
         @endif

        @if (permission('read_patients'))
        <!-- route patients -->
        <li class="treeview {{ $title == 'patientControl' ? 'active': ''}}">
          <a href="#">
            <i class="fa  fa-wheelchair"></i> <span>@lang('site.patients')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $title == 'patientControl' ? 'active': ''}}"><a href="{{ route('dashboard.patient.index') }}"><i class="fa fa-circle-o"></i>@lang('site.show_patients')</a></li>
           </ul>
        </li>
         @endif

        @if (permission('read_roshetas'))
        <!-- route rosheta -->
        <li class="treeview {{ $title == 'roshetaControl' ? 'active': ''}}">
          <a href="#">
            <i class="fa  fa-stethoscope"></i> <span>@lang('site.rosheta')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $title == 'roshetaControl' ? 'active': ''}}"><a href="{{ route('dashboard.rosheta.index') }}"><i class="fa fa-circle-o"></i>@lang('site.show_rosheta')</a></li>
           </ul>
        </li>
         @endif

        @if (permission('read_drugs'))
        <!-- route drugs -->
        <li class="treeview {{ $title == 'drugsControl' ? 'active': ''}}">
          <a href="#">
            <i class="fa fa-medkit"></i> <span>@lang('site.drugs')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $title == 'drugsControl' ? 'active': ''}}"><a href="{{ route('dashboard.drug.index') }}"><i class="fa fa-circle-o"></i>@lang('site.show_drugs')</a></li>
           </ul>
        </li>
         @endif

        @if (permission('read_news'))
         <!-- route news -->
         <li class="treeview {{ $title == 'newsControl' ? 'active': ''}}">
            <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>@lang('site.news')</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu ">
            <li class="{{ $title == 'newsControl' ? 'active': ''}}"><a href="{{ route('dashboard.news.index') }}"><i class="fa fa-circle-o"></i>@lang('site.show_news')</a></li>
            </ul>
        </li>
         @endif

        @if (permission('read_services'))
        <!-- route services -->
        <li class="treeview {{ $title == 'servicesControl' ? 'active': ''}}">
          <a href="#">
            <i class="fa fa-hospital-o"></i> <span>@lang('site.services')</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $title == 'servicesControl' ? 'active': ''}}"><a href="{{ route('dashboard.service.index') }}"><i class="fa fa-circle-o"></i>@lang('site.show_services')</a></li>
           </ul>
        </li>
         @endif


        @if (permission('read_facts'))
        <!-- route numberFacts -->
        <li class="treeview {{ $title == 'factsControl' ? 'active': ''}}">
            <a href="#">
            <i class="fa fa-sort-numeric-asc"></i> <span>@lang('site.numberFacts')</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
            <li class="{{ $title == 'factsControl' ? 'active': ''}}"><a href="{{ route('dashboard.numberFact.index') }}"><i class="fa fa-circle-o"></i>@lang('site.show_numberFacts')</a></li>
            </ul>
        </li>
         @endif

        @if (permission('read_media'))
        <!-- route media -->
        <li class="treeview {{ $title == 'mediaControl' ? 'active': ''}}">
            <a href="#">
            <i class="fa fa-play-circle-o"></i> <span>@lang('site.media')</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
            <li class="{{ $title == 'mediaControl' ? 'active': ''}}"><a href="{{ route('dashboard.media.index') }}"><i class="fa fa-circle-o"></i>@lang('site.show_media')</a></li>
            </ul>
        </li>
         @endif

</ul>
