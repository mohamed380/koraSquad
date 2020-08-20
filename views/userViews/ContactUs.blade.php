@extends('layouts.UI')
@section('content')


<div class="container">


<div class="jumbotron" style="background:transparent">
  <h1 class="display-4" style="text-align:end;">تواصل معنا</h1>
    
  <hr class="my-4">
  <form action="{{route('Main')}}" enctype="multipart/form-data">
       {{ csrf_field() }}
  <div class="form-group row flex-row-reverse">
    <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align:right;">الاسم</label>
    <div class="col-sm-8">
      <input type="text" dir="rtl" class="form-control" required>
    </div>
  </div>
  <div class="form-group row flex-row-reverse">
    <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align:right;">البريد الالكتروني</label>
    <div class="col-sm-8">
      <input type="email" dir="rtl" class="form-control" required>
    </div>
  </div>
   <div class="form-group row flex-row-reverse">
    <label for="colFormLabel" class="col-sm-2 col-form-label" style="text-align:right;">الرسالة</label>
    <div class="col-sm-8">
        <textarea dir="rtl" class="form-control" required></textarea>
    </div>
  </div>
      <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary">أرسال</button>
      </div>
</form>
</div>

</div>

@endsection