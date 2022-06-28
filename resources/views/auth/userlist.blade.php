@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="{{ URL :: to('/dashboard') }}">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>प्रोयोगकर्ता सुची</span></li>
      </ol>
    </nav>
    <div class="card">

      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      @endif
      <div class="table-responsive">

      @if(auth()->user()->role != 1)
        @can('add-user')
      @endif
        <div class="card-title"><a href="{{ URL :: to('/create') }}" class="btn btn-sm btn-dark"><i class="fa fa-plus-circle"></i> नया थप्नुहोस</a></div><br>
        @if(auth()->user()->role != 1)
        @endcan
        @endif
        <table class="rtable">
          <thead>
            <tr>
              <th>क्र. सं.</th>
              <th>नाम</th>
              <th>इमेल</th>
              <th>फोन नं</th>
              <th>पद </th>
              <th>भूमिका </th>
              <th>शाखा</th>
            </tr>
          </thead>
          <tbody>
            @if (!empty($users))
            @php $i=1; @endphp
            @foreach($users as $key => $user)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $user->name}}</td>
              <td>{{ $user->email}}</td>
              <td>{{ $user->phone}}</td>
              <td>{{ $user->designation}}</td>
              <td>{{ $user->bhumika->name}}</td>
              @if(auth()->user()->can('edit-user') || auth()->user()->can('remove-user'))
              <td>
                @can('edit-user')
                <a href="{{ route('edit-user', $user->id) }}" class="btn btn-sm btn-info btn-sm ">
                  <i class="fa fa-pencil"></i>
                </a>
                @endcan
                @can('remove-user')
                <a href="{{ route('show-modules', $user->id) }}" class="btn btn-sm btn-warning btn-sm ">
                  <i class="fa fa-info-circle"></i>
                </a>
                @endcan
              </td>
              @endif
            </tr>

            @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
<!-- content-wrapper ends -->
@endsection