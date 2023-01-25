@extends('layout.master')
@section('content')

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
                                    <form action="{{ route('addUser') }} " enctype="multipart/form-data" method="POST" id="formNew" onsubmit="upload()">
                                        @csrf
                                        <input type="text" class="form-control" value="addtech" id="addTech" name="addTech" hidden>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="email">Student Email </label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="email" required>
                                            </div>
                                        </div>


                                        <br>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="password">{{ __('Password') }}</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="confirmPass">{{ __('Confirm Password') }}</label>
                                                <input id="confirmPass" type="password" class="form-control" name="confirmPass" required autocomplete="new-password" placeholder="Confirm Password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <br>


                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="name">First Name</label>
                                                <input type="text" class="form-control" id="Fname" name="Fname" placeholder="Name" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="name">Last Name</label>
                                                <input type="text" class="form-control" id="Lname" name="Lname" placeholder="Name" required>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="phoneNum">Phone Number</label>
                                                <input type="text" class="form-control" id="phoneNum" name="phoneNum" placeholder="Phone Number" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="position">User Type</label>
                                                <select class="form-select" name="category" id="category">
                                                    <option value="Student">Student</option>
                                                    <option value="Lecturer">Lecturer</option>
                                                    <option value="Committee">Committee</option>
                                                    <option value="HOSD">HOSD</option>
                                                    <option value="Dean">Dean</option>
                                                    <option value="Coordinator">Coordinator</option>
                                                </select>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                                            </div>
                                        </div>

                                        <br>
                                        <div style="float: right;">
                                            <a href="{{ url()->previous() }}" class="btn btn-danger btn-md">Cancel</a>
                                            <button type="submit" id="formNew" class="btn btn-primary">Register</button>
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
    function upload() {

        let timerInterval
        Swal.fire({
            title: 'Registering...',
            showConfirmButton: false,
            html: 'Please wait while system register the technician and send the account information via email',
            timerProgressBar: true,
            allowOutsideClick: false,
            willOpen: () => {
                Swal.showLoading()

            }
        })



    }
</script>


@endsection