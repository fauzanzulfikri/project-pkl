@extends('layouts.master')
@section('title','data user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data User</h4>
                            </div>
                            <div class="card-body">
                                <div
                                    class="table-responsive"
                                >
                                    <table
                                        class="table table-striped"
                                    >
                                        <thead>
                                            <tr>
                                                <th scope="col">Column 1</th>
                                                <th scope="col">Column 2</th>
                                                <th scope="col">Column 3</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="">
                                                <td scope="row">R1C1</td>
                                                <td>R1C2</td>
                                                <td>R1C3</td>
                                            </tr>
                                            <tr class="">
                                                <td scope="row">Item</td>
                                                <td>Item</td>
                                                <td>Item</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection