@extends('layouts.master')
@section('title','Data User')
@section('content')
<div class="content-wrapper">
  <section class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card shadow">
            <div class="card-body text-center">
              <h4 class="mb-4">Profil User</h4>
              <div class="profile-picture mb-4">
                <img src="{{ asset('assets/images/user/' . Auth::user()->foto) }}" class="img-fluid rounded-circle" alt="Profil Picture" style="max-width: 180px; max-height: 180px;">
              </div>
              <h4 class="mb-3">{{ Auth::user()->nama }}</h4>
              <p class="text-muted">{{ Auth::user()->username }}</p>
              <hr>
              <table class="table table-borderless mt-4">
                <tbody>
                  <tr>
                    <th style="width: 120px;">ID</th>
                    <td>{{ Auth::user()->id }}</td>
                  </tr>
                  <tr>
                    <th>Level</th>
                    <td>{{ Auth::user()->level }}</td>
                  </tr>
                </tbody>
              </table>
              <div class="text-center mt-4">
                <a href="/user/{{ Auth::user()->id }}/edit" class="btn btn-warning">Edit Profile</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
