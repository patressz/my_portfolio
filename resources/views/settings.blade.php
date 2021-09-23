@extends('dashboard-master')

@section('dashboard-content')
    <h4 class="text-center">Settings</h4>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <table class="table table-responsive text-center align-middle">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($settings as $setting)
                        <tr>

                            <td>{{ Str::ucfirst(($setting->name)) }}</td>
                            @if ( $setting->value == 0 )
                                <td class="text-danger font-weight-bold">Disabled</td>
                            @else
                                <td class="text-success font-weight-bold">Enabled</td>
                            @endif

                            @if ( $setting->value == 0 )
                                <td>
                                    <form action="{{ route('update.settings') }}" method="POST" class="my-0">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="status" value="1">
                                        <button type="button" class="btn btn-success btn-sm" onclick="this.disabled=true;this.innerText='Saving, please wait...';this.form.submit();">Enable register</button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <form action="{{ route('update.settings') }}" method="POST" class="my-0">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="status" value="0">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="this.disabled=true;this.innerText='Saving, please wait...';this.form.submit();">Disable register</button>
                                    </form>
                                </td>
                            @endif

                        </tr>
                    @endforeach

                </tbody>
              </table>
        </div>
    </div>
@endsection
