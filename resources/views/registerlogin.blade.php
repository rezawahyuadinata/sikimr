  @extends('layouts.app-login')

  @section('content')
      <section>
          <div class="container">
              <div class="col-md-6 text-center mb-5">
                  <h2 class="heading-section"></h2>
              </div>
          </div>
          <div class="row justify-content-center">
              <div class="col-md-12 col-lg-10">
                  <div class="wrap d-md-flex" style="opacity: 0.9;">
                      <!-- <div class="img" style="background-image: url(style/images/bg-1.jpg);"> -->
                      <div class="img">
                          <img src="/img/login/Logo.jpg"
                              style="display: block;
                            margin-left: auto;
                            margin-right: auto;
                            margin-top: 50px;
                            width: 30%;">
                          <center>
                              <h3
                                  style="display: block;
                            margin-left: auto;
                            margin-right: auto;
                            margin-top: 20px;
                            width: 30%;
                            color: white;">
                                  SI-MR</h3>
                          </center>
                      </div>
                      <div class="login-wrap p-4 p-md-5">
                          <div class="d-flex">
                              <div class="w-100">
                                  <center>
                                      <h3 class="mb-4">Sign Up</h3>
                                  </center>
                              </div>
                          </div>
                          <form class="form" id="form-register">
                              <div class="form-group mb-3">
                                  <i class="fas fa-user"></i> &nbsp<label class="label" for="name">Tingkat</label>
                                  <select name="level" id="level" class="form-control select2">
                                      <option value="">- Pilih -</option>
                                      <option value="UPR-T3">UPR-T3</option>
                                      <option value="UPR-T2">UPR-T2</option>
                                      <option value="UPR-T1">UPR-T1</option>
                                  </select>
                              </div>
                              <div class="form-group mb-3">
                                  <i class="fas fa-user"></i> &nbsp<label class="label" for="name">Unit</label>
                                  <select name="unit" id="unit" class="form-control select2">
                                      <option value="">- Pilih -</option>
                                      <option value="Balai">Balai</option>
                                      <option value="Unit Organisasi">Unit Organisasi</option>
                                      <option value="Balai Teknik">Balai Teknik</option>
                                      <option value="Unit Kerja">Unit Kerja</option>
                                  </select>
                              </div>
                              <div class="form-group mb-3">
                                  <i class="fas fa-user"></i> &nbsp<label class="label" for="name">Pengguna
                                      Kategori</label>
                                  <select name="pengguna_kategori_id" id="pengguna_kategori_id"
                                      class="form-control select2">
                                      <option value="">- Pilih Pengguna Kategori -</option>
                                      @foreach ($data->pengguna_kategori as $item)
                                          <option value="{{ $item->pengguna_kategori_id }}">
                                              {{ $item->pengguna_kategori_nama }}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="form-group mb-3">
                                  <i class="fas fa-user"></i> &nbsp<label class="label" for="name">Nama</label>
                                  <input id="name" type="text"
                                      class="form-control @error('name') is-invalid @enderror" name="name"
                                      value="{{ old('name') }}" autocomplete="name" autofocus>
                              </div>
                              <div class="form-group mb-3">
                                  <i class="fas fa-user"></i> &nbsp<label class="label" for="name">Username</label>
                                  <input id="username" type="text"
                                      class="form-control @error('username') is-invalid @enderror" name="username"
                                      value="{{ old('username') }}" autocomplete="username" autofocus>
                              </div>
                              {{-- <div class="form-group mb-3">
                                    <i class="fas fa-envelope"></i> &nbsp<label class="label" for="email">Email</label>
                                    <input type="text" class="form-control" placeholder="Email" >
                                </div> --}}
                              <div class="form-group mb-3">
                                  <i class="fas fa-key"></i> &nbsp<label class="label" for="password">Password</label>
                                  <input id="password" type="password"
                                      class="form-control @error('password') is-invalid @enderror" name="password"
                                      autocomplete="new-password">
                              </div>
                              <div class="form-group mb-3">
                                  <i class="fas fa-key"></i> &nbsp<label class="label" for="password">Konfirmasi
                                      Password</label>
                                  <input id="password-confirm" type="password" class="form-control"
                                      name="password_confirmation" autocomplete="new-password">
                              </div>
                              {{-- <div class="form-group mb-3">
                                    Select image to upload:
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                </div> --}}
                              <div class="form-group">
                                  <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign
                                      In</button>
                              </div>
                              <div class="form-group d-md-flex">
                                  <div class="w-50 text-left">
                                      <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                          <input type="checkbox" checked>
                                          <span class="checkmark"></span>
                                      </label>
                                  </div>
                                  {{-- <div class="w-50 text-md-right">
                                        <a href="register.php">Forgot Password</a>
                                    </div> --}}
                              </div>
                          </form>
                          <p class="text-center">Sudah punya akun? <a href="{{ route('login') }}">Sign In</a></p>
                      </div>
                  </div>
              </div>
          </div>
          </div>

      </section>
  @endsection
