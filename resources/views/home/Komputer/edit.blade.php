@extends('layouts.master')
@section('title','data komputer')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Komputer</h4>
                            </div>
                            <div class="card-body">
                                <form action="/komputer/{{$komputer->id}}/update" method="post">
                                    @csrf
                                <div class="form-group">
                                    <label for="">Nomor Komputer</label>
                                    <input type="number" class="form-control" name="nomor_komputer" placeholder="Masukan Nomor Komputer" value="{{$komputer->nomor_komputer}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Posisi</label>
                                    <select name="posisi" class="form-control">
                                        <option value="lab industri" {{ old('posisi', $komputer->posisi) == 'lab industri' ? 'selected' : '' }}>Lab Industri</option>
                                        <option value="lab mesin1" {{ old('posisi', $komputer->posisi) == 'lab mesin1' ? 'selected' : '' }}>Lab Mesin 1</option>
                                        <option value="lab mesin2" {{ old('posisi', $komputer->posisi) == 'lab mesin2' ? 'selected' : '' }}>Lab Mesin 2</option>
                                        <option value="lab 4" {{ old('posisi', $komputer->posisi) == 'lab 4' ? 'selected' : '' }}>Lab 4</option>
                                        <option value="lab f" {{ old('posisi', $komputer->posisi) == 'lab f' ? 'selected' : '' }}>Lab F</option>
                                        <option value="lab g" {{ old('posisi', $komputer->posisi) == 'lab g' ? 'selected' : '' }}>Lab G</option>
                                        <option value="lab h" {{ old('posisi', $komputer->posisi) == 'lab h' ? 'selected' : '' }}>Lab H</option>
                                </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="pending">Pending</option>
                                        <option value="repair">Repair</option>
                                        <option value="success">Success</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-{color} btn-primary">Simpan</button>
                                <a href="/laporank" class="btn btn-{color} btn-secondary">Cancel</a>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection