
@if (session()->has('success'))
     <div class="success">
            {{ session('success') }}
     </div>
 @endif

 @if (session()->has('message'))
     <div>
         {{ session('message') }}
     </div>
 @endif
 @if ($errors->any())
     <ul>
         @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
         @endforeach
     </ul>
 @endif

 