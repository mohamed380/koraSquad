@extends('layouts.app')

@section('content')
        
    <div class="container">
        <div class="jumbotron">
<form method="post" action="{{ route('AddUser') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
  <div class="form-row">
    <div class="form-group col-md-6">
      <label style="float: right;">البريد الالكتروني</label>
      <input type="email" class="form-control" placeholder="Email" required name="email">
    </div>
    <div class="form-group col-md-6">
      <label style="float: right;">الاسم</label>
      <input type="text" class="form-control" required name="name">
    </div>
  </div>
  <div class="form-row flex-row-reverse">
    <div class="form-group col-md-6">
      <label style="float: right;">الرمز</label>
      <input type="password" class="form-control pass" id="inputEmail4" placeholder="password" required name="password">
    </div>
    <div class="form-group col-md-6">
      <label style="float: right;">تاكيد</label>
      <input type="password" class="form-control passConf" placeholder="Password" required name="passwordConfirmation">
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Create</button>
</form>
        </div>
             <div class="row justify-content-center">
                    <table class="table col-8">
                      <thead>
                        <tr>
                        <!--  <th scope="col">تعديل</th>
                          <th scope="col">تحكم</th>-->
                          <th scope="col">البريد الالكتروني</th>
                          <th scope="col">الاسم</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($users as $user)
                          <tr id="{{$user->id}}" <?php if($user->state == 0) echo 'blocked'; ?></tr>
                               <!--    <td><button type="button" class="btn btn-sm btn-success updateUser" >تعديل</button></td>
                                  <td>
                                    <select name='state' class="custom-select custom-select-sm">
                                            <option value="1">نشط</option>
                                            <option value="0">حظر</option>
                                    </select> 
                                   </td> -->
                                   <td><a href="/allPosts/{{$user->id}}">{{$user->email}}</a></td>
                                   <td>{{$user->name}}</td>
                          </tr>
                      @endforeach
                      </tbody>
                    </table>
            </div>

    </div>
    
@endsection