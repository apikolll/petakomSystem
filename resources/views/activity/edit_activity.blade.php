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
                            <span class="display-3 fw-semibold">Edit <br> Activity.</span>
                        </div>
                    </div>
                    <div class="card-text w-75">
                        <form action="{{ route('update.activity', $activity->id) }}" method="post">
                            @csrf
                            {{-- @method('PUT') --}}
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="organizer_name" id="floatingInput" placeholder="Organizer name">
                                <label for="floatingInput">{{ $activity->organizer_name }}</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="floatingInput" placeholder="Activity name">
                                <label for="floatingInput">{{ $activity->name }}</label>
                            </div>
                            <div class="d-sm-flex flex-lg-column gap-3">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" name="date" id="floatingInput" placeholder="Date">
                                    <label for="floatingInput">{{ $activity->date }}</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="time" class="form-control" name="time" id="floatingInput" placeholder="Time">
                                    <label for="floatingInput">{{ $activity->time}}</label>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="venue" id="floatingInput" placeholder="Venue">
                                <label for="floatingInput">Venue</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="description" id="floatingInput" placeholder="Activity description">
                                <label for="floatingInput">{{ $activity->description }}</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="objective" id="floatingInput" placeholder="Activity objective">
                                <label for="floatingInput">{{ $activity->objective }}</label>
                            </div>
                            <button class="btn btn-primary w-100 p-2 fs-5">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection