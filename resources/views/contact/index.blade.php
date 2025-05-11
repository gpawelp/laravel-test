@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Contacts') }}
                        <span class="float-end">
                            <a href="{{ route('contact.create') }}" class="btn btn-primary">{{ __('Create Contact') }}</a>
                        </span>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Edit/View</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->address }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>
                                            <a href="{{ route('contact.edit', [$contact->id]) }}"
                                       class="btn btn-success">
                                        Edit
                                            </a>
                                            <a href="{{ route('contact.show', [$contact->id]) }}" 
                                            class="btn btn-primary">View</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('contact.destroy', [$contact->id]) }}"
                                                    method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
