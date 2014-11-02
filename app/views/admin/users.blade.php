@extends('layout.main')

@section('content')
    <h2>All users</h2>

    <table class="table">
          <thead>
                <tr>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Add/remove moderator</th>
                </tr>
          </thead>
          <tbody>
                @foreach($usr as $u)
                    <tr>
                        <td>{{ $u->username }}</td>
                        <td>{{ $u->first_name }}</td>
                        <td>{{ $u->last_name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>
                            @if($u->role == 0)
                                <a href="{{ URL::route('admin-add_moderator', $u->id) }}"><img src="{{ asset('images/add.png') }}"></a>
                            @else
                                <a href="{{ URL::route('admin-remove_moderator', $u->id) }}"><img src="{{ asset('images/remove.png') }}"</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
          </tbody>
    </table>
@stop



