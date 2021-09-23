@extends('dashboard-master')

@section('dashboard-content')
    <h4 class="text-center">Users</h4>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <table class="table table-responsive text-center align-middle">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @if ( Auth::user()->id == $user->id )
                            @continue
                        @endif
                        <tr>

                            <td>
                                {{ Str::ucfirst(($user->name)) }}
                            </td>

                            <td>
                                {{ $user->role->type }}
                            </td>

                            @if ( $user->role->id == 1 )
                                <td>
                                    <form action="{{ route('update.user', $user->id) }}" method="POST" class="my-0">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="role" value="2">
                                        <button type="button" class="btn btn-success btn-sm" onclick="this.disabled=true;this.innerText='Saving, please wait...';this.form.submit();">Promote to admininistrator</button>
                                    </form>
                                </td>
                            @elseif ( $user->role->id == 2 )
                                <td>
                                    <form action="{{ route('update.user', $user->id) }}" method="POST" class="my-0">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="role" value="1">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="this.disabled=true;this.innerText='Saving, please wait...';this.form.submit();">Demote to user</button>
                                    </form>
                                </td>
                            @elseif ( $user->role->id == 3 )
                                <td>
                                    <button type="text" class="btn btn-danger btn-sm" disabled>Demote to user</button>
                                </td>
                            @endif

                        </tr>
                    @endforeach

                </tbody>
              </table>
        </div>
    </div>
@endsection
