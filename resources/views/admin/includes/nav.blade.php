<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">kider</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="{{Request()->routeIs('admin.testimonial.list')?'active':''}}"><a href="{{ route('admin.testimonial.list') }}">Testimonial</a></li>
      <li class="{{Request()->routeIs('admin.testimonial.create')?'active':''}}"><a href="{{ route('admin.testimonial.create') }}">addTestimonial</a></li>
      <li class="{{Request()->routeIs('admin.contact.list')?'active':''}}"><a href="{{ route('admin.contact.list') }}">Contactlist </a></li>
      <li class="{{Request()->routeIs('admin.contact.unread')?'active':''}}"><a href="{{ route('admin.contact.unread') }}">unreadMessage{{$unread}} </a></li>
      <li class="{{Request()->routeIs('admin.appointment.list')?'active':''}}"><a href="{{ route('admin.appointment.list') }}">Appointmentlist</a></li>
      <li class="{{Request()->routeIs('admin.teacher.list')?'active':''}}"><a href="{{ route('admin.teacher.list') }}">Teachers </a></li> 
      <li class="{{Request()->routeIs('admin.teacher.create')?'active':''}}"><a href="{{ route('admin.teacher.create') }}">addTeacher </a></li> 
      <li class="{{Request()->routeIs('admin.subject.list')?'active':''}}"><a href="{{ route('admin.subject.list') }}">Subjects </a></li> 
      <li class="{{Request()->routeIs('admin.subject.create')?'active':''}}"><a href="{{ route('admin.subject.create') }}">addSubject </a></li> 
    </ul>
  </div>
</nav>