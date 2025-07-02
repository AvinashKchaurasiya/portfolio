@extends('admin.layouts.baseLayout')
@section('content')
    <div id="mainContent" class="main">
        <h3 class="mb-2">Contact Form Details</h3>

        <div class="row g-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Contact Form Details List</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->id }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>{{ $contact->subject }}</td>
                                        <td>{{ substr($contact->message, 0, 100) }}...</td>
                                        <td>{{ $contact->created_at->format('Y-m-d H:i:s') }}</td>
                                        <td>
                                            <!-- MDB Button trigger modal -->
                                            <a href="javascript:void(0);" class="btn btn-primary" data-mdb-toggle="modal"
                                                data-mdb-target="#contactModal_{{ $contact->id }}">View</a>

                                            <!-- MDB Modal -->
                                            <div class="modal fade" id="contactModal_{{ $contact->id }}" tabindex="-1"
                                                aria-labelledby="contactModalLabel_{{ $contact->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="contactModalLabel_{{ $contact->id }}">Contact Details
                                                                (Name: {{ $contact->name }})
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-mdb-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th>Name</th>
                                                                            <td>{{ $contact->name }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Email</th>
                                                                            <td>{{ $contact->email }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Phone Number</th>
                                                                            <td>{{ $contact->phone }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Subject</th>
                                                                            <td>{{ $contact->subject }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Message</th>
                                                                            <td>{{ $contact->message }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Date</th>
                                                                            <td>{{ $contact->created_at->format('Y-m-d H:i:s') }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-mdb-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
