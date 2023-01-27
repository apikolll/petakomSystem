@extends('layout.master')

@section('content')

<section class="p-5">
    <div class="container">
        <a href="{{ URL::previous() }}" class="text-decoration-none text-dark">
            <i class="bi bi-arrow-left-circle-fill h3"></i>
        </a>
        <div class="card mx-auto" style="max-width: 50rem;">
            <div class="card-body">
                <div class="d-flex gap-3">
                    <div class="card d-none d-md-block w-50">
                        <div class="card-body">
                            <span class="display-3 fw-semibold">Create <br> Activity.</span>
                        </div>
                    </div>
                    <div class="card-text w-75">
                        <form action="{{ route('store.activity') }}" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="organizer_name" id="floatingInput"
                                    placeholder="Organizer name">
                                <label for="floatingInput">Organizer name</label>
                                @error('organizer_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="floatingInput"
                                    placeholder="Activity name">
                                <label for="floatingInput">Activity name</label>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" name="startdate" id="floatingInput"
                                    placeholder="Start Date">
                                <label for="floatingInput">Start Date</label>
                                @error('startdate')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" name="enddate" id="floatingInput"
                                    placeholder="End Date">
                                <label for="floatingInput">End Date</label>
                                @error('enddate')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="time" class="form-control" name="time" id="floatingInput"
                                    placeholder="Time">
                                <label for="floatingInput">Time</label>
                                @error('time')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="venue" id="floatingInput"
                                    placeholder="Venue">
                                <label for="floatingInput">Venue</label>
                                @error('venue')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="description" id="floatingInput"
                                    placeholder="Activity description">
                                <label for="floatingInput">Activity description</label>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="objective" id="floatingInput"
                                    placeholder="Activity objective">
                                <label for="floatingInput">Activity objective</label>
                                @error('objective')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button class="btn btn-warning w-100 p-2 fs-5">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection