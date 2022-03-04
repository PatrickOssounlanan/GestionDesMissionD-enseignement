@extends('template')

@section('content')
    
    <div class="login-clean">
        <form action="/" data-aos="fade-down" data-aos-duration="600" data-aos-delay="50" method="post"><a data-aos="fade-right" data-aos-duration="250" data-aos-delay="100" class="forgot" href="#">Je n'ai pas encore de compte<br></a>
            @csrf
            <div class="form-group">
                <input class="form-control" type="email" data-aos="fade-left" data-aos-duration="400" data-aos-delay="150" id="email" name="email" placeholder="Email" style="padding-top: 6px;margin-top: 20px;">
                @if ($errors -> has('email'))
                    <p style="size: 8px; color: red">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="form-group">
                <input class="form-control" type="password" data-aos="fade-left" data-aos-duration="400" data-aos-delay="150" id="password" name="password" placeholder="Mot de passe">
                @if ($errors -> has('password'))
                    <p style="size: 8px; color: red">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="form-group"><button class="btn btn-primary btn-block" role="button" data-bss-hover-animate="pulse" type="submit">Se connecter </button></div><a data-aos="fade-up-right" class="forgot" href="#">Mots de passe oublier?</a>
        </form>
    </div>

@endsection

    