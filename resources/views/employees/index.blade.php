@extends('layouts.app')

@section('content')
    
    <div>
        <h1>Employee List</h1>
        <a href="{{ route('employees.create') }}" class="btn btn-add">Add Employee</a>

        @if ($employees->isEmpty())
            <p>No Employees Found</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Profile Picture</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Country Code</th>
                        <th>Mobile Number</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Hobbies</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $srNo = 1;
                    @endphp
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $srNo++ }}</td>
                            <td>
                                @if ($employee->photo)
                                    <img src="{{ asset('uploads/profiles/'. $employee->photo) }}" alt="No Photo" style="max-width: 50px"> 
                                @else
                                    N/A                                   
                                @endif
                            </td>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->mobileCountryCode }}</td>
                            <td>{{ $employee->mobile_number }}</td>
                            <td>{{ $employee->address }}</td>
                            <td>{{ $employee->gender }}</td>
                            <td>{{ $employee->hobby }}</td>
                            <td>
                                <a href="{{ route('employees.edit',$employee->id)}}" class="btn btn-edit">Edit</a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="dispaly: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure want to delete this employee?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>   
        @endif

    </div>


@endsection