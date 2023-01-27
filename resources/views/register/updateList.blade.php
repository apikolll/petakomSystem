@extends('layout.master')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<title>Petakom | Register User </title>
<link rel="shortcut icon" href="bootstrap1/assets/images/logo/logo.png" type="image/svg" />

<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New User') }}</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <div class="row">
                                <div class="col">
                                    <form enctype="multipart/form-data" method="POST" id="updateUser">
                                        @csrf
                                        @method('post')

                                        <center>
                                            <div class="mb-3 mx-auto">
                                                <img class="rounded-circle"
                                                    src="{{asset('uploads/'. Auth::user()->picture)}}"
                                                    alt=" User Avatar" width="110" height="110">
                                            </div>
                                        </center>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="email">Student Email </label>
                                                <input type="text" class="form-control" id="email" name="email"
                                                    value="{{$register->email}}">
                                            </div>
                                        </div>

                                        <br>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="name">First Name</label>
                                                <input type="text" class="form-control" id="Fname" name="Fname"
                                                    value="{{$register->Fname}}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="name">Last Name</label>
                                                <input type="text" class="form-control" id="Lname" name="Lname"
                                                    value="{{$register->Lname}}">
                                            </div>
                                        </div>
                                        <br>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="phoneNum">Phone Number</label>
                                                <input type="text" class="form-control" id="phoneNum" name="phoneNum"
                                                    value="{{$register->phoneNum}}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="position">User Type</label>
                                                <select class="form-select" name="category" id="category">

                                                    @if($register->category == "Student")
                                                    <option value="Student" selected>Student</option>
                                                    <option value="Lecturer">Lecturer</option>
                                                    <option value="Committee">Committee</option>
                                                    <option value="HOSD">HOSD</option>
                                                    <option value="Dean">Dean</option>
                                                    <option value="Coordinator">Coordinator</option>

                                                    @elseif($register->category == "Lecturer")
                                                    <option value="Student">Student</option>
                                                    <option value="Lecturer" selected>Lecturer</option>
                                                    <option value="Committee">Committee</option>
                                                    <option value="HOSD">HOSD</option>
                                                    <option value="Dean">Dean</option>
                                                    <option value="Coordinator">Coordinator</option>

                                                    @elseif($register->category == "Committee")
                                                    <option value="Student">Student</option>
                                                    <option value="Lecturer">Lecturer</option>
                                                    <option value="Committee" selected>Committee</option>
                                                    <option value="HOSD">HOSD</option>
                                                    <option value="Dean">Dean</option>
                                                    <option value="Coordinator">Coordinator</option>

                                                    @elseif($register->category == "HOSD")
                                                    <option value="Student">Student</option>
                                                    <option value="Lecturer">Lecturer</option>
                                                    <option value="Committee">Committee</option>
                                                    <option value="HOSD" selected>HOSD</option>
                                                    <option value="Dean">Dean</option>
                                                    <option value="Coordinator">Coordinator</option>

                                                    @elseif($register->category == "Dean")
                                                    <option value="Student">Student</option>
                                                    <option value="Lecturer">Lecturer</option>
                                                    <option value="Committee">Committee</option>
                                                    <option value="HOSD">HOSD</option>
                                                    <option value="Dean" selected>Dean</option>
                                                    <option value="Coordinator">Coordinator</option>

                                                    @elseif($register->category == "Coordinator")
                                                    <option value="Student">Student</option>
                                                    <option value="Lecturer">Lecturer</option>
                                                    <option value="Committee">Committee</option>
                                                    <option value="HOSD">HOSD</option>
                                                    <option value="Dean">Dean</option>
                                                    <option value="Coordinator" selected>Coordinator</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" id="address" name="address"
                                                    value="{{$register->address}}">
                                            </div>
                                        </div>

                                        <br>
                                        <div style="float: right;">
                                            <a href="{{ url()->previous() }}" class="btn btn-danger btn-md">Cancel</a>
                                            <button type="button" class="btn btn-primary btn-md" id="btn"
                                                onclick="updateData(this)"
                                                data-link="{{ route('updateUser', $register->id) }}"
                                                data-idform="updateUser" data-btnNameChange="Updating..."><span
                                                    class="nav-link-text">Update</span></button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // function activityOnLoad() {

    //     handleOnClick()
    //     imageCropper()
    // }

    function updateData(e) {

        var link = e.getAttribute('data-link')
        var idform = e.getAttribute('data-idform')
        var successLink = e.getAttribute('data-successLink')
        var btnBefore = e.innerHTML
        var btnNameChange = e.getAttribute('data-btnNameChange')

        var input = $("#" + idform + " :input").serialize();

        $.ajax({
            type: 'POST',
            url: link,
            data: input,
            beforeSend: function() {
                e.disabled = true;
                e.innerHTML = "<i class='fas fa-spinner fa-spin text-white'></i> <span class = 'nav-link-text' > " + btnNameChange + " </span>";
                //$('.ajax-loader').css("visibility", "visible");
            },

            success: function(data) {
                if (data.dataError == null) {
                    if (successLink != null) {
                        loadInPage(successLink);
                    }
                } else {
                    alert(data.title, data.text, 'warning', successLink)
                }

            },

            complete: function() {

                //dismiss loder
                e.disabled = false;
                e.innerHTML = btnBefore;
                //$('.ajax-loader').css("visibility", "hidden");
            },
            error: function(request, status, error) {
                //console.log(request.responseText);
            }

        });
    }
</script>


@endsection