@extends('layouts.main_layout')
@section('title'){{"Add Client"}}@endsection
@section('main-content')
    <div class="row d-flex justify-content-center">
        <div class="row mt-5">
            <h4 class="text-center">Client Registration Form</h4>
        </div>
        
        <div class="col-md-8 mt-5 p-5" style="border: 1px solid #ced4da;">
            <div class="col-12 d-flex justify-content-end">
                <a class="btn btn-primary" href="{{route('client.index')}}">Back To Client List</a>
            </div>
            @include('partials._message')
            <form class="row g-3" method="post" action="{{route('client.store')}}">
            @csrf
                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" max="100" required value="{{old('name')}}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" max="100" required value="{{old('email')}}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="phone" class="form-label">phone</label>
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" max="20" required value="{{old('phone')}}">
                    @error('phone')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="gender" class="form-label">gender</label><br>   
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" max="6" required id="male" value="male" checked="{{ old('gender') == 'male' ? 'checked' : '' }}">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" max="6" required id="female" value="female"  checked="{{ old('gender') == 'female' ? 'checked' : '' }}">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" max="6" required id="other" value="other"  checked="{{ old('gender') == 'other' ? 'checked' : '' }}">
                        <label class="form-check-label" for="other">Other</label>
                    </div>
                    @error('gender')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="address" class="form-label">address</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" required="required">{{old('address')}}
                    </textarea>
                    @error('address')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="dob" class="form-label">DOB</label>
                    <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" required value="{{old('dob')}}">
                    @error('dob')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="nationality" class="form-label">Nationality</label>
                    <input type="text" class="form-control @error('nationality') is-invalid @enderror" id="nationality" name="nationality" max="20" required value="{{old('nationality')}}">
                    @error('nationality')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="education_background" class="form-label">Education Background</label>
                    <input type="text" class="form-control @error('education_background') is-invalid @enderror" id="education_background" name="education_background" max="255" required value="{{old('education_background')}}">
                    @error('education_background')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="mode_of_contact" class="form-label">Prefered Mode of Contact</label>
                    <select class="form-select @error('mode_of_contact') is-invalid @enderror" id="mode_of_contact" name="mode_of_contact" max="20" required value="{{old('mode_of_contact')}}">
                    <option selected disabled value="">Choose...</option>
                    <option value="email" selected="{{ old('mode_of_contact') == 'email' ? 'selected' : '' }}">Email</option>
                    <option value="phone" selected="{{ old('mode_of_contact') == 'phone' ? 'selected' : '' }}">Phone</option>
                    <option value="none" selected="{{ old('mode_of_contact') == 'other' ? 'selected' : '' }}">None</option>
                    </select>
                    @error('mode_of_contact')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-12 text-right">
                    <button class="btn btn-primary" type="submit"> Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection