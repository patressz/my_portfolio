<form action="{{ route('send.mail') }}" method="POST">
    @csrf
    <div class="row">

        <div class="col-lg-6">
            <input type="text" name="name" id="name" placeholder="Meno" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback d-inline-block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-lg-6">
            <input type="email" name="email" id="email" placeholder="E-mail" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback d-inline-block">
                    {{ $message }}
                </div>
            @enderror
        </div>

    </div>

    <textarea name="content" id="content" placeholder="Vaša správa..." required>{{ old('content') }}</textarea>
    @error('content')
        <div class="invalid-feedback d-inline-block">
            {{ $message }}
        </div>
    @enderror
    <button class="contact-button">Odoslať</button>
</form>
