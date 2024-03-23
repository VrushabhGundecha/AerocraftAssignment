@extends('layouts.app')

@section('content')
    
    <h1>Edit Employee</h1>
    
    <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="first_name">First Name : </label>
        <input type="text" id="first_name" name="first_name" value="{{ $employee->first_name }}" required>

        <label for="last_name">Last Name : </label>
        <input type="text" id="last_name" name="last_name" value="{{ $employee->last_name }}" required>

        <label for="email">Email : </label> 
        <input type="email" id="email" name="email" value="{{ $employee->email }}">
        @error('email')
            <span class="text-danger">{{ $message }}</span>    
        @enderror

        <div class="form-group">    
            <label for="mobileCountryCode">Mobile : </label>
           <div class="mobile-inputs">
            <select name="mobileCountryCode" id="mobileCountryCode" required>
                <option value="{{ $employee->mobileCountryCode }}">+1 (USA)</option>
                <option value="{{ $employee->mobile_number }}">+91 (India)</option>
            </select>
            <input type="number" id="mobile_number" name="mobile_number" value="{{ $employee->mobile_number }}" required>
           </div>
        </div>

        <label for="address">Address : </label>
        <textarea name="address" id="address" required>{{ $employee->address }}</textarea>

        <div class="gender-hobby">
            <label>Gender : </label>
            <label><input type="radio" name="gender" id="male" value="male" {{ $employee->gender === 'male' ? 'checked' : '' }} >Male</label>
            
            <label><input type="radio" name="gender" id="female" value="female"  {{ $employee->gender === 'female' ? 'checked' : '' }}  >Female</label>
            <label for="male">Female</label>
        </div>

        <div class="gender-hobby">
            <label>Hobby : </label>
            <label><input type="checkbox" id="reading" name="hobby[]" value="reading" {{ in_array('reading', explode(',', $employee->hobby)) ? 'checked' : '' }}>Reading</label>
            <label><input type="checkbox" id="music" name="hobby[]" value="music" {{ in_array('music', explode(',', $employee->hobby)) ? 'checked' : '' }}>Music</label>
            <label><input type="checkbox" id="sports" name="hobby[]" value="sports" {{ in_array('sports', explode(',', $employee->hobby)) ? 'checked' : '' }}>Sports</label>
        
        </div>
        
        <div>
            <label for="photo">Upload Profile Photo : </label>
            <input type="file" id="photo" name="photo" accept=".jpeg,.jpg,.png" >
        </div>

        <div>
            <button type="submit" class="submit-btn">Submit</button>
            <a href="{{ route('employees.index') }}" class="btn btn-back">Back</a>
        </div>
    </form>

@endsection
