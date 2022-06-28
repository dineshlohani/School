@extends('layouts.master')
@section('content')

<div class="row">
  <div class="col-lg-12">
    <nav aria-label="breadcrumb card-header">
      <ol class="breadcrumb breadcrumb-custom">
        <li class="breadcrumb-item"><a href="{{ URL :: to('/dashboard') }}">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ URL :: to('/users') }}">प्रयोगकर्ता सुची</a></li>
        <li class=" breadcrumb-item active" aria-current="page"><span></span> नया थप्नुहोस</li>
      </ol>
    </nav>
    <form method="post" action="{{route('save-user') }}" class="sky-form">
      @csrf
      <header>प्रयोगकर्ता विवरण भर्नुहोस्</header>
      <fieldset>
        <div class="row">
          <section class="col col-6">
            <label><b>प्रयोगकर्ता नाम<span class="text-danger">*</span></b></label>
            <div class="input">
              <i class="icon-append fa fa-info-circle"></i>
              <input type="text" class="form-control" name="name" placeholder="">
            </div>
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </section>
          <section class="col col-6">
            <label><b>प्रयोगकर्ता इमेल</b><span class="text-danger">*</span></label>
            <div class="input">
              <i class="icon-append icon-envelope-alt"></i>
              <input type="email" class="form-control" name="email" placeholder="">
            </div>
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
          </section>
          <section class="col col-6">
            <label><b>प्रयोगकर्ता फोन नं. </b><span class="text-danger">*</span></label>
            <div class="input">
              <i class="icon-append fa fa-phone"></i>
              <input type="number" class="form-control" name="phone" placeholder="">
            </div>
            @if ($errors->has('phone'))
            <span class="text-danger">{{ $errors->first('phone') }}</span>
            @endif
          </section>

          <section class="col col-6">
            <label><b>प्रयोगकर्ता पद </b><span class="text-danger">*</span></label>
            <div class="input">
              <i class="icon-append fa fa-info-circle"></i>
              <input type="text" class="form-control" name="designation" placeholder="">
            </div>
            @if ($errors->has('designation'))
            <span class="text-danger">{{ $errors->first('designation') }}</span>
            @endif
          </section>
        </div>
      </fieldset>
      <fieldset>
        <div class="row">
          <section class="col col-3">
            <label><b>प्रयोगकर्ता भूमिका </b><span class="text-danger">*</span></label>
            <div class="select">
              <select class="form-control" name="role_id">
                <option value=""> --छान्नुहोस्--</option>
                @if (!empty($roles))
                @foreach($roles as $role)
                <option value="{{ $role->id }}">{{$role->name}}</option>
                @endforeach
                @endif
              </select>
              <i></i>
            </div>
            @if ($errors->has('role'))
            <span class="text-danger">{{ $errors->first('role') }}</span>
            @endif
          </section>
          <section class="col col-3">
            <label><b>प्रयोगकर्ता आइडी</b><span class="text-danger">*</span></label>
            <div class="input">
              <i class="icon-append fa fa-square "></i>
              <input type="text" class="form-control" name="username" placeholder="">
            </div>
            @if ($errors->has('username'))
            <span class="text-danger">{{ $errors->first('username') }}</span>
            @endif
          </section>
          <section class="col col-3">
            <label><b>पासवर्ड </b><span class="text-danger">*</span></label>
            <div class="input">
              <i class="icon-append fa fa-key"></i>
              <input type="password" class="form-control" name="password" placeholder="">
            </div>
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
          </section>

          <!-- <section class="col col-4">
            <label><b>पासवर्ड सुनिस्चित </b><span class="text-danger">*</span></label>
            <div class="input">
              <i class="icon-append fa fa-key"></i>
              <input type="password" class="form-control" name="password" placeholder="">
            </div>
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
          </section> -->
      </fieldset>
      <footer>
        <button type="submit" class="button">सेभ गर्नुहोस</button>
      </footer>
    </form>
  </div>
</div>
<!-- content-wrapper ends -->
@endsection