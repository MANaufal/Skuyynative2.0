
  <ul class="overflow-hidden flex-none m-0 p-2 list-none fixed bg-white space-x-4 top-0 w-full shadow-md z-10">
    <li class="float-left font-bold flex-none p-3 inset-y-0 text-lg"><a href="{{ url('home') }}"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
      width="28" height="28"
      viewBox="0 0 24 24">
      <path d="M 12 2.0996094 L 1 12 L 4 12 L 4 21 L 10 21 L 10 15 L 14 15 L 14 21 L 20 21 L 20 12 L 23 12 L 12 2.0996094 z"></path>
      </svg></a></li>
    <li class="float-left font-bold flex-auto p-3 inset-y-0 text-lg hover:text-sky-500">Learn</li>
    <li class="float-left font-bold flex-auto p-3 inset-y-0 text-lg hover:text-sky-500"><a href="{{ url('chat') }}">Chat</a></li>
    <li class="float-right font-bold flex-auto p-3 inset-y-0 text-lg hover:text-sky-500">{{ Auth::user()->name }}</li>
  </ul>

  @yield('content')
