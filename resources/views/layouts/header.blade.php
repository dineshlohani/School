   <!-- partial:partials/_sidebar.html -->
   <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">

       <li class="nav-item">
         <div class="profile">
           <img src="{{ asset('assets/images/brand/logo1.png') }}" alt="profile_picture">
           <p>
             {{ getProfile()->palika }}
           </p>
         </div>

       </li>
       <li class="nav-item">
         <a class="nav-link font-weight-bold active" href="{{route('dashboard')}}">
           <i class="fa fa-dashboard"></i>&nbsp; ड्यासबोर्ड
         </a>
       </li>
       <li class="nav-item">
         <a class="nav-link font-weight-bold" data-toggle="collapse" href="#settings" aria-expanded="false"
           aria-controls="pages">
           <i class="fa fa-cogs"></i> &nbsp; सेटिङ
           &nbsp;<i class="fa fa-angle-down"></i>
         </a>
         <div class="collapse" id="settings">
           <ul class="nav flex-column sub-menu">
             <li class="nav-item"> <a class="nav-link" href="{{ route('caste') }}"><i
                   class="fa fa-hand-o-right"></i>&nbsp; जात</a></li>
             <li class="nav-item"> <a class="nav-link" href="{{ route('religion') }}"><i
                   class="fa fa-hand-o-right"></i>&nbsp; धर्म</a></li>
             <li class="nav-item"> <a class="nav-link" href="{{ route('licenselevel') }}"><i
                   class="fa fa-hand-o-right"></i>&nbsp; लाइसेन्सको तह </a></li>
             <li class="nav-item"> <a class="nav-link" href="{{ route('school-type') }}"><i
                   class="fa fa-hand-o-right"></i>&nbsp; विद्यालयको किसिम</a></li>
           </ul>
         </div>
       </li>

       <li class="nav-item">
         <a class="nav-link font-weight-bold" href="{{ route('school-details') }}">
           <i class="fa fa-university"></i> &nbsp; विद्यालय दर्ता
         </a>
       </li>

       <li class="nav-item">
         <a class="nav-link font-weight-bold" href="{{ route('teachers-personal-list') }}">
           <i class="fa fa-address-book"></i> &nbsp; शिक्षक अभिलेख
         </a>
       </li>
       @can('view-user')
       <li class="nav-item">
         <a class="nav-link font-weight-bold" data-toggle="collapse" href="#pages" aria-expanded="false"
           aria-controls="pages">
           <i class="fa fa-user"></i> &nbsp; प्रयोगकर्ता व्यवस्थापन
           &nbsp;<i class="fa fa-angle-down"></i>
         </a>
         <div class="collapse" id="pages">
           <ul class="nav flex-column sub-menu">

             @can('view-role')
             <li class="nav-item"> <a class="nav-link" href="{{ URL :: to('/roles') }}"><i
                   class="fa fa-hand-o-right"></i>&nbsp; भूमिका </a></li>
             @endcan
             @can('view-permission')
             <li class="nav-item"> <a class="nav-link" href="{{ route('modules') }}"><i
                   class="fa fa-hand-o-right"></i>&nbsp; Permission </a></li>
             @endcan
             @can('view-user')
             <li class="nav-item"> <a class="nav-link" href="{{ URL :: to('/users') }}"> <i
                   class="fa fa-hand-o-right"></i>&nbsp; प्रयोगकर्ता </a></li>
             @endcan


           </ul>
         </div>
       </li>

       @can('system-setup')
       <li class="nav-item">
         <a class="nav-link font-weight-bold" href="{{ route('system-config') }}">
           <i class="fa fa-cogs"></i> &nbsp; पालिकाको प्रोफाइल
         </a>
       </li>
       @endcan
       @endcan
       <li class="nav-item">
         <hr>
         <form method="POST" action="{{URL::to('logout')}}">
           @csrf
           <button type="submit" class="btn btn-danger btn-block"><i class="fa fa-power-off"></i> &nbsp; बाहिर
             जानुहोस</button>
         </form>
       </li>
     </ul>
     <hr>
   </nav>