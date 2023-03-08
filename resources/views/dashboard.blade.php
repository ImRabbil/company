<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}

        </h2>


    </x-slot>
    <div class="container">

        <div class="card-body card">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>

                  </tr>
                </thead>
                <tbody>

                    @foreach ( $users as $user )
                    <tr>
                        <th scope="row">{{  $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>

                      </tr>

                    @endforeach

                </tbody>
              </table>

        </div>


    </div>


</x-app-layout>
