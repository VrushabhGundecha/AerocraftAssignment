@extends('layouts.app')

@section('content')
    
    <h1>Add Employee</h1>
    
    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="first_name">First Name : </label>
        <input type="text" id="first_name" name="first_name" required>

        <label for="last_name">Last Name : </label>
        <input type="text" id="last_name" name="last_name" required>

        <label for="email">Email : </label>
        <input type="email" id="email" name="email" required>
        @error('email')
            <span class="text-danger">{{ $message }}</span>   
        @enderror

        <div class="form-group">    
            <label for="mobileCountryCode">Mobile : </label>
           <div class="mobile-inputs">
            <select name="mobileCountryCode" id="mobileCountryCode" required>
                <option value="+1">+1 (USA)</option>
                <option value="+91">+91 (India)</option>
            </select>
            <input type="number" id="mobile_number" name="mobile_number" required>
           </div>
        </div>

        <label for="address">Address : </label>
        <textarea name="address" id="address" required></textarea>

        <div class="gender-hobby">
            <label>Gender : </label>
            <input type="radio" name="gender" id="male" value="male" required>
            <label for="male">Male</label>
            <input type="radio" name="gender" id="female" value="female" required>
            <label for="male">Female</label>
        </div>

        <div class="gender-hobby">
            <label>Hobby : </label>
            <input type="checkbox" id="reading" name="hobby[]" value="reading">
            <label for="reading">Reading</label>
            <input type="checkbox" id="music" name="hobby[]" value="music">
            <label for="music">Music</label>
            <input type="checkbox" id="sports" name="hobby[]" value="sports">
            <label for="sports">Sports</label>
        </div>
        
        <div>
            <label for="photo">Upload Profile Photo : </label>
            <input type="file" id="photo" name="photo" accept=".jpeg,.jpg,.png" required>
        </div>

        <div>
            <button type="submit" class="submit-btn">Submit</button>
        </div>
    </form>

@endsection
