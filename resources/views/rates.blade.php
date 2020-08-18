<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rates</title>

        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    </head>
    <body>

    <div class="container">
        <div class="row">
            <div class="col-12 my-3">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target=".rate-input-create-modal">Create</button>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">USD</th>
                            <th scope="col">EUR</th>
                            <th scope="col">CZK</th>
                            <th scope="col">KZT</th>
                            <th scope="col">Date</th>
                            <th scope="col">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rates as $rate)
                            <tr>
                                <th>{{$rate->USD}}</th>
                                <th>{{$rate->EUR}}</th>
                                <th>{{$rate->CZK}}</th>
                                <th>{{$rate->KZT}}</th>
                                <th>{{$rate->date}}</th>
                                <th>
                                        <button data-table-row-id="{{$rate->id}}" type="button" class="btn btn-warning">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                                                <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                                            </svg>
                                            Edit
                                        </button>
                                        <button data-remove-id="{{$rate->id}}" type="button" class="btn btn-danger">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash2-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.037 3.225l1.684 10.104A2 2 0 0 0 5.694 15h4.612a2 2 0 0 0 1.973-1.671l1.684-10.104C13.627 4.224 11.085 5 8 5c-3.086 0-5.627-.776-5.963-1.775z"/>
                                                <path fill-rule="evenodd" d="M12.9 3c-.18-.14-.497-.307-.974-.466C10.967 2.214 9.58 2 8 2s-2.968.215-3.926.534c-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466zM8 5c3.314 0 6-.895 6-2s-2.686-2-6-2-6 .895-6 2 2.686 2 6 2z"/>
                                            </svg>
                                            Delete
                                        </button>
                                </th>
                            </tr>
                        @endforeach

                    </tbody>


                </table>
                {{ $rates->links('components.apps.pagination') }}
            </div>
        </div>
    </div>

    <div class="modal rate-input-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="rate-input-form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="usd-input">USD</label>
                            <input name="USD" type="text" class="form-control" id="usd-input">
                        </div>
                        <div class="form-group">
                            <label for="eur-input">EUR</label>
                            <input name="EUR" type="text" class="form-control" id="eur-input">
                        </div>
                        <div class="form-group">
                            <label for="czk-input">CZK</label>
                            <input name="CZK" type="text" class="form-control" id="czl-input">
                        </div>
                        <div class="form-group">
                            <label for="kzt-input">KZT</label>
                            <input name="KZT" type="text" class="form-control" id="kzt-input">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal rate-input-create-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="rate-input-create-form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="usd-input">USD</label>
                            <input name="USD" type="text" class="form-control" id="usd-create-input">
                        </div>
                        <div class="form-group">
                            <label for="eur-input">EUR</label>
                            <input name="EUR" type="text" class="form-control" id="eur-create-input">
                        </div>
                        <div class="form-group">
                            <label for="czk-input">CZK</label>
                            <input name="CZK" type="text" class="form-control" id="czl-create-input">
                        </div>
                        <div class="form-group">
                            <label for="kzt-input">KZT</label>
                            <input name="KZT" type="text" class="form-control" id="kzt-create-input">
                        </div>
                        <div class="form-group">
                            <label for="kzt-input">Date</label>
                            <input name="date" type="text" class="form-control" id="date-input">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal rate-delete-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Delete this record?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger rate-delete-button">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


    <script src="{{ asset('assets/js/table.js') }}"></script>
    </body>
</html>
