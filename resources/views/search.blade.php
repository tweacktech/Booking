@extends('layouts.admin',  ['title' => 'Dashboard'])

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">

<div class="content-body">
	<div class="container-fluid">

		<!-- Button trigger modal -->
<button class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Add flight</button>


  <div class="modal fade bd-example-modal-lg" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Search Results</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            	<input type="text" class="form-control" id="search-input" placeholder="Search Group Bookings">
                <div id="search-results"></div>
            </div>
        </div>
    </div>
    </div>

	</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>


<script>
    $(document).ready(function () {
        $('#search-input').on('keyup', function () {
            var query = $(this).val();

            if (query.length >= 2) {
                $.ajax({
                    url: "{{ route('group_booking.search') }}",
                    type: "GET",
                    data: { query: query },
                    success: function (response) {
                        var results = '';

                        if (response.length > 0) {
                            response.forEach(function (booking) {
                              results += '<a href="{{ url("group") }}/' + booking.id + '">' + booking.group_name + '</a><br>';
                            });
                        } else {
                            results = 'No results found.';
                        }

                        $('#search-results').html(results);
                    }
                });
            } else {
                $('#search-results').html('');
            }
        });
    });
</script>

@endsection